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
echo $joing;

?>
</body>
</html>
