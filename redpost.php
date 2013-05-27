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
$redtema = $_SESSION['temared'];

//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
try {
$slc = $DBH->prepare("SELECT * FROM post WHERE tema='$redtema'");
$slc->execute();
$slc->setFetchMode(PDO::FETCH_ASSOC);
$result = $slc->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}
//$result = mysql_fetch_array($slc);
$text = $result['post'];
$textua = $result['postua'];
$val = $_GET['val'];
if ($val == "Edit")
echo "<center>".$redtema;
echo "
<form action='redd.php' method='GET'>

<textarea name='redp' cols=50 rows=10>

$text

</textarea>

<textarea name='redpua' cols=50 rows=10>

$textua

</textarea>

<br><input type='submit' name='submit' value='EditPost'>

</form></center>
"; 

?>
</body>
</html>
