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
try {
$ifadm = $DBH->prepare("SELECT * FROM my WHERE login='$log'");
$ifadm->execute();
$ifadm->setFetchMode(PDO::FETCH_ASSOC);
$ifadmin = $ifadm->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}
if ($ifadmin['rol'] == "adm")
{
try {
$scl = $DBH->prepare("SELECT * FROM my");
$scl->execute();
$scl->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
echo $e->getMessage();
}
while ($row = $scl->fetch())
{
$youlog = $row['login'];

echo str_repeat("_",104)."<br>".$row['id']."   ";
echo $row['login']."     ";//.str_repeat("_",100)." ";
echo "  <center><a href=delprof.php?login=$youlog>".$deleteussit."</a>";
echo "  <a href=profil.php?login=$youlog>".$editussit."</a><br></center>";
}
}
}
?>
