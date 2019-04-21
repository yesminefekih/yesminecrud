<?php
class Commentaire
{
	private $nom;
	private $prenom;
	private $id;
	private $id_prod;
	private $com;

	function __construct($nom,$prenom,$identifiant,$identifiant_prod,$com){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->id=$identifiant;
		$this->id_prod=$identifiant_prod;
		$this->com=$com;
	}
	
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getid(){
		return $this->id;
	}
	function getidprod(){
		return $this->id_prod;
	}
	function getcom(){
		return $this->com;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function setprenom($prenom){
		$this->prenom=$prenom;
	}
	function setid($identifiant){
		$this->id=$identifiant;
	}
	function setidprod($identifiant){
		$this->id_prod=$identifiant;
	}
	function setcom($com){
		$this->com=$com;
	}
}
?>