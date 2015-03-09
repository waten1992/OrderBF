CI------Active Record 类
--------------------------------------
1-$this->db->get();
	$query = $this->db->get('mytable');  // Produces: SELECT * FROM mytable
	$query = $this->db->get('mytable', 10, 20);// Produces: SELECT * FROM mytable LIMIT 20, 10 

	第二和第三个参数允许你设置一个结果集每页纪录数(limit)和结果集的偏移(offset)

2-$this->db->get_where();
	$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);