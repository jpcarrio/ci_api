<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;


//Route para Usuarios
$route['users']['get'] = 'users/list';
$route['users/(:num)']['get'] = 'users/find/$1';
$route['users']['post'] = 'users/user';
$route['users/(:num)']['put'] = 'users/user/$1';
$route['users/(:num)']['delete'] = 'users/user/$1';

//Route para Productos
$route['products']['get'] = 'products/list';
$route['products/(:num)']['get'] = 'products/find/$1';
$route['products']['post'] = 'products/product';
$route['products/(:num)']['put'] = 'products/product/$1';
$route['products/(:num)']['delete'] = 'products/product/$1';

//Route para Compras
$route['compras']['get'] = 'compras/list';
$route['compras/(:num)']['get'] = 'compras/find/$1';
$route['compras']['post'] = 'compras/compra';
$route['compras/(:num)']['put'] = 'compras/compra/$1';
$route['compras/(:num)']['delete'] = 'compras/compra/$1';
/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
