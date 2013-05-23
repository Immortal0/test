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
echo '<form action="redp.php" method="post" enctype="multipart/form-data">

<center><br>New first name: <input type="text" name="fname"><br>
<br>New lust name: <input type="text" name="lname"><br>
<br>New Enail: <input type="email" name="email"><br>
<br>New Photo: <input type="file" name="photo"><br>
<br><input type="submit" name="submit" value="submit"></center>
</form>

';

$ifadmine = $_SESSION['name'];
$resules = mysql_query("SELECT * FROM my WHERE login='$ifadmine'");
$ifadm = mysql_fetch_array($resules);
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
