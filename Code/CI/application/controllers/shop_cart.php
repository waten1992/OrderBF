<?php

class Shop_cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }

    function index() {
        $this->cart->contents(); //显示购物车中的数据
    }

    function add() {
        //接受传过来的数据
        //判断是已经登录了，是继续，否者则转到登录页面
// $this->cart->insert($data); //插入数据
        $item_id = $this->uri->segment(3);
        $qty = $this->uri->segment(4);
        echo $item_id;
        echo br();
        $uname = $this->input->get("username");
        echo $uname; 
        if ($this->session->userdata('logged_in')) {
            // 已经登录了
        } else {
            echo "you didn't log " ;
        }
        echo 'add sucess!';
    }

}
