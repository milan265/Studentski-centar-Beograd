<?php
    session_start();
    $const = $_SESSION["app_key"];
    session_unset();
    if (!isset($const) or $const != '12345678') {
        header("Location: ./");
	}
    setcookie("cookie", 1, time()+86400, "/");
    header("Location: ./");
?>