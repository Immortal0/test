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

$deltem = $_SESSION['temared'];
$redp = $_GET['redp'];
$redpua = $_GET['redpua'];
//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);

echo $deltem;
echo "<br>haha";
$val = $_GET['submit'];
echo $val;
if ($val == "EditPost") 
{
echo "good";
if (iconv_strlen($redp) < 100)
{
echo "norm";
try {
$del = $DBH->prepare("UPDATE post SET post='$redp', postn='$redp' WHERE tema='$deltem'");
$del->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}
else
{
$fs = substr($redp, 0, 100);
if ($fs) echo "<br>ny<br>";
$sf = $fs."... <a href=novunu.php?id=$deltem>read more</a>";
if ($sf) echo "<br>aga<br>";
try {
$del = $DBH->prepare("UPDATE post SET post='$redp', postn='$sf' WHERE tema='$deltem'");
$del->execute();
}
catch(PDOException $e) {
$e->getMessage();
}
}





if (iconv_strlen($redpua) < 100)
{
echo "norm";
try {
$delua = $DBH->prepare("UPDATE post SET postua='$redpua', postnua='$redpua' WHERE tema='$deltem'");
$delua->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}
else
{
$fsua = substr($redpua, 0, 100);
if ($fsua) echo "<br>ny<br>";
$sfua = $fsua."... <a href=novunu.php?id=$deltem>більше</a>";
if ($sfua) echo "<br>aga<br>";
try {
$delua = $DBH->prepare("UPDATE post SET postua='$redpua', postnua='$sfua' WHERE tema='$deltem'");
$delua->execute();
}
catch(PDOException $e) {
$e->getMessage();
}
}
}





echo("<script>location.href='index.php'</script>");

?>
</body>
</html>
