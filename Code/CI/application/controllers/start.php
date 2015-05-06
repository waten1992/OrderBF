<?php

class Start extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }

    function index() {
        $query_soybean = $this->db->get_where('items', array('item_id' => "100")); //获取豆浆信息
        $query_bread = $this->db->get_where('items', array('item_id' => "200")); //获取面包信息
        $query_tomato = $this->db->get_where('items', array('item_id' => "300")); //获取番茄汁
        $cart_num = $this->cart->total_items();
        if ($query_soybean->num_rows() >= 1) {
            foreach ($query_soybean->result() as $row) {
                $var_soybean = $row->price;
                $soybean_name = $row->item_name;
                $soybean_pd = $row->pd_explain;
                $soybean_capacity = $row->capacity;
                $soybean_id = $row->item_id;
            }
        }
        if ($query_bread->num_rows() >= 1) {
            foreach ($query_bread->result() as $row) {
                $var_bread = $row->price;
                $bread_name = $row->item_name;
                $bread_pd = $row->pd_explain;
                $bread_capacity = $row->capacity;
                $bread_id = $row->item_id;
            }
        }
        if ($query_tomato->num_rows() >= 1) {
            foreach ($query_tomato->result() as $row) {
                $tomato_price = $row->price;
                $tomato_name = $row->item_name;
                $tomato_pd = $row->pd_explain;
                $tomato_capacity = $row->capacity;
                $tomato_id = $row->item_id;
            }
        }

        $data = array(
            'soybean' => $var_soybean,
            'soybean_name' => $soybean_name,
            'soybean_pd' => $soybean_pd,
            'soybean_capacity' => $soybean_capacity,
            'soybean_id' => $soybean_id,
            'bread' => $var_bread,
            'bread_name' => $bread_name,
            'bread_pd' => $bread_pd,
            'bread_capacity' => $bread_capacity,
            'bread_id' => $bread_id,
            'tomato_price' => $tomato_price,
            'tomato_name' => $tomato_name,
            'tomato_pd' => $tomato_pd,
            'tomato_capacity' => $tomato_capacity,
            'tomato_id' => $tomato_id,
            'num' => $cart_num
        );

        if ($this->session->userdata('logged_in')) {
            $this->load->view('log/home_logout', $data); //转到具有logout的主页
        } else {
            $this->load->view('home', $data);
            // $this->load->view('new_test',$data); //测试用的
        }
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


            $this->load->view('log/register_success');
            //$this->index(); //默认返回主页
        }
    }

    public function user_id_check($tel) { //检查是否是真正的手机号码
        $iphone = preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|18[79]{1}[0-9]{8}$/", $tel);
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
            if ($this->form_validation->run('sign_in') == FALSE) { //
                $this->load->view('log/login'); //没有通过最基本验证,继续登录
            } else if ($query->num_rows() < 1) {
                $this->load->view('log/login_error'); //没有通过数据库的验证，继续提示登录
            } else {
                $newdata = array(
                    'username' => $iphone, //添加用户名到session中
                    'logged_in' => TRUE   //标记为已经登录了
                );
                $this->session->set_userdata($newdata); //加入session 中

                $this->index(); //转到具有logout的主页
            }
        }
    }

    function logout() {
        $this->cart->destroy(); //销毁购物车
        $this->session->sess_destroy(); //销毁session
        $this->index();
    }

    function about() {
        $this->load->view('introduce/about');
    }

    function contact() {
        $this->load->view('introduce/contact');
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
            $config['protocol'] = 'smtp';
            $config['charset'] = 'iso-8859-1';

            $config['smtp_host'] = 'smtp.163.com';
            $config['smtp_user'] = 'waten1company@163.com';
            $config['smtp_pass'] = 'HEWEN15116550789';
            $this->email->initialize($config);

            foreach ($query->result() as $row) {
                $query_passwd = $row->passwd;
            }
            $this->email->from('waten1company@163.com', '找回密码');
            $this->email->to($email);
            $message_content = "你好Orderbf User,重置密码请点击: http://localhost/index.php/start/verify_forget_passwd/$iphone/$query_passwd";
            $this->email->subject("找回密码");
            $this->email->message($message_content);


            if ($this->email->send()) {
                // echo 'success...';
            } else {
                echo 'failed...';
                $this->email->print_debugger();
            }

            $this->load->view('log/handle_forget'); //提示已经发送，请查收
        }
    }

    function verify_forget_passwd() {
        $user_id = $this->uri->segment(3);
        $passwd = $this->uri->segment(4);
        //   echo $user_id .  br();
        // echo $passwd;
        $query = $this->db->get_where('users', array('user_id' => $user_id, 'passwd' => $passwd));

        if ($query->num_rows() >= 1) {

            $newdata = array(
                'username' => $user_id, //添加用户名到session中
                'logged_in' => TRUE   //标记为已经登录了
            );
            $this->session->set_userdata($newdata); //载入session ,在后面的handle_refill_passwd处理
            $this->load->view("log/change_passwd");
        } else {
            $this->load->view('log/verify_error');
        }
    }

    function handle_refill_passwd() {  //重置密码的处理函数
        if ($this->form_validation->run('new_passwd_verify') == FALSE) {
            $this->load->view('log/forget'); //验证失败，要重新验证
        } else {
            //验证成功要更新数据库的密码；
            $pwd = $this->input->post('passwd'); //获取密码
            $pwd = do_hash($pwd, 'md5'); //MD5 处理

            $data = array(
                'passwd' => $pwd
            );
            $this->db->trans_start(); //打开事务
            $name = $this->session->userdata('username');
            $this->db->update('users', $data, "user_id = $name");
            $this->db->trans_complete(); //关闭事务
            $this->load->view('log/change_passwd_success'); //转到具有logout的主页 
        }
    }

    function yourself() {
        if ($this->session->userdata('logged_in')) {
            $name = $this->session->userdata('username');
            $query = $this->db->get_where('users', array('user_id' => $name));
            if ($query->num_rows() >= 1) {
                foreach ($query->result() as $row) {
                    $data = array(
                        'user_id' => $row->user_id,
                        'email' => $row->email,
                        'address' => $row->address,
                        'createtime' => $row->createtime
                    );
                }
            }

            $this->load->view('show/yourself', $data);
        } else {
            $this->load->view('log/tell_info');
        }
    }

    function list_record() {  //从orders_master 取出数据
        if ($this->session->userdata('logged_in')) {

            $name = $this->session->userdata('username');
            $query = $this->db->get_where('orders_master', array('user_id' => $name));
            $this->load->view('show/list_record');

            if ($query->num_rows() >= 1) {

                foreach ($query->result() as $row) {

                    $user_id = $row->user_id;
                    $amount = $row->amount;
                    $order_id = $row->order_id;
                    $createtime = $row->createtime;
                    $status = $row->status;

                    $query_item_name = $this->db->get_where('orders_slave', array('user_id' => $user_id, 'order_id' => $order_id));
                    $i = 0;
                    $item_name = array();
                    if ($query_item_name->num_rows() >= 1) {
                        foreach ($query_item_name->result() as $items) {
                            $item_name[$i] = $items->item_name;
                            $i++;
                        }
                    }
                    $data = array(
                        'user_id' => $user_id,
                        'amount' => $amount,
                        'order_id' => $order_id,
                        'createtime' => $createtime,
                        'status' => $status,
                        'item_name' => $item_name
                    );
                    $this->load->view('show/list_record_tables', $data);
                }
            }
        } else {
            $this->load->view('log/tell_info');
        }
    }

    function change_info() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('log/change_info');
        } else {
            $this->load->view('log/tell_info');
        }
    }

    function change_email() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('log/change_email');
        } else {
            $this->load->view('log/tell_info');
        }
    }

    function handle_change_email() {
        $this->form_validation->set_rules('email', '邮箱', 'trim|required|valid_email|is_unique[users.email]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('log/change_email');
        } else {
            $email = $this->input->post('email');
            $data = array(
                'email' => $email
            );
            $this->db->trans_start(); //打开事务
            $name = $this->session->userdata('username');
            $this->db->update('users', $data, "user_id = $name");
            $this->db->trans_complete(); //关闭事务
            $this->load->view('log/change_email_success'); //转到具有logout的主页
        }
    }

    function change_address() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('log/change_address');
        } else {
            $this->load->view('log/tell_info');
        }
    }

    function handle_change_address() {
        $this->form_validation->set_rules('address', '地址', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('log/change_address');
        } else {
            $address = $this->input->post('address');
            $data = array(
                'address' => $address
            );
            $this->db->trans_start(); //打开事务
            $name = $this->session->userdata('username');
            $this->db->update('users', $data, "user_id = $name");
            $this->db->trans_complete(); //关闭事务
            $this->load->view('log/change_address_success'); //转到具有logout的主页 
        }
    }

    function test() {
        /*
          $query_soybean = $this->db->get_where('items', array('item_id' => "100")); //获取豆浆信息
          $query_bread = $this->db->get_where('items', array('item_id' => "200")); //获取面包信息
          $cart_num = $this->cart->total_items();
          if ($query_soybean->num_rows() >= 1) {
          foreach ($query_soybean->result() as $row)
          $var_soybean = $row->price;
          $soybean_name = $row->item_name;
          $soybean_pd = $row->pd_explain;
          }
          if ($query_bread->num_rows() >= 1) {
          foreach ($query_bread->result() as $row)
          $var_bread = $row->price;
          $bread_name = $row->item_name;
          $bread_pd = $row->pd_explain;
          }

          $data = array(
          'soybean' => $var_soybean,
          'soybean_name' => $soybean_name,
          'soybean_pd' => $soybean_pd,
          'bread' => $var_bread,
          'bread_name' => $bread_name,
          'bread_pd' => $bread_pd,
          'num' => $cart_num
          );
          $this->load->view('test', $data);
         * 
         */
        $this->load->view('new_test');
    }

}
