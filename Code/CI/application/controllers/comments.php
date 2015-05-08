<?php

class Comments extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->db->trans_strict(FALSE); //禁用 严格的数据库事务
    }

    function index() {

        $item_id = $this->uri->segment(3);
        $query_item_name = $this->db->get_where('items', array('item_id' => $item_id));

        if ($query_item_name->num_rows() >= 1) {
            foreach ($query_item_name->result() as $row) {
                $name = array(
                    'item_name' => $row->item_name,
                    'item_content' => $row->content
                );
            }
        }
        $this->load->view('show/comments_head', $name);
        $query = $this->db->get_where('comments', array('item_id' => $item_id));
        if ($query->num_rows() >= 1) {
            foreach ($query->result() as $row) {
                $content = $row->content; //依次获取内容
                $createtime = $row->createtime; // 获取时间

                $data = array(
                    'content' => $content,
                    'createtime' => $createtime
                );

                $this->load->view('show/comments_details', $data);
            }
        }
    }

    function add_comment() {
        
        $item_id = $this->input->post('item_id');
        $body = $this->input->post('body');
        $user_id = $this->input->post('user_id');
        $order_id = $this->input->post('order_id');
        $data = array(
            'item_id' => $item_id,
            'user_id' => $user_id,
            'content' => $body,
            'is_comment' => 1
        );
        $update_data = array(
             'is_comment' => 1
        );
        $this->db->trans_start(); //打开事务

        $this->db->insert('comments', $data); //插入数据库 ,插入主表

        $this->db->where(array('order_id'=>$order_id ,'item_id' =>$item_id ) );
        $this->db->update('orders_slave', $update_data);

        $this->db->trans_complete(); //关闭事务
        
        $this->load->view('show/comment_success',$data);
    }

    function hand_comment() {
        $item_id = $this->uri->segment(3); //接受item_id
        $is_comments = $this->uri->segment(4); //是否评论
        $order_id = $this->uri->segment(5); //order_id 

        $query = $this->db->get_where('orders_slave', array('order_id' => $order_id, 'item_id' => $item_id));
        if ($query->num_rows() >= 1) {
            foreach ($query->result() as $row) {
                $data = array(
                    'item_id' => $row->item_id,
                    'user_id' => $this->session->userdata('username'),
                    'item_name' => $row->item_name,
                    'order_id' => $order_id
                );
            }
        } else {
            echo 'did not have data ';
        }

        if ($this->session->userdata('logged_in')) { //成功登录
            if ($is_comments) { //已经评论过了
                echo 'you have been commented';
            } else {
                $this->load->view('show/comment_page', $data);
            }
        } else {
            $this->load->view('log/tell_info'); //提示用户还没有登录
        }
    }

}
