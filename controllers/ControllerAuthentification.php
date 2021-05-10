<?php

class ControllerAuthentification
{
    private $_intervenantManager;
    private $_view;

    public function __construct($url)
    {
        $this->_intervenantManager = new IntervenantManager();
        //echo print_r($url);
        //echo URL;
        //echo count( $url );

        if(isset($url) && count( $url ) == 2){

            //echo "$url[1]";

            switch ($url[1]){
                case "connexion":
                    if($this->isLoggedOn()){
                        header('Location: '.URL);
                        exit();
                    }
                    if(isset($_POST['mail'])){
                        $mail = $_POST['mail'];
                        $mdp = $_POST['mdp'];
                        $this->login($mail, $mdp);
                        if(!$this->isLoggedOn()){
                            $this->viewAuth("Les identifiants entrés sont incorrects.");
                        }else{
                            header('Location: '.URL);
                            exit();
                        }
                    }else{
                        header('Location: '.URL.'authentification');
                        exit();
                    }
                    break;
                case "deconnexion":
                    $this->logout();
                    header('Location: '.URL);
                    exit();
                    break;
                default:
                    $this->viewAuth(null);
                    break;

            }
        }
        $this->viewAuth(null);
    }

    private function viewAccueil(){
        $this->_view = new View('Accueil');
        $this->_view->generate(Array());
    }

    private function viewAuth(?string $errorMsg){ // ? : nullable
        $this->_view = new View('Authentification');
        $this->_view->generate(Array('errorMsg' => $errorMsg));
    }

    public function login(string $mail, string $mdp)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $intervenant = $this->_intervenantManager->getIntervenantByMail($mail);

        if($intervenant == null) {
            return;
        }
        $mdpBD = $intervenant->getMdp();

        if (trim($mdpBD) == trim(crypt($mdp, $mdpBD))) {
            $_SESSION["intervenant"] = $intervenant;
        }
    }

    function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["intervenant"]);
    }

    function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        return isset($_SESSION["intervenant"]);
    }

}