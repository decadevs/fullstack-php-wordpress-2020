<?php
use \App\Router;

Router::get('/', 'HomeController@index');
Router::get('auth/login', 'AuthController@login');
Router::post('auth/login', 'AuthController@store');
Router::get('auth/logout', 'AuthController@login');
Router::get('auth/reg', 'AuthController@login');

