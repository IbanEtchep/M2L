<?php


class ControllerAdministration
{

    private LigueManager $_ligueManager;
    private $_view;
    private ClubManager $_clubManager;

    public function __construct($url)
    {
        if(!isLoggedOn()){
            header('Location: '.URL);
            exit();
        }
        //echo count($url);
        //echo print_r($url);
        if (isset($url) && count($url) >= 2) {
            switch ($url[1]){
                case "ligues":
                    $this->handleLigues($url);
                    break;
                case "clubs":
                    $this->handleClubs($url);
                    break;
                default:
                    header('Location: '.URL.'administration');
                    exit();
                    break;
            }
        }else{
            $this->renderAdminMainPage();
        }
    }

    public function renderAdminMainPage(){
        $this->_view = new View('AdministrationMain');
        $this->_view->generate(Array());
    }

    public function renderAdminLigues(?string $errorMsg, ?string $successMsg){
        $this->_view = new View('AdministrationLigues');
        $this->_view->generate(Array('errorMsg' => $errorMsg , 'successMsg' => $successMsg));
    }

    public function renderAdminLigueEdit(?Ligue $ligue){
        $this->_view = new View('AdministrationLigueEdit');
        $this->_view->generate(Array('ligue' => $ligue));
    }

    public function renderAdminClubs(?string $errorMsg, ?string $successMsg){
        $this->_view = new View('AdministrationClubs');
        $this->_view->generate(Array('errorMsg' => $errorMsg , 'successMsg' => $successMsg));
    }

    public function renderAdminClubEdit(?Club $club){
        $this->_view = new View('AdministrationClubEdit');
        $this->_view->generate(Array('club' => $club));
    }

    private function handleLigues($url){
        $this->_ligueManager = new LigueManager();
        if(count($url) == 2){
            if(isset($_POST['submitEdit'])){
                if(isset($_POST['name']) && $this->_ligueManager->getLigueByName($_POST['name']) != null){
                    header('Location: '.URL.'administration/ligues/editer/'.$_POST['name']);
                }else{
                    $this->renderAdminLigues("Cette ligue n'existe pas !", null);
                }
            }else if(isset($_POST['submitAdd'])){
                $nom = $_POST['name'];
                $description = $_POST['description'];
                $site = $_POST['site'];
                $this->_ligueManager->addLigue($nom, $description, $site);
                $this->renderAdminLigues(null, "La ligue a bien été crée");
            }else if(isset($_POST['submitDelete'])){
                if(isset($_POST['name'])){
                    $ligue = $this->_ligueManager->getLigueByName($_POST['name']);
                    if($ligue != null){
                        $this->_ligueManager->deleteLigue($this->_ligueManager->getLigueByName($_POST['name']));
                        $this->renderAdminLigues(null, "La ligue a bien été supprimée");
                    }
                }
                $this->renderAdminLigues("Cette ligue n'existe pas !", null);
            }else{
                $this->renderAdminLigues(null, null);
            }
        }else if(count($url) == 4){
            //echo var_dump($_POST);
            if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['site'])){
                $ligue = $this->_ligueManager->getLigueByName($url[3]);
                if(isset($ligue)){
                    $ligue->setNomLigue($_POST['name']);
                    $ligue->setSiteLigue($_POST['site']);
                    $ligue->setDescriptifLigue($_POST['description']);
                    $this->_ligueManager->updateLigue($ligue);
                    header('Location: '.URL.'administration/ligues/editer/'.$_POST['name']);
                }
            }else{
                $this->renderAdminLigueEdit($this->_ligueManager->getLigueByName($url[3]));
            }
        }
    }

    private function handleClubs($url){
        $this->_clubManager = new ClubManager();
        if(count($url) == 2){
            if(isset($_POST['submitEdit'])){
                if(isset($_POST['name']) && $this->_clubManager->getClubByName($_POST['name']) != null){
                    header('Location: '.URL.'administration/clubs/editer/'.$_POST['name']);
                }else{
                    $this->renderAdminClubs("Ce club n'existe pas !", null);
                }
            }else if(isset($_POST['submitAdd'])){
                $nom = $_POST['name'];
                $adresse = $_POST['adresse'];
                $nomLigue = $_POST['ligue'];

                $ligueManager = new LigueManager();
                $ligue = $ligueManager->getLigueByName($nomLigue);

                $this->_clubManager->addClub($nom, $adresse, $ligue == null ? -1 : $ligue->getIdL());
                $this->renderAdminClubs(null, "Le club a bien été crée");
            }else if(isset($_POST['submitDelete'])){
                if(isset($_POST['name'])){
                    $club = $this->_clubManager->getClubByName($_POST['name']);
                    if($club != null){
                        $this->_clubManager->deleteClub($this->_clubManager->getClubByName($_POST['name']));
                        $this->renderAdminClubs(null, "Le club a bien été supprimé");
                    }
                }
                $this->renderAdminClubs("Ce club n'existe pas !", null);
            }else{
                $this->renderAdminClubs(null, null);
            }
        }else if(count($url) == 4){
            //echo var_dump($_POST);
            if(isset($_POST['name']) && isset($_POST['adresse']) && isset($_POST['ligue'])){
                $club = $this->_clubManager->getClubByName($url[3]);
                if(isset($club)){
                    $club->setNomClub($_POST['name']);
                    $club->setAdresseClub($_POST['adresse']);

                    $ligueManager = new LigueManager();
                    $ligue = $ligueManager->getLigueByName($_POST['ligue']);
                    if($ligue != null){
                        $club->setIdL($ligue->getIdL());
                    }
                    $this->_clubManager->updateClub($club);
                    header('Location: '.URL.'administration/clubs/editer/'.$_POST['name']);
                }
            }else{
                //echo var_dump($this->_clubManager->getClubByName($url[3]));
                $this->renderAdminClubEdit($this->_clubManager->getClubByName($url[3]));
            }
        }
    }
}