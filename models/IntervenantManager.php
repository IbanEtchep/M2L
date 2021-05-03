<?php

class IntervenantManager extends  Model {

    public function getIntervenants(){
        return $this->getAll('INTERVENANT', 'Intervenant');
    }

}