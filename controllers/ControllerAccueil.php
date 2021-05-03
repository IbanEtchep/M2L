<?php
class ControllerAccueil{
    private $_intervenantManager;
    private $_view;

    public function __construct($url)
    {
        echo 'url = ' . $url;
        if(isset($url) && count( array($url) ) > 1){
            throw new Exception("Page introuvable");
        }else {
            $this->intervenants();
        }
    }

    private function intervenants(){
        $this->_intervenantManager = new IntervenantManager();
        $intervenants = $this->_intervenantManager->getIntervenants();
        require_once ('views/ViewAccueil.php');
    }


}