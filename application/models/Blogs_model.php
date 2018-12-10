<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blogs_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_blogs($data){
		$this->db->insert('blogs',$data);
		return $this->db->insert_id();
	}
	
	public  function get_blogs_list($u_id){
		$this->db->select('*')->from('blogs');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_blogs_details($b_id){
		$this->db->select('*')->from('blogs');
		$this->db->where('b_id',$b_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_blogs_details($u_id,$data){
		$this->db->where('b_id',$u_id);
		return $this->db->update('blogs',$data);
	}
	public  function delete_banners($b_id){
		$this->db->where('b_id',$b_id);
		return $this->db->delete('blogs');
	}
	
	

}