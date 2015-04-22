<?php

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }

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
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address')
            );
            $post_data['passwd'] = do_hash($this->input->post('passwd'), 'md5'); //默认是SHA1,我选择了MD5 
            // 数据库中的注册和登录验证的要以相同的方式获取，否者hash出来的东西不一样，比如用：$this->input->post('passwd')
            $this->db->trans_start(); //打开事务
            $this->db->insert('users', $post_data); //插入数据库
            $this->db->trans_complete(); //关闭事务

            $newdata = array(
                'username' => $this->input->post('user_id'), //添加用户名到session中
                'logged_in' => TRUE   //标记为已经登录了
            );
            $this->session->set_userdata($newdata); //把用手机号码和登录状态添加到session中去



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

    function login() {
        /* //生成表格 
          $query = $this->db->query("SELECT * FROM users");
          echo $this->table->generate($query);
         */
        if ($this->session->userdata('logged_in')) {
            //说明已经登录了；
            $this->load->view('log/home_logout'); //转到具有logout的主页
        } else {
            $iphone = $this->input->post('user_id');
            $pwd = $this->input->post('passwd');

            $pwd = do_hash($pwd, 'md5'); //MD5 处理


            $query = $this->db->get_where('users', array('user_id' => $iphone, 'passwd' => $pwd));
            //相当于 select * from users where user_id = $iphone and passwd= $pwd ;
            /* 对session的测试
              $arr_session = $this->session->all_userdata();
              foreach ($arr_session as $key => $value) {
              echo $key . "=>" . $value;
              echo br();
              }
             */
            if ($this->form_validation->run('sign_in') == FALSE || $query->num_rows() < 1) {
                $this->load->view('log/login'); //继续提升登录
            } else {
                $newdata = array(
                    'username' => $iphone, //添加用户名到session中
                    'logged_in' => TRUE   //标记为已经登录了
                );
                $this->session->set_userdata($newdata); //加入session 中

                $this->load->view('log/home_logout'); //转到具有logout的主页
            }
        }
    }

    function forget() {
        $this->load->view('log/forget');
    }

    function handle_forget() {

        $iphone = $this->input->post('user_id');
        $email = $this->input->post('email');

        $query = $this->db->get_where('users', array('user_id' => $iphone, 'email' => $email));
        //相当于 select * from users where user_id = $iphone and email= $email ;  
        if ($this->form_validation->run('forget_verify') == FALSE || $query->num_rows() < 1) {
            $this->load->view('log/forget_error'); //提示重新填写 
        } else {
            //发送邮件函数，等待写

            $this->load->view('log/handle_forget'); //提示已经发送，请查收
        }
    }

}
