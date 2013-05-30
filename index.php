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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
<title>Test</title>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
</head>
<body>
<?php
if (empty($_SESSION['name']))
{
echo $yjnn;

echo $lang;
echo $table;

echo $fs;
echo $nw;

$host = "localhost";
$dbname = "mybase";
$user = "Mybase";
$pass = "qwerty55";

try {

$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

}

catch(PDOException $e) {
echo $e->getMessage();
}

try
{
 $sql = $DBH->prepare("SELECT * FROM post");
 $sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
echo $e->getMessage();
}
//$sss = $sql->fetch();
//echo $sss['login'];
        while ($row = $sql->fetch())

     {
if ($_SESSION['lang'] == "en")
$hnov = $row['postn'];
else 
$hnov = $row['postnua'];

	$ulog = $row['login'];
try {
	$islogin = $DBH->prepare("SELECT id FROM my WHERE login='$ulog'");
	$islogin->execute();
	$islogin->setFetchMode(PDO::FETCH_ASSOC);
	$roww = $islogin->fetch();
}
catch(PDOException $e) { 
echo $e->getMessage(); 
}
	if (!empty($roww))
	{
	//$ylogin = $myav['']
	echo "<center>".str_repeat("_",50)."<br><strong><font size = 20><a href='profil.php?login=$ulog'>".$row['login']."</a></strong></font><br></center>";
	}
else {
	echo "<center>".str_repeat("_",50)."<br><strong><font size = 20>".$row['login']."</strong></font><br></center>";
	}
	$tena = $row['tema'];
	echo "<center><a href='novunu.php?id=$tena'>".$row['tema']."</a><br></center>";
	echo "<center>".$hnov."<br>".str_repeat("_",50)."</center><br>";

}
//$novop = fopen("novunu3.txt","a+");
//if ($novop)

//while (!feof($novop))

//$novinu = fgets($novop, 999);
//echo "<center>".$novinu."</center>";


//else 

//echo "fuuu";

//fclose($novop);
}
else
{
echo $yjn;

//$db = mysql_connect("localhost", "Mybase", "qwerty55") or die("Could not connect to MySQL server!");
//mysql_select_db("my",$db);
  



//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);


//$yname = $_SESSION['name'];
//$sqlmy = "SELECT * FROM my WHERE login='$yname'";
//$result2 = mysql_query($sqlmy);
//$myav = mysql_fetch_array($result2);
//$myava = $myav['image'];
//echo $myava;
echo $lang;
echo $table1;



echo $nw;
try
{
 $sql = $DBH->prepare("SELECT * FROM post");
 $sql->execute();
$sql->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
echo $e->getMessage();
}
//$sss = $sql->fetch();
//echo $sss['login'];


        while ($row = $sql->fetch())
     {
if ($_SESSION['lang'] == "en")
$hnov = $row['postn'];
else 
$hnov = $row['postnua'];

	$ulog = $row['login'];
try {
	$islogin = $DBH->prepare("SELECT id FROM my WHERE login='$ulog'");
	$islogin->execute();
	$islogin->setFetchMode(PDO::FETCH_ASSOC);
	$roww = $islogin->fetch();
}
catch(PDOException $e) { 
echo $e->getMessage(); 
}
	if (!empty($roww))
	{
	//$ylogin = $myav['']
	echo "<center>".str_repeat("_",50)."<br><strong><font size = 20><a href='profil.php?login=$ulog'>".$row['login']."</a></strong></font><br></center>";
	}
else {
	echo "<center>".str_repeat("_",50)."<br><strong><font size = 20>".$row['login']."</strong></font><br></center>";
	}
	$tena = $row['tema'];
	echo "<center><a href='novunu.php?id=$tena'>".$row['tema']."</a><br></center>";
	echo "<center>".$hnov."<br>".str_repeat("_",50)."</center><br>";

}
//$novop = fopen("novunu3.txt","a+");
//if ($novop)

//while (!feof($novop))

//$novinu = fgets($novop, 999);
//echo "<center>".$novinu."</center>";


//else 

//echo "fuuuuu";

//fclose($novop);
$yyname = $_SESSION['name'];
try
{
$isredag = $DBH->prepare("SELECT * FROM my WHERE login='$yyname'");
$isredag->execute();
$isredag->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
echo $e->getMessage(); }
$isr = $isredag->fetch();
if ($isr['rol'] == "adm" or $isr['rol'] == "red")
echo $kk;
}
?>
</body>
</html>
