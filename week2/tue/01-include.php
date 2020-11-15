<?php 
/**
 * Include or Require
 */

 require_once 'includer.php'; // warning message


 $username = "test";
 $password = "test";


 $auth = auth($username, $password);

 if(!$auth) {
     echo "Please log in";
 } else {
     echo "Welcome, $auth";
 }


 var_dump(getInfo());

 var_dump(connect());
 var_dump(query("SELECT * FROM fake"));
 