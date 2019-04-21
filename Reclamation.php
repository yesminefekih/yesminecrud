<?php
class Reclamation{
	private $Nom;
	private $Prenom;
	private $Identifiant;
	private $Num;
	private $Mail;
	private $Facture;
	private $Dat;
	private $Objet;
	private $Description;
	private $Etat;
	private $Note;
	function __construct($nom,$prenom,$identifiant,$num,$mail,$facture,$dat,$objet,$description,$etat,$note){
		$this->Nom=$nom;
		$this->Prenom=$prenom;
		$this->Identifiant=$identifiant;
		$this->Num=$num;
		$this->Mail=$mail;
		$this->Facture=$facture;
		$this->Dat=$dat;
		$this->Objet=$objet;
		$this->Description=$description;
		$this->Etat=$etat;
		$this->Note=$note;
	}
	
	function getNom(){
		return $this->Nom;
	}
	function getPrenom(){
		return $this->Prenom;
	}
	function getIdentifiant(){
		return $this->Identifiant;
	}
	function getNum(){
		return $this->Num;
	}
	function getMail(){
		return $this->Mail;
	}
	function getFacture(){
		return $this->Facture;
	}
	function getDate(){
		return $this->Dat;
	}
	function getObjet(){
		return $this->Objet;
	}
	function getDescription(){
		return $this->Description;
	}
	function getEtat(){
		return $this->Etat;
	}
	function getNote(){
		return $this->Note;
	}

	function setNom($nom){
		$this->Nom=$nom;
	}
	function setPrenom($prenom){
		$this->Prenom=$prenom;
	}
	function setIdentifiant($identifiant){
		$this->Identifiant=$identifiant;
	}
	function setNum($num){
		$this->Num=$num;
	}
	function setMail($mail){
		$this->Mail=$mail;
	}
	function setFacture($facture){
		$this->Facture=$facture;
	}
	function setDate($dat){
		$this->Dat=$dat;
	}
	function setObjet($objet){
		$this->Objet=$objet;
	}
	function setDescription($description){
		$this->Description=$description;
	}
	function setEtat($etat){
		$this->Etat=$etat;
	}
	function setNote($note){
		$this->Note=$note;
	}
}

?>