<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['start'] = 'start/index';
$route['start/register'] = 'start/register';
$route['start/login'] = 'start/login';
$route['start/forget'] = 'start/forget';
$route['start/handle_forget'] = 'start/handle_forget';
$route['start/logout'] = 'start/logout';
$route['start/yourself'] = 'start/yourself';
$route['start/about'] = 'start/about';
$route['start/contact'] = 'start/contact';
$route['start/verify_forget_passwd'] = 'start/verify_forget_passwd';
$route['shop_cart/add'] = 'shop_cart/add';
$route['start/list_record'] = 'start/list_record';

$route['start/change_info'] = 'start/change_info';
$route['start/change_email'] = 'start/change_email';
$route['start/change_address'] = 'start/change_address';
$route['shop_cart/handle_settled'] = 'shop_cart/handle_settled';

$route['shop_cart/show_orders_slave_details'] = 'shop_cart/show_orders_slave_details';
$route['start/test'] = 'start/test';

$route['comments/index'] = 'comments/index';
$route['comments/add_comment'] = 'comments/add_comment';
$route['comments/hand_comment'] = 'comments/hand_comment';
$route['default_controller'] = 'start';

$route['404_override'] = 'errors/page_missing';




/* End of file routes.php */
/* Location: ./application/config/routes.php */