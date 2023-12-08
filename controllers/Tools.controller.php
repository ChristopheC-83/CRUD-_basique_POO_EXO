<?php


abstract class Tools
{
    public static function showArray($array)
    {
        // fonction pour afficher un tableau de manière lisible
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    public static function addAlertMessage($message, $type = 'alert-danger')
    {
        // fonction pour ajouter un message d'alerte à la session. un fichier JS permet de supprimer le message au bout de 3 secondes.
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
    }

}
