<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 				= 'home'; //untuk menentukan controller mana yang di jadikan halam utamanya

$route['dashboard'] 						= 'siteman';
$route['dashboards'] 					    = 'siteman/home';
$route['dashboard/tambah_slide'] 			= 'siteman/tambah_slide';
$route['dashboard/slide'] 					= 'siteman/slide';
$route['dashboard/ubah_slide'] 			    = 'siteman/ubah_slide';
$route['dashboard/hapus_slide'] 			= 'siteman/hapus_slide';
$route['dashboard/hapus_slide/(:num)'] 		= 'siteman/hapus_slide/$1';
$route['dashboard/ubah_slide/(:num)'] 		= 'siteman/ubah_slide/$1';


$route['web_setting'] 			 			= 'siteman/identitaswebsite';
$route['web_setting/([a-zA-Z]+)'] 			= 'siteman/identitaswebsite/$1';

$route['menu_depan'] 			    		= 'frontend';
// $route['menu_depan/(:any)'] 			    = 'frontend/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
