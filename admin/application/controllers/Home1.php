<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index(){
		if($this->session->userdata('userid')){
			redirect('home/dashboard');
		}
		$data = array();
		$data['page_title'] = 'Login';
		$this->load->view('login',$data);
	}
	public function login_process(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$username = $postData['username'];
			$password = $postData['password'];
			$isUserUsername = $this->db->where('username',$username)->where('is_admin','yes')->count_all_results('admin_users');
			$isUserEmail = $this->db->where('email',$username)->where('is_admin','yes')->count_all_results('admin_users');
			if($isUserUsername > 0 || $isUserEmail > 0){
				if($isUserUsername > 0){$checkcolumn = 'username';}else{$checkcolumn = 'email';}
				$isUser = $this->db->where($checkcolumn,$username)->where('password',md5($password))->get('admin_users')->row_array();
				if(!empty($isUser)){
					if($isUser['status'] == 'active'){
						$sessionarray = array(
							'userid' => $isUser['id'],
							'is_admin' => $isUser['is_admin'],
							'userrole' => $isUser['role'],
							'first_name' => $isUser['first_name'],
							'last_name' => $isUser['last_name'],
							'username' => $isUser['username'],
							'email' => $isUser['email'],
							'phone' => '+'.$isUser['country_code'].$isUser['phone'],
							'device_id' => $isUser['device_id'],
							'device_type' => $isUser['device_type'],
							'status' => $isUser['status'],
						);
						$this->session->set_userdata($sessionarray);
						redirect('dashboard');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect();
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect();
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect();
			}
		}else{
			$this->session->set_flashdata('msg','Something went wrong');
			redirect();
		}
		$data = array();
		$data['page_title'] = 'Login';
		$this->load->view('login',$data);
	}
	public function logout(){
		session_destroy();
		redirect();
	}
	public function dashboard(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['page_title'] = 'Dashboard';
			$data['page_content'] = 'dashboard';
			// echo "<pre>";print_r($data);echo "</pre>";exit;
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------MANUFACTURER---------------------------*/
/*------------------------------------------------------*/
	public function manufacturers(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->order_by('id','ASC')->get('manufacturer')->result_array();
			$data['page_title'] = 'Manufacturer';
			$data['page_content'] = 'manufacturer/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_manufacturer(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['page_title'] = 'Add Manufacturer';
			$data['page_content'] = 'manufacturer/add';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_manufacturer($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->where('id',$id)->get('manufacturer')->row_array();
			$data['page_title'] = 'Edit Manufacturer';
			$data['page_content'] = 'manufacturer/edit';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_manufacturer($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifCategory = $this->db->where('id',$id)->count_all_results('manufacturer');
				if($ifCategory > 0){
					$delete = $this->db->where('id',$id)->delete('manufacturer');
					if($delete){
						$this->session->set_flashdata('okay_msg','Manufacturer Deleted');
						redirect('manufacturers');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('manufacturers');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('manufacturers');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('manufacturers');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_manufacturer_process(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name'] = strtolower($postData['name']);
				$insert_array['slug'] = make_slug($postData['name'],'id',NULL,'manufacturer','slug');
				// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
				/*
				if($_FILES['image']['name'] != "") {
					$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
					}else{
						// echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', $this->upload->display_errors());
						redirect('add_manufacturer');			
					}
				}
				*/
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				if(!empty($insert_array)){
					$insert = $this->db->insert('manufacturer',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','Manufacturer Added');
						redirect('manufacturers');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_manufacturer');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_manufacturer');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_manufacturer_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['name'] = strtolower($postData['name']);
					$insert_array['status'] = $postData['status'];
					$insert_array['slug'] = make_slug($postData['name'],'id',$id,'manufacturer','slug');
					// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
					$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					/*
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							$this->session->set_flashdata('msg', $this->upload->display_errors());
							redirect('edit_category/'.$id);	
						}
					}
					*/
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('manufacturer',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','Manufacturer Updated');
							redirect('manufacturers');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_manufacturer/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_manufacturer/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('manufacturers');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------MANUFACTURER---------------------------*/
/*------------------------------------------------------*/
/*------------------------------------------------------*/
/*------------------------BRANDS---------------------------*/
/*------------------------------------------------------*/
	public function brands(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data']	= $this->db->order_by('id','ASC')->get('brand')->result_array();
			$data['page_title'] = 'Brands';
			$data['page_content'] = 'brand/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_brand(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['page_title'] = 'Add Brand';
			$data['page_content'] = 'brand/add';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_brand($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->where('id',$id)->get('brand')->row_array();
			$data['page_title'] = 'Edit Brand';
			$data['page_content'] = 'brand/edit';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_brand($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifCategory = $this->db->where('id',$id)->count_all_results('brand');
				if($ifCategory > 0){
					$delete = $this->db->where('id',$id)->delete('brand');
					if($delete){
						$this->session->set_flashdata('okay_msg','Brand Deleted');
						redirect('brands');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('brands');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('brands');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('brands');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_brand_process(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name'] = strtolower($postData['name']);
				$insert_array['slug'] = make_slug($postData['name'],'id',NULL,'brand','slug');
				// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
				/*
				if($_FILES['image']['name'] != "") {
					$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
					}else{
						// echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', $this->upload->display_errors());
						redirect('add_category');			
					}
				}
				*/
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				if(!empty($insert_array)){
					$insert = $this->db->insert('brand',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','Brand Added');
						redirect('brands');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_brand');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_brand');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_brand_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['name'] = strtolower($postData['name']);
					$insert_array['status'] = $postData['status'];
					$insert_array['slug'] = make_slug($postData['name'],'id',$id,'category','slug');
					// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
					$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					/*
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							$this->session->set_flashdata('msg', $this->upload->display_errors());
							redirect('edit_category/'.$id);	
						}
					}
					*/
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('brand',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','Brand Updated');
							redirect('brands');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_brand/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_brand/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('brands');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------BRANDS---------------------------*/
/*------------------------------------------------------*/
/*------------------------------------------------------*/
/*------------------------CATEGORIES---------------------------*/
/*------------------------------------------------------*/
	public function categories(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data']	= $this->db->order_by('id','ASC')->get('category')->result_array();
			$data['page_title'] = 'Categories';
			$data['page_content'] = 'category/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_category(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['page_title'] = 'Add Category';
			$data['page_content'] = 'category/add';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_category($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->where('id',$id)->get('category')->row_array();
			$data['page_title'] = 'Edit Category';
			$data['page_content'] = 'category/edit';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_category($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifCategory = $this->db->where('id',$id)->count_all_results('category');
				if($ifCategory > 0){
					$delete = $this->db->where('id',$id)->delete('category');
					if($delete){
						$this->session->set_flashdata('okay_msg','Category Deleted');
						redirect('categories');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('categories');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('categories');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('categories');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_category_process(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name'] = strtolower($postData['name']);
				$insert_array['slug'] = make_slug($postData['name'],'id',NULL,'category','slug');
				// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
				/*
				if($_FILES['image']['name'] != "") {
					$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
					}else{
						// echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', $this->upload->display_errors());
						redirect('add_category');			
					}
				}
				*/
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				if(!empty($insert_array)){
					$insert = $this->db->insert('category',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','Category Added');
						redirect('categories');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_category');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_category');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_category_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['name'] = strtolower($postData['name']);
					$insert_array['status'] = $postData['status'];
					$insert_array['slug'] = make_slug($postData['name'],'id',$id,'category','slug');
					// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
					$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					/*
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							$this->session->set_flashdata('msg', $this->upload->display_errors());
							redirect('edit_category/'.$id);	
						}
					}
					*/
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('category',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','Category Updated');
							redirect('categories');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_category/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_category/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('categories');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------CATEGORIES---------------------------*/
/*------------------------------------------------------*/
/*------------------------------------------------------*/
/*------------------------SUBCATEGORIES---------------------------*/
/*------------------------------------------------------*/
	public function subcategories(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data']	= $this->db->order_by('id','ASC')->get('subcategory')->result_array();
			$data['page_title'] = 'Subcategories';
			$data['page_content'] = 'subcategory/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_subcategory(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['page_title'] = 'Add Subcategory';
			$data['page_content'] = 'subcategory/add';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_subcategory($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->where('id',$id)->get('subcategory')->row_array();
			$data['page_title'] = 'Edit Subcategory';
			$data['page_content'] = 'subcategory/edit';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_subcategory($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifCategory = $this->db->where('id',$id)->count_all_results('subcategory');
				if($ifCategory > 0){
					$delete = $this->db->where('id',$id)->delete('subcategory');
					if($delete){
						$this->session->set_flashdata('okay_msg','Subcategory Deleted');
						redirect('subcategories');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('subcategories');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('subcategories');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('subcategories');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_subcategory_process(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name'] = strtolower($postData['name']);
				$insert_array['slug'] = make_slug($postData['name'],'id',NULL,'subcategory','slug');
				// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
				/*
				if($_FILES['image']['name'] != "") {
					$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
					}else{
						// echo $this->upload->display_errors();
						$this->session->set_flashdata('msg', $this->upload->display_errors());
						redirect('add_category');			
					}
				}
				*/
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				if(!empty($insert_array)){
					$insert = $this->db->insert('subcategory',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','Subcategory Added');
						redirect('subcategories');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_subcategory');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_subcategory');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_subcategory_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['name'] = strtolower($postData['name']);
					$insert_array['status'] = $postData['status'];
					$insert_array['slug'] = make_slug($postData['name'],'id',$id,'subcategory','slug');
					// $insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
					$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					/*
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							$this->session->set_flashdata('msg', $this->upload->display_errors());
							redirect('edit_category/'.$id);	
						}
					}
					*/
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('subcategory',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','Subcategory Updated');
							redirect('subcategories');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_subcategory/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_subcategory/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('subcategories');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------SUBCATEGORIES---------------------------*/
/*------------------------------------------------------*/

/*------------------------------------------------------*/
/*------------------------PRODUCTS---------------------------*/
/*------------------------------------------------------*/
	public function products($param = NULL, $slug = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['manufacturer_id'] = 0;
			$data['brand_id'] = 0;
			$data['category_id'] = 0;
			$data['subcategory_id'] = 0;
			if($param == 'manufacturer'){
				$manufacturerData = $this->db->where('slug',$slug)->get('manufacturer')->row_array();
				$data['manufacturer_id'] = $manufacturerData['id'];
				$this->db->where('product.manufacturer_id',$manufacturerData['id']);
			}elseif($param == 'brand'){
				$brandData = $this->db->where('slug',$slug)->get('brand')->row_array();
				$data['brand_id'] = $brandData['id'];
				$this->db->where('product.brand_id',$brandData['id']);
			}elseif($param == 'category'){
				$categoryData = $this->db->where('slug',$slug)->get('category')->row_array();
				$data['category_id'] = $categoryData['id'];
				$this->db->where('product.category_id',$categoryData['id']);
			}elseif($param == 'subcategory'){
				$subcategoryData = $this->db->where('slug',$slug)->get('subcategory')->row_array();
				$data['subcategory_id'] = $subcategoryData['id'];
				$this->db->where('product.subcategory_id',$subcategoryData['id']);
			}
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$data['manufacturer_id'] = $postData['manufacturer_id'];
				$data['brand_id'] = $postData['brand_id'];
				$data['category_id'] = $postData['category_id'];
				$data['subcategory_id'] = $postData['subcategory_id'];
				if($postData['manufacturer_id'] > 0){
					$this->db->where('product.manufacturer_id',$postData['manufacturer_id']);
				}
				if($postData['brand_id'] > 0){
					$this->db->where('product.brand_id',$postData['brand_id']);
				}
				if($postData['category_id'] > 0){
					$this->db->where('product.category_id',$postData['category_id']);
				}
				if($postData['subcategory_id'] > 0){
					$this->db->where('product.subcategory_id',$postData['subcategory_id']);
				}
			}
			$this->db->select('product.*, manufacturer.name as manufacturer_name, manufacturer.slug as manufacturer_slug, brand.name as brand_name, brand.slug as brand_slug, category.name as category_name, category.slug as category_slug, subcategory.name as subcategory_name, subcategory.slug as subcategory_slug');
			$this->db->join('manufacturer','manufacturer.id = product.manufacturer_id','left');
			$this->db->join('brand','brand.id = product.brand_id','left');
			$this->db->join('category','category.id = product.category_id','left');
			$this->db->join('subcategory','subcategory.id = product.subcategory_id','left');
			$content_data = $this->db->order_by('product.id','ASC')->get('product')->result_array();
			foreach($content_data as $key => $row){
				$content_data[$key]['stock'] = $this->db->select('SUM(quantity) as stock')->where('product_id',$row['id'])->group_by('product_id')->get('product_stock_availability')->row_array();
			}
			$data['manufacturers'] = $this->db->select('id, name')->order_by('name','ASC')->get('manufacturer')->result_array();
			$data['brands'] = $this->db->select('id, name')->order_by('name','ASC')->get('brand')->result_array();
			$data['categories'] = $this->db->select('id, name')->order_by('name','ASC')->get('category')->result_array();
			$data['subcategories'] = $this->db->select('id, name')->order_by('name','ASC')->get('subcategory')->result_array();
			$data['content_data'] = $content_data;
			$data['page_title'] = 'Products';
			$data['page_content'] = 'product/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_product(){
		// echo $_SERVER['DOCUMENT_ROOT'];exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			// $this->db->where('');
			$data['manufacturers'] = $this->db->select('id, name')->order_by('name','ASC')->get('manufacturer')->result_array();
			$data['brands'] = $this->db->select('id, name')->order_by('name','ASC')->get('brand')->result_array();
			$data['categories'] = $this->db->select('id, name')->order_by('name','ASC')->get('category')->result_array();
			$data['subcategories'] = $this->db->select('id, name')->order_by('name','ASC')->get('subcategory')->result_array();
			$data['colors'] = $this->db->select('id, name')->order_by('name','ASC')->get('color')->result_array();
			$data['sizes'] = $this->db->select('id, name')->order_by('name','ASC')->get('size')->result_array();
			$data['warranty_limits'] = $this->db->select('id, warranty_limit')->order_by('warranty_limit','ASC')->get('warranty_limit')->result_array();
			$data['warranty_types'] = $this->db->select('id, warranty_type')->order_by('warranty_type','ASC')->get('warranty_type')->result_array();
			$data['page_title'] = 'Add Product';
			$data['page_content'] = 'product/add';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_product($id = NULL, $type = NULL, $param = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$p_size = array();
			$ifProduct = $this->db->where('id',$id)->count_all_results('product');
			if($ifProduct > 0){
				if($type != NULL && $param != NULL){
					$update = $this->db->where('id',$id)->update('product',array($type=>$param));
					if($update){
						$this->session->set_flashdata('okay_msg','Product Updated');
						redirect('products');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('products');
					}
				}else{
					$data['manufacturers'] = $this->db->select('id, name')->order_by('name','ASC')->get('manufacturer')->result_array();
					$data['brands'] = $this->db->select('id, name')->order_by('name','ASC')->get('brand')->result_array();
					$data['categories'] = $this->db->select('id, name')->order_by('name','ASC')->get('category')->result_array();
					$data['subcategories'] = $this->db->select('id, name')->order_by('name','ASC')->get('subcategory')->result_array();
					$data['colors'] = $this->db->select('id, name')->order_by('name','ASC')->get('color')->result_array();
					$data['sizes'] = $this->db->select('id, name')->order_by('name','ASC')->get('size')->result_array();
					$data['warranty_limits'] = $this->db->select('id, warranty_limit')->order_by('warranty_limit','ASC')->get('warranty_limit')->result_array();
					$data['warranty_types'] = $this->db->select('id, warranty_type')->order_by('warranty_type','ASC')->get('warranty_type')->result_array();
					$data['content_data'] = $this->db->where('id',$id)->get('product')->row_array();
					$product_sizes = $this->db->where('product_id',$id)->get('product_size')->result_array();
					foreach($product_sizes as $key => $psize){
						$p_size[] = $psize['size_id'];
					}
					$data['product_sizes'] = $p_size;
					$product_colors = $this->db->where('product_id',$id)->get('product_color')->result_array();
					foreach($product_colors as $key => $pcolor){
						$p_color[] = $pcolor['color_id'];
					}
					$data['product_colors'] = $p_color;
					$data['product_specifications'] = $this->db->where('product_id',$id)->get('product_features')->result_array();
					$data['product_images'] = $this->db->where('product_id',$id)->get('product_images')->result_array();
					
					// echo "<pre>";print_r($data);echo "</pre>";exit;
					$data['page_title'] = 'Edit Product';
					$data['page_content'] = 'product/edit';
					$this->load->view('common/main_view',$data);
				}
			}else{
				$this->session->set_flashdata('msg','Product not found');
				redirect('products');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_deal_product(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['products'] = $this->db->select('id, name_en')->where('isdeal','no')->order_by('name_en','ASC')->get('product')->result_array();
			$data['page_title'] = 'Add Product';
			$data['page_content'] = 'add_deal_product';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_deal_product($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['products'] = $this->db->select('id, name_en')->where('isdeal','no')->order_by('name_en','ASC')->get('product')->result_array();
			$data['product'] = $this->db->where('id',$id)->get('product')->row_array();
			if($data['product']['isdeal'] == 'no'){
				redirect('edit_product/'.$id);
			}
			// echo "<pre>";print_r($data['product']);echo "</pre>";exit;
			$data['deal_products'] = $this->db->where('product_id',$id)->get('deal_product')->result_array();
			$data['page_title'] = 'Edit Product';
			$data['page_content'] = 'edit_deal_product';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	
	public function delete_product($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifProduct = $this->db->where('id',$id)->count_all_results('product');
				if($ifProduct > 0){
					$delete = $this->db->where('id',$id)->delete('product');
					if($delete){
						$this->session->set_flashdata('okay_msg','Product Deleted');
						redirect('products');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('products');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('products');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('products');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_product_process(){
		// echo "<pre>";print_r($_FILES);echo "</pre>";;
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$hidden_id = $postData['hidden_id'];
				$insert_array['name'] = $postData['name'];
				$insert_array['slug'] = make_slug($postData['name'],'id',NULL,'product','slug');
				$insert_array['price'] = $postData['price'];
				$insert_array['sale_price'] = $postData['sale_price'];
				$insert_array['short_description'] = $postData['short_description'];
				$insert_array['description'] = $postData['description'];
				$insert_array['manufacturer_id'] = $postData['manufacturer_id'];
				$insert_array['brand_id'] = $postData['brand_id'];
				$insert_array['category_id'] = $postData['category_id'];
				$insert_array['subcategory_id'] = $postData['subcategory_id'];
				$insert_array['featured'] = (isset($postData['featured']))?1:0;
				$insert_array['on_sale'] = (isset($postData['on_sale']))?1:0;
				$insert_array['status'] = (isset($postData['status']))?1:0;
				$insert_array['warranty_type_id'] = ($postData['warranty_type'] != "")?$postData['warranty_type']:0;
				$insert_array['warranty_limit_id'] = ($postData['warranty_limit'] != "")?$postData['warranty_limit']:0;
				$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				if(!empty($insert_array)){
					$insert = $this->db->insert('product',$insert_array);
					if($insert){
						$product_id = $this->db->insert_id();
						if(!empty($postData['sizes'])){
							foreach($postData['sizes'] as $skey => $size){
								if($size > 0){
									$size_insert_array = array(
										'product_id' => $product_id,
										'size_id' => $size,
										'date_created' => date('Y-m-d H:i:s'),
									);
									$size_insert = $this->db->insert('product_size',$size_insert_array);
								}
							}
						}
						if(!empty($postData['colors'])){
							foreach($postData['colors'] as $ckey => $color){
								if($color > 0){
									$color_insert_array = array(
										'product_id' => $product_id,
										'color_id' => $color,
										'date_created' => date('Y-m-d H:i:s'),
									);
									$color_insert = $this->db->insert('product_color',$color_insert_array);
								}
							}
						}
						if(!empty($postData['specification_type'])){
							foreach($postData['specification_type'] as $spkey => $specification){
								if($postData['specification_type'][$spkey] != ""){
									$specification_insert_array = array(
										'product_id' => $product_id,
										'feature' => $postData['specification_type'][$spkey],
										'value' => $postData['specification_value'][$spkey],
										'date_created' => date('Y-m-d H:i:s'),
									);
									$size_insert = $this->db->insert('product_features',$specification_insert_array);
								}
							}
						}
						/*
						if(!empty($postData['colors'])){
							foreach($postData['colors'] as $ckey => $color){
								$chex = 'color_hex_'.$ckey;
								$cimage = 'color_image_'.$ckey;
								if($postData[$chex] != ""){
									$type = 'color';
									$image = $postData[$chex];
								}else{
									$type = 'image';
									if($_FILES[$cimage]['name'] != "") {
										$uploadData = $this->upload_it($cimage,PRODUCT_IMAGE_PATH);
										if($uploadData['msg'] == 'okay'){
											$image = $uploadData['upload_data']['file_name'];
										}else{
											$image = 'default.jpg';
										}
									}else{
										$image = 'default.jpg';
									}
								}
								if($color > 0){
									$color_insert_array = array(
										'product_id' => $product_id,
										'color_id' => $size,
										'type' => $type,
										'image' => $image,
										'date_created' => date('Y-m-d H:i:s'),
									);
									$color_insert = $this->db->insert('product_color',$color_insert_array);
								}
							}
						}
						*/
						$multi_images = $this->db->where('product_id',$hidden_id)->update('product_images',array('product_id'=>$product_id));
						$this->session->set_flashdata('okay_msg','Product Added');
						redirect('products');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('add_product');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_product');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_product');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_product_images($hidden_id = NULL){
		// echo "<pre>";print_r($_FILES);echo "</pre>";exit;
		if (!empty($_FILES['file'])) {
			$count = count($_FILES['file']['name']);
			
			for($i=0; $i<$count; $i++){
				if($_FILES['file']['name'][$i] != "") {
					$_FILES['image']['name'] = $_FILES['file']['name'][$i];
					$_FILES['image']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
					$_FILES['image']['type'] = $_FILES['file']['type'][$i];
					$_FILES['image']['error'] = $_FILES['file']['error'][$i];
					$_FILES['image']['size'] = $_FILES['file']['size'][$i];
					$uploadData = $this->upload_it('image',PRODUCT_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
						$insert_array['product_id'] = $hidden_id;
						$insert_array['date_created'] = date('Y-m-d H:i:s');
						$this->db->insert('product_images',$insert_array);
					}
				}
			}
		}
	}

	public function add_deal_product_process(){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name_en'] = $postData['name_en'];
				$insert_array['name_ar'] = $postData['name_ar'];
				$insert_array['slug'] = make_slug($postData['name_en'],'id',NULL,'product','slug');
				$insert_array['price'] = $postData['price'];
				$insert_array['desc_en'] = $postData['desc_en'];
				$insert_array['desc_ar'] = $postData['desc_ar'];
				$insert_array['category_id'] = $postData['category_id'];
				$insert_array['classification'] = $postData['classification'];
				$insert_array['isdeal'] = 'yes';
				$insert_array['prep_time'] = $postData['prep_time'];
				$insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image_box'] = str_replace('small_','',$postData['image_box_hidden']);
				$insert_array['discount'] = $postData['discount'];
				$insert_array['discount_takeaway'] = $postData['discount_takeaway'];
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				$insert_array['added_by'] = $this->session->userdata('userid');
				if(!empty($insert_array)){
					$insert = $this->db->insert('product',$insert_array);
					if($insert){
						$product_id = $this->db->insert_id();
						if(isset($postData['quantity'][0]) && $postData['quantity'][0] != '' && isset($postData['product_id'][0]) && $postData['product_id'][0] != ''){
							foreach($postData['quantity'] as $key => $qty){
								$insert_deal_array = array(
									'product_id' => $product_id,
									'quantity' => $postData['quantity'][$key],
									'product' => $postData['product_id'][$key],
									'date_added' => date('Y-m-d H:i:s'),
									'added_by' => $this->session->userdata('userid'),
								);
								$insert_deal = $this->db->insert('deal_product',$insert_deal_array);
							}
							$this->session->set_flashdata('okay_msg','Product Added');
							redirect('products');
						}else{
							$this->db->where('id',$product_id)->delete('product');
							$this->session->set_flashdata('msg','Something went wrong');
							redirect('add_deal_product');
						}
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_deal_product');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_deal_product');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_deal_product_process($id = NULL){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['name_en'] = $postData['name_en'];
				$insert_array['name_ar'] = $postData['name_ar'];
				$insert_array['slug'] = make_slug($postData['name_en'],'id',$id,'product','slug');
				$insert_array['price'] = $postData['price'];
				$insert_array['desc_en'] = $postData['desc_en'];
				$insert_array['desc_ar'] = $postData['desc_ar'];
				$insert_array['category_id'] = $postData['category_id'];
				$insert_array['classification'] = $postData['classification'];
				// $insert_array['isdeal'] = 'yes';
				$insert_array['prep_time'] = $postData['prep_time'];
				$insert_array['image'] = str_replace('small_','',$postData['image_hidden']);
				$insert_array['image_box'] = str_replace('small_','',$postData['image_box_hidden']);
				$insert_array['discount'] = $postData['discount'];
				$insert_array['discount_takeaway'] = $postData['discount_takeaway'];
				$insert_array['updated_date'] = date('Y-m-d H:i:s');
				$insert_array['updated_by'] = $this->session->userdata('userid');
				if(!empty($insert_array)){
					$insert = $this->db->where('id',$id)->upadte('product',$insert_array);
					if($insert){
						$product_id = $this->db->insert_id();
						if(isset($postData['quantity'][0]) && $postData['quantity'][0] != '' && isset($postData['product_id'][0]) && $postData['product_id'][0] != ''){
							$this->db->where('product_id',$id)->delete('deal_product');
							foreach($postData['quantity'] as $key => $qty){
								$insert_deal_array = array(
									'product_id' => $product_id,
									'quantity' => $postData['quantity'][$key],
									'product' => $postData['product_id'][$key],
									'date_added' => date('Y-m-d H:i:s'),
									'added_by' => $this->session->userdata('userid'),
									'date_updated' => date('Y-m-d H:i:s'),
									'updated_by' => $this->session->userdata('userid'),
								);
								$insert_deal = $this->db->insert('deal_product',$insert_deal_array);
							}
							$this->session->set_flashdata('okay_msg','Product Updated');
							redirect('products');
						}else{
							$this->db->where('id',$product_id)->delete('product');
							$this->session->set_flashdata('msg','Something went wrong');
							redirect('edit_deal_product/'.$id);
						}
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_deal_product/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('edit_deal_product/'.$id);
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	
	public function edit_product_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['name'] = $postData['name'];
					$insert_array['slug'] = make_slug($postData['name'],'id',$id,'product','slug');
					$insert_array['price'] = $postData['price'];
					$insert_array['sale_price'] = $postData['sale_price'];
					$insert_array['short_description'] = $postData['short_description'];
					$insert_array['description'] = $postData['description'];
					$insert_array['manufacturer_id'] = $postData['manufacturer_id'];
					$insert_array['brand_id'] = $postData['brand_id'];
					$insert_array['category_id'] = $postData['category_id'];
					$insert_array['subcategory_id'] = $postData['subcategory_id'];
					$insert_array['featured'] = (isset($postData['featured']))?1:0;
					$insert_array['on_sale'] = (isset($postData['on_sale']))?1:0;
					$insert_array['status'] = (isset($postData['status']))?1:0;
					$insert_array['warranty_type_id'] = ($postData['warranty_type'] != "")?$postData['warranty_type']:0;
					$insert_array['warranty_limit_id'] = ($postData['warranty_limit'] != "")?$postData['warranty_limit']:0;
					$insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('product',$insert_array);
						if($update){
							if(!empty($postData['sizes'])){
								$this->db->where('product_id',$id)->delete('product_size');
								foreach($postData['sizes'] as $skey => $size){
									if($size > 0){
										$size_insert_array = array(
											'product_id' => $id,
											'size_id' => $size,
											'date_created' => date('Y-m-d H:i:s'),
										);
										$size_insert = $this->db->insert('product_size',$size_insert_array);
									}
								}
							}
							if(!empty($postData['colors'])){
								$this->db->where('product_id',$id)->delete('product_color');
								foreach($postData['colors'] as $ckey => $color){
									if($color > 0){
										$color_insert_array = array(
											'product_id' => $id,
											'color_id' => $color,
											'date_created' => date('Y-m-d H:i:s'),
										);
										$color_insert = $this->db->insert('product_color',$color_insert_array);
									}
								}
							}
							if(!empty($postData['specification_type'])){
								$this->db->where('product_id',$id)->delete('product_features');
								foreach($postData['specification_type'] as $spkey => $specification){
									if($postData['specification_type'][$spkey] != ""){
										$specification_insert_array = array(
											'product_id' => $id,
											'feature' => $postData['specification_type'][$spkey],
											'value' => $postData['specification_value'][$spkey],
											'date_created' => date('Y-m-d H:i:s'),
										);
										$size_insert = $this->db->insert('product_features',$specification_insert_array);
									}
								}
							}
							/*
							if(!empty($postData['colors'])){
								foreach($postData['colors'] as $ckey => $color){
									$chex = 'color_hex_'.$ckey;
									$cimage = 'color_image_'.$ckey;
									if($postData[$chex] != ""){
										$type = 'color';
										$image = $postData[$chex];
									}else{
										$type = 'image';
										if($_FILES[$cimage]['name'] != "") {
											$uploadData = $this->upload_it($cimage,PRODUCT_IMAGE_PATH);
											if($uploadData['msg'] == 'okay'){
												$image = $uploadData['upload_data']['file_name'];
											}else{
												$image = 'default.jpg';
											}
										}else{
											$image = 'default.jpg';
										}
									}
									if($color > 0){
										$color_insert_array = array(
											'product_id' => $product_id,
											'color_id' => $size,
											'type' => $type,
											'image' => $image,
											'date_created' => date('Y-m-d H:i:s'),
										);
										$color_insert = $this->db->insert('product_color',$color_insert_array);
									}
								}
							}
							*/
							$this->session->set_flashdata('okay_msg','Product Updated');
							redirect('products');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_product/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_product/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('products');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_product_image(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$id = $postData['id'];
			$delete = $this->db->where('id',$id)->delete('product_images');
			if($delete){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}
/*------------------------------------------------------*/
/*------------------------PRODUCTS---------------------------*/
/*------------------------------------------------------*/

/*------------------------------------------------------*/
/*------------------------Orders---------------------------*/
/*------------------------------------------------------*/
	public function orders($param = NULL,$type = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$this->db->select('order.*,users.first_name, users.last_name');
			if($param == 'total_orders'){
				$this->db->where('order.order_date >=', date('Y-m-d').' 00:00:00');
				$this->db->where('order.order_date <=', date('Y-m-d').' 23:59:59');
				$this->db->where('order.type !=','');
			}elseif($param == 'dinein_orders'){
				$this->db->where('order.order_date >=', date('Y-m-d').' 00:00:00');
				$this->db->where('order.order_date <=', date('Y-m-d').' 23:59:59');
				$this->db->where('order.type','dine-in');
			}elseif($param == 'takeaway_orders'){
				$this->db->where('order.order_date >=', date('Y-m-d').' 00:00:00');
				$this->db->where('order.order_date <=', date('Y-m-d').' 23:59:59');
				$this->db->where('order.type','takeaway');
			}elseif($param == 'delivery_orders'){
				$this->db->where('order.order_date >=', date('Y-m-d').' 00:00:00');
				$this->db->where('order.order_date <=', date('Y-m-d').' 23:59:59');
				$this->db->where('order.type','delivery');
			}elseif($param == 'incomplete'){
				$this->db->where('order.status','incomplete');
			}elseif($param == 'rejected'){
				$this->db->where('order.accepted',2);
				$this->db->where('order.status','complete');
				$this->db->where('order.order_status','rejected');
			}elseif($param == 'canceled'){
				$this->db->where('order.accepted',2);
				$this->db->where('order.status','complete');
				$this->db->where('order.order_status','canceled');
			}else{
				$this->db->where('order.accepted <',2);
				$this->db->where('order.status','complete');
				$this->db->where('order.order_status',$param);
			}
			$this->db->join('users','users.id = order.waiter_id','left');
			$data['orders'] = $this->db->order_by('order.id','DESC')->get('order')->result_array();
			$data['page_title'] = ucwords($param).' Orders';
			$data['page_content'] = 'orders';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function order_detail($order_id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			if($order_id != NULL){
				$data['order'] = $this->db->where('id',$order_id)->get('order')->row_array();
				if(!empty($data['order'])){
					$data['customer'] = $this->db->where('id',$data['order']['customer_id'])->get('users')->row_array();
					$data['waiter'] = $this->db->where('id',$data['order']['waiter_id'])->get('users')->row_array();
					$data['rider'] = $this->db->where('id',$data['order']['rider_id'])->get('users')->row_array();
					$this->db->select('product.name_en, order_detail.*')->join('product','product.id = order_detail.product_id');
					$data['items'] = $this->db->where('order_id',$data['order']['id'])->get('order_detail')->result_array();
					foreach($data['items'] as $key => $item){
						$data['items'][$key]['mods'] = $this->db->where('order_id',$data['order']['id'])->where('order_item_id',$item['id'])->get('order_mod_detail')->result_array();
					}
					$data['page_title'] = 'Order Detail';
					$data['page_content'] = 'order_detail';
					$this->load->view('common/main_view',$data);
				}else{
					$this->session->set_flashdata('msg','Order not found');
					redirect('orders');
				}
			}else{
				$this->session->set_flashdata('msg','Invalid Order Details');
				redirect('orders');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function order_detail_print($order_id = NULL, $param = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			if($order_id != NULL){
				$data['settings'] = $this->db->get('settings')->row_array();
				$data['order'] = $this->db->where('id',$order_id)->get('order')->row_array();
				if(!empty($data['order'])){
					$data['customer'] = $this->db->where('id',$data['order']['customer_id'])->get('users')->row_array();
					$data['waiter'] = $this->db->where('id',$data['order']['waiter_id'])->get('users')->row_array();
					$data['rider'] = $this->db->where('id',$data['order']['rider_id'])->get('users')->row_array();
					$this->db->select('product.name_en, order_detail.*')->join('product','product.id = order_detail.product_id');
					$data['items'] = $this->db->where('order_id',$data['order']['id'])->get('order_detail')->result_array();
					foreach($data['items'] as $key => $item){
						$data['items'][$key]['mods'] = $this->db->where('order_id',$data['order']['id'])->where('order_item_id',$item['id'])->get('order_mod_detail')->result_array();
					}
					// $data['page_title'] = 'Order Detail';
					// $data['page_content'] = 'order_detail1';
					$data['param'] = $param;
					$this->load->view('order_detail1',$data);
				}else{
					$this->session->set_flashdata('msg','Order not found');
					redirect('orders');
				}
			}else{
				$this->session->set_flashdata('msg','Invalid Order Details');
				redirect('orders');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	
	public function add_order(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			// $this->db->where('');
			$data['categories'] = $this->db->select('id, name_en')->where('type','active')->order_by('name_en','ASC')->get('category')->result_array();
			$data['page_title'] = 'Add Product';
			$data['page_content'] = 'add_product';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_order($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['categories'] = $this->db->select('id, name_en')->where('type','active')->order_by('name_en','ASC')->get('category')->result_array();
			$data['product'] = $this->db->where('id',$id)->get('product')->row_array();
			$data['page_title'] = 'Edit Product';
			$data['page_content'] = 'edit_product';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_order($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifProduct = $this->db->where('id',$id)->count_all_results('product');
				if($ifProduct > 0){
					$delete = $this->db->where('id',$id)->delete('product');
					if($delete){
						$this->session->set_flashdata('okay_msg','Product Deleted');
						redirect('orders');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('orders');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('orders');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('orders');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_order_process(){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['category_id'] = 14;
				$insert_array['name_en'] = $postData['name_en'];
				$insert_array['price'] = $postData['price'];
				$insert_array['slug'] = make_slug($postData['name_en'],'id',NULL,'product','slug');
				$insert_array['date_created'] = date('Y-m-d H:i:s');
				$insert_array['added_by'] = $this->session->userdata('userid');
				if(!empty($insert_array)){
					$insert = $this->db->insert('product',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','Modifier Added');
						redirect('modifiers');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('modifiers');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('modifiers');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_order_process($id = NULL, $param = NULL, $dashboard = NULL, $rider_id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$id = $postData['order_id'];
				$reason = $postData['cancel_reason'];
			}
			if($id != NULL){
				if($param != NULL){
					if($param == 'accept'){
						$insert_array['accepted'] = 1;
						$insert_array['order_status'] = 'accepted';
						$insert_array['accept_date'] = date('Y-m-d H:i:s');
					}
					if($param == 'reject'){
						$insert_array['accepted'] = 2;
						$insert_array['reason'] = 'Rejected';
						$insert_array['order_status'] = 'rejected';
						$insert_array['cancel_date'] = date('Y-m-d H:i:s');
					}
					if($param == 'dispatch'){
						$insert_array['rider_id'] = $rider_id;
						$insert_array['order_status'] = 'dispatched';
						$insert_array['dispatch_date'] = date('Y-m-d H:i:s');
					}
					if($param == 'complete'){
						$insert_array['order_status'] = 'completed';
						$insert_array['complete_date'] = date('Y-m-d H:i:s');
					}
					if($param == 'cancel'){
						$insert_array['accepted'] = 2;
						$insert_array['order_status'] = 'canceled';
						$insert_array['reason'] = $reason;
						$insert_array['cancel_date'] = date('Y-m-d H:i:s');
					}
					$insert_array['update_date'] = date('Y-m-d H:i:s');
					$insert_array['updated_by'] = $this->session->userdata('userid');
					$update = $this->db->where('id',$id)->update('order',$insert_array);
					if($update){
						if($param == 'dispatch'){
							$this->db->where('id',$rider_id)->update('users',array('available'=>0));
						}
						if($param == 'complete'){
							$this->db->where('id',$rider_id)->update('users',array('available'=>1));
						}
						$user = $this->db->select('users.id, users.device_id, users.device_type')->where('order.id',$id)->join('users','users.id = order.waiter_id')->get('order')->row_array();
						// echo "<pre>";print_r($user);echo "</pre>";exit;
						if($user['device_id'] != ''){
							$send_data = array(
								"title"			=> "",
								"body"			=> "",
								"subject"		=> "",
								"message"		=> "",
								"order_id"		=> $id,
							);
							if($param == 'accept'){
								$send_data['message'] = "Order ID : SM-300".$id." has been accepted";
							}
							if($param == 'dispatch'){
								$send_data['message'] = "Order ID : SM-300".$id." has been dispatched";
							}
							if($param == 'complete'){
								$send_data['message'] = "Order ID : SM-300".$id." has been completed";
							}
							if($param == 'reject'){
								$send_data['message'] = "Order ID : SM-300".$id." has been rejected";
							}
							if($param == 'cancel'){
								$send_data['message'] = "Order ID : SM-300".$id." has been canceled";
							}
							
							$device_id = array($user['device_id']);
							$device_type = $user['device_type'];
							$notify = $this->push->notification($device_id, $device_type, $send_data);
						}
						$this->session->set_flashdata('okay_msg','Order Updated');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
				}
				if($dashboard != NULL){
					if($dashboard == 'dashboard'){
						redirect('dashboard');
					}else{
						redirect('order_detail/'.$id);
					}
					
				}else{
					redirect('orders');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('orders');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}

/*------------------------------------------------------*/
/*------------------------Orders---------------------------*/
/*------------------------------------------------------*/

/*------------------------------------------------------*/
/*------------------------USERS---------------------------*/
/*------------------------------------------------------*/
	public function users($param = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			if($param == NULL){
				redirect('users/customers');
			}
			if($param == 'admins'){
				$role = 'subadmin';
			}
			if($param == 'customers'){
				$role = 'customer';
			}
			if($param == 'waiters'){
				$role = 'waiter';
			}
			if($param == 'employees'){
				$role = 'employee';
			}
			if($param == 'riders'){
				$role = 'rider';
			}
			
			$this->db->where('role',$role);
			$data['users'] = $this->db->where('status','active')->order_by('id','DESC')->get('users')->result_array();
			if($role == 'customer'){
				foreach($data['users'] as $key => $user){
					$userorderData = $this->db->select('id,type')->where('customer_id',$user['id'])->where('status','complete')->order_by('id','ASC')->get('order')->row_array();
					$data['users'][$key]['order_type'] = $userorderData['type'];
				}
			}
			$data['page_title'] = 'Users - '.ucwords($param);
			$data['page_content'] = 'users';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_user(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['userdata']['country_code'] = 971;
			$data['page_title'] = 'Add User';
			$data['page_content'] = 'add_user';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_user($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['userdata'] = $this->db->where('id',$id)->get('users')->row_array();
			$data['page_title'] = 'Edit User';
			$data['page_content'] = 'edit_user';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function delete_user($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				$ifProduct = $this->db->where('id',$id)->count_all_results('product');
				if($ifProduct > 0){
					$delete = $this->db->where('id',$id)->delete('users');
					if($delete){
						$this->session->set_flashdata('okay_msg','Product Deleted');
						redirect('users');
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('users');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('users');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('users');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function add_user_process(){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				$insert_array['role'] = $postData['role'];
				$insert_array['username'] = $postData['username'];
				$insert_array['email'] = strtolower($postData['email']);
				$insert_array['password'] = md5($postData['password']);
				$insert_array['first_name'] = $postData['first_name'];
				$insert_array['last_name'] = $postData['last_name'];
				$insert_array['slug'] = make_slug($postData['first_name'].''.$postData['last_name'],'id',NULL,'users','slug');
				$insert_array['country_code'] = $postData['country_code'];
				$insert_array['phone'] = $postData['phone'];
				$insert_array['building_name'] = $postData['building_name'];
				$insert_array['area'] = $postData['area'];
				$insert_array['house_flat'] = $postData['house_flat'];
				$insert_array['address'] = $postData['address'];
				$insert_array['extra_direction'] = $postData['extra_direction'];
				$insert_array['city'] = 'Dubai';
				$insert_array['state'] = 'Dubai';
				$insert_array['country'] = 'UAE';
				if($_FILES['image']['name'] != "") {
					$uploadData = $this->upload_it('image',USER_IMAGE_PATH);
					if($uploadData['msg'] == 'okay'){
						$insert_array['image'] = $uploadData['upload_data']['file_name'];
					}else{
						// echo $this->upload->display_errors();
						// $this->session->set_flashdata('msg', $this->upload->display_errors());
						// redirect('add_category');			
					}
				}
				$insert_array['created_on'] = date('Y-m-d H:i:s');
				$insert_array['added_by'] = $this->session->userdata('userid');
				if(!empty($insert_array)){
					$insert = $this->db->insert('users',$insert_array);
					if($insert){
						$this->session->set_flashdata('okay_msg','User Added');
						redirect('users/waiters');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('add_user');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('add_user');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_user_process($id = NULL){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['role'] = $postData['role'];
					$insert_array['username'] = $postData['username'];
					$insert_array['email'] = strtolower($postData['email']);
					if($postData['password'] != ''){
					$insert_array['password'] = md5($postData['password']);
					}
					$insert_array['first_name'] = $postData['first_name'];
					$insert_array['last_name'] = $postData['last_name'];
					$insert_array['slug'] = make_slug($postData['first_name'].''.$postData['last_name'],'id',$id,'users','slug');
					$insert_array['country_code'] = $postData['country_code'];
					$insert_array['phone'] = $postData['phone'];
					$insert_array['building_name'] = $postData['building_name'];
					$insert_array['area'] = $postData['area'];
					$insert_array['house_flat'] = $postData['house_flat'];
					$insert_array['address'] = $postData['address'];
					$insert_array['extra_direction'] = $postData['extra_direction'];
					// $insert_array['city'] = 'Dubai';
					// $insert_array['state'] = 'Dubai';
					// $insert_array['country'] = 'UAE';
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',USER_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							// $this->session->set_flashdata('msg', $this->upload->display_errors());
							// redirect('add_category');			
						}
					}
					// $insert_array['updated_date'] = date('Y-m-d H:i:s');
					$insert_array['updated_by'] = $this->session->userdata('userid');
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('users',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','User Updated');
							redirect('users/waiters');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('edit_user/'.$id);
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('edit_user/'.$id);
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('users');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	function get_available_riders(){
		if($this->input->post()){
			// $postData = $this->security->xss_clean($this->input->post());->where('available',1)
			$pageData['riders'] = 'yes';
			$pageData['users'] = $this->db->where('role','rider')->where('status','active')->get('users')->result_array();
			$data['riders'] = $this->load->view('ajax_view',$pageData,TRUE);
			echo json_encode($data);
		}else{
			echo 0;
		}
	}
/*------------------------------------------------------*/
/*------------------------USERS---------------------------*/
/*------------------------------------------------------*/

/*------------------------------------------------------*/
/*---------------------SETTINGS-------------------------*/
/*------------------------------------------------------*/
	public function settings($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->get('settings')->row_array();
			$data['page_title'] = 'Settings';
			$data['page_content'] = 'settings/settings';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function update_settings($id = NULL){
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($this->input->post()){
				$postData = $this->security->xss_clean($this->input->post());
				if(!empty($_FILES['shop_logo']) && $_FILES['shop_logo']['name'] != '') {
					if($_FILES['shop_logo']['size'] > 0){
						$tempFile = $_FILES['shop_logo']['tmp_name'];
						$fileName = $_FILES['shop_logo']['name']; 
						$targetPath = $_SERVER['DOCUMENT_ROOT'].'/shop/assets/images/';
						if(file_exists($targetPath.$fileName)){
							$i = 1;
							while(file_exists($targetPath.$i."_".$fileName)){
								$i++;
							}
							$FileName = $i."_".$fileName;
							$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
							$targetFile = $targetPath . $FileName;
						}else{
							$FileName = $fileName;
							$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
							$targetFile = $targetPath . $FileName;
						}
						if(move_uploaded_file($tempFile, $targetFile)){
							$insert_array['shop_logo'] = $FileName;
						}
					}
				}
				if(!empty($_FILES['shop_footer_logo']) && $_FILES['shop_footer_logo']['name'] != '') {
					if($_FILES['shop_footer_logo']['size'] > 0){
						$tempFile = $_FILES['shop_footer_logo']['tmp_name'];
						$fileName = $_FILES['shop_footer_logo']['name']; 
						$targetPath = $_SERVER['DOCUMENT_ROOT'].'/shop/assets/images/';
						if(file_exists($targetPath.$fileName)){
							$i = 1;
							while(file_exists($targetPath.$i."_".$fileName)){
								$i++;
							}
							$FileName = $i."_".$fileName;
							$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
							$targetFile = $targetPath . $FileName;
						}else{
							$FileName = $fileName;
							$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
							$targetFile = $targetPath . $FileName;
						}
						if(move_uploaded_file($tempFile, $targetFile)){
							$insert_array['shop_footer_logo'] = $FileName;
						}
					}
				}
				$insert_array['shop_address'] = $postData['shop_address'];
				$insert_array['shop_phone'] = $postData['shop_phone'];
				$insert_array['shop_fax'] = $postData['shop_fax'];
				$insert_array['shop_email'] = $postData['shop_email'];
				$insert_array['shop_website'] = $postData['shop_website'];
				$insert_array['shop_lat'] = $postData['shop_lat'];
				$insert_array['shop_lng'] = $postData['shop_lng'];
				$insert_array['shop_name'] = $postData['shop_name'];
				$insert_array['shop_description'] = $postData['shop_description'];
				$insert_array['shop_fb'] = $postData['shop_fb'];
				$insert_array['shop_tw'] = $postData['shop_tw'];
				$insert_array['shop_li'] = $postData['shop_li'];
				$insert_array['shop_gp'] = $postData['shop_gp'];
				$insert_array['shop_in'] = $postData['shop_in'];
				$insert_array['shop_yt'] = $postData['shop_yt'];
				if(!empty($insert_array)){
					$update = $this->db->where('id',1)->update('settings',$insert_array);
					if($update){
						$this->session->set_flashdata('okay_msg','Settings Updated');
						redirect('settings');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('settings');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('settings');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	
/*------------------------------------------------------*/
/*---------------------SETTINGS-------------------------*/
/*------------------------------------------------------*/
/*------------------------------------------------------*/
/*------------------------PAGES---------------------------*/
/*------------------------------------------------------*/
	public function pages(){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->select('id,page_title,page_image,page_slug')->order_by('id','ASC')->get('pages')->result_array();
			$data['page_title'] = 'Pages';
			$data['page_content'] = 'pages/list';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	public function edit_page($slug = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			$data = array();
			$data['content_data'] = $this->db->where('page_slug',$slug)->get('pages')->row_array();
			$data['page_title'] = 'Edit Page';
			$data['page_content'] = 'pages/edit';
			$this->load->view('common/main_view',$data);
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
	// public function delete_page($id = NULL){
		// if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			// if($id != NULL){
				// $ifCategory = $this->db->where('id',$id)->count_all_results('category');
				// if($ifCategory > 0){
					// $delete = $this->db->where('id',$id)->delete('category');
					// if($delete){
						// $this->session->set_flashdata('okay_msg','Category Deleted');
						// redirect('categories');
					// }else{
						// $this->session->set_flashdata('msg','Something went wrong');
						// redirect('categories');
					// }
				// }else{
					// $this->session->set_flashdata('msg','Something went wrong');
					// redirect('categories');
				// }
			// }else{
				// $this->session->set_flashdata('msg','Something went wrong');
				// redirect('categories');
			// }
		// }else{
			// $this->session->set_flashdata('msg','Please Login');
			// redirect();
		// }
	// }

	public function edit_page_process($id = NULL){
		if($this->session->userdata('userid') && $this->session->userdata('is_admin') == 'yes'){
			if($id != NULL){
				if($this->input->post()){
					$postData = $this->security->xss_clean($this->input->post());
					$insert_array['page_title'] = $postData['name'];
					$insert_array['page_description'] = htmlspecialchars(htmlentities($postData['description']));
					// $insert_array['status'] = $postData['status'];
					// $insert_array['slug'] = make_slug($postData['name'],'id',$id,'category','slug');
					$insert_array['page_image'] = str_replace('small_','',$postData['image_hidden']);
					// $insert_array['image'] = str_replace('small_','',$postData['image_box_hidden']);
					/*
					if($_FILES['image']['name'] != "") {
						$uploadData = $this->upload_it('image',CATEGORY_IMAGE_PATH);
						if($uploadData['msg'] == 'okay'){
							$insert_array['image'] = $uploadData['upload_data']['file_name'];
						}else{
							// echo $this->upload->display_errors();
							$this->session->set_flashdata('msg', $this->upload->display_errors());
							redirect('edit_category/'.$id);	
						}
					}
					*/
					if(!empty($insert_array)){
						$update = $this->db->where('id',$id)->update('pages',$insert_array);
						if($update){
							$this->session->set_flashdata('okay_msg','Page Updated');
							redirect('pages');
						}
					}else{
						$this->session->set_flashdata('msg','Something went wrong');
						redirect('pages');
					}
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('pages');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('pages');
			}
		}else{
			$this->session->set_flashdata('msg','Please Login');
			redirect();
		}
	}
/*------------------------------------------------------*/
/*------------------------PAGES---------------------------*/
/*------------------------------------------------------*/
    public function upload_it($fieldname = NULL, $path = NULL){
		$data =NULL;
		//Configure
		//set the path where the files uploaded will be copied. NOTE if using linux, set the folder to permission 777
		$config['upload_path'] = $path;
   	 	// set the filter image types
		$config['allowed_types'] = 'jpg|jpeg|gif|tiff|png';
		$config['max_size']	= '50000';		
		//load the upload library
		$this->load->library('upload', $config);
		$this->load->library('image_lib');
    	$this->upload->initialize($config);
    	$this->upload->set_allowed_types('*');
		$data['upload_data'] = '';
    
		//if not successful, set the error message
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('msg' => $this->upload->display_errors());
		} else { //else, set the success message
			$data = array('msg' => "okay");
            $data['upload_data'] = $this->upload->data();
            $config = array(
                'source_image' => $data['upload_data']['full_path'],
                'new_image' => $path,
                'maintain_ratio' => true,
                'quality' => '100',
				'width' => 750,
                'height' => 750,
                'new_image' => 'scaled_' . $data['upload_data']['file_name']
            );
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
            $config1 = array(
                'source_image' => $data['upload_data']['full_path'],
                'new_image' => $path,
                'maintain_ratio' => true,
                'quality' => '100',
				'width' => 400,
                'height' => 400,
                'new_image' => 'thumb_' . $data['upload_data']['file_name']
            );
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
			$config2 = array(
                'source_image' => $data['upload_data']['full_path'],
                'new_image' => $path,
                'maintain_ratio' => true,
                'quality' => '100',
				'width' => 150,
                'height' => 150,
                'new_image' => 'small_' . $data['upload_data']['file_name']
            );
            $this->image_lib->initialize($config2);
            $this->image_lib->resize();
			
		}
		return $data; 
	}

	public function upload_image_for_cropper(){
		if(!empty($_FILES)) {
			if($_FILES['image']['size'] > 0){
				$tempFile = $_FILES['image']['tmp_name'];
				$fileName = $_FILES['image']['name']; 
				if($this->input->post('path') && $this->input->post('path') == 'manufacturer'){
					$targetPath = MANUFACTURER_IMAGE_PATH;
				}elseif($this->input->post('path') && $this->input->post('path') == 'brand'){
					$targetPath = BRAND_IMAGE_PATH;
				}elseif($this->input->post('path') && $this->input->post('path') == 'category'){
					$targetPath = CATEGORY_IMAGE_PATH;
				}elseif($this->input->post('path') && $this->input->post('path') == 'subcategory'){
					$targetPath = SUBCATEGORY_IMAGE_PATH;
				}elseif($this->input->post('path') && $this->input->post('path') == 'page'){
					$targetPath = PAGE_IMAGE_PATH;
				}else{
					$targetPath = PRODUCT_IMAGE_PATH;
				}
				if(file_exists($targetPath.$fileName)){
					$i = 1;
					while(file_exists($targetPath.$i."_".$fileName)){
						$i++;
					}
					$FileName = $i."_".$fileName;
					$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
					$targetFile = $targetPath . $FileName;
				}else{
					$FileName = $fileName;
					$FileName = str_replace(array('%','*','^','#',' ',"'",'/','@','`','~','<','>','?',')','('),"-",strtolower(trim($FileName)));
					$targetFile = $targetPath . $FileName;
				}
				if(move_uploaded_file($tempFile, $targetFile)){
					$return_array['status'] = 'success';
					$return_array['image'] = $FileName;
				}else{
					$return_array['status'] = 'error';
					$return_array['image'] = '';
				}
			}else{
				$return_array['status'] = 'error';
				$return_array['image'] = '';
			}
		}else{
			$return_array['status'] = 'error';
			$return_array['image'] = '';
		}
		echo json_encode($return_array);
	}
	public function crop_image(){
		// echo "<pre>";print_r($_POST);echo "</pre>";
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$image = $postData['img'];
			$x = $postData['x'];
			$y = $postData['y'];
			$w = $postData['w'];
			$h = $postData['h'];
			$type = $postData['type'];
			$path = $postData['path'];
			if($type == 'cover'){
				$cover_image = 'cover_'.$image;
			}else{
				$cover_image = 'box_'.$image;
			}
			if($path == 'manufacturer'){
				$filepath = MANUFACTURER_IMAGE_PATH;
			}elseif($path == 'brand'){
				$filepath = BRAND_IMAGE_PATH;
			}elseif($path == 'category'){
				$filepath = CATEGORY_IMAGE_PATH;
			}elseif($path == 'subcategory'){
				$filepath = SUBCATEGORY_IMAGE_PATH;
			}elseif($path == 'page'){
				$filepath = PAGE_IMAGE_PATH;
			}else{
				$filepath = PRODUCT_IMAGE_PATH;
			}
			$source_image = $filepath.$image;
			$this->load->library('image_lib');
			$config1 = array(
				'source_image' => $source_image,
				'new_image' => $filepath.$cover_image,
				'maintain_ratio' => false,
				'quality' => 100,
				'width' => $w,
				'height' => $h,
				'x_axis' => $x,
				'y_axis' => $y,
				// 'master_dim' => 'height'
			);
			// print_r($config1);exit;
			$size = getimagesize($source_image);
			$img_width = $size[0];
			$img_height = $size[1];
			$va1 = (intval($img_width) / intval($img_height));
			$va2 = ($config1['width'] / $config1['height']);
			// echo $va1;echo $va2;
			$dim =  $va1 - $va2;
			$config1['master_dim'] = ($dim > 0) ? 'height' : 'width';
			$this->image_lib->initialize($config1);
			//$this->image_lib->resize();
			if($this->image_lib->crop()){
				$this->make_thumb($filepath.$cover_image, $filepath."scaled_".$cover_image, 750);
				$this->make_thumb($filepath.$cover_image, $filepath."thumb_".$cover_image, 400);
				$this->make_thumb($filepath.$cover_image, $filepath."small_".$cover_image, 150);
				$return_array['status'] = 'success';
				$return_array['image'] = 'small_'.$cover_image;
			}else{
				$return_array['status'] = 'error';
				$return_array['image'] = '';
			}
		}else{
			$return_array['status'] = 'error';
			$return_array['image'] = '';
		}
		echo json_encode($return_array);
    }
	function make_thumb($src, $dest, $desired_width){
		/* read the source image */
		$ext = pathinfo($src, PATHINFO_EXTENSION);
		if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG'){
			$source_image = imagecreatefromjpeg($src);
		}elseif($ext == 'png' || $ext == 'PNG'){
			$source_image = imagecreatefrompng($src);
		}elseif($ext == 'gif'  || $ext == 'GIF'){
			$source_image = imagecreatefromgif($src);
		}
		// $source_image = imagecreatefromjpeg($src);
		$width = imagesx($source_image);
		$height = imagesy($source_image);
		
		/* find the "desired height" of this thumbnail, relative to the desired width  */
		$desired_height = floor($height * ($desired_width / $width));
		
		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
		
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		/* create the physical thumbnail image to its destination */
		if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG'){
			imagejpeg($virtual_image, $dest);
		}elseif($ext == 'png' || $ext == 'PNG'){
			imagepng($virtual_image, $dest);
		}elseif($ext == 'gif'  || $ext == 'GIF'){
			imagegif($virtual_image, $dest);
		}
	}
	public function index1(){
	    header ('Content-Type: text/html; charset=UTF-8'); 
	    $filename = $_SERVER['DOCUMENT_ROOT']."/restaurant/uploads/Book1.csv";
		$file = fopen($filename, "r");
		//$sql_data = "SELECT * FROM prod_list_1 ";

		$count = 0;                                        
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
			echo "<pre>";print_r($emapData);echo "</pre>";//exit;
			if($count > 0){
				// echo '15/06/2019<br />';
				// echo $emapData[14].'<br />';
				// echo strtotime($emapData[14]).'<br />';
				// echo date('Y-m-d',strtotime(trim($emapData[14]))).'<br />';
				$start_date_explode = explode('/',trim($emapData[14]));
				$end_date_explode = explode('/',trim($emapData[15]));
				$insert_array = array(
					'category_id' => $emapData[3],
					'parent_id' => $emapData[18],
					'name_en' => $emapData[1],
					'name_ar' => $emapData[2],
					'classification' => strtolower($emapData[4]),
					'desc_en' => $emapData[8],
					'desc_ar' => $emapData[9],
					'price' => $emapData[5],
					'isdeal' => $emapData[6],
					'start_date' => $start_date_explode[2].'-'.$start_date_explode[1].'-'.$start_date_explode[0],
					'end_date' => $end_date_explode[2].'-'.$end_date_explode[1].'-'.$end_date_explode[0],
					'prep_time' => $emapData[16],
					'discount' => $emapData[20],
					'discount_delivery' => $emapData[21],
					'discount_takeaway' => $emapData[22],
					'loyalty_points' => $emapData[19],
					'size' => $emapData[17],
					'date_created' => date('Y-m-d H:i:s'),
					'added_by' => 1,
				);
				// $this->db->insert('product',$insert_array);
				// echo "<pre>";print_r($insert_array);echo "</pre>";
			}
			$count++;
		}
	}
	public function index11(){
	    header ('Content-Type: text/html; charset=UTF-8'); 
	    $filename = $_SERVER['DOCUMENT_ROOT']."/restaurant/uploads/locations.csv";
		$file = fopen($filename, "r");
		//$sql_data = "SELECT * FROM prod_list_1 ";

		$count = 0;                                        
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
			echo "<pre>";print_r($emapData);echo "</pre>";//exit;
			if($count > 0){
				// echo '15/06/2019<br />';
				// echo $emapData[14].'<br />';
				// echo strtotime($emapData[14]).'<br />';
				// echo date('Y-m-d',strtotime(trim($emapData[14]))).'<br />';
				// $start_date_explode = explode('/',trim($emapData[14]));
				// $end_date_explode = explode('/',trim($emapData[15]));
				$insert_array = array(
					'location' => $emapData[0],
					'delivery_time' => $emapData[1],
					'min_order' => $emapData[2],
					'delivery_charges' => $emapData[3],
					'status' => 1,
					'date_added' => date('Y-m-d H:i:s'),
					'added_by' => 1,
				);
				// $this->db->insert('locations',$insert_array);
				// echo "<pre>";print_r($insert_array);echo "</pre>";
			}
			$count++;
		}
	}
	public function index12(){
	    header ('Content-Type: text/html; charset=UTF-8'); 
		// setlocale(LC_ALL, 'ar_AE.utf8');
	    $filename = $_SERVER['DOCUMENT_ROOT']."/restaurant/uploads/Customers.csv";
		$file = fopen($filename, "r");
		//$sql_data = "SELECT * FROM prod_list_1 ";

		$count = 0;                                        
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE){
			echo "<pre>";print_r($emapData);echo "</pre>";//exit;
			if($count > 0){
				$name = explode(' ',$emapData[3]);
				$name_count = count($name);
				$insert_array['first_name'] = $name[0];
				$insert_array['last_name'] = '';
				for($i = 1; $i < $name_count; $i++){
					$insert_array['last_name'] .= $name[$i].' ';
				}
				$insert_array['slug'] = make_slug($insert_array['first_name'].' '.$insert_array['last_name'],'id',NULL,'users','slug');
				$insert_array['area'] = trim($emapData[0]);
				$insert_array['phone'] = trim($emapData[4]);
				$insert_array['city'] = 'Dubai';
				$insert_array['state'] = 'Dubai';
				$insert_array['country'] = 'UAE';
				$insert_array['created_on'] = date('Y-m-d H:i:s');
				$insert_array['added_by'] = 1;
				// echo '15/06/2019<br />';
				// echo $emapData[14].'<br />';
				// echo strtotime($emapData[14]).'<br />';
				// echo date('Y-m-d',strtotime(trim($emapData[14]))).'<br />';
				// $start_date_explode = explode('/',trim($emapData[14]));
				// $end_date_explode = explode('/',trim($emapData[15]));
				// $insert_array = array(
					// 'location' => $emapData[0],
					// 'delivery_time' => $emapData[1],
					// 'min_order' => $emapData[2],
					// 'delivery_charges' => $emapData[3],
					// 'status' => 1,
					// 'date_added' => date('Y-m-d H:i:s'),
					// 'added_by' => 1,
				// );
				$if = $this->db->where('phone',$insert_array['phone'])->count_all_results('users');
				if($if == 0){
					$this->db->insert('users',$insert_array);
				}
				echo "<pre>";print_r($insert_array);echo "</pre>";
			}
			$count++;
		}
	}
	public function index111(){
		// $users = $this->db->update('users',array('phone'=>'(11)-111-1111'));
// $users = $this->db->get('users')->result_array();
// foreach($users as $key => $user){
	// $this->db->where('id',$)->
// }
	}
	
}
