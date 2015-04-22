<?php

class Start extends CI_Controller {

    function index() {
        $this->load->view('home');
    }

    function register() {
        if ($this->form_validation->run('signup') == FALSE) { //通不过验证就提示重新注册
            $this->load->view('log/register_page');
        } else { //插入到数据库中
            $post_data = array(//获取数据
                'user_id' => $this->input->post('user_id'),
                'passwd' => $this->input->post('passwd'),
                'address' => $this->input->post('address')
            );
            $post_data['passwd'] = do_hash($this->input->post('passwd'), 'md5'); //默认是SHA1,我选择了MD5 
            // 数据库中的注册和登录验证的要以相同的方式获取，否者hash出来的东西不一样，比如用：$this->input->post('passwd')
            $this->db->insert('users', $post_data);


            $this->load->view('home'); //默认返回主页
        }
    }

    public function user_id_check($tel) { //检查是否是真正的手机号码
        $iphone = preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/", $tel);
        if (!$iphone) {
            $this->form_validation->set_message('user_id_check', '你的 %s  不对');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}