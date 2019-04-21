<?php
include($_SERVER["DOCUMENT_ROOT"] . '/CRUD/Config.php');

class ReclamationC 
{
		function ajouterReclamation($reclamation)
		{
		$sql="INSERT INTO reclamation (Nom,Prenom,Identifiant,Num,Mail,Facture,Dat,Objet,Description,Etat,Note) VALUES (:nom,:prenom,:identifiant,:num,:mail,:facture,:dat,:objet,:description,:etat,:note)";
		$db = config::getConnexion();

        $req=$db->prepare($sql);
		
        $Nom=$reclamation->getNom();
        $Prenom=$reclamation->getPrenom();
        $Identifiant=$reclamation->getIdentifiant();
        $Num=$reclamation->getNum();
        $Mail=$reclamation->getMail();
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
		$req->bindValue(':mail',$Mail);
		$req->bindValue(':facture',$Facture);
		$req->bindValue(':dat',$Dat);
		$req->bindValue(':objet',$Objet);
		$req->bindValue(':description',$Description);
		$req->bindValue(':etat',$Etat);
		$req->bindValue(':note',$Note);
		
            $resultat=$req->execute();

       
        }

        function modifierReclamation($reclamation,$id1)
        {
		$sql="UPDATE reclamation SET Nom=:nom, Prenom=:prenom, Identifiant=:identifiant, Num=:num, Mail=:mail, Facture=:facture, Dat=:dat, Objet=:objet, Description=:description, Etat=:etat, Note=:note WHERE Identifiant=:id1";
		 
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try{		
        $req=$db->prepare($sql);
        $nom=$reclamation->getNom();
        $prenom=$reclamation->getPrenom();
        $identifiant=$reclamation->getIdentifiant();
        $num=$reclamation->getNum();
        $Mail=$reclamation->getMail();
        $facture=$reclamation->getFacture();
        $dat=$reclamation->getDate();
        $objet=$reclamation->getObjet();
        $description=$reclamation->getDescription();               
        $etat=$reclamation->getEtat();
        $note=$reclamation->getNote();
		$datas = array(':id1'=>$id1, ':nom'=>$nom, ':prenom'=>$prenom, ':identifiant'=>$identifiant, ':note'=>$note, ':num'=>$num, ':etat'=>$etat);
		$req->bindValue(':id1',$id1);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':identifiant',$identifiant);
		$req->bindValue(':num',$num);
		$req->bindValue(':mail',$Mail);
		$req->bindValue(':facture',$facture);
		$req->bindValue(':dat',$dat);
		$req->bindValue(':objet',$objet);
		$req->bindValue(':description',$description);
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

	function supprimerReclamation($id)
	{
		$sql="DELETE FROM reclamation WHERE Identifiant=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
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
		echo "Adresse mail: ".$reclamation->getMail()."<br>";
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
		echo "Adresse mail: ".$reclamation->getMail()."<br>";
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

	function recupererReclamation($id){
		$sql="SELECT * FROM reclamation WHERE Identifiant='$id'";
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