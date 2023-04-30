<?php
include "config.php";

class Emprunt{
    public $dataBase;

    function __construct($db)
    {
        $this->dataBase=$db;
    }

    function afficherEmprunts(){
        $res=$this->dataBase->query("SELECT etudient.Nom, etudient.Prenom, livre.Titre, livre.Auteur, emprunter.DateEmprunt, etudient.CodeEtudient, livre.CodeLivre FROM emprunter INNER JOIN Livre ON emprunter.CodeLivre=livre.CodeLivre INNER JOIN etudient ON emprunter.CodeEtudiant=etudient.CodeEtudient");
        $res=$res->fetchAll();
        return $res;
    }

    function ajouterEmprunt($codeLivre, $codeEtudiant){
        $res=$this->dataBase->exec("INSERT INTO emprunter(CodeLivre, CodeEtudiant, DateEmprunt) VALUES ('$codeLivre','$codeEtudiant', '".date('y-m-d')."')");
        return $res;
    }

    function suprimerEmprunt($codeLivre, $codeEtudiant){
        $res=$this->dataBase->exec("DELETE FROM emprunter WHERE CodeLivre=$codeLivre AND CodeEtudiant=$codeEtudiant");
        return $res;
    }
}

?>