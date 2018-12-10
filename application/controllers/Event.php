<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Event extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Event_model');		
		
	}
	public function index()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$this->load->view('admin/event/add');
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
			
			$data['event_list']=$this->Event_model->get_event_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/event/list',$data);
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
			$e_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Event_model->get_event_details($e_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('admin/event/edit',$data);
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
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/event/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'type'=>isset($post['type'])?$post['type']:'',
					'date'=>isset($post['date'])?$post['date']:'',
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Event_model->save_event($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Event successfully added');
							redirect('event/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('event');
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
					$details=$this->Event_model->get_event_details($post['e_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/event/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/event/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'title'=>isset($post['title'])?$post['title']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'type'=>isset($post['type'])?$post['type']:'',
					'date'=>isset($post['date'])?$post['date']:'',
					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Event_model->update_event_details($post['e_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Event successfully Updated');
							redirect('event/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('event/edit/'.base64_encode($post['e_id']));
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
			$e_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Event_model->update_event_details($e_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Event successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Event successfully activated');
							}
							redirect('event/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('event/lists');
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
			$e_id=base64_decode($this->uri->segment(3));
			$details=$this->Event_model->get_event_details($e_id);
			
					$delete=$this->Event_model->delete_banners($e_id);
					if(count($delete)>0){
						unlink('assets/event/'.$details['image']);
						$this->session->set_flashdata('success','Event successfully deleted');
						redirect('event/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('event/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
	
}
