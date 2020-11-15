<?php 

require 'drivers/mysql.php';

function connect() : string {
    $info = mysql();
    return "connecting to database via $info..";
}

function query($sql):array {
    return [1,2,3];
}