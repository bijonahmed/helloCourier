<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['menu/(:any)'] = "menu/content/$1"; // menu
//$route['Tour-News/(:num)'] = "details/details/package_details/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
