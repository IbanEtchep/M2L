<?php

class IntervenantManager extends  Model {


    public function  getIntervenantByMail(string $mail){
        $intervenant = null;
        $req = $this->getBdd()->prepare('SELECT * FROM INTERVENANT WHERE email=:email;');
        $req->bindValue(':email', $mail, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $intervenant = new Intervenant($data);
        }
        return $intervenant;
        $req->closeCursor();
    }

    public function getIntervenants(){
        return $this->getAll('INTERVENANT', 'Intervenant');
    }

    public function addIntervenant(string $nom, string $prenom, string $statut, ){

    }

    public function removeIntervenant(){

    }

    public function setFonctionToIntervenant(string $fonction){

    }

    public function getFonctions(){
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' . FONCTION . ';');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            echo print_r($data);
        }
        return $var;
        $req->closeCursor();
    }


    /*
     * MEMO
     * Ajouter fonct°:
     * INSERT INTO FONCTION (libelleF) VALUES ("Secrétaire");
     *
     * Ajouter intervenant
     * INSERT INTO INTERVENANT (nom, prenom, statut, idf, email, mdp) VALUES ("super", "user", "bénévole", (SELECT idF FROM FONCTION WHERE libelleF LIKE "Administrateur"), "test@test.fr", "$1$ZsUZMEag$hWSr7dALnRLSMEnmy1vaD0");
     */
}