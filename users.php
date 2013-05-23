<?php session_start(); 
header("Charset: UTF-8");
?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"
<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

$log = $_SESSION['name'];
if (empty($log)) echo "ERROR";
else
{
echo $table1;
$ifadmin = (mysql_fetch_array(mysql_query("SELECT * FROM my WHERE login='$log'")));
if ($ifadmin['rol'] == "adm")
$sql = "SELECT * FROM my";
$result = mysql_query($sql)  or die(mysql_error());
while ($row = mysql_fetch_assoc($result))
{
$youlog = $row['login'];

echo str_repeat("_",104)."<br>".$row['id']."   ";
echo $row['login']."     ";//.str_repeat("_",100)." ";
echo "  <center><a href=delprof.php?login='$youlog'>DELETE</a>";
echo "  <a href=profil.php?login=$youlog>EDIT</a><br></center>";
}
}
?>
