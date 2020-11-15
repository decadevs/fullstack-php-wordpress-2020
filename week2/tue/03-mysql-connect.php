<?php 

$con = mysqli_connect("localhost:8889", "root", "root", "decagon");
if(!$con) die("Unable to connect");

$insert = "
    INSERT INTO users(username)VALUES('mike')
";

//$query  = mysqli_query($con, $insert);


function users($con) {

    $out = [];
    $result = mysqli_query($con, "SELECT * FROM users ORDER BY created_at DESC");
    while($data = mysqli_fetch_assoc($result)) {
        $out[] = $data;
    }
    return $out;
}

header("Content-type: application/json");
echo json_encode(users($con));
exit;

