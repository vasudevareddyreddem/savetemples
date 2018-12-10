<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_media($data){
		$this->db->insert('media',$data);
		return $this->db->insert_id();
	}
	
	public  function get_media_list($u_id){
		$this->db->select('*')->from('media');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_media_details($m_id){
		$this->db->select('*')->from('media');
		$this->db->where('m_id',$m_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_media_details($u_id,$data){
		$this->db->where('m_id',$u_id);
		return $this->db->update('media',$data);
	}
	public  function delete_media($m_id){
		$this->db->where('m_id',$m_id);
		return $this->db->delete('media');
	}
	
	

}