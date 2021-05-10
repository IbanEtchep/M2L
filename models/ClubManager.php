<?php


class ClubManager extends Model
{

    public function getClubs(): array
    {
        return $this->getAll('CLUB', 'Club');
    }

    public function getClubByName(string $clubName): ?Club {
        $intervenant = null;
        $req = $this->getBdd()->prepare('SELECT * FROM CLUB WHERE nomClub=:clubName;');
        $req->bindValue(':clubName', $clubName, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $intervenant = new Club($data);
        }
        return $intervenant;
        $req->closeCursor();
    }

    public function updateClub(Club $club){
        $req = $this->getBdd()->prepare('UPDATE CLUB SET nomClub=? , adresseClub=?, idL=? WHERE idCL=?');
        $req->execute(Array($club->getNomClub(), $club->getAdresseClub(), $club->getIdL(), $club->getIdCl()));
        $req->closeCursor();
    }

    public function deleteClub(Club $club){
        $req = $this->getBdd()->prepare('DELETE FROM CLUB WHERE idCL=?');
        $req->execute(Array($club->getIdCl()));
        $req->closeCursor();
    }

    public function addClub(string $name, string $adresse, $idL){
        $req = $this->getBdd()->prepare('INSERT INTO CLUB (nomClub, adresseClub, idL) VALUES (?, ? ,?)');
        $req->execute(Array($name, $adresse, $idL));
        $req->closeCursor();
    }

    public function getLigueClubs(int $idL){

        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM CLUB WHERE idL=:idL;');
        $req->bindValue(':idL', $idL, PDO::PARAM_STR);
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[] = new Club($data);
        }
        return $var;
        $req->closeCursor();
    }


}