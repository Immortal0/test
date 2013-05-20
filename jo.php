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
$logj = $_POST["login"];
$passj = $_POST["passj"];
?>


<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

echo "<br>";



//echo $table1;
$db = mysql_connect("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);
$result = mysql_query("SELECT * FROM my WHERE login='$logj'",$db);
$arr = mysql_fetch_array($result);
if (empty($arr['login']))
{
echo $ne;
}
else
{
if ($arr['password']==$passj)
{

$_SESSION['name'] = "$logj";
echo $tyj;

}
//else echo "<br> Невірний Пароль";

//else echo "Невідома помилка.";
//fclose($fp);

else
{
echo $pe;
}
}
//$f = fopen("file2.txt","a");
//$cont = fgets("file2.txt",filesize("file2.txt"));
//echo $cont;
?>
</body>
</html>
