<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 				= 'home';

$route['kategori'] 							= 'admin/kategori';
$route['kategori/(:any)'] 					= 'admin/kategori/$1';
$route['kategori/(:any)/(:num)'] 			= 'admin/kategori/$1/$2';
$route['menu'] 								= 'admin/menu';
$route['menu/(:any)'] 						= 'admin/menu/$1';
$route['menu/(:any)/(:num)'] 				= 'admin/menu/$1/$2';
$route['page'] 								= 'admin/page';
$route['page/(:any)'] 						= 'admin/page/$1';
$route['page/(:any)/(:num)'] 				= 'admin/page/$1/$2';
$route['post'] 								= 'admin/post';
$route['post/(:any)'] 						= 'admin/post/$1';
$route['post/(:any)/(:num)'] 				= 'admin/post/$1/$2';
$route['users'] 							= 'admin/users';
$route['users/(:any)'] 						= 'admin/users/$1';
$route['users/(:any)/(:num)'] 				= 'admin/users/$1/$2';
$route['videos'] 							= 'admin/videos';
$route['videos/(:any)'] 					= 'admin/videos/$1';
$route['videos/(:any)/(:num)'] 				= 'admin/videos/$1/$2';
$route['files'] 							= 'admin/warta';
$route['files/(:any)'] 						= 'admin/warta/$1';
$route['files/(:any)/(:num)'] 				= 'admin/warta/$1/$2';
$route['slide'] 							= 'admin/slide';
$route['slide/(:any)'] 						= 'admin/slide/$1';
$route['slide/(:any)/(:num)'] 				= 'admin/slide/$1/$2';
$route['banner'] 							= 'admin/banner';
$route['banner/(:any)'] 					= 'admin/banner/$1';
$route['banner/(:any)/(:num)'] 				= 'admin/banner/$1/$2';

$route['dashboard'] 						= 'siteman';
$route['dashboards'] 					    = 'siteman/home';

$route['web_setting'] 			 			= 'siteman/identitaswebsite';
$route['web_setting/([a-zA-Z]+)'] 			= 'siteman/identitaswebsite/$1';

$route['menu_depan'] 			    		= 'frontend';
// $route['menu_depan/(:any)'] 			    = 'frontend/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
