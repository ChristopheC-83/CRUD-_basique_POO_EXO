<?php

require_once("./models/pdo.model.php");
class CharactersManager extends Model
{
    public function getCharacters()
    {
        //  récupération de tous les personnages
        $req = "SELECT * FROM characters";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $infos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $infos;
    }

    public function getOneCharacter($id)
    {
        //  récupération d'un personnage dont l'id est passé en paramètre
        $req = "SELECT * FROM characters WHERE id = :id";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $character = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $character;
    }
    public function getTypes()
    {
        // récupération de tous les types et triés par ordre alphabétique
        $req = "SELECT * FROM types ORDER BY type asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $types;
    }

    public function getRaces()
    {
        //  récupération de toutes les races et triées par ordre alphabétique
        $req = "SELECT * FROM races ORDER BY race asc";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->execute();
        $races = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $races;
    }

    public function createCharacterDB($name, $race, $type,  $health, $power, $avatar)
    {
        // création d'un personnage dans la base de données
        // echo $name, $race, $type, "<br>", $health, $power, $avatar;
        $req = "INSERT INTO characters (name, race, type,  health, power, avatar) 
            VALUES (:name, :race,:type,  :health, :power, :avatar)";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':race', $race, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':health', $health, PDO::PARAM_INT);
        $stmt->bindParam(':power', $power, PDO::PARAM_INT);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isCreate;
    }
    public function validationUpdateDB($id, $name,  $race, $type, $health, $power, $avatar)
    {
        // modification d'un personnage dont l'id est passé en paramètre
        $req = "UPDATE characters SET
        name=:name, 
        type=:type,
        race=:race,
        health=:health,
        power=:power,
        avatar=:avatar
        WHERE id=:id
        ";
        $stmt = $this->getBDD()->prepare($req);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->bindParam(':race', $race, PDO::PARAM_STR);
        $stmt->bindParam(':health', $health, PDO::PARAM_INT);
        $stmt->bindParam(':power', $power, PDO::PARAM_INT);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $isUpdate = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $isUpdate;
    }
}
