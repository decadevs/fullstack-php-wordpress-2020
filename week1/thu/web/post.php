<?php 

$ul = "<ul>";
foreach($_POST as $key=>$value) {
    $value = strip_tags($value);
    $ul .= "<li>$key = $value</li>";
}
$ul .= "</ul>";

echo $ul;
?>

<form action="post.php" method="POST">

    <input type="text" name="email" id="" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
    <input type="text" name="name" id="">
    <input type="text" name="phone" id="">
    <input type="text" name="age" id="">
    

    <button type="submit">Save</button>

</form>