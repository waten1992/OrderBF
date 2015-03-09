<?php
生成查询记录集
-----------------
1-result() 
	//This function returns the query result as an array of objects, or an empty array on failure.
	//Typically you'll use this in a foreach loop, like this:
	
	$query = $this->db->query("YOUR QUERY");
	foreach ($query->result() as $row)
	{
   		echo $row->title;
   		echo $row->name;
  		echo $row->body;
	}

	The above function is an alias of result_object().
	If you run queries that might not produce a result, you are encouraged to test the result first:

	$query = $this->db->query("YOUR QUERY");

	if ($query->num_rows() > 0)
	{
	   foreach ($query->result() as $row)
	   {
	      echo $row->title;
	      echo $row->name;
	      echo $row->body;
	   }
	}
	//You can also pass a string to result() which represents a class to instantiate for each result object 
	//(note: this class must be loaded)

	$query = $this->db->query("SELECT * FROM users;");
	foreach ($query->result('User') as $row)
	{
	   echo $row->name; // call attributes
	   echo $row->reverse_name(); // or methods defined on the 'User' class
	}

2-result_array()
	//This function returns the query result as a pure array, or an empty array when no result is produced. 
	//Typically you'll use this in a foreach loop, like this:

	$query = $this->db->query("YOUR QUERY");
	foreach ($query->result_array() as $row)
	{
	   echo $row['title'];
	   echo $row['name'];
       echo $row['body'];
	}

3-row()
	//This function returns a single result row. If your query has more than one row, it returns only the first row. 
	//The result is returned as an object. Here's a usage example:
	
	$query = $this->db->query("YOUR QUERY");
	if ($query->num_rows() > 0)
	{
	   $row = $query->row(); 

	   echo $row->title;
	   echo $row->name;
	   echo $row->body;
	}
	
	//If you want a specific row returned you can submit the row number as a digit in the first parameter:
	$row = $query->row(5);

	//You can also add a second String parameter, which is the name of a class to instantiate the row with:
	$query = $this->db->query("SELECT * FROM users LIMIT 1;");

	$query->row(0, 'User')
	echo $row->name; // call attributes
	echo $row->reverse_name(); // or methods defined on the 'User' class

4-row_array()
	//Identical to the above row() function, except it returns an array. Example:

	$query = $this->db->query("YOUR QUERY");
	if ($query->num_rows() > 0)
	{
	   $row = $query->row_array(); 

	   echo $row['title'];
	   echo $row['name'];
	   echo $row['body'];
	}

	//If you want a specific row returned you can submit the row number as a digit in the first parameter:

	$row = $query->row_array(5);

	//In addition, you can walk forward/backwards/first/last through your results using these variations:

	$row = $query->first_row()
	$row = $query->last_row()
	$row = $query->next_row()
	$row = $query->previous_row()

	//By default they return an object unless you put the word "array" in the parameter:

	$row = $query->first_row('array')
	$row = $query->last_row('array')
	$row = $query->next_row('array')
	$row = $query->previous_row('array')

-------------------------------------------------------------------

Result Helper Functions

1-$query->num_rows()
	//The number of rows returned by the query. 
	//Note: In this example, $query is the variable that the query result object is assigned to
	
	$query = $this->db->query('SELECT * FROM my_table');

	echo $query->num_rows();
	?>