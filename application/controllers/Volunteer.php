<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Volunteer extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Volunteer_model');		
		
	}
	public function index()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$this->load->view('admin/volunteer/add');
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
			
			$data['volunteer_list']=$this->Volunteer_model->get_volunteer_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/volunteer/list',$data);
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
			$v_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Volunteer_model->get_volunteer_details($v_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('admin/volunteer/edit',$data);
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
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/volunteer/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'category'=>isset($post['category'])?$post['category']:'',
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Volunteer_model->save_volunteer($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Volunters successfully added');
							redirect('volunteer/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('volunteer');
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
					$details=$this->Volunteer_model->get_volunteer_details($post['v_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/volunteer/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/volunteer/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'category'=>isset($post['category'])?$post['category']:'',
					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Volunteer_model->update_volunteer_details($post['v_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Volunters successfully Updated');
							redirect('volunteer/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('volunteer/edit/'.base64_encode($post['v_id']));
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
			$v_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Volunteer_model->update_volunteer_details($v_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Volunteer successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Volunteer successfully activated');
							}
							redirect('volunteer/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('volunteer/lists');
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
			$v_id=base64_decode($this->uri->segment(3));
			$details=$this->Volunteer_model->get_volunteer_details($v_id);
			
					$delete=$this->Volunteer_model->delete_banners($v_id);
					if(count($delete)>0){
						unlink('assets/volunteer/'.$details['image']);
						$this->session->set_flashdata('success','Volunteer successfully deleted');
						redirect('volunteer/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('volunteer/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
	
}
