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
if ($_GET['val'] == 'revote')
{

$temare = $_SESSION['temared'];
$youname = $_SESSION['name'];

try {
$ivote = $DBH->prepare("SELECT * FROM vote WHERE tema='$temare'");
$ivote->execute();
$ivote->setFetchMode(PDO::FETCH_ASSOC);
$ifyv = $ivote->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}



$votest = $ifyv['ids'];
//echo $votest;
$votestr = explode(" ", $votest);
//echo "<br>".$votestr
$n=0;
while($n <= 1000)
{
$namevo = $votestr["$n"];
$namevote = substr($namevo, 0, -2);
if ($namevote == $youname) 
{
$mark = substr($namevo, -1);
unset($votestr["$n"]);
}
$n++;
}
$newvotestr = implode(" ", $votestr);
echo $newvotestr;

try {
$insids = $DBH->prepare("UPDATE vote SET ids='$newvotestr' WHERE tema='$temare'");
$insids->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
echo "yes<br>".$mark;



/* try{
$wtv = $DBH->prepare("SELECT * FROM vote WHERE tema='$tema'");
$wtv->execute();
$wtv->setFetchMode(PDO::FETCH_ASSOC);
$wtvote = $wtv->fetch();
}
catch(PDOException $e){
echo $e->getMessage();
} */

echo $temare."<br>";

$v1 = $ifyv['v1'];
$v2 = $ifyv['v2'];
$v3 = $ifyv['v3'];
$v4 = $ifyv['v4'];
$v5 = $ifyv['v5'];
$ids = $ifyv['ids'];

//echo "<br>$v1 $v2 $v3 $v4 $v5<br>";


if ($mark == '1') 
{
echo "bulo".$v1;
$v1 = $v1-1;
echo "<br>stalo".$v1;
echo "<br>".$mark;
try {
$votein = $DBH->prepare("UPDATE vote SET v1='$v1' WHERE tema='$temare'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($mark == '2') 
{
echo $v2;
$v2 = $v2-1;
echo "<br>".$v2;
echo "<br>".$mark;
try {
$votein = $DBH->prepare("UPDATE vote SET v2='$v2' WHERE tema='$temare'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($mark == '3') 
{
echo $v3;
$v3 = $v3-1;
echo "<br>".$v3;
echo "<br>".$mark;
try {
$votein = $DBH->prepare("UPDATE vote SET v3='$v3' WHERE tema='$temare'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($mark == '4') 
{
echo $v4;
$v4 = $v4-1;
echo "<br>".$v4;
echo "<br>".$mark;
try {
$votein = $DBH->prepare("UPDATE vote SET v4='$v4' WHERE tema='$temare'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($mark == '5') 
{
echo $v5;
$v5 = $v5-1;
echo "<br>".$v5;
echo "<br>".$mark;
try {
$votein = $DBH->prepare("UPDATE vote SET v5='$v5' WHERE tema='$temare'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}


echo("<script>location.href='novunu.php?id=$temare'</script>");


}
else
{
echo "yay";
$temare = $_SESSION['temared'];
$youname = $_SESSION['name'];
$zero = '0';
try {
$idvote = $DBH->prepare("UPDATE vote SET v1='$zero' , v2='$zero' , v3='$zero' , v4='$zero' , v5='$zero' , ids='' WHERE tema='$temare'");
$idvote->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}

echo "good";
echo "<script>location.href='novunu.php?id=$temare'</script>";
}
?>
</body>
</html>
