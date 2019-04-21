<?php  
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Entities/Commentaire.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/CommentaireC.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Entities/Utilisateur.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/UtilisateurC.php');

if (isset($_POST['com']) and isset($_SESSION['Identifiant']))
{
echo $_SESSION['l'];

$utilisateur1C=new UtilisateurC();
$resultat=$utilisateur1C->recupererUtilisateur($_SESSION['Identifiant']);
	foreach($resultat as $row)
	{
		$Nom=$row['nom'];
		$Prenom=$row['prenom'];
		$Identifiant=$row['identifiant'];
	}
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3

$commentaire1=new Commentaire($Nom,$Prenom,$Identifiant,$_POST['com']);

$commentaire1C=new CommentaireC();
$commentaireC->ajouterCommentaire($commentaire1);
header('Location: afficherCommentaire.php');
	
}else{
	echo "vérifier les champs";
}
?>