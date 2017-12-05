<?php
/**
 * Everything related to user login.
 */

if(!session_start()) {
    die('System fatal error!');
}

function _die_perm() {
    die('Wrong permission, access denied!');
}

/**
 * Check whether current user is logged in
 */
function is_logged_in() {
    if($_SESSION["login"] != "ok" or is_null($_SESSION["role"]) == TRUE) {
        header('location: auth/login.php');
        die('Not logged in!');
    }
}

/**
* Check current user has permission or not
* 1 = Admin, 2 = User
*/
function check_permission($target_role_id) {
    $rid = $_SESSION["role"];
    switch ($target_role_id) {
        // Write like this to be more flexible when changing permission required.
        case 1:
            if($rid != 1) _die_perm();
            break;
        case 2:
            // Do nothing because anyone logged in has user permission
            break;
        default:
            _die_perm();
    }
}