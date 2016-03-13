<?php
defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );

class User_mdl extends CI_Model {
	private $table = "users";
	function __construct() 
	{
		parent::__construct ();
	}
	
	public function get_users($order_by, $limit)
	{
		$offset = $this->uri->segment(3);
		return $this->db->order_by($order_by, 'DESC')
				 		->limit($limit, $offset)
						->get($this->table);
	}
	
	public function all_records()
	{
		return $this->db->count_all_results($this->table);
	}
	
	public function find_by_id($id)
	{
		return $this->db->where('id', $id)
						->get($this->table);
	}
	
	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}
	
	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update($this->table, $data);
	}
	
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
}

/* End of file User_mdl.php */
/* Location: ./application/modules/mymodule/models/User_mdl.php */