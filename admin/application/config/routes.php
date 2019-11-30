<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/*----ADMIN----*/
$route['logout'] = 'home/logout';
$route['dashboard'] = 'home/dashboard';
$route['dashboard1'] = 'home/dashboard1';

$route['manufacturers'] = 'home/manufacturers';
$route['add_manufacturer'] = 'home/add_manufacturer';
$route['edit_manufacturer/(:num)'] = 'home/edit_manufacturer/$1';
$route['delete_manufacturer/(:num)'] = 'home/delete_manufacturer/$1';

$route['brands'] = 'home/brands';
$route['add_brand'] = 'home/add_brand';
$route['edit_brand/(:num)'] = 'home/edit_brand/$1';
$route['delete_brand/(:num)'] = 'home/delete_brand/$1';

$route['categories'] = 'home/categories';
$route['add_category'] = 'home/add_category';
$route['edit_category/(:num)'] = 'home/edit_category/$1';
$route['delete_category/(:num)'] = 'home/delete_category/$1';

$route['subcategories'] = 'home/subcategories';
$route['add_subcategory'] = 'home/add_subcategory';
$route['edit_subcategory/(:num)'] = 'home/edit_subcategory/$1';
$route['delete_subcategory/(:num)'] = 'home/delete_subcategory/$1';

$route['stock'] = 'home/stock';
$route['add_stock'] = 'home/add_stock';
$route['add_stock/(:num)'] = 'home/add_stock/$1';

$route['products'] = 'home/products';
$route['products/(:any)/(:any)'] = 'home/products/$1/$2';
$route['add_product'] = 'home/add_product';
$route['edit_product/(:num)'] = 'home/edit_product/$1';
$route['edit_product/(:num)/(:any)/(:num)'] = 'home/edit_product/$1/$2/$3';
$route['delete_product/(:num)'] = 'home/delete_product/$1';
$route['add_deal_product'] = 'home/add_deal_product';
$route['edit_deal_product/(:num)'] = 'home/edit_deal_product/$1';

$route['modifiers'] = 'home/modifiers';
$route['add_modifier'] = 'home/add_modifier';
$route['edit_modifier/(:num)'] = 'home/edit_modifier/$1';
$route['delete_modifier/(:num)'] = 'home/delete_modifier/$1';

$route['orders'] = 'home/orders/pending';
$route['orders/(:any)'] = 'home/orders/$1';
$route['orders/(:any)/(:any)'] = 'home/orders/$1/$2';
$route['order_detail/(:num)'] = 'home/order_detail/$1';
$route['order_detail_print/(:num)'] = 'home/order_detail_print/$1';
$route['order_detail_print/(:num)/(:any)'] = 'home/order_detail_print/$1/$2';
$route['edit_order_process/(:num)'] = 'home/edit_order_process/$1';
$route['edit_order_process/(:num)/(:any)/(:any)'] = 'home/edit_order_process/$1/$2/$3';
$route['edit_order_process/(:num)/(:any)/(:any)/(:num)'] = 'home/edit_order_process/$1/$2/$3/$4';

$route['customers'] = 'home/customers';

$route['users/(:any)'] = 'home/users/$1';
$route['add_user'] = 'home/add_user';
$route['edit_user/(:num)'] = 'home/edit_user/$1';
$route['delete_user/(:num)'] = 'home/delete_user/$1';

$route['settings'] = 'home/settings';

$route['pages'] = 'home/pages';
$route['pages/(:any)'] = 'home/edit_page/$1';

$route['homepage_slider'] = 'home/homepage_slider';
$route['add_homepage_slider'] = 'home/add_homepage_slider';
$route['edit_homepage_slider/(:num)'] = 'home/edit_homepage_slider/$1';
$route['delete_homepage_slider/(:num)'] = 'home/delete_homepage_slider/$1';
$route['pages/(:any)'] = 'home/edit_page/$1';

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
