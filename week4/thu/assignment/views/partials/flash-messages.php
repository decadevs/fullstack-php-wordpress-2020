<?php
if($error = getFlash('error')) {
    echo '<div class="alert alert-danger">' .  $error . "</div>";
}

if($info = getFlash('info')) {
    echo '<div class="alert alert-info">' .  $info . "</div>";
}

if($success = getFlash('success')) {
    echo '<div class="alert alert-success">' .  $success . "</div>";
}
