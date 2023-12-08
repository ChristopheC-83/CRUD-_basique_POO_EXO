<?php



// fichier de connexion à bdd
// les infos de connexion sont dans le fichier nommé ci-dessous

require_once("./models/perso.php");

abstract class Model
{

    private static $pdo;

    // connexion à notre DB
    private static function setBDD()
    {
        try {
            self::$pdo = new PDO(
                "mysql:host=" . mysql . ";dbname=" . dbname,
                user,
                mdpbd,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
            );
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
        return self::$pdo;
    }

    // récupération de la connexion à la DB. Ne se connecte que s'il n'y a pas de connexion déjà en cours.
    protected function getBDD()
    {
        if (self::$pdo === null) {
            self::setBDD();
        }
        return self::$pdo;
    }
}
