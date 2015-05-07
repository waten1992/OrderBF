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
        $capacity = $this->input->get('capacity'); //获取商品的库存
        if ($capacity >= $this->input->get('qty')) {
            if ($this->session->userdata('logged_in')) {
                // 已经登录了 ，加入购物车，是否去购物车结算页面

                $rowid = $this->cart->insert($data); //插入购物车

                $cart = $this->cart->contents();
                $this->load->view('show/shop_cart_show');
                //   foreach ($this->cart->contents() as $items)
                //    echo  $items['rowid'];
            } else {
                $this->load->view('log/tell_info'); //提示用户还没有登录
            }
        } else {
            $this->load->view('log/capacity_empty');
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
        $i = 0; //下标获取购物车中的名称
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

    function handle_settled() {
        //写入数据库 需要用户的item_id 
        $user_id = $this->session->userdata('username'); //从session 获取username 即是手机号码

        $query_users = $this->db->get_where('users', array('user_id' => $user_id));
        if ($query_users->num_rows() >= 1) {
            foreach ($query_users->result() as $row) {
                $address = $row->address; // 获取地址
            }
        }
        $data_master = array(
            'amount' => $this->cart->total(),
            'address' => $address,
            'user_id' => $user_id
        );

        $item_id = array(); //建立数组存取商品id
        $i = 0; //下标获取购物车中的ID
        foreach ($this->cart->contents() as $items) {
            $item_id[$i] = $items['id'];
            $item_qty[$i] = $items['qty'];
            $i++;
        }
        $this->db->trans_start(); //打开事务
        $this->db->insert('orders_master', $data_master); //插入数据库 ,插入主表
        $this->db->select('order_id');
        $this->db->order_by("order_id", "desc");
        $query_order_id = $this->db->get('orders_master', 1);
        foreach ($query_order_id->result() as $row) {  //搞定order_id 
            $order_id = $row->order_id;
        }

        $n = count($item_qty); //计算购物车中的商品的总类
        $set_zero = 0;
        foreach ($item_id as $value) {
            $query = $this->db->get_where('items', array('item_id' => $value));
            if ($query->num_rows() >= 1) {
                foreach ($query->result() as $row) {
                    $data_slave = array(
                        'order_id' => $order_id,
                        'user_id' => $user_id,
                        'item_name' => $row->item_name,
                        'item_id' => $row->item_id,
                        'quantity' => $item_qty[$set_zero],
                        'price' => $row->price
                    );

                    $capacity = $row->capacity - $item_qty[$set_zero];
                    $items_id = $row->item_id;
                    $update_capacity = array(
                        'capacity' => $capacity
                    );
                }
            }
            $set_zero++; //增加下标
            $this->db->where('item_id', $items_id);
            $this->db->update('items', $update_capacity);
            $this->db->insert('orders_slave', $data_slave); //插入从表
        }

        $this->db->trans_complete(); //关闭事务
        $this->destroy(); //销毁购物车
    }

    function destroy() {
        $this->cart->destroy(); //销毁购物车
        $this->load->view('show/weixin_pay');
    }

    function show_orders_slave_details() {
        $user_id = $this->session->userdata('username'); //从session 获取username 即是手机号码

        $query_orders_slave = $this->db->get_where('orders_slave', array('user_id' => $user_id));
     //   $this->load->view('show/orders_slave_details_head');
        $slave = array();
        $i  = 1 ;
        if ($query_orders_slave->num_rows() >= 1) {
            foreach ($query_orders_slave->result() as $row) {
               /** 
                */
                $data_slave = array(
                    'order_id' => $row->order_id,
                    'item_name' => $row->item_name,
                    'quantity' => $row->quantity,
                    'price' => $row->price,
                    'is_comment' => $row->is_comment
            
                );
                
             /*   
                    $order_id[$i] = $row->order_id;
                    $item_name[$i] = $row->item_name;
                    $quantity[$i] =  $row->quantity;
                    $price[$i] = $row->price;
                    $is_comment[$i] = $row->is_comment;
                
               */ 
                
                 $slave['waten'][$i] = $data_slave;
                 $i++;
               // $this->load->view('show/orders_slave_details',$data_slave);
            }
        }
         $slave['num'] = $i  ;
    //     var_dump($slave);
     
        $this->load->view('show/orders_slave_details_head',$slave);
    }

}
