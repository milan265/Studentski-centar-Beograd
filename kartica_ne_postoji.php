<?php
	if (!isset($const) or $const != '12345678') {
        header("Location: ./");
	}
    define('APP_KEY', '12345678');
    
    include("header.php");
    echo "<script>document.title='Kartica ne postoji'</script>";
    echo "<div id='kartica-ne-postoji'>";
    echo "<div>";
    echo "<h1>KARTICA NE POSTOJI</h1>";
    echo "</div>";
    echo "</div>";
    include("footer.php");
?>