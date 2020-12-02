<?php

    namespace WP_App;

    class Application{

        public function mount(){
             echo __METHOD__;
        }

        public static function homepage(){
            require '../homepage.php';
        }

        public static function signup(){
            require '../signup.php';
        }

    }