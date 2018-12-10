<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_gallery($data){
		$this->db->insert('gallery',$data);
		return $this->db->insert_id();
	}
	
	public  function get_gallery_list($u_id){
		$this->db->select('*')->from('gallery');
		$this->db->where('create_by',$u_id);
		return $this->db->get()->result_array();
	}
	public  function get_gallery_details($g_id){
		$this->db->select('*')->from('gallery');
		$this->db->where('g_id',$g_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_gallery_details($u_id,$data){
		$this->db->where('g_id',$u_id);
		return $this->db->update('gallery',$data);
	}
	public  function delete_gallery($g_id){
		$this->db->where('g_id',$g_id);
		return $this->db->delete('gallery');
	}
	
	

}