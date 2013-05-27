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
echo $lang;
if (empty($_SESSION['name']))
echo $table;
else
echo $table1;








$uname = $_GET['login']; 
$yname = $_SESSION['name'];

try {
$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);


$STH = $DBH->prepare("SELECT * FROM my WHERE login='$uname'");  
$STH->execute();

$STH->setFetchMode(PDO::FETCH_ASSOC);
$myav = $STH->fetch();

}
catch(PDOException $e) {  
    echo $e->getMessage();  
}






echo "<center><font size=6><strong><br><br>".$prosit."</strong></font><br>";
$myavatar = $myav['image'];
echo "<img src='$myavatar'><br>";
echo "<strong>".$losit."</strong>".$myav['login']."<br><br>";
echo "<strong>".$nasit."</strong>".$myav['name']."<br><br>";
echo "<strong>".$lnasit."</strong>".$myav['Lname']."<br><br>";
echo "<strong>".$emsit."</strong>".$myav['email']."<br><br>";
echo "<strong>".$dresit."</strong>".$myav['dater']."<br></center>";
$pattern = "/\d{2}/";
$str = $myav['datel'];
$matches = preg_match_all($pattern,$str,$resu);
//for ($i=0;$i<$matches;$i++)
$minut = $resu[0][5];
$hour = $resu[0][4];
$day = $resu[0][0];
$sec = $resu[0][6];
//$aaa = date('i');
//echo $aaa - $minut;
echo $ttt; 
//echo "$day$hour$minut";
if (date("y") == $resu[0][3])
{
if (date("m") == $resu[0][1])
{
if (date("d") - $day == 0) //$timen = date("H") - $hour." hour";
	{
	if (date("H") - $hour == 0) //$timen = date("i") - $minut." minutes";
		{
		if(date("i") - $minut == 0) $timen = date("s") - $sec." $secsit";
		else $timen = date("i") - $minut." $minsit";
		}
	else $timen = date("H") - $hour." $housit";
	}
else $timen = date("d") - $day." $daysit";
}
}
if ($timen == "") echo "<center><strong>".$ljsit."</strong>".$myav['datel']."<br></center>";
else echo "<center><strong>".$ljsit."</strong>".$timen." ".$agosit."</center>";

$ifadmine = $_SESSION['name'];
try {
$resules = $DBH->prepare("SELECT * FROM my WHERE login='$ifadmine'");
$resules->setFetchMode(PDO::FETCH_ASSOC);
$resules->execute();
$ifadm = $resules->fetch();
}
catch(PDOException $e) {
echo $e>getMessage();
}
$isadm = $ifadm['rol'];

$autorp = $myav['login'];
$_SESSION['profil'] = $autorp;
$myrol = "adm";
//echo $isadm;
if ($_SESSION['name'] == "$autorp" or $isadm == "$myrol" )
{
echo "<center><form action='redprof.php' method='GET'>
<input type='submit' name='val' value='Editdp'>
</form>
";
echo "<form action='delprof.php' method='GET'>
<input type='submit' name='val' value='Deletep'>
</form></center>";
}
else
{
echo "";
}
if ($isadm == "$myrol")
echo "<center><a href=users.php>".$usesit."</a></center>";

?>
</body>
</html>
