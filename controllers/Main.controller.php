<?php


require_once("./models/Characters.model.php");
class MainController
{

    public $charactersManager;

    public function __construct()
    {
        // on instancie un objet CharactersManager qui nous permettra d'accéder aux méthodes de CharactersManager
        $this->charactersManager = new CharactersManager();  //c'est ce qu'on appelle une injection de dépendance. Ne se transmettra pas par héritage.
    }

    public function homePage()
    {
        // nous récupérons la liste de tous les personnages
        $characters = $this->charactersManager->getCharacters();
        require_once("./views/home.view.php");
    }


    public function createCharacter()
    {
        // nous récupérons la liste de tous les types et races pour les menusq déroulants du formulaire
        $types = $this->charactersManager->getTypes();
        $races = $this->charactersManager->getRaces();
        require_once("./views/create.view.php");
    }

    public function validationCreation($name,  $race, $type, $health, $power)

    {
        // nous envoyons les données du formulaire dans la base de données. Nous testons si la requête s'est bien passée.
        $avatar = $type . ".jpg";
        // echo $name, $race,$type,  $health, $power, $avatar;
        // $this->charactersManager->createCharacterDB($name, $race, $type,  $health, $power, $avatar);
        if (
            $this->charactersManager->createCharacterDB($name,  $race, $type, $health, $power, $avatar)
        ) {
            Tools::addAlertMessage("Le personnage " . $name . " a bien été créé.", "alert-success");
            header("Location: ./home");
        } else {
            Tools::addAlertMessage("Le personnage " . $name . " n'a pas été créé.", "alert-danger");
            header("Location: ./create");
        }
    }

    public function deleteCharacter()
    {
        //....?????
    }

    public function updateCharacter($id)
    {
        // nous récupérons les données du personnage dont l'id est passé en paramètre et les types & races pour les menus déroulants du formulaire.
        $character = $this->charactersManager->getOneCharacter($id);
        $types = $this->charactersManager->getTypes();
        $races = $this->charactersManager->getRaces();
        require_once("./views/update.view.php");
    }

    public function validationUpdate($id, $name, $race, $type,  $health, $power) {
        // nous envoyons les données du formulaire dans la base de données. Nous testons si la requête s'est bien passée.
        $avatar = $type . ".jpg";
        if (
            $this->charactersManager->validationUpdateDB($id, $name,  $race, $type, $health, $power, $avatar)
        ) {
            Tools::addAlertMessage("Le personnage " . $name . " a bien été mis à jour.", "alert-success");
            header("Location: ./home");
        } else {
            Tools::addAlertMessage("Le personnage " . $name . " n'a pas été mis à jour.", "alert-danger");
            header("Location: ./create");
        }
    }

    public function errorPage()
    {
        require_once("./views/error.view.php");
    }
}
