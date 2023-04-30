<?php
include "../MODEL/config.php";
$message="";
$eror="_";
if(isset($_POST["searchType"])){
    $critere=$_POST["critere"];
    $valeur=$_POST["valeur"];
    if($_POST["searchType"]=="etudient"){
    
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
    
        $res=$db->query($q);
        $res=$res->fetchAll();
        if(count($res)!=0){
            echo "
            <table class='tResult'>
            <thead>
                        <tr>
                            <td>Code</td>
                            <td>Nom</td>
                            <td>Prenom</td>
                            <td>Adresse</td>
                            <td>Classe</td>
                        </tr>
            </thead>
            <tbody>";
            foreach($res as $i){
                    echo "<tr>";
                    echo "<td>".$i["CodeEtudient"]."</td>";
                    echo "<td>".$i["Nom"]."</td>";
                    echo "<td>".$i["Prenom"]."</td>";
                    echo "<td>".$i["Adresse"]."</td>";
                    echo "<td>".$i["Classe"]."</td>";
                    echo "</tr>";
            } 
            echo "</tbody>
            </table>";
        }else{
            echo "Aucun resultat.";
        }

    }else{

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

        $res=$db->query($q);
        $res=$res->fetchAll();
        if(count($res)!=0){
            $eror=false;
            $message="Voici les resultat .";
            echo "
            <table class='tResult'>
            <thead>
                        <tr>
                            <td>Code</td>
                            <td>Titre</td>
                            <td>Auteur</td>
                            <td>Date de edtion</td>
                        </tr>
            </thead>
            <tbody>";
            foreach($res as $i){
                echo "<tr>";
                echo "<td>".$i["CodeLivre"]."</td>";
                echo "<td>".$i["Titre"]."</td>";
                echo "<td>".$i["Auteur"]."</td>";
                echo "<td>".$i["DateEdtion"]."</td>";
                echo "</tr>";
            } 
            echo "</tbody>
            </table>";
        }else{
            echo "Aucun resultat.";
        }

    }

}      
?>