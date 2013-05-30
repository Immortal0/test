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
if (empty($_SESSION['name'])) echo "Error";
else 
{
$name = $_SESSION['name'];


try {
$dr = $DBH->prepare("SELECT * FROM my WHERE login='$name'");
$dr->execute();
$dr->setFetchMode(PDO::FETCH_ASSOC);
$drcode = $dr->fetch();

}
catch(PDOException $e) {
echo $e->getMessage();
}
if ($drcode['rol'] == "usr") echo "Error";
else 
{





$deltem = $_SESSION['temared'];

//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);

echo $deltem."<br>";
//echo "<br>haha";
$val = $_GET['val'];
echo $val."<br>";

if ($val == "Delcoment")
{
//echo "haaaa<br>";
$idc = $_GET['idc'];
try {
$delcom = $DBH->prepare("DELETE FROM coments WHERE id = '$idc'");
$delcom->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
echo"<script>location.href='novunu.php?id=$deltem'</script>";
}

else
{

if ($val == "Delete")
{ 
try {
$del = $DBH->prepare("DELETE FROM post WHERE tema='$deltem'");
$del->execute();
}
catch(DBOException $e) {
	echo $e->getMessage();
	} 

try {
$delallcom = $DBH->prepare("DELETE FROM coments WHERE post='$deltem'");
$delallcom->execute();
}
catch(DBOException $e) {
	echo $e->getMessage();
	} 

try {
$delallcom = $DBH->prepare("DELETE FROM vote WHERE tema='$deltem'");
$delallcom->execute();
}
catch(DBOException $e) {
	echo $e->getMessage();
	} 

 
echo "<br>yep";
echo("<script>location.href='index.php'</script>");

}
else echo "ERROR";
}
}
}
?>
