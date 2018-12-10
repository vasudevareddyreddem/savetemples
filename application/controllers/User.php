<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class User extends Front_end {

	public function __construct() 
	{
		parent::__construct();	
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->library('user_agent');
		$this->load->helper('directory');
		$this->load->helper('cookie');
		$this->load->helper('security');
		$this->load->model('Users_model');
		
		
	}
	
	public function index(){
		
		if(!$this->session->userdata('mss_details'))
			{
				$data['certificates_list']=$this->Users_model->get_certificates_list();

				$data['event_list']=$this->Users_model->get_event_list();
				$data['upcoming_event_list']=$this->Users_model->get_upcoming_event_list();
				$data['volunters_list']=$this->Users_model->get_volunters_list();
				$data['gallery_list']=$this->Users_model->get_gallery_list();
				$data['about_talk']=$this->Users_model->get_about_talk_list();
				$data['blogs_list']=$this->Users_model->get_blogs_listt();
				
				//echo '<pre>';print_r($data);exit;
				$this->load->view('html/index',$data);
				$this->load->view('html/footer');
			}else{
				redirect('dashboard');
			}
		
	}
}
