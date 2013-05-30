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




$datenow = date("H.j.s d:m:Y");
$post = $_SESSION['temared'];
$name = $_SESSION['name'];
$head = $_GET['zagc'];
$coment = $_GET['coment'];

if (empty($head))
$head = implode(array_slice(explode("<br>",wordwrap($coment,15,"<br>",TRUE)),0,1));

try {
$coments = $DBH->prepare("INSERT INTO coments (post, name, coment, head, date) VALUES ('$post', '$name', '$coment', '$head', '$datenow')");
$coments->execute();

}
catch(PDOException $e) {
echo $e->getMessage();
}
//echo "good";
echo"<script>location.href='novunu.php?id=$post'</script>"; 
}
?>

</body>
</html>
