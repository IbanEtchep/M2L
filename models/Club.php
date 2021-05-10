<?php


class Club
{

    private $idCl;
    private $nomClub;
    private $adresseClub;
    private $idL;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach ($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getIdCl()
    {
        return $this->idCl;
    }

    /**
     * @param mixed $idCl
     */
    public function setIdCl($idCl): void
    {
        $this->idCl = $idCl;
    }

    /**
     * @return mixed
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }

    /**
     * @param mixed $nomClub
     */
    public function setNomClub($nomClub): void
    {
        $this->nomClub = $nomClub;
    }

    /**
     * @return mixed
     */
    public function getAdresseClub()
    {
        return $this->adresseClub;
    }

    /**
     * @param mixed $adresseClub
     */
    public function setAdresseClub($adresseClub): void
    {
        $this->adresseClub = $adresseClub;
    }

    /**
     * @return mixed
     */
    public function getIdL()
    {
        return $this->idL;
    }

    /**
     * @param mixed $idL
     */
    public function setIdL($idL): void
    {
        $this->idL = $idL;
    }

    public function getLigue() : string {
        $ligueManager = new LigueManager();
        $ligue = $ligueManager->getLigueById($this->getIdL());
        if($ligue == null){
            return "aucune";
        }else{
            return $ligue->getNomLigue();
        }
    }



}