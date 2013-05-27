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
echo $table1;
echo $newprofred;

$ifadmine = $_SESSION['name'];
try {
$ifadmin = $DBH->prepare("SELECT * FROM my WHERE login='$ifadmine'");
$ifadmin->execute();
$ifadmin->setFetchMode(PDO::FETCH_ASSOC);
$ifadm = $ifadmin->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}
$isadm = $ifadm['rol'];
$myrol = "adm";
//echo $isadm;
if ($isadm == "$myrol" )
{
echo '<center><form action="redp.php" method="get">
<input type="submit" name="submit" value="make adm">
<input type="submit" name="submit" value="make red">
<input type="submit" name="submit" value="make usr">
<input type="submit" name="submit" value="make ban">
</form></center>
';
} 

?>
</body>
</html>
