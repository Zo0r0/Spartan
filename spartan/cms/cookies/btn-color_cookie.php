<?php

if (!isset($_GET['btn-color'])) {
	$cookie_value = "red";
}else{
    $cookie_value = $_GET['btn-color'];
    $cookie_name = "btn-color";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    // if(!isset($_COOKIE[$cookie_name])) {
    //     echo "Cookie named '" . $cookie_name . "' is not set!";
    // } else {
    //     echo "Cookie '" . $cookie_name . "' is set!<br>";
    //     echo "Value is: " . $_COOKIE["color"];
    // }

}
?>