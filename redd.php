<?php session_start(); ?>

<?php

$deltem = $_SESSION['temared'];
$redp = $_GET['redp'];
$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);

echo $deltem;
echo "<br>haha";
$val = $_GET['submit'];
echo $val;
if ($val == "EditPost") 
{

if (iconv_strlen($redp) < 100)
{
if ($del = mysql_query("UPDATE post SET post='$redp' WHERE tema='$deltem' ",$db)) echo "<br>da1";
if ($del2 = mysql_query("UPDATE post SET postn='$redp' WHERE tema='$deltem' ",$db)) echo "<br>da1";
}
else
{
$fs = substr($redp, 0, 100);
if ($fs) echo "<br>ny<br>";
$sf = $fs."... <a href=novunu.php?id=$deltem>read more</a>";
if ($sf) echo "<br>aga<br>";
if ($del = mysql_query("UPDATE post SET post='$redp' WHERE tema='$deltem' ",$db)) echo "<br>da1";
if ($del2 = mysql_query("UPDATE post SET postn='$sf' WHERE tema='$deltem' ",$db)) echo "<br>da2";
}
}

echo("<script>location.href='index.php'</script>");

?>
