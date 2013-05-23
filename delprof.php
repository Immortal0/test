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
<html>
<head>
<title>test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
if ($_GET['login'] == "")
{
$profiln = $_SESSION['profil'];
echo $table1;

$del = mysql_query("DELETE FROM my WHERE login='$profiln'",$db);
if ($del)
{ 
if ($_SESSION['name'] == $profiln)
	{
	unset($_SESSION['name']);
	}
echo "<br>yep";
echo("<script>location.href='index.php'</script>");
}
}
else 
$delpro = $_GET['login'];
echo $delpro;
$del = mysql_query("DELETE FROM my WHERE login=$delpro",$db);
echo("<script>location.href='users.php'</script>");
?>
</body>
</head>
