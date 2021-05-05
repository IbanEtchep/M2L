<?php
require_once ('views/View.php');

class ControllerLigues
{

    private $_liguesManager;
    private $_view;

    public function __construct($url)
    {
        if(isset($url) && count( array($url) ) > 1){
            throw new Exception("Page introuvable");
        }else {
            $this->intervenants();
        }
    }

    private function intervenants(){
        $this->_liguesManager = new LigueManager();
        $ligues = $this->_liguesManager->getLigues();
        $this->_view = new View('Ligues');
        $this->_view->generate(Array('ligues' => $ligues));
    }

}