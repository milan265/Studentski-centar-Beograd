<?php
    define('APP_KEY', '12345678');
    if(!isset($_COOKIE['cookie'])){
        setcookie("cookie", 0, time()+86400, "/");
        echo "<div id=\"cookie-info\">
                <p>Ovaj sajt koristi kolačiće</p>
                <a href='cookie_potvrda.php'id=\"cookie-button\">Prihvatam</a>
                </div>";
    }
    require_once './kernel.php';
