<?php session_start(); ?>

<html>
<head>
<title>Test</title>
</head>
<body>
<?php

$name = $_SESSION['name'];
$mypost = $_POST['newpost'];
$myzag = $_POST['zag'];





//echo $mypost;

//echo $Npost;
//$_SESSION['pos'] = $myzag;
//$opf = fopen("novunu3.txt","a");
if (iconv_strlen($mypost) > 100)
{

echo "<br>100+<br>";
$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);
$fs = substr($mypost, 0, 100);
if ($fs) echo "<br>ny<br>";
$sf = $fs."... <a href=novunu.php?id=$myzag>read more</a>";
if ($sf) echo "<br>aga<br>";
if ($result = mysql_query ("INSERT INTO post (login,tema,post,postn) VALUES ('$name','$myzag','$mypost','$sf')",$db))
echo "<br>good";
}
else
{

echo "<br>100-<br>";
$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);
if ($result = mysql_query ("INSERT INTO post (login,tema,post,postn) VALUES ('$name','$myzag','$mypost','$mypost')",$db))
echo "<br>good";

}
//$fsss = filesize("$myzag.txt");
//echo $fsss;
//if (filesize("$myzag.html") < 150)

//$Npost = "______________________________________<br><br><font size=15><strong><center>".$_SESSION['name']."</strong></font></center><br>
//<center><strong><a href=$myzag.html>".$myzag."</a></strong><center>
//<center>".$mypost."<br>______________________________________</center>";
//if (fwrite($opf, $Npost))

//echo filesize("$myzag.txt");
//echo "daa";
//fclose($opf);
//fclose($fop);
//echo("<script>location.href='index.php'</script>");


//echo '<center><a href="autor.php">OK</a></center>';
//echo "OK";
//else

//echo "NONE";


//else

//while (!feof($fop))
//fclose($fop);
//if ($df = fopen("$myzag.html","rb"))
//echo "gaga";
//$nnovinu = fread($df, 150);


//$Npost = "______________________________________<br><br><font size=15><strong><center>".$_SESSION['name']."</strong></font></center><br>
//<center><strong><a href=$myzag.html>".$myzag."</a></strong><center>
//<center>".$nnovinu."...<a href=$myzag.html>more</a><br>______________________________________</center>";
//if (fwrite($opf, $Npost))

//echo "da";

//else

//echo "net";

//fclose($fop);
//fclose($opf);
echo("<script>location.href='index.php'</script>");

//echo '<center><a href="autor.php">ОК</a></center>';

?>
</body>
</html>
