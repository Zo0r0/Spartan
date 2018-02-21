<?php

if (!isset($_GET['btn-color'])) {
	$cookie_value = "red";
}else{
    $cookie_value = $_GET['btn-color'];
    $cookie_name = "btn-color";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

}
?>
