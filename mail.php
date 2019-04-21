<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
if(isset($_POST['submitt']))
{
$to='yesmine.feki@esprit.tn';
$sujet='test';
	$text=$_POST['text'];
	$header='From : hamza.ennour@esprit.tn';
	$resultat=mail($to, $sujet, $text,$header);
if($resultat)
{
	echo "mail sent";
}
else{echo "non";}

}
?>
<form action="" method="post">
	<textarea name="text" rows="5" cols="30"></textarea><br>
	<input type="submit" name="submit" value="envoyer">
	
</form>
</body>
</html>