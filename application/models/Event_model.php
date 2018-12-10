<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_event($data){
		$this->db->insert('events',$data);
		return $this->db->insert_id();
	}
	
	public  function get_event_list($u_id){
		$this->db->select('*')->from('events');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_event_details($e_id){
		$this->db->select('*')->from('events');
		$this->db->where('e_id',$e_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_event_details($u_id,$data){
		$this->db->where('e_id',$u_id);
		return $this->db->update('events',$data);
	}
	public  function delete_banners($e_id){
		$this->db->where('e_id',$e_id);
		return $this->db->delete('events');
	}
	
	

}