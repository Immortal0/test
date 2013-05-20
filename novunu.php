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
$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);
$sql = "SELECT * FROM post WHERE tema='$tema'";
$result = mysql_query("SELECT * FROM post WHERE tema='$temas'",$db)  or die(mysql_error());
$row = mysql_fetch_assoc($result);
if ($row)
{
echo "<center><strong><font size=5>".$row['tema']."</font></strong></center>";	
echo "<center>".$row['post']."</center>";
}

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
