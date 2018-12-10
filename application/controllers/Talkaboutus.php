<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Talkaboutus extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Talkaboutus_model');		
		
	}
	public function index()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$this->load->view('admin/talkaboutus/add');
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
			
			$data['talkaboutus_list']=$this->Talkaboutus_model->get_talkaboutus_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/talkaboutus/list',$data);
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
			$a_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Talkaboutus_model->get_talkaboutus_details($a_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('admin/talkaboutus/edit',$data);
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
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/talkaboutus/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'category'=>isset($post['category'])?$post['category']:'',
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Talkaboutus_model->save_talkaboutus($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Talkaboutus successfully added');
							redirect('talkaboutus/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('talkaboutus');
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
					$details=$this->Talkaboutus_model->get_talkaboutus_details($post['a_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/talkaboutus/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/talkaboutus/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'name'=>isset($post['name'])?$post['name']:'',
					'description'=>isset($post['description'])?$post['description']:'',
					'category'=>isset($post['category'])?$post['category']:'',
					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Talkaboutus_model->update_talkaboutus_details($post['a_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Talkaboutus_model successfully Updated');
							redirect('talkaboutus/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('talkaboutus/edit/'.base64_encode($post['a_id']));
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
			$a_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Talkaboutus_model->update_talkaboutus_details($a_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Talkaboutus_model successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Talkaboutus_model successfully activated');
							}
							redirect('talkaboutus/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('talkaboutus/lists');
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
			$a_id=base64_decode($this->uri->segment(3));
			$details=$this->Talkaboutus_model->get_talkaboutus_details($a_id);
			
					$delete=$this->Talkaboutus_model->delete_banners($a_id);
					if(count($delete)>0){
						unlink('assets/talkaboutus/'.$details['image']);
						$this->session->set_flashdata('success','Talkaboutus_model successfully deleted');
						redirect('talkaboutus/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('talkaboutus/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
	
}
