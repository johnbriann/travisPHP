<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if(!function_exists('get_settings')){
    function get_settings(){
		$CI = & get_instance();
		$content_data = $CI->db->get('settings')->row_array();
		return $content_data;
    }
}
if(!function_exists('get_categories')){
    function get_categories(){
		$CI = & get_instance();
		$content_data = $CI->db->select('id,name,image,slug')->order_by('name','ASC')->get('category')->result_array();
		return $content_data;
    }
}
if(!function_exists('get_brands')){
    function get_brands(){
		$CI = & get_instance();
		$content_data = $CI->db->select('id,name,image,slug')->order_by('name','ASC')->get('brand')->result_array();
		return $content_data;
    }
}
