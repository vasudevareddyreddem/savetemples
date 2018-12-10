<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certicate_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_certificates($data){
		$this->db->insert('certificates',$data);
		return $this->db->insert_id();
	}
	
	public  function get_certificates_list($u_id){
		$this->db->select('*')->from('certificates');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_certificates_details($c_id){
		$this->db->select('*')->from('certificates');
		$this->db->where('c_id',$c_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_certificates_details($u_id,$data){
		$this->db->where('c_id',$u_id);
		return $this->db->update('certificates',$data);
	}
	public  function delete_banners($c_id){
		$this->db->where('c_id',$c_id);
		return $this->db->delete('certificates');
	}
	
	

}