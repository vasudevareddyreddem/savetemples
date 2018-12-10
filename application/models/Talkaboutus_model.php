<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Talkaboutus_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_talkaboutus($data){
		$this->db->insert('talkaboutuss',$data);
		return $this->db->insert_id();
	}
	
	public  function get_talkaboutus_list($u_id){
		$this->db->select('*')->from('talkaboutuss');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_talkaboutus_details($a_id){
		$this->db->select('*')->from('talkaboutuss');
		$this->db->where('a_id',$a_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_talkaboutus_details($u_id,$data){
		$this->db->where('a_id',$u_id);
		return $this->db->update('talkaboutuss',$data);
	}
	public  function delete_banners($a_id){
		$this->db->where('a_id',$a_id);
		return $this->db->delete('talkaboutuss');
	}
	
	

}