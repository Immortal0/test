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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"
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


//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
 $sql = "SELECT * FROM post";
     $result = mysql_query($sql)  or die(mysql_error());
     while ($row = mysql_fetch_assoc($result))
     {
	$ulog = $row['login'];
	$islogin = mysql_query("SELECT id FROM my WHERE login='$ulog'");
	$roww = mysql_fetch_array($islogin);
	if (!empty($roww))
	{
	//$ylogin = $myav['']
	echo "<center>_________________________________<br><strong><font size = 20><a href='profil.php?login=$ulog'>".$row['login']."</a></strong></font><br></center>";
	}
else {
	echo "<center>_________________________________<br><strong><font size = 20>".$row['login']."</strong></font><br></center>";
	}
	$tena = $row['tema'];
	echo "<center><a href='novunu.php?id=$tena'>".$row['tema']."</a><br></center>";
	echo "<center>".$row['postn']."<br>_________________________________</center><br>";


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
echo $table1;

echo $nw;

 $sql = "SELECT * FROM post";
     $result = mysql_query($sql)  or die(mysql_error());
     while ($row = mysql_fetch_assoc($result))
     {
	$ulog = $row['login'];
	$islogin = mysql_query("SELECT id FROM my WHERE login='$ulog'");
	$roww = mysql_fetch_array($islogin);
	if (!empty($roww))
	{
	//$ylogin = $myav['']
	echo "<center>_________________________________<br><strong><font size = 20><a href='profil.php?login=$ulog'>".$row['login']."</a></strong></font><br></center>";
	}
else {
	echo "<center>_________________________________<br><strong><font size = 20>".$row['login']."</strong></font><br></center>";
	}
	$tena = $row['tema'];
	echo "<center><a href='novunu.php?id=$tena'>".$row['tema']."</a><br></center>";
	echo "<center>".$row['postn']."<br>_________________________________</center><br>";

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
$isredag = mysql_query("SELECT * FROM my WHERE login='$yyname'");
$isr = mysql_fetch_array($isredag);
if ($isr['rol'] == "adm" or $isr['rol'] == "red")
echo $kk;
}
?>
</body>
</html>
