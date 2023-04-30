CREATE DATABASE IF NOT EXISTS biblio;
USE biblio;
CREATE TABLE Etudient(CodeEtudient int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                      Nom varchar(255),
                      Prenom varchar(255),
                      Adresse varchar(255),
                      Classe varchar(255),
                      DateEmprunt date, 
                      FOREIGN KEY (DateEmprunt) REFERENCES Emprunter(DateEmprunt)
                      );

CREATE TABLE Livre(CodeLivre int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                      Titre varchar(255),
                      Auteur varchar(255),
                      DateEdtion date,
                      DateEmprunt date, 
                      FOREIGN KEY (DateEmprunt) REFERENCES Emprunter(DateEmprunt)
                      );

CREATE TABLE Emprunter(DateEmprunt date,
                       CodeLivre int,
                       CodeEtudiant int,
                       FOREIGN KEY (CodeLivre) REFERENCES Livre(CodeLivre),
                       FOREIGN KEY (CodeEtudiant) REFERENCES Etudient(CodeEtudient)
                        );
