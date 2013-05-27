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

try {
$del = $DBH->prepare("DELETE FROM my WHERE login='$profiln'");
$del->execute();
}
catch(DBOException $e) {
	echo $e->getMessage();
	}
if ($_SESSION['name'] == $profiln)
	{
	unset($_SESSION['name']);
	}
echo "<br>yep";
echo("<script>location.href='index.php'</script>");

}
else 
{
$delpro = $_GET['login'];
echo $delpro;

try {
$del = $DBH->prepare("DELETE FROM my WHERE login='$delpro'");
$del->execute();
}
catch(PDOException $e) {
	echo $e->getMessagre();
}
echo("<script>location.href='users.php'</script>");
}
?>
</body>
</head>
