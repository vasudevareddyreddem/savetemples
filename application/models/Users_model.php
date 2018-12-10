<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model 

{
	function __construct() 
	{
		parent::__construct();
		$this->load->database("default");
	}
	
	public  function save_contactus($data){
		$this->db->insert('contactus',$data);
		return $this->db->insert_id();
	}
	public  function save_user($data){
		$this->db->insert('users',$data);
		return $this->db->insert_id();
	}
	
	public  function get_user_details($u_id){
		$this->db->select('u_id,cust_name,email,address,mobile,amount,description')->from('users');
		$this->db->where('u_id',$u_id);
		return $this->db->get()->row_array();
	}
	
	public  function update_payment_details($u_id,$data){
		$this->db->where('u_id',$u_id);
		return $this->db->update('users',$data);
	}
	
	public  function get_event_list(){
		$this->db->select('*')->from('events');
		$this->db->where('status',1);
		$this->db->order_by('e_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_volunters_list(){
		$this->db->select('*')->from('volunteers');
		$this->db->where('status',1);
		$this->db->order_by('v_id','asc');
		return $this->db->get()->result_array();
	}
	public  function get_gallery_list(){
		$this->db->select('*')->from('gallery');
		$this->db->where('status',1);
		$this->db->order_by('g_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_about_talk_list(){
		$this->db->select('*')->from('talkaboutuss');
		$this->db->where('status',1);
		$this->db->order_by('a_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_blogs_listt(){
		$this->db->select('*')->from('blogs');
		$this->db->where('status',1);
		$this->db->order_by('b_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_upcoming_event_list(){
		$this->db->select('*')->from('events');
		$this->db->where('status',1);
		$this->db->where('type','Upcoming');
		$this->db->order_by('e_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_previous_event_list(){
		$this->db->select('*')->from('events');
		$this->db->where('status',1);
		$this->db->where('type','Previous');
		$this->db->order_by('e_id','desc');
		return $this->db->get()->result_array();
	}
	public  function get_certificates_list(){
		$this->db->select('*')->from('certificates');
		$this->db->where('status',1);
		$this->db->order_by('c_id','asc');
		return $this->db->get()->result_array();
	}
	
	

}