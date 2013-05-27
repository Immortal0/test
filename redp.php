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
echo $_GET['submit'];

$profiln = $_SESSION['profil'];
try {
$dbredpr = $DBH->prepare("SELECT * FROM my WHERE login='$profiln'");
$dbredpr->execute();
$dbredpr->setFetchMode(PDO::FETCH_ASSOC);
$myav2 = $dbredpr->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}

if (empty($_GET['submit']))
{

$newfname = $_POST['fname'];
$newlname = $_POST['lname'];
$newemail = $_POST['email'];
$newimg = $_FILES['photo']['tmp_name'];

if (empty($newfname)) 
$newfname = $myav2['name'];
if (empty($newlname))
$newlname = $myav2['Lname'];
if (empty($newemail))
$newemail = $myav2['email'];
if (empty($newimg))
{
$imagename = $myav2['image'];
//$newimg = $myav['image'];
}
else
{
$imagename = $myav2['login'];
echo $imagename;

function imageresize($outfile,$infile,$neww,$newh,$quality) {

    $im=imagecreatefromjpeg($infile);
    $im1=imagecreatetruecolor($neww,$newh);
    imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }

if (imageresize("$imagename.jpeg","$newimg",150,150,75)) echo "<br>NYYYYY!";
}
try {
$del = $DBH->prepare("UPDATE my SET name='$newfname' , Lname='$newlname' , email='$newemail' WHERE login='$profiln' ");
$del->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
$logg = $myav2['login'];
}
else
{
echo "voooo";
if ($_GET['submit'] == "make adm")

try { 
$redprof = $DBH->prepare("UPDATE my SET rol='adm' WHERE login='$profiln' ");
$redprof->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
 
echo "1<br>";
if ($_GET['submit'] == "make usr") 
try { 
$redprof = $DBH->prepare("UPDATE my SET rol='usr' WHERE login='$profiln' ");
$redprof->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
echo "2<br>";
if ($_GET['submit'] == "make red") 
try { 
$redprof = $DBH->prepare("UPDATE my SET rol='red' WHERE login='$profiln' ");
$redprof->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
echo "3<br>";
if ($_GET['submit'] == "make ban") 
try { 
$redprof = $DBH->prepare("UPDATE my SET rol='ban' WHERE login='$profiln' ");
$redprof->execute();
}
catch(PDOException $e) {
echo $e->getMessage();
}
echo "4<br>";
$logg = $myav2['login'];
}
echo("<script>location.href='profil.php?login=$logg'</script>");
?>
