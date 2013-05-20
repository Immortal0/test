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
$name = $_POST["Fname"];
$sname = $_POST["Lname"];
$pass = $_POST["pass"];
$dat = $_POST["menu"];
$mon = $_POST["menu2"];
$age = $_POST["age"];
$r = 2013;
$v = $r - $age;
?>

<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
echo $table;
if ($name == "" or $pass == "")
{
echo $al;
}
else
{
$name = stripslashes($name);
$name = htmlspecialchars($name);
$name = trim($name);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);
$pass = trim($pass);



$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);

$exist = mysql_query("SELECT id FROM my WHERE login='$name'",$db);
$ex = mysql_fetch_array($exist);
if (!empty($ex['id']))
{
echo $esn;
}
else
{
$result = mysql_query ("INSERT INTO my (login,password) VALUES ('$name','$pass')",$db);
//echo $result;
if ($result == TRUE)
{
echo $tyr;
}
else
{
echo "no";
}
}
}
//$file = fopen("$name.txt",w);
//fwrite($file,$pass)
//echo $file;

//$f = fopen("file2.txt","a");
//$cont = fgets("file2.txt",filesize("file2.txt"));
//echo $cont;
?>
</body>
</html>
