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





//echo $table1;
//$db = mysql_connect("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
try {

$result3 = $DBH->prepare("SELECT * FROM my WHERE login='$logj'");
$result3->execute();

//$result3->setFetchMode(DBO::FETCH_ASSOC);
$result3->setFetchMode(PDO::FETCH_ASSOC);

$arr = $result3->fetch();

}
catch(PDOException $e) {
echo $e->getMessage();
}

if ($arr['rol'] == "ban")
echo $ybn;
else
{
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
$datenow = date("d.m.Y H:i:s");
try {
$uptime = $DBH->prepare("UPDATE my SET datel='$datenow' WHERE login='$logj'");
$uptime->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}
//else echo "<br> Невірний Пароль";

//else echo "Невідома помилка.";
//fclose($fp);

else
{
echo $pe;
}
}
}
//$f = fopen("file2.txt","a");
//$cont = fgets("file2.txt",filesize("file2.txt"));
//echo $cont;
?>
</body>
</html>
