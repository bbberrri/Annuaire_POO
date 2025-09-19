<?php

class Gerer
{
    private $pdo;
    public function __construct()
    {
        $this->pdo=PdoBridge::getPdoBridge();
    }
    public function accueil():void
    {
        $message="Ce site permet d'enregistrer les participants à une épreuve.";
        include("views/v_accueil.php");
    }
    public function lister()
    {
        $les_membres=$this->pdo->getLesMembres();
        require 'views/v_listemembres.php';
    }
    public function choisir():void
    {
        $les_membres = $this->pdo->getLesMembres();
        require 'views/v_choisirmembre.php';
    }
   
    public function saisir():void
    {
        require "views/v_nouveaumembre.php";
    }

    public function modifier():void
    {
        $id=$_REQUEST['id'];
        $unMembre=$this->pdo->getUnMembre($id);
        $unMembre=$unMembre[0];
        require "views/v_saisiemembre.php";
    }

    public function ajouterModif():void
    {
        $id = $_REQUEST['id'];
        $nouveauNom = $_REQUEST['nom'];
        $nouveauPrenom = $_REQUEST['prenom'];
        $this->pdo->updateMembre($id, $nouveauNom, $nouveauPrenom);
    }
    
    public function ajouter():void
    {
        $id = $this->pdo->getMaxId();
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $this->pdo->addUnMembre($id, $nom, $prenom);
    }

    public function error():void
    {
        $_SESSION["message_erreur"] = "Site en construction";
        include("views/404.php");
    }
}
