<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back_end extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('security');
		$this->load->library('zend');
		$this->load->model('Admin_model');
	
			if($this->session->userdata('mss_details'))
			{
				$mss_details=$this->session->userdata('mss_details');
				$data['details']=$this->Admin_model->get_admin_details($mss_details['id']);
				$this->load->view('admin/header',$data);
			}
		}
	
}
