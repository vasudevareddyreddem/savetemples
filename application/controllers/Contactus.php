<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Front_end.php');

class Contactus extends Front_end {

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
		
		$this->load->view('html/contactus');
		$this->load->view('html/footer');
		
	}
	
	public  function post(){
		$post=$this->input->post();
		//echo '<pre>';print_r($post);exit;
		$addcontact=array(
		'name'=>isset($post['name'])?$post['name']:'',
		'phone'=>isset($post['phone'])?$post['phone']:'',
		'email_id'=>isset($post['email'])?$post['email']:'',
		'message'=>isset($post['message'])?$post['message']:'',
		'create_at'=>date('Y-m-d H:i:s'),
		);
		$save=$this->Users_model->save_contactus($addcontact);
		if(count($save)>0){
				$data['details']=$post;
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->set_mailtype("html");
				$this->email->from($post['email']);
				$this->email->to('info@mithrasevasamthi.com');
				$this->email->subject('Contact us - Request');

				$msg='Name:'.$post['name'].'<br> Email :'.$post['email'].'<br> Phone  number :'.$post['phone'].'<br> Message :'.$post['message'];
				$this->email->message($msg);
				$this->email->send();
				$this->session->set_flashdata('success',"Your message was successfully sent.");
				redirect('');
			}else{
				$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
				redirect('');
			}
		//echo 
		
	}
}
