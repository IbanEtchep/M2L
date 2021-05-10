<?php


class LigueManager extends Model
{

    public function getLigues(): array
    {
        return $this->getAll('LIGUE', 'Ligue');

    }

    public function getLigueByName(string $ligueName): ?Ligue {
        $intervenant = null;
        $req = $this->getBdd()->prepare('SELECT * FROM LIGUE WHERE nomLigue=:ligueName;');
        $req->bindValue(':ligueName', $ligueName, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $intervenant = new Ligue($data);
        }
        return $intervenant;
        $req->closeCursor();
    }

    public function getLigueById(int $id): ?Ligue {
        $intervenant = null;
        $req = $this->getBdd()->prepare('SELECT * FROM LIGUE WHERE idL=:idL;');
        $req->bindValue(':idL', $id, PDO::PARAM_STR);
        $req->execute();
        if($data = $req->fetch(PDO::FETCH_ASSOC)){
            $intervenant = new Ligue($data);
        }
        return $intervenant;
        $req->closeCursor();
    }

    public function updateLigue(Ligue $ligue){
        $req = $this->getBdd()->prepare('UPDATE LIGUE SET nomLigue=? , descriptifLigue=?, siteLigue=? WHERE idL=?');
        $req->execute(Array($ligue->getNomLigue(), $ligue->getDescriptifLigue(), $ligue->getSiteLigue(), $ligue->getIdL()));
        $req->closeCursor();
    }

    public function deleteLigue(Ligue $ligue){
        $req = $this->getBdd()->prepare('DELETE FROM LIGUE WHERE idL=?');
        $req->execute(Array($ligue->getIdL()));
        $req->closeCursor();
    }

    public function addLigue(string $name, string $desc, string $site){
        $req = $this->getBdd()->prepare('INSERT INTO LIGUE (nomLigue, siteLigue, descriptifLigue) VALUES (?, ? ,?)');
        $req->execute(Array($name, $desc, $site));
        $req->closeCursor();
    }


}