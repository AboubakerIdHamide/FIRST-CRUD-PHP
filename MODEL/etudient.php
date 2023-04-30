<?php
include "config.php";

class Etudiant{
    public $dataBase;

    function __construct($db)
    {
        $this->dataBase=$db;
    }

    function afficherEtudiants(){
        $res=$this->dataBase->query("SELECT * FROM etudient");
        $res=$res->fetchAll();
        return $res;
    }

    function ajouterEtudiant($code, $nom, $prenom, $adresse, $classe){
        $res=$this->dataBase->exec("INSERT INTO etudient(CodeEtudient, Nom, Prenom, Adresse, Classe) VALUES ('$code','$nom','$prenom','$adresse','$classe')");
        return $res;
    }

    function modifierEtudiant($oldCode, $newCode, $newNom, $newPrenom, $newAdresse, $newClasse){
        $res=$this->dataBase->exec("UPDATE etudient SET CodeEtudient='$newCode',Nom='$newNom',Prenom='$newPrenom',Adresse='$newAdresse',Classe='$newClasse' WHERE CodeEtudient=$oldCode;");
        return $res;
    }

    function rechercheEtudiant($critere, $valeur){
        switch($critere){
            case "code":
                $q="SELECT * FROM etudient WHERE CodeEtudient LIKE '%$valeur%' or CodeEtudient LIKE '%$valeur' or CodeEtudient LIKE '$valeur%'";
                break;
    
            case "nom":
                $q="SELECT * FROM etudient WHERE Nom LIKE '%$valeur%' or Nom LIKE '%$valeur' or Nom LIKE '$valeur%'";
                break;
    
            case "prenom":
                $q="SELECT * FROM etudient WHERE Prenom LIKE '%$valeur%' or Prenom LIKE '%$valeur' or Prenom LIKE '$valeur%'";
                break;
    
            case "adresse":
                $q="SELECT * FROM etudient WHERE Adresse LIKE '%$valeur%' or Adresse LIKE '%$valeur' or Adresse LIKE '$valeur%'";
                break;
    
            case "classe":
                $q="SELECT * FROM etudient WHERE Classe LIKE '%$valeur%' or Classe LIKE '%$valeur' or Classe LIKE '$valeur%'";
                break;
        }
    
        $res=$this->dataBase->query($q);
        $res=$res->fetchAll();
        return $res;
    }

    function suprimerEtudiant($codeTodelete){
        $res=$this->dataBase->exec("DELETE FROM etudient WHERE CodeEtudient='$codeTodelete'");
        return $res;
    }

    function trouverUniqueEtudiants($code){
        $res=$this->dataBase->query("SELECT * FROM etudient WHERE CodeEtudient='$code'");
        $res=$res->fetchAll();
        return $res;
    }

}
?>