<?php
defined('BASEPATH') OR exit('No direct script access allowed');
@include_once( APPPATH . 'controllers/Back_end.php');

class Galleryimg extends Back_end {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Gallery_model');		
		
	}
	public function index()
	{
		if($this->session->userdata('mss_details'))
		{
			$admindetails=$this->session->userdata('mss_details');
			
			$this->load->view('admin/gallery/add');
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
			
			$data['gallery_list']=$this->Gallery_model->get_gallery_list($admindetails['id']);
			
			//echo '<pre>';print_r($data);exit;
			$this->load->view('admin/gallery/list',$data);
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
			$g_id=base64_decode($this->uri->segment(3));
			$data['details']=$this->Gallery_model->get_gallery_details($g_id);
			
			//echo '<pre>';print_r($data);exit; 
			$this->load->view('admin/gallery/edit',$data);
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
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/gallery/" . $image);
							}else{
								$image='';
							}
					$add_data=array(
					'image'=>$image,
					'org_image'=>isset($_FILES['image']['name'])?$_FILES['image']['name']:'',
					'status'=>1,
					'create_at'=>date('Y-m-d H:i:s'),
					'update_at'=>date('Y-m-d H:i:s'),
					'create_by'=>$admindetails['id'],
					);
					$save=$this->Gallery_model->save_gallery($add_data);
						if(count($save)>0){
							$this->session->set_flashdata('success','Image successfully added');
							redirect('galleryimg/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('galleryimg');
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
					$details=$this->Gallery_model->get_gallery_details($post['g_id']);
					if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=''){
							unlink('assets/gallery/'.$details['image']);

								$temp = explode(".", $_FILES["image"]["name"]);
								$image = round(microtime(true)) . '.' . end($temp);
								move_uploaded_file($_FILES['image']['tmp_name'], "assets/gallery/" . $image);
								$org_name=$_FILES["image"]["name"];
							}else{
								$image=$details['image'];
								$org_name=$details['org_image'];
							}
					$update_data=array(
					'image'=>$image,
					'org_image'=>$org_name,
					'update_at'=>date('Y-m-d H:i:s'),
					);
						$update=$this->Gallery_model->update_gallery_details($post['g_id'],$update_data);
						if(count($update)>0){
							$this->session->set_flashdata('success','Certificate successfully Updated');
							redirect('galleryimg/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('galleryimg/edit/'.base64_encode($post['g_id']));
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
			$g_id=base64_decode($this->uri->segment(3));
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
					$update=$this->Gallery_model->update_gallery_details($g_id,$update_data);
						if(count($update)>0){
							if($status==1){
							$this->session->set_flashdata('success','Image successfully deactivated');
							}else{
							$this->session->set_flashdata('success','Image successfully activated');
							}
							redirect('galleryimg/lists');
							
						}else{
							$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
							redirect('galleryimg/lists');
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
			$g_id=base64_decode($this->uri->segment(3));
			$details=$this->Gallery_model->get_gallery_details($g_id);
			
					$delete=$this->Gallery_model->delete_gallery($g_id);
					if(count($delete)>0){
						unlink('assets/gallery/'.$details['image']);
						$this->session->set_flashdata('success','Image successfully deleted');
						redirect('galleryimg/lists');
					}else{
						$this->session->set_flashdata('error',"technical problem will occurred. Please try again.");
						redirect('galleryimg/lists');
					}
		}else{
			$this->session->set_flashdata('error','Please login to continue');
			redirect('admin');
		}
		
	}
	
	
	
	
}
