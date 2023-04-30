<?php
include "config.php";

class Livre{
    public $dataBase;

    function __construct($db)
    {
        $this->dataBase=$db;
    }

    function afficherLivres(){
        $res=$this->dataBase->query("SELECT * FROM livre");
        $res=$res->fetchAll();
        return $res;
    }

    function ajouterLivre($code, $titre, $auteur, $dateEdtion){
        $res=$this->dataBase->exec("INSERT INTO livre(CodeLivre, Titre, Auteur, DateEdtion) VALUES ('$code','$titre','$auteur','$dateEdtion')");
        return $res;
    }

    function modifierLivre($oldCode, $newCode, $newTitre, $newAuthor, $newdateEdtion){
        $res=$this->dataBase->exec("UPDATE livre SET CodeLivre='$newCode',Titre='$newTitre',Auteur='$newAuthor',DateEdtion='$newdateEdtion' WHERE CodeLivre='$oldCode'");
        return $res;
    }

    function rechercheLivre($critere, $valeur){
        switch($critere){
            case "code":
                $q="SELECT * FROM livre WHERE CodeLivre LIKE '%$valeur%' or CodeLivre LIKE  '%$valeur' or CodeLivre LIKE '$valeur%'";
                break;

            case "titre":
                $q="SELECT * FROM livre WHERE Titre LIKE '%$valeur%' or Titre LIKE  '%$valeur' or Titre LIKE '$valeur%'";
                break;

            case "auteur":
                $q="SELECT * FROM livre WHERE Auteur LIKE '%$valeur%' or Auteur LIKE '%$valeur' or Auteur LIKE '$valeur%'";
                break;

            case "dateEdition":
                $q="SELECT * FROM livre WHERE DateEdtion LIKE '%$valeur%' or DateEdtion LIKE '%$valeur' or DateEdtion LIKE '$valeur%'";
                break;
        }
    
        $res=$this->dataBase->query($q);
        $res=$res->fetchAll();
        return $res;
    }

    function suprimerLivre($codeTodelete){
        $res=$this->dataBase->exec("DELETE FROM livre  WHERE CodeLivre='$codeTodelete'");
        return $res;
    }

    function trouverUniqueLivre($code){
        $res=$this->dataBase->query("SELECT * FROM livre WHERE CodeLivre='$code'");
        $res=$res->fetchAll();
        return $res ;
    }

}


?>
