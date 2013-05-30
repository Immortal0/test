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

echo $lang;

if (empty($_SESSION['name']))
{
echo $table;
}
else
{
echo $table1;
}



$temas = $_GET['id'];
//echo $temas;
$_SESSION['temared'] = "$temas";
$youname = $_SESSION['name'];
//$db = mysql_connect ("localhost","Mybase","qwerty55");
//mysql_select_db ("mybase",$db);
//$sqltem = "SELECT * FROM post WHERE tema='$tema'";
try {
$dbtema = $DBH->prepare("SELECT * FROM post WHERE tema='$temas'");
$dbtema->execute();

$dbtema->setFetchMode(PDO::FETCH_ASSOC);
$row = $dbtema->fetch();

}
catch(PDOException $e) {
echo $e->getMessage();
}

if ($_SESSION['lang'] == "en")
$hnov = $row['post'];
else 
$hnov = $row['postua'];

echo "<center><strong><font size=5>".$row['tema']."</font></strong></center>";	
echo "<center>".$hnov."</center>";


$autorp = $row['login'];

if ($_SESSION['name'] == "$autorp" or $_SESSION['name'] == "Admin" )
{
echo "<center><form action='redpost.php' method='GET'>
<input type='submit' name='val' value='Edit'>
</form>
";
echo "<form action='delpost.php' method='GET'>
<input type='submit' name='val' value='Delete'>
</form></center>";
}
else
{
echo "";
}
try 
{
$coments = $DBH->prepare("SELECT * FROM coments WHERE post ='$temas' ");
$coments->execute();
$coments->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
echo $e->getMessage(); 
}

try {
$ifvote = $DBH->prepare("SELECT * FROM vote WHERE tema='$temas'");
$ifvote->execute();
$ifvote->setFetchMode(PDO::FETCH_ASSOC);
$ifyv = $ifvote->fetch();
}
catch(PDOException $e) {
echo $e->getMessage();
}

if (empty($_SESSION['name'])) {
$m1 = $ifyv['v1'];
$m2 = $ifyv['v2'];
$m3 = $ifyv['v3'];
$m4 = $ifyv['v4'];
$m5 = $ifyv['v5'];
$votestat = ($m1*1+$m2*2+$m3*3+$m4*4+$m5*5)/($m1+$m2+$m3+$m4+$m5);
$countv = ($m1+$m2+$m3+$m4+$m5);
if ($votestat == "") echo "<center><em><br><font size=2>".$noval."</font></em></center>";
else echo "<center><em><br><font size=2>".$vom." = ".$votestat."<br>".$votesall." = ".$countv."</font></em></center>";
}

else
{

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
$arevote=TRUE;
$yovote = substr($namevo, -1);
}
$n++;
}
if ($arevote==TRUE) 
{
echo "";
$m1 = $ifyv['v1'];
$m2 = $ifyv['v2'];
$m3 = $ifyv['v3'];
$m4 = $ifyv['v4'];
$m5 = $ifyv['v5'];
//echo "$m1 $m2 $m3 $m4 $m5";
$votestat = ($m1*1+$m2*2+$m3*3+$m4*4+$m5*5)/($m1+$m2+$m3+$m4+$m5);
$countv = ($m1+$m2+$m3+$m4+$m5);
echo "<center><em><br><font size=2>".$tyforvote."<br>".$voyoum." = ".$yovote."<br>".$vom." = ".$votestat."<br>".$votesall." = ".$countv."</font></em></center>";
echo "<center><form action='revote.php' method='get'>
<input type='submit' name=val value=revote></center>
</form>
";

}
else {
$m1 = $ifyv['v1'];
$m2 = $ifyv['v2'];
$m3 = $ifyv['v3'];
$m4 = $ifyv['v4'];
$m5 = $ifyv['v5'];
$votestat = ($m1*1+$m2*2+$m3*3+$m4*4+$m5*5)/($m1+$m2+$m3+$m4+$m5);
$countv = ($m1+$m2+$m3+$m4+$m5);
if ($votestat == "") echo "<center><em><br><font size=2>".$noval."</font></em></center>";
else echo "<center><em><br><font size=2>".$vom." = ".$votestat."<br>".$votesall." = ".$countv."</font></em></center>";
echo $voteyou;
}

$who = $_SESSION['name'];
try {
$ifadm = $DBH->prepare("SELECT * FROM my WHERE login='$who'");
$ifadm->execute();
$ifadm->setFetchMode(PDO::FETCH_ASSOC);
$isadm = $ifadm->fetch();

}
catch(PDOException $e) {
echo $e->getMessage(); 
}
$whois = $isadm['rol'];
if ($whois == "adm")
{
echo "<center><form action='revote.php' method='get'>
<input type='submit' name=val value=delvote>
</form></center>
";
}


echo $posycom; /* "<center><br><h4>Post you comment</h4><form action='coments.php' method='GET'>
head<input type='text' name='zagc'><br>
<textarea cols=50 rows=5 name='coment'>
</textarea><br>
<input type=submit value=coment name=submit></center>
</form>
"; */
}
echo "<center>".str_repeat('_',50)."</center>";
echo "<center><h3>".$comeny."</h3></center>";
echo "<center>".str_repeat('_',50)."</center>";
while($rowc = $coments->fetch())
{
$logincom = $rowc['name'];
echo "<center><font size=2>".$rowc['date']."</font></center>";
echo "<center><strong><a href='profil.php?login=$logincom'>".$rowc['name']."</a></strong>";
echo "<br><strong>head: </strong><em>".$rowc['head']."</em>";
echo "<br>".$rowc['coment']."</center><br><br>";
$idcom = $rowc['id'];



if ($whois == "adm")
{
echo "<center><form action='delpost.php' method='GET'>
<input type='hidden' name='idc' value='$idcom'> 
<input type='submit' name='val' value='Delcoment'>
</form></center></center><br><br>";
}
else echo " ";
}
?>
</body>
</html>
