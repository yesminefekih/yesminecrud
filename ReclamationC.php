<?php
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Config.php');
class ReclamationC 
{
		function ajouterReclamation($reclamation)
		{
		$sql="INSERT INTO reclamation (Nom,Prenom,Identifiant,Num,Facture,Dat,Objet,Description,Etat,Note) VALUES (:nom,:prenom,:identifiant,:num,:facture,:dat,:objet,:description,:etat,:note)";
		$db = config::getConnexion();

        $req=$db->prepare($sql);
		
        $Nom=$reclamation->getNom();
        $Prenom=$reclamation->getPrenom();
        $Identifiant=$reclamation->getIdentifiant();
        $Num=$reclamation->getNum();
        $Facture=$reclamation->getFacture();
        $Dat=$reclamation->getDate();
        $Objet=$reclamation->getObjet();
        $Description=$reclamation->getDescription();
        $Etat=0;
        $Note="";
		$req->bindValue(':nom',$Nom);
		$req->bindValue(':prenom',$Prenom);
		$req->bindValue(':identifiant',$Identifiant);
		$req->bindValue(':num',$Num);
		$req->bindValue(':facture',$Facture);
		$req->bindValue(':dat',$Dat);
		$req->bindValue(':objet',$Objet);
		$req->bindValue(':description',$Description);
		$req->bindValue(':etat',$Etat);
		$req->bindValue(':note',$Note);
		
            $resultat=$req->execute();

       
        }

        function modifierReclamation($reclamation,$id)
        {
		$sql="UPDATE reclamation SET Etat=:etat,Note=:note WHERE Identifiant=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try{		
        $req=$db->prepare($sql);
        $etat=$reclamation->getEtat();
        $note=$reclamation->getNote();
		$datas = array(':id'=>$id, ':note'=>$note, ':etat'=>$etat);
		$req->bindValue(':id',$id);
		$req->bindValue(':etat',$etat);
		$req->bindValue(':note',$note);
		
            $sql=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
        echo " Erreur ! ".$e->getMessage();
   		echo " Les datas : " ;
  		print_r($datas);
        }
		
	}

	function supprimerReclamation($reclamation)
	{
		$sql="DELETE FROM reclamation WHERE Identifiant=:id,Facture=facture";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
        $id=$reclamation->getIdentifiant();
        $facture=$reclamation->getFacture();
		$req->bindValue(':id',$id);
		$req->bindValue(':facture',$facture);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficherReclamationAdmin ($reclamation)
	{
		echo "Nom: ".$reclamation->getNom()."<br>";
		echo "Prénom: ".$reclamation->getPrenom()."<br>";
		echo "Identifiant client: ".$reclamation->getIdentifiant()."<br>";
		echo "Num° de téléphone: ".$reclamation->getNum()."<br>";
		echo "Num° de facture: ".$reclamation->getFacture()."<br>";
		echo "Date: ".$reclamation->getDate()."<br>";
		echo "Objet: ".$reclamation->getObjet()."<br>";
		echo "Description: ".$reclamation->getDescription()."<br>";
		echo "Etat: ".$reclamation->getEtat()."<br>";
		echo "Note: ".$reclamation->getNote()."<br>";
	}
	function afficherReclamationClient ($reclamation)
	{
		echo "Nom: ".$reclamation->getNom()."<br>";
		echo "Prénom: ".$reclamation->getPrenom()."<br>";
		echo "Identifiant client: ".$reclamation->getIdentifiant()."<br>";
		echo "Num° de téléphone: ".$reclamation->getNum()."<br>";
		echo "Num° de facture: ".$reclamation->getFacture()."<br>";
		echo "Date: ".$reclamation->getDate()."<br>";
		echo "Objet: ".$reclamation->getObjet()."<br>";
		echo "Description: ".$reclamation->getDescription()."<br>";
	}

	function afficherReclamations()
	{
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SELECT * FROM reclamation ORDER BY Dat ASC";
		$db = config::getConnexion();
		$req=$db->prepare($sql);	
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function recupererEmploye($id){
		$sql="SELECT * from reclamation where Identifiant=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>