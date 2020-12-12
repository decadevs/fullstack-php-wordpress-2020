<?php
use \App\Router;


Router::get('/', 'HomeController@index');
Router::get('auth/login', 'AuthController@login');
Router::post('auth/login', 'AuthController@processLogin');
Router::get('auth/register', 'AuthController@register');
Router::post('auth/register', 'AuthController@processReg');
Router::get('auth/logout', 'AuthController@logout');



