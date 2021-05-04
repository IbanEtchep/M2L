<?php


class LigueManager extends Model
{

    public function getLigues(): array
    {
        return $this->getAll('LIGUE', 'Ligue');

    }

    public function deleteLigue(){

    }

    public function addLigue(){
//INSERT INTO LIGUE (nomLigue, siteLigue, descriptifLigue) VALUES ("test", "https://test.fr/", "descriptif test de ligue");
    }


}