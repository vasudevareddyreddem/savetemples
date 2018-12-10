<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Certificate extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Certicate_model');		
		
	}
	public function index()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$this->load->view('admin/certificate/add');
			$this->load->view('admin/footer');

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function lists()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$data['certificates_list']=$this->Certicate_model->get_certificates_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/certificate/list',$data);
			$this->load->view('admin/footer');

		}else{
			$this->session->set_flashdata('loginerror','Please login to continue');
			redirect('admin');
		}
	}
	public function edit()
	{	
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			$c_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Certicate_model->get_certificates_details($c_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('admin/certificate/edit',$data);
			$this->load->view('admin/footer');
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function addpost()
	{	
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			$post=$this->input->post();
			//echo '<pre>';print_r($post);exit;
						if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/certificates/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Certicate_model->save_certificates($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Certificate successfully added');
							redirect('certificate/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('certificate');
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function editpost()
	{	
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			$post=$this->input->post();
					$details=$this->Certicate_model->get_certificates_details($post['c_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/certificates/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/certificates/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Certicate_model->update_certificates_details($post['c_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Certificate successfully Updated');
							redirect('certificate/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('certificate/edit/'.base64_encode($post['c_id']));
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function status()
	{	
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			$post=$this->input->post();
			$c_id=base64_decode($this->uri->segment(3));
			$status=base64_decode($this->uri->segment(4));
			if($status==1){
				$stat=0;
			}else{
				$stat=1;
			}
			$update_data=array(
					'status'=>$stat,
					'update_at'=>date('Y-m-d H:i:s'),
					);
					$update=$this->Certicate_model->update_certificates_details($c_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Certificate successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Certificate successfully activated');
							}
							redirect('certificate/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('certificate/lists');
						}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	public function delete()
	{	
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			$post=$this->input->post();
			$c_id=base64_decode($this->uri->segment(3));
			$details=$this->Certicate_model->get_certificates_details($c_id);
			
					$delete=$this->Certicate_model->delete_banners($c_id);
					if(count($delete)>0){
						unlink('assets/certificates/'.$details['image']);
						$this->session->set_flashdata('success','Certificate successfully deleted');
						redirect('certificate/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('certificate/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
	
}
