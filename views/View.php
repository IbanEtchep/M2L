<?php
class View
{
    private $_file;
    private $_t;

    /**
     * View constructor.
     */
    public function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php';
    }

    //GENERE ET AFFICHE LA VUE
    public function generate($data)
    {
        //Partie spécifique de la vue
        $content = $this->generateFile($this->_file, $data);

        $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));

        echo $view;
    }

    //GENERE UN FICHIER VUE ET RENVOIS LE RESULTAT PRODUIT.
    private function generateFile(string $file, array $data){
        if(file_exists($file))
        {
            extract($data);

            ob_start();

            require $file;

            return ob_get_clean();
        }else
            throw  new Exception('Fichier '.$file. " introuvable.");
    }


}