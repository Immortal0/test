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
if (empty($_SESSION['name'])) echo "Error";
else 
{




$login = $_SESSION['name'];
$tema = $_SESSION['temared'];
$votes = $_POST['vote'];


try{
$wtv = $DBH->prepare("SELECT * FROM vote WHERE tema='$tema'");
$wtv->execute();
$wtv->setFetchMode(PDO::FETCH_ASSOC);
$wtvote = $wtv->fetch();
}
catch(PDOException $e){
echo $e->getMessage();
}

echo $tema."<br>";

$v1 = $wtvote['v1'];
$v2 = $wtvote['v2'];
$v3 = $wtvote['v3'];
$v4 = $wtvote['v4'];
$v5 = $wtvote['v5'];
$ids = $wtvote['ids'];

/*echo $v1."<br>";
echo $v2."<br>";
echo $v3."<br>";
echo $v4."<br>";
echo $v5."<br>"; */
echo "<br>".$ids."<br>";

if (empty($v1)) $v1 = 0;
if (empty($v2)) $v2 = 0;
if (empty($v3)) $v3 = 0;
if (empty($v4)) $v4 = 0;
if (empty($v5)) $v5 = 0;

if ($votes == '1') 
{
echo $v1;
$v1 = $v1+1;
echo "<br>".$v1;
echo "<br>".$votes;
try {
$votein = $DBH->prepare("UPDATE vote SET v1='$v1' WHERE tema='$tema'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($votes == '2') 
{
echo $v2;
$v2 = $v2+1;
echo "<br>".$v2;
echo "<br>".$votes;
try {
$votein = $DBH->prepare("UPDATE vote SET v2='$v2' WHERE tema='$tema'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($votes == '3') 
{
echo $v3;
$v3 = $v3+1;
echo "<br>".$v3;
echo "<br>".$votes;
try {
$votein = $DBH->prepare("UPDATE vote SET v3='$v3' WHERE tema='$tema'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($votes == '4') 
{
echo $v4;
$v4 = $v4+1;
echo "<br>".$v4;
echo "<br>".$votes;
try {
$votein = $DBH->prepare("UPDATE vote SET v4='$v4' WHERE tema='$tema'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

if ($votes == '5') 
{
echo $v5;
$v5 = $v5+1;
echo "<br>".$v5;
echo "<br>".$votes;
try {
$votein = $DBH->prepare("UPDATE vote SET v5='$v5' WHERE tema='$tema'");
$votein->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
}

$ids = "$ids $login:$votes";
echo "<br>".$ids;
try {
$inuser = $DBH->prepare("UPDATE vote SET ids='$ids' WHERE tema='$tema'");
$inuser->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}

echo("<script>location.href='novunu.php?id=$tema'</script>");
}
?>
