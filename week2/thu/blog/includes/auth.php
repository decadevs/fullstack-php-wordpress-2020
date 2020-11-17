<?php

/**
 * check if a user is logged in
 */

function isLoggedIn() {

    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}