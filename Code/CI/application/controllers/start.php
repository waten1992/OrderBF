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
    function login()
    {
       /* //生成表格 
          $query = $this->db->query("SELECT * FROM users");
          echo $this->table->generate($query); 
        */       

        $this->load->view("log/login"); 
    }
    function forget()
    {
        $this->load->view('log/forget');
    }
    function handle_forget()
    {
        
    }
}
