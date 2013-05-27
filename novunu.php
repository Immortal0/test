<?php session_start(); ?> 

<?php header("Charset: UTF-8"); ?>
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

echo $lang;

if (empty($_SESSION['name']))
{
echo $table;
}
else
{
echo $table1;
}



$temas = $_GET['id'];
//echo $temas;
$_SESSION['temared'] = "$temas";
//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
//$sqltem = "SELECT * FROM post WHERE tema='$tema'";
try {
$dbtema = $DBH->prepare("SELECT * FROM post WHERE tema='$temas'");
$dbtema->execute();

$dbtema->setFetchMode(PDO::FETCH_ASSOC);
$row = $dbtema->fetch();

}
catch(PDOException $e) {
echo $e->getMessage();
}

if ($_SESSION['lang'] == "en")
$hnov = $row['post'];
else 
$hnov = $row['postua'];

echo "<center><strong><font size=5>".$row['tema']."</font></strong></center>";	
echo "<center>".$hnov."</center>";


$autorp = $row['login'];

if ($_SESSION['name'] == "$autorp" or $_SESSION['name'] == "Admin" )
{
echo "<center><form action='redpost.php' method='GET'>
<input type='submit' name='val' value='Edit'>
</form>
";
echo "<form action='delpost.php' method='GET'>
<input type='submit' name='val' value='Delete'>
</form></center>";
}
else
{
echo "";
}
?>
</body>
</html>
