<?php

/**
 * isLoggedIn
 *
 * @return boolean true is the user is logged in, otherwise false
 */
function isLoggedIn()
{
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}
