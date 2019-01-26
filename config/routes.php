<?php
// $router->define([
//    'contact' => 'ContactController@index',
//    'about' => 'AboutController@index',
//    'blog' => 'BlogController@index',
//    'guest' => 'GuestbookController@index',

//    'admin' => 'Admin\DashboardController@index',
//    'admin/categories' => 'Admin\CategoryController@index',
//    'admin/categories/create' => 'Admin\CategoryController@create',
//    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
//    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

//    'admin/roles' => 'Admin\RoleController@index',
//    'admin/roles/create' => 'Admin\RoleController@create',
//    'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
//    'admin/roles/delete/{id}' => 'Admin\RoleController@delete',

//    'admin/users' => 'Admin\UserController@index',
//    'admin/users/create' => 'Admin\UserController@create',
//    'admin/users/edit/{id}' => 'Admin\UserController@edit',
//    'admin/users/delete/{id}' => 'Admin\UserController@delete',
 
//    'auth' => 'AuthController@signup',
//    'register' => 'AuthController@signup',
//    'login' => 'AuthController@signin',

//    'logout'=>'AuthController@logout',

//    'profile'=>'ProfileController@index',
    
//    'admin/products' => 'Admin\ProductController@index',
//    'admin/products/create' => 'Admin\ProductController@create',

//    //Главаня страница
//    'index.php' => 'HomeController@index',
//    '' => 'HomeController@index',
//    'api/shop' => 'HomeController@getProduct',

//    '404' => 'PagesController@notFound'
// ]);


$router->get('', 'HomeController@index');
$router->get('api/shop', 'HomeController@getProduct');

$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');
$router->get('guestbook', 'GuestbookController@index');
$router->get('blog', 'BlogController@index');
$router->get('blog/{slug}', 'BlogController@show');
$router->get('404', 'PagesController@notFound');

$router->get('admin', 'Admin\DashboardController@index');
$router->get('admin/products', 'Admin\ProductController@index');
$router->get('admin/products/create', 'Admin\ProductController@create');
$router->post('admin/products/save', 'Admin\ProductController@save');
$router->get('admin/products/edit/{id}', 'Admin\ProductController@edit');
$router->post('admin/products/edit/{id}', 'Admin\ProductController@edit');

$router->get('admin/products/delete/{id}', 'Admin\ProductController@delete');
$router->post('admin/products/delete/{id}', 'Admin\ProductController@delete');

$router->get('admin/products/show/{id}', 'Admin\ProductController@show');


$router->get('admin/categories', 'Admin\CategoryController@index');
$router->get('admin/categories/create', 'Admin\CategoryController@create');
$router->post('admin/categories/create', 'Admin\CategoryController@create');
$router->get('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
$router->post('admin/categories/edit/{id}', 'Admin\CategoryController@edit');
$router->get('admin/categories/delete/{id}', 'Admin\CategoryController@delete');
$router->post('admin/categories/delete/{id}', 'Admin\CategoryController@delete');

$router->get('admin/posts', 'Admin\PostController@index');
$router->get('admin/posts/create', 'Admin\PostController@create');
$router->get('admin/posts/edit/{id}', 'Admin\PostController@edit');
$router->get('admin/posts/delete/{id}', 'Admin\PostController@delete');

$router->post('admin/posts/create', 'Admin\PostController@store');
$router->post('admin/posts/update/{id}', 'Admin\PostController@update');
$router->post('admin/posts/delete/{id}', 'Admin\PostController@delete');



$router->get('admin/roles', 'Admin\RolesController@index');
$router->get('admin/roles/create', 'Admin\RolesController@create');
$router->get('admin/roles/edit/{id}', 'Admin\RolesController@edit');
$router->get('admin/roles/delete/{id}', 'Admin\RolesController@delete');

$router->post('admin/roles/create', 'Admin\RolesController@create');
$router->post('admin/roles/edit/{id}', 'Admin\RolesController@edit');
$router->post('admin/roles/delete/{id}', 'Admin\RolesController@delete');

$router->get('admin/users', 'Admin\UsersController@index');
$router->get('admin/users/create', 'Admin\UsersController@create');
$router->post('admin/users/create', 'Admin\UsersController@create');

$router->get('admin/users/edit/{id}', 'Admin\UsersController@edit');
$router->post('admin/users/edit/{id}', 'Admin\UsersController@edit');

$router->get('admin/users/delete/{id}', 'Admin\UsersController@delete');
$router->post('admin/users/delete/{id}', 'Admin\UsersController@delete');

$router->get('register', 'UsersController@signup');
$router->post('register', 'UsersController@signup');

$router->get('login', 'UsersController@login');
$router->post('login', 'UsersController@login');

$router->get('logout', 'UsersController@logout');
$router->post('logout', 'UsersController@logout');
