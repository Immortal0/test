<?php session_start(); ?>

<?php

unset($_SESSION['name']);

echo("<script>location.href='index.php'</script>");

//header("Location:index.php");


?>