<?php 

    namespace model;
    require "vendor/autoload.php";

    //GESTION DES MESSAGE RECUS
class MessageManager extends Manager{

                        ////////////////// SELECT /////////////////////////

    public function getMessages(){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Récupération des messages
        $req = $bdd->query('SELECT id, nom, email, sujet, message, DATE_FORMAT(date_message, \'%d/%m/%Y à %Hh%imin%ss\') AS date_message FROM message ORDER BY date_message');

        return $req;
    }
                        ////////////////// INSERT INTO /////////////////////////

    public function createMessage($nom, $email, $sujet, $contenu){
        
        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Création d'un nouveau message
        $req = $bdd->prepare('INSERT INTO message(nom, email, sujet, message, date_message VALUES (?, ?, ?, ?, NOW())');
        $newMessage = $req->execute(array($nom, $email, $sujet, $contenu));

        return $newMessage;
    }

}