<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function index(){
		for($i=1;$i<=10;$i++){
			$insert_array = array(
				'name' => 'Subcategory '.$i,
				'slug' => 'subcategory-'.$i,
				'image' => 'subcategory-'.$i.'.jpg',
				'date_created' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('subcategory',$insert_array);
			$insert_array = array(
				'name' => 'Category '.$i,
				'slug' => 'category-'.$i,
				'image' => 'category-'.$i.'.jpg',
				'date_created' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('category',$insert_array);
			$insert_array = array(
				'name' => 'Manufacturer '.$i,
				'slug' => 'manufacturer-'.$i,
				'image' => 'manufacturer-'.$i.'.jpg',
				'date_created' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('manufacturer',$insert_array);
			$insert_array = array(
				'name' => 'Brand '.$i,
				'slug' => 'brand-'.$i,
				'image' => 'brand-'.$i.'.jpg',
				'date_created' => date('Y-m-d H:i:s'),
			);
			$this->db->insert('brand',$insert_array);
			
		}

	}	
}