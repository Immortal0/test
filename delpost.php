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

<?php

$deltem = $_SESSION['temared'];

//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);

echo $deltem;
echo "<br>haha";
$val = $_GET['val'];
echo $val;
if ($val == "Delete")
{ 
try {
$del = $DBH->prepare("DELETE FROM post WHERE tema='$deltem'");
$del->execute();
}
catch(DBOException $e) {
	echo $e->getMessage();
	} 

 
echo "<br>yep";
echo("<script>location.href='index.php'</script>");

}
else echo "ERROR";
?>
