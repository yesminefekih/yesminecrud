<?php  
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Entities/Reclamation.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/ReclamationC.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Entities/Utilisateur.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/UtilisateurC.php');

if (isset($_POST['adresse'])and isset($_POST['facture']) and isset($_POST['objet']) and isset($_POST['description'])){

$utilisateur1C=new UtilisateurC();
$resultat=$utilisateur1C->recupererUtilisateur($_POST['adresse']);
	foreach($resultat as $row)
	{
		$Nom=$row['nom'];
		$Prenom=$row['prenom'];
		$Identifiant=$row['identifiant'];
		$Num=$row['num'];
		$Mail=$row['mail'];
	}

$reclamation1=new Reclamation($Nom,$Prenom,$Identifiant,$Num,$Mail,$_POST['facture'],date("d.m.Y"),$_POST['objet'],$_POST['description'],0,"");

$reclamation1C=new ReclamationC();
$reclamation1C->ajouterReclamation($reclamation1);
header('Location: recureclamation.html');
	
}else{
	echo "vérifier les champs";
}
?>