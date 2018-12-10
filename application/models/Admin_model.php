<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	public  function login_details($data){
		$this->db->select('*')->from('admin');		
		$this->db->where('email', $data['email']);
		$this->db->where('password',$data['password']);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();
	}
	
	public  function get_admin_details($id){
		$this->db->select('*')->from('admin');		
		$this->db->where('id',$id);
        return $this->db->get()->row_array();
	}
	public function get_adminpassword_details($admin_id){
		$this->db->select('admin.password')->from('admin');		
		$this->db->where('id', $admin_id);
		$this->db->where('status', 1);
        return $this->db->get()->row_array();	
	}
	public function check_email_exits($email){
		$this->db->select('*')->from('admin');		
		$this->db->where('email', $email);
        return $this->db->get()->row_array();	
	}
	public  function update_profile_details($id,$data){
		$this->db->where('id',$id);
    	return $this->db->update("admin",$data);
	}
	
	public  function get_events_count($id){
		$this->db->select('COUNT(*) as cnt')->from('events');		
		$this->db->where('status', 1);
		$this->db->where('create_by', $id);
        return $this->db->get()->row_array();
	}
	public  function get_volunteer_count($id){
		$this->db->select('COUNT(*) as cnt')->from('volunteers');		
		$this->db->where('status', 1);
		$this->db->where('create_by', $id);
        return $this->db->get()->row_array();
	}
	public  function get_certificate_count($id){
		$this->db->select('COUNT(*) as cnt')->from('certificates');		
		$this->db->where('status', 1);
		$this->db->where('create_by', $id);
        return $this->db->get()->row_array();
	}
	public  function get_blogs_count($id){
		$this->db->select('COUNT(*) as cnt')->from('blogs');		
		$this->db->where('status', 1);
		$this->db->where('create_by', $id);
        return $this->db->get()->row_array();
	}
	public  function get_talkaboutus_count($id){
		$this->db->select('COUNT(*) as cnt')->from('talkaboutuss');		
		$this->db->where('status', 1);
		$this->db->where('create_by', $id);
        return $this->db->get()->row_array();
	}
	
	
	
	

}