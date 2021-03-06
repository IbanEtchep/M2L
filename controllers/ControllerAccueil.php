<?php
require_once ('views/View.php');

class ControllerAccueil{

    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count( array($url) ) > 1)
        {
            throw new Exception("Page introuvable");
        }else
        {
            $this->renderAccueil();
        }
    }

    private function renderAccueil()
    {
        $this->_view = new View('Accueil');
        $this->_view->generate(Array());
    }

}