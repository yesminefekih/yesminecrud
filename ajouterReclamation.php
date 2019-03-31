<?php  
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Entities/Reclamation.php');
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/ReclamationC.php');

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['id']) and isset($_POST['num']) and isset($_POST['facture']) and isset($_POST['dat']) and isset($_POST['description']) and isset($_POST['description'])){
$reclamation1=new Reclamation($_POST['nom'],$_POST['prenom'],$_POST['id'],$_POST['num'],$_POST['facture'],$_POST['dat'],$_POST['objet'],$_POST['description'],0,"");
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$reclamation1C=new ReclamationC();
$reclamation1C->ajouterReclamation($reclamation1);
header('Location: index.html');
	
}else{
	echo "vérifier les champs";
}
?>