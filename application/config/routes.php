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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'products/index';
$route['login'] = 'authentication/login';
$route['signup'] = 'authentication/signup';
$route['admin'] = 'admin/index';
$route['(:any)'] = 'products/index/$1';

$route['jarmark'] = 'products/jarmark';
$route['jarmark/product/(:any)/(:any)'] = 'products/product/$1/$2';
$route['jarmark/(:any)'] = 'products/jarmark/$1';

$route['garages'] = 'garages/index';
$route['garages/(:any)'] = 'garages/index/$1';

$route['contact'] = 'home/contact';
$route['about'] = 'home/about';

$route['news'] = 'news/view';
$route['news/(:num)'] = 'news/view/$1';
$route['news/(:num)/(:any)'] = 'news/view/$1';

$route['page'] = 'page/view';
$route['page/add'] = 'page/add';
$route['page/manage'] = 'page/manage';
$route['page/edit/(:any)'] = 'page/edit/$1';
$route['page/(:any)'] = 'page/view/$1';

$route['headline/edit'] = 'headline/edit';
$route['admin/NewProduct'] = 'products/add';
$route['admin/newpage'] = 'page/add';
$route['product/(:num)/(:any)'] = 'products/product/$1/$2';
$route['product/(:num)'] = 'products/product/$1/$2';

$route['settings'] = 'settings/index';

$route['tools'] = 'tools/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;