<?php
use \Wpanalytics\Router;

Router::get('/', 'AuthController@login');
Router::get('auth/login', 'AuthController@login');
Router::post('auth/login', 'AuthController@store');
Router::get('auth/logout', 'AuthController@logout');
Router::get('auth/reg', 'AuthController@signup');
Router::get('dashboard', 'HomeController@index');
Router::get('settings', 'SettingsController@settings');
Router::get('security', 'SettingsController@security');
Router::get('connect-website', 'SettingsController@connect');
Router::get('token', 'SettingsController@token');
Router::get('author', 'HomeController@author');
Router::get('authorpost', 'HomeController@authorpost');
