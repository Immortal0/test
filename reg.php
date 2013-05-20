<?php session_start(); ?>
<?php
if ($_SESSION['lang'] == "en")
{
Include("IdentEN.txt");
}
else
{
Include("Ident.txt");
}
?>

<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

echo $table;
echo $reg;

//$f = fopen("file2.txt","a");
//$cont = fgets("file2.txt",filesize("file2.txt"));
//echo $cont;
?>
</body>
</html>
