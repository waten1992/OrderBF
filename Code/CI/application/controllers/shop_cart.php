<?php

class Shop_cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('show/shop_cart_show');
        } else {
            $this->load->view('log/tell_info'); //提示用户还没有登录
        }
    }

    function add() {
        //接受传过来的数据
        //判断是已经登录了，是继续，否者则转到登录页面
// $this->cart->insert($data); //插入数据

        $data = array(
            'id' => $this->input->get('item_id'),
            'qty' => $this->input->get('qty'),
            'price' => $this->input->get('price'),
            'name' => $this->input->get('item_name')
        );
        if ($this->session->userdata('logged_in')) {
            // 已经登录了 ，加入购物车，是否去购物车结算页面
            $rowid = $this->cart->insert($data); //插入购物车
            //     echo $rowid;

            $cart = $this->cart->contents();
            //  var_dump($cart);
            //echo $cart["rowid"];

            $this->load->view('show/shop_cart_show');
            //   foreach ($this->cart->contents() as $items)
            //    echo  $items['rowid'];
        } else {
            $this->load->view('log/tell_info'); //提示用户还没有登录
        }
    }

    function update() {
        $data = array(
            'rowid' => 'b99ccdf16028f015540f341130b6d8ec',
            'qty' => 3
        );

        $this->cart->update($data);
    }

    function settled() {
        $user_id = $this->session->userdata('username'); //从session 获取username 即是手机号码
        $query = $this->db->get_where('users', array('user_id' => $user_id));
        if ($query->num_rows() >= 1) {
            foreach ($query->result() as $row) {
                $user_phone = $row->user_id; //依次获取手机号码
                $address = $row->address; // 获取地址
            }
        }
        $item_name = array(); //建立数组存取商品名称
        $i = 0 ; //下标获取购物车中的名称
        foreach ($this->cart->contents() as $items) {
            $item_name[$i] = $items['name'];
            $i++;
        }

        $pass_data = array( 
            'name' => $user_phone,
            'address' => $address,
            'amount' => $this->cart->total(),
            'num' => $item_name 
        );

        $this->load->view('show/order_settled', $pass_data);
    }

}
