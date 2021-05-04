<?php


class Ligue
{

    private int $idL;
    private string $nomLigue;
    private string $descriptifLigue;
    private string $siteLigue;

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
     * @return int
     */
    public function getIdL(): int
    {
        return $this->idL;
    }

    /**
     * @param int $idL
     */
    public function setIdL(int $idL): void
    {
        $this->idL = $idL;
    }

    /**
     * @return string
     */
    public function getNomLigue(): string
    {
        return $this->nomLigue;
    }

    /**
     * @param string $nomLigue
     */
    public function setNomLigue(string $nomLigue): void
    {
        $this->nomLigue = $nomLigue;
    }

    /**
     * @return string
     */
    public function getDescriptifLigue(): string
    {
        return $this->descriptifLigue;
    }

    /**
     * @param string $descriptifLigue
     */
    public function setDescriptifLigue(string $descriptifLigue): void
    {
        $this->descriptifLigue = $descriptifLigue;
    }

    /**
     * @return string
     */
    public function getSiteLigue(): string
    {
        return $this->siteLigue;
    }

    /**
     * @param string $siteLigue
     */
    public function setSiteLigue(string $siteLigue): void
    {
        $this->siteLigue = $siteLigue;
    }



}