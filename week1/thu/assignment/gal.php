<?php

// handle Get method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    session_start();
    $response []= array("message" => $_SESSION["message"]);
    $data = scandir("./gallery", SCANDIR_SORT_NONE);
    $response []= array("data" => $data);
    echo json_encode($response);
}