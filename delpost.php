<?php session_start(); ?>

<?php

$deltem = $_SESSION['temared'];

$db = mysql_connect ("localhost","Mybase","qwerty55");
mysql_select_db ("mybase",$db);

echo $deltem;
echo "<br>haha";
$val = $_GET['val'];
echo $val;
if ($val == "Delete") 
$del = mysql_query("DELETE FROM post WHERE tema='$deltem'",$db);
if ($del)
{ 
echo "<br>yep";
echo("<script>location.href='index.php'</script>");
}
?>
