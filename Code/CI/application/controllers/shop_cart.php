<?php

class Shop_cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }
      function index() {
        $this->load->view('home');
    }

    function add() {
        //接受传过来的数据
        //判断是已经登录了，是继续，否者则转到登录页面
// $this->cart->insert($data); //插入数据
        echo 'add sucess!';
    }

}
