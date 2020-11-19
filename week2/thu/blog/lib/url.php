<?php
if(!defined('__INCLUDED__')){ die('You can not run this file');}
    function redirect($path){

        $protocol = "http";
    
        if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] !== "off"){
            $protocol =  "https";
        }
        //use flexible absolute path for redirecting so application will also work on older browser
        header("Location: $protocol://" . $_SERVER["HTTP_HOST"] . $path);
        
        exit;
    }