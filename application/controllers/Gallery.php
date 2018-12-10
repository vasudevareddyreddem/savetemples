<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Gallery extends Front_end {

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
		
		$data['gallery_list']=$this->Users_model->get_gallery_list();
		$this->load->view('html/gallery',$data);
		$this->load->view('html/footer');
		
	}
}
