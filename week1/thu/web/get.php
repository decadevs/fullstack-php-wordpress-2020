<?php 

/*
echo "<pre>";
print_r($_GET);
echo "</pre>";
*/

$age = isset($_GET['age']) ? $_GET['age'] : 0;

echo $age;

$ul = "<ul>";
foreach($_GET as $key=>$value) {
    $value = strip_tags($value);
    $ul .= "<li>$key = $value</li>";
}
$ul .= "</ul>";

echo $ul;

?>

<form action="" method="GET">

    <input type="text" name="email" id="" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>">
    <input type="text" name="name" id="">
    <input type="text" name="phone" id="">
    <input type="text" name="age" id="">

    <button type="submit">Save</button>

</form>