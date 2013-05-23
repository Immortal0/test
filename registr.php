<?php session_start(); ?>
<?php
if ($_SESSION['lang'] == "en")
{
Include("IdentEN.txt");
}
else
{
Include("Ident.txt");
}
$email = $_POST["email"];
//$src = imagecreatefromjpeg( $_FILES['image']['tmp_name']);
$img = $_FILES['image']['tmp_name'];
$email = $_POST["email"];
$name = $_POST["Fname"];
$fname = $_POST["yname"];
$sname = $_POST["Lname"];
$pass = $_POST["pass"];
$dat = $_POST["menu"];
$mon = $_POST["menu2"];
$age = $_POST["age"];
$r = 2013;
$v = $r - $age;
?>

<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
//echo $table;
if ($name == "" or $pass == "" or $email == "")
{
echo $al;
}
else
{
$name = stripslashes($name);
$name = htmlspecialchars($name);
$name = trim($name);
$pass = stripslashes($pass);
$pass = htmlspecialchars($pass);
$pass = trim($pass);
$datereg = date("d.m.Y");
$datejoin = date("d.m.Y H:i:s");





//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);


$exist = mysql_query("SELECT * FROM my WHERE login='$name'",$db);
$ex = mysql_fetch_array($exist);

if (!empty($ex['id']))
{
echo $table;
echo $esn;
}
else
{

$exist2 = mysql_query("SELECT * FROM my WHERE email='$email'",$db);
$ex2 = mysql_fetch_array($exist2);
if (!empty($ex2['login']))
{
echo $table;
echo "This Email already exist in our database";
}
else
{

//if( !empty( $_FILES['image']['name'] ) ) {
 // if ( $_FILES['image']['error'] == 0 ) {
   // if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
$imagename = $name;
//echo $imagename;
//$re = opendir('images');
function imageresize($outfile,$infile,$neww,$newh,$quality) {

    $im=imagecreatefromjpeg($infile);
    $im1=imagecreatetruecolor($neww,$newh);
    imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
    }

imageresize("$imagename.jpeg","$img",150,150,75);
//if (imagejpeg($src, "$imagename.jpeg")) echo "<br>daaaaaaaaa";
//else echo "netttt";
//rename("ua.php", "/images/ua.php");
//copy('./ua.php', './images/ua.php');

 $result = mysql_query ("INSERT INTO my (login,password,Lname,email,image,name,rol,dater,datel) VALUES ('$name','$pass','$sname','$email','$imagename.jpeg','$fname','usr','$datereg','$datejoin')",$db);
//echo $result;
 if ($result == TRUE)
{
$_SESSION['name'] = $name;
echo "<a href='index.php'><center>Home</center></a>";
echo $tyr;


}
else
{
echo "no";
}
}
}
}
//$file = fopen("$name.txt",w);
//fwrite($file,$pass)
//echo $file;

//$f = fopen("file2.txt","a");
//$cont = fgets("file2.txt",filesize("file2.txt"));
//echo $cont;
?>
</body>
</html>
