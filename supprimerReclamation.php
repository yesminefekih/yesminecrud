<?PHP
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Core/ReclamationC.php');
$reclamationC=new ReclamationC();
if (isset($_POST["Identifiant"])){
	$reclamationC->supprimerReclamation($_POST["Identifiant"]);
	header('Location: afficherReclamation.php');
}

?>