<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volunteer_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_volunteer($data){
		$this->db->insert('volunteers',$data);
		return $this->db->insert_id();
	}
	
	public  function get_volunteer_list($u_id){
		$this->db->select('*')->from('volunteers');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_volunteer_details($v_id){
		$this->db->select('*')->from('volunteers');
		$this->db->where('v_id',$v_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_volunteer_details($u_id,$data){
		$this->db->where('v_id',$u_id);
		return $this->db->update('volunteers',$data);
	}
	public  function delete_banners($v_id){
		$this->db->where('v_id',$v_id);
		return $this->db->delete('volunteers');
	}
	
	

}