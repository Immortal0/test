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
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php

$name = $_SESSION['name'];
$mypost = $_POST['newpost'];
$myzag = $_POST['zag'];
$mypostua = $_POST['newpostua'];




//echo $mypost;

//echo $Npost;
//$_SESSION['pos'] = $myzag;
//$opf = fopen("novunu3.txt","a");
if (iconv_strlen($mypost) > 100)
{

echo "<br>100+<br>";

//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
$fs = substr($mypost, 0, 100);
if ($fs) echo "<br>ny<br>";
$sf = $fs."... <a href=novunu.php?id=$myzag>read more</a>";
if ($sf) echo "<br>aga<br>";

$fsua = substr($mypostua, 0, 100);
if ($fsua) echo "<br>ny<br>";
$sfua = $fsua."... <a href=novunu.php?id=$myzag>більше...</a>";
if ($sfua) echo "<br>aga<br>";

try {
$dbpost = $DBH->prepare("INSERT INTO post (login,tema,post,postn,postua,postnua) VALUES (?,?,?,?,?,?)");
$dbpost->bindParam(1, $name);
$dbpost->bindParam(2, $myzag);
$dbpost->bindParam(3, $mypost);
$dbpost->bindParam(4, $sf);
$dbpost->bindParam(5, $mypostua);
$dbpost->bindParam(6, $sfua);
$dbpost->execute(); 
}
catch(PDOException $e) {
echo $e->getMessage(); 
}
//if ($result = mysql_query ("INSERT INTO post (login,tema,post,postn) VALUES ('$name','$myzag','$mypost','$sf')",$db))
echo "<br>good";
}
else
{

echo "<br>100-<br>";
//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
//if ($result = mysql_query ("INSERT INTO post (login,tema,post,postn) VALUES ('$name','$myzag','$mypost','$mypost')",$db))

try {
$dbpost = $DBH->prepare("INSERT INTO post (login,tema,post,postn,postua,postnua) VALUES (?,?,?,?,?,?)");
$dbpost->bindParam(1, $name);
$dbpost->bindParam(2, $myzag);
$dbpost->bindParam(3, $mypost);
$dbpost->bindParam(4, $mypost);
$dbpost->bindParam(5, $mypostua);
$dbpost->bindParam(6, $mypostua);
$dbpost->execute();
}
catch(PDOException $e) {
echo $e->getMessage(); 
}

echo "<br>good";

}

















echo("<script>location.href='index.php'</script>");

//echo '<center><a href="autor.php">ОК</a></center>';

?>
</body>
</html>
