<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct(){
        parent::__construct();
    }
	
	public function logout(){
		session_destroy();
		redirect();
	}
	public function login_process(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$email = $postData['email'];
			$password = $postData['password'];
			$ifExists = $this->db->where('email',$email)->get('customer')->row_array();
			if(!empty($ifExists)){
				$userData = $this->db->where('email',$email)->where('password',md5($password))->get('customer')->row_array();
				if(!empty($userData)){
					// if($userData['email_verify'] == 1){
						$this->session->set_userdata('id',$userData['id']);
						$data['status'] = 'true';
						$data['msg'] = '';
					// }else{
						// $data['status'] = 'false';
						// $link = '<a href="'.base_url().'home/resend_verification_email/'.urlencode(base64_encode($userData['email'])).'">here</a>';
						// $data['msg'] = 'Please verify your email.<br>Click '.$link.' to resend verification email.';
					// }

				}else{
					$data['status'] = 'false';
					$data['msg'] = 'Invalid Email/Password';
				}
			}else{
				$data['status'] = 'false';
				$data['msg'] = 'User not found';
			}
		}else{
			$data['status'] = 'false';
			$data['msg'] = 'Invalid Email/Password';
		}
		echo json_encode($data);
	}
	public function resend_verification_email($email = NULL){
		$email = base64_decode(urldecode($email));
		$userData = $this->db->where('email',$email)->get('customer')->row_array();
		if(!empty($userData)){
			$this->_verify_email($userData);
			$this->session->set_flashdata('msg','Verification email sent.');
			redirect();
		}else{
			$this->session->set_flashdata('err_msg','Something went wrong');
			redirect();
		}
	}
	public function verify_email($email = NULL){
		$email = base64_decode(urldecode($email));
		$userData = $this->db->where('email',$email)->get('customer')->row_array();
		if(!empty($userData)){
			$this->db->where('id',$userData['id'])->update('customer',array('email_verify'=>1));
			$this->session->set_flashdata('msg','Email Verified. Please Login to continue');
			redirect();
		}else{
			$this->session->set_flashdata('err_msg','Something went wrong');
			redirect();
		}
	}
	public function reset_process(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$email = $postData['email'];
			$userData = $this->db->where('email',$email)->get('customer')->row_array();
			if(!empty($userData)){
				$this->_reset_email($userData);
				$data['status'] = 'true';
				$data['msg'] = '';
			}else{
				$data['status'] = 'false';
				$data['msg'] = 'Invalid Email';
			}
		}else{
			$data['status'] = 'false';
			$data['msg'] = 'Invalid Email';
		}
		echo json_encode($data);
	}
	public function verify_code(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$email = $postData['email'];
			$code = $postData['code'];
			$ifExists = $this->db->where('email',$email)->get('customer')->row_array();
			if(!empty($ifExists)){
				$userData = $this->db->where('email',$email)->where('email_code',$code)->get('customer')->row_array();
				if(!empty($userData)){
					// $this->session->set_userdata('id',$userData['id']);
					$data['status'] = 'true';
					$data['msg'] = '';
				}else{
					$data['status'] = 'false';
					$data['msg'] = 'Invalid Code';
				}
			}else{
				$data['status'] = 'false';
				$data['msg'] = 'User not found';
			}
		}else{
			$data['status'] = 'false';
			$data['msg'] = 'Invalid Code';
		}
		echo json_encode($data);
	}
	public function reset_password_process(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$email = $postData['email'];
			$pass = $postData['pass'];
			$ifExists = $this->db->where('email',$email)->get('customer')->row_array();
			if(!empty($ifExists)){
				$update = $this->db->where('email',$email)->update('customer',array('password'=>md5($pass)));
				if(!empty($update)){
					// $this->session->set_userdata('id',$userData['id']);
					$data['status'] = 'true';
					$data['msg'] = '';
				}else{
					$data['status'] = 'false';
					$data['msg'] = 'Invalid Password';
				}
			}else{
				$data['status'] = 'false';
				$data['msg'] = 'User not found';
			}
		}else{
			$data['status'] = 'false';
			$data['msg'] = 'Invalid Password';
		}
		echo json_encode($data);
	}
	public function register_process(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$fname = $postData['fname'];
			$lname = $postData['lname'];
			$phone = $postData['phone'];
			$email = $postData['email'];
			$pass = $postData['pass'];
			$ifExists = $this->db->where('email',$email)->get('customer')->row_array();
			if(empty($ifExists)){
				$insert_array = array(
					'first_name' => $fname,
					'last_name' => $lname,
					'phone' => $phone,
					'email' => $email,
					'password' => md5($pass)
				);
				$update = $this->db->insert('customer',$insert_array);
				if(!empty($update)){
					$userData = $this->db->where('email',$email)->get('customer')->row_array();
					$this->_verify_email($userData);
					$data['status'] = 'true';
					$data['msg'] = '';
				}else{
					$data['status'] = 'false';
					$data['msg'] = 'Something went wrong';
				}
			}else{
				$data['status'] = 'false';
				$data['msg'] = 'Email already exists';
			}
		}else{
			$data['status'] = 'false';
			$data['msg'] = 'Invalid Password';
		}
		echo json_encode($data);
	}
	public function index(){
		$data = array();
		$top_categories = $this->db->select('id,name,image,slug')->order_by('id','RANDOM')->limit(3)->get('category')->result_array();
		$new_products = $this->db->select('id,name,image,slug')->order_by('id','RANDOM')->limit(4)->get('category')->result_array();
		foreach($new_products as $key => $new_product){
			$new_products[$key]['products'] = $this->db->select('id,name,image,slug,price,on_sale,sale_price')->where('category_id',$new_product['id'])->order_by('id','DESC')->limit(12)->get('product')->result_array();
		}
		
		$this->db->join('product','product.category_id = category.id');
		$this->db->where('product.featured',1);
		$this->db->group_by('product.category_id');
		$featured_products = $this->db->select('category.id,category.name,category.image,category.slug')->order_by('id','RANDOM')->limit(2)->get('category')->result_array();
		foreach($featured_products as $key => $featured_product){
			$featured_products[$key]['products'] = $this->db->select('id,name,image,slug,price,on_sale,sale_price')->where('category_id',$featured_product['id'])->order_by('id','DESC')->limit(12)->get('product')->result_array();
		}
		$homepage_sliders = $this->db->where('image !=','')->get('homepage_slider')->result_array();
		
		
		$data['top_categories'] = $top_categories;
		$data['new_products'] = $new_products;
		$data['featured_products'] = $featured_products;
		$data['homepage_sliders'] = $homepage_sliders;
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$data['page_content'] = 'home';
		$this->load->view('common/main_view',$data);
	}
	public function page($slug = NULL){
		$data = array();
		$content_data = $this->db->where('page_slug',$slug)->get('pages')->row_array();
		$data['content_data'] = $content_data;
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$data['page_content'] = 'page';
		$this->load->view('common/main_view',$data);
	}
	public function listing($param = NULL){
		$data = array();
		$content_data = $this->db->where('status',1)->where('image !=','')->get($param)->result_array();
		$data['content_data'] = $content_data;
		$data['param'] = $param;
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$data['page_content'] = 'listing';
		$this->load->view('common/main_view',$data);
	}
	public function products($param = NULL,$slug = NULL){
		$data = array();
		$paramData = $this->db->where('slug',$slug)->get($param)->row_array();
		$this->db->where($param.'_id',$paramData['id']);
		$this->db->select('product.id, product.name, product.slug, product.image, product.price, product.on_sale, product.sale_price, product.featured, category.name as category_name');
		$this->db->join('category','category.id = product.category_id');
		$content_data = $this->db->where('product.status',1)->where('product.image !=','')->get('product')->result_array();
		$data['content_data'] = $content_data;
		$data['paramData'] = $paramData;
		// echo "<pre>";print_r($data);echo "</pre>";exit;
		$data['page_content'] = 'product_list';
		$this->load->view('common/main_view',$data);
	}
	public function product($slug = NULL){
		$data = array();
		$this->db->select('product.*, manufacturer.name as manufacturer_name, manufacturer.slug as manufacturer_slug, brand.name as brand_name, brand.slug as brand_slug, category.name as category_name, category.slug as category_slug, subcategory.name as subcategory_name, subcategory.slug as subcategory_slug');
		$this->db->join('manufacturer','manufacturer.id = product.manufacturer_id');
		$this->db->join('brand','brand.id = product.brand_id');
		$this->db->join('category','category.id = product.category_id');
		$this->db->join('subcategory','subcategory.id = product.subcategory_id');
		$content_data = $this->db->where('product.slug',$slug)->get('product')->row_array();
		if(!empty($content_data)){
			$content_data['pictures'] = $this->db->where('product_id',$content_data['id'])->get('product_images')->result_array();
			$this->db->select('size.id, size.name')->join('size','size.id = product_size.size_id');
			$content_data['sizes'] = $this->db->where('product_id',$content_data['id'])->get('product_size')->result_array();
			$this->db->select('color.id, color.name')->join('color','color.id = product_color.color_id');
			$content_data['colors'] = $this->db->where('product_id',$content_data['id'])->get('product_color')->result_array();
			$content_data['features'] = $this->db->where('product_id',$content_data['id'])->get('product_features')->result_array();
			
			$related_products = $this->db->select('product.id, product.name, product.slug, product.image, product.price, product.on_sale, product.sale_price, product.featured, category.name as category_name')->join('category','category.id = product.category_id')->where('product.category_id',$content_data['category_id'])->where('product.status',1)->where('product.id !=',$content_data['id'])->limit(4)->get('product')->result_array();
			$data['content_data'] = $content_data;
			$data['related_products'] = $related_products;
			// echo "<pre>";print_r($data);echo "</pre>";exit;
			$data['page_content'] = 'product_detail';
			$this->load->view('common/main_view',$data);
		}else{
			redirect('categories');
		}
	}
	public function update_profile(){
		$data = array();
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$user = $this->db->where('id',$this->session->userdata('id'))->get('customer')->row_array();
			if(!empty($user)){
				$update_array = array(
					'first_name' => $postData['first_name'],
					'last_name' => $postData['last_name'],
					'email' => $postData['email'],
					'phone' => $postData['phone'],
				);
				$update = $this->db->where('id',$user['id'])->update('customer',$update_array);
				if($update){
					$this->session->set_flashdata('okay_msg','Profile Updated');
					redirect('my_account');
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('my_account');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('my_account');
			}
		}else{
			$this->session->set_flashdata('msg','Something went wrong');
			redirect('my_account');
		}
	}
	public function my_account(){
		$data = array();
		$customer_id = $this->session->userdata('id');
		$customerData = $this->db->where('id',$customer_id)->get('customer')->row_array();
		$orderData = $this->db->where('customer_id',$customer_id)->get('orders')->result_array();
		foreach($orderData as $key => $order){
			$this->db->select('product.name, order_detail.*')->join('product','product.id = order_detail.item_id');
			$orderData[$key]['items'] = $this->db->where('order_id',$order['id'])->get('order_detail')->result_array();
		}
		// echo "<pre>";print_r($orderData);echo "</pre>";exit;
		$data['customerData'] = $customerData;
		$data['orderData'] = $orderData;
		$this->load->view('account',$data);
	}
	/*---cart---*/
	public function cart(){
		$data = array();
		$data['page_content'] = 'cart';
		$this->load->view('common/main_view',$data);
	}
	function add_to_cart(){
		$data = array();
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$name = $postData['name'];
			$insert_cart_item = array(
				'id' => $postData['pid']."_".$postData['size']."_".$postData['color'],
				'pid' => $postData['pid'],
				'name' => $postData['name'],
				'slug' => $postData['slug'],
				'price' => $postData['price'],
				'image' => $postData['image'],
				'size' => $postData['size'],
				'qty' => $postData['qty'],
				'color' => $postData['color'],
				'on_sale' => $postData['on_sale'],
				'sale_price' => $postData['sale_price'],
			);
			$this->cart->product_name_rules = '[:print:]';
			$insert = $this->cart->insert($insert_cart_item);
			if($insert){
				$grand_total = 0;
				$qty = 0;
				foreach($this->cart->contents() as $key => $item){
					$grand_total = $grand_total + $item['subtotal'];
					$qty = $qty + $item['qty'];
				}
				$pageData['ajax_cart'] = 'yes';
				$data['cart'] = $this->load->view('ajax_view',$pageData,TRUE);
				$data['subtotal'] = number_format($grand_total,2);
				$data['qty'] = $qty;
				echo json_encode($data);
			}
		}else{
			echo 0;
		}
	}
	function update_cart(){
		// print_r($_POST);exit;
 		foreach($_POST['cart'] as $id => $cart){			
			// $price = $cart['price'];
			// $amount = $price * $cart['qty'];
			
			$data = array(
				'rowid'   => $cart['rowid'],
				'qty'     => $cart['qty'],
				
			);
			// 'price'   => $price,
			$this->cart->update($data);
		}
		redirect('cart');
	}
	function remove_from_cart($rowid = NULL) {
		if ($rowid=="all"){
			$query = $this->cart->destroy();
			redirect('cart');
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
			$query = $this->cart->update($data);
			if($query){
				redirect('cart');
			}else{
				redirect('cart');
			}
		}
	}
	public function checkout(){
		$data = array();
		$states = $this->db->order_by('id','ASC')->get('state')->result_array();
		$data['states'] = $states;
		$data['postData'] = array();
		$data['page_content'] = 'checkout';
		$this->load->view('common/main_view',$data);
	}
	public function return_order(){
		$data = array();
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$order = $this->db->where('id',$postData['order_id'])->get('orders')->row_array();
			if(!empty($order)){
				$return_reason = array(
					'returned' => 1,
					'return_tracking_id' => $postData['tracking_id'],
					'returned_date' => date('Y-m-d H:i:s'),
					'return_reason' => $postData['return_reason'],
				);
				$update = $this->db->where('id',$order['id'])->update('orders',$return_reason);
				if($update){
					$this->session->set_flashdata('okay_msg','Dipute requested');
					redirect('my_account');
				}else{
					$this->session->set_flashdata('msg','Something went wrong');
					redirect('my_account');
				}
			}else{
				$this->session->set_flashdata('msg','Something went wrong');
				redirect('my_account');
			}
		}else{
			$this->session->set_flashdata('msg','Something went wrong');
			redirect('my_account');
		}
	}
	public function checkout_process(){
		$data = array();
		// echo "<pre>";print_r($_POST);echo "</pre>";exit;
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$ifExists = $this->db->where('email',$postData['email'])->get('customer')->row_array();
			if(empty($ifExists)){
				$insert_array = array();
				$insert_array['first_name'] = $postData['first_name'];
				$insert_array['last_name'] = $postData['last_name'];
				$insert_array['email'] = $postData['email'];
				$insert_array['phone'] = $postData['phone'];
				$insert_array['email'] = $postData['email'];
				$insert_array['slug'] = str_replace(' ','',$postData['first_name'].$postData['last_name']);
				$insert = $this->db->insert('customer',$insert_array);
				if($insert){
					$customer_id = $this->db->insert_id();
				}else{
					
				}
			}else{
				$customer_id = $ifExists['id'];
			}
			if($this->session->userdata('id')){
				$customer_id = $this->session->userdata('id');
			}
			$order_insert_array = array();
			$order_insert_array['customer_id'] = $customer_id;
			$order_insert_array['payment_option_id'] = 0;
			$order_insert_array['status'] = 'complete';
			$order_insert_array['order_total'] = $postData['order_total'];
			$order_insert_array['shipping_amount'] = $postData['shipping_amount'];
			$order_insert_array['discount_amount'] = $postData['discount_amount'];
			$order_insert_array['notes'] = $postData['notes'];
			$order_insert_array['discount'] = 0;
			$order_insert_array['transaction_id'] = str_replace(' ','',$postData['card_number']);
			$order_insert_array['order_date'] = date('Y-m-d H:i:s');
			$order_insert_array['date_created'] = date('Y-m-d H:i:s');
			$insert = $this->db->insert('orders',$order_insert_array);
			if($insert){
				$order_id = $this->db->insert_id();
				$billing_address = array();
				$billing_address['first_name'] = $postData['first_name'];
				$billing_address['last_name'] = $postData['last_name'];
				$billing_address['company'] = $postData['company'];
				$billing_address['email'] = $postData['email'];
				$billing_address['phone'] = $postData['phone'];
				$billing_address['street_address'] = $postData['street_address'];
				$billing_address['city'] = $postData['city'];
				$billing_address['state'] = $postData['state'];
				$billing_address['country'] = $postData['country'];
				$billing_address['zip'] = $postData['zip'];
				$shipping_address = array();
				$shipping_address['first_name'] = $postData['sfirst_name'];
				$shipping_address['last_name'] = $postData['slast_name'];
				$shipping_address['company'] = $postData['scompany'];
				$shipping_address['email'] = $postData['semail'];
				$shipping_address['phone'] = $postData['sphone'];
				$shipping_address['street_address'] = $postData['sstreet_address'];
				$shipping_address['city'] = $postData['scity'];
				$shipping_address['state'] = $postData['sstate'];
				$shipping_address['country'] = $postData['scountry'];
				$shipping_address['zip'] = $postData['szip'];
				
				$order_billing_insert_array = $billing_address;
				$order_billing_insert_array['order_id'] = $order_id;
				$order_billing_insert_array['date_created'] = date('Y-m-d H:i:s');
				$this->db->insert('order_billing_address',$order_billing_insert_array);
				
				$order_shipping_insert_array = $shipping_address;
				$order_shipping_insert_array['order_id'] = $order_id;
				$order_shipping_insert_array['date_created'] = date('Y-m-d H:i:s');
				$this->db->insert('order_shipping_address',$order_shipping_insert_array);
				
				$customer_billing_insert_array = $billing_address;
				$customer_billing_insert_array['customer_id'] = $customer_id;
				$this->db->insert('customer_billing_address',$customer_billing_insert_array);
				
				$customer_shipping_insert_array = $shipping_address;
				$customer_shipping_insert_array['customer_id'] = $customer_id;
				$this->db->insert('customer_shipping_address',$customer_shipping_insert_array);
				
				$items = $this->cart->contents();
				foreach($items as $key => $item){
					$order_array = array();
					$order_array['order_id'] = $order_id;
					$order_array['item_id'] = $item['pid'];
					$order_array['item_quantity'] = $item['qty'];
					$order_array['item_color'] = $item['color'];
					$order_array['item_size'] = $item['size'];
					$order_array['item_image'] = $item['image'];
					$order_array['item_price'] = $item['price'];
					$order_array['on_sale'] = $item['on_sale'];
					$order_array['sale_price'] = $item['sale_price'];
					if($item['on_sale'] == 1){
						$order_array['subtotal'] = ($item['sale_price']*$item['qty']);
					}else{
						$order_array['subtotal'] = ($item['price']*$item['qty']);
					}
					$order_array['date_created'] = date('Y-m-d H:i:s');
					$order_insert = $this->db->insert('order_detail',$order_array);
					// if($order_insert){
						// $this->cart->destroy();
						// redirect();
					// }else{
						// redirect();
					// }
				}
				$this->cart->destroy();
				$this->session->set_flashdata('msg','Order Successful');
				redirect();
			}else{
				redirect();
			}
		}else{
			redirect();
		}
	}
	/*---cart---*/
	public function contact_submit(){
		if($this->input->post()){
			$postData = $this->security->xss_clean($this->input->post());
			$settings = get_settings();
			$name = $postData['name'];
			$email = $postData['email'];
			$phone = $postData['phone'];
			$message = $postData['message'];
			$body = 'Name: '.$name .'\nEmail: '.$email.'\nPhone: '.$phone.'\nMessage: '.$message;
			$subject = 'Contact From '.$name;
			$to = $settings['shop_email'];
			$headers  = "From: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= "X-Sender: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();
			$headers .= "X-Priority: 1\n"; // Urgent message!
			$headers .= "Return-Path: ".$settings['shop_email']."\n"; // Return path for errors
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			mail($to,$subject,$body,$headers);
			redirect('contact-us');
		}else{
			redirect('contact-us');
		}
	}
	
	public function _reset_email($userData = NULL){
			$settings = get_settings();
			
			$code = rand(1000,9999);
			$this->db->where('id',$userData['id'])->update('customer',array('email_code'=>$code));
			$to = $userData['email'];
			$body = 'Dear '.$userData['first_name'].' '.$userData['first_name'].'! \nPassword reset request has been initiated from your account.\nCode: '.$code;
			$subject = 'Password Reset Request';
			$headers  = "From: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= "X-Sender: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();
			$headers .= "X-Priority: 1\n"; // Urgent message!
			$headers .= "Return-Path: ".$settings['shop_email']."\n"; // Return path for errors
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			// mail($to,$subject,$body,$headers);

	}
	public function _verify_email($userData = NULL){
			$settings = get_settings();
			
			$code = rand(1000,9999);
			$this->db->where('id',$userData['id'])->update('customer',array('email_code'=>$code));
			$to = $userData['email'];
			$link = '<a href="'.base_url().'home/verify_email/'.urlencode(base64_encode($userData['email'])).'">Verify</a>';
			$body = 'Dear '.$userData['first_name'].' '.$userData['first_name'].'! \nWe give you a warm welcome on registering on '.$settings['shop_name'].'.\nClick on the link below to continue shopping.\n'.$link.'\nBest Regards.\n'.$settings['shop_name'];
			$subject = 'Registration successfull';
			$headers  = "From: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= "X-Sender: ".$settings['shop_name']." < ".$settings['shop_email']." >\n";
			$headers .= 'X-Mailer: PHP/' . phpversion();
			$headers .= "X-Priority: 1\n"; // Urgent message!
			$headers .= "Return-Path: ".$settings['shop_email']."\n"; // Return path for errors
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
			// mail($to,$subject,$body,$headers);

	}
	
}
