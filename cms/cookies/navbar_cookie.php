<?php

if (!isset($_GET['color'])) {
	$cookie_value = "red";
}else{
    $cookie_value = $_GET['color'];
    $cookie_name = "color";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

}
?>
