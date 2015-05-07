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
        $this->load->view('show/comment_page');
    }
    function hand_comment()
    {
        echo 'success';
    }

}
