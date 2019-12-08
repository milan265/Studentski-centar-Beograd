<?php
    if (!defined('APP_KEY') or APP_KEY != '12345678') {
	   header("Location: ./");
    }
    echo "cookie.php";
    setcookie("broj_kartice", "1", time() + 86400, "/");
    setcookie("isic_broj", "1", time() + 86400, "/");
    require_once './kernel.php';
?>