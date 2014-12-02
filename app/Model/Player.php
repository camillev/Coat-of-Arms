<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class Player extends AppModel {

    function mail_inscription($email) {
        //Envoyer mail avec lien avec id
        App::uses('CakeEmail', 'Network/Email');
        $Email = new CakeEmail();
        $Email->config('gmail');
        $Email->viewVars(array('email' => $email));
        $Email->template('inscription', NULL)
                ->emailFormat('html')
                ->to($email)
                ->from('you@localhost')
                ->send();
    }
    
    function findPlayer($id, $email) {
        if ($id == NULL) {
            $inf = $this->query("SELECT * FROM players WHERE email = '$email' ");
        }
        if ($email == NULL) {
            $inf = $this->query("SELECT * FROM players WHERE id = '$id' ");
        }
        return $inf;
    }

    function updateMdp($id, $pass) {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $pass = $passwordHasher->hash($pass);
        $this->query("UPDATE players SET password = '$pass' WHERE id = '$id' ");
    }

    function addPlayer($email, $pass) {
        $id = uniqid();
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $pass_hache = $passwordHasher->hash($pass);
        $this->query(" INSERT INTO players (id, email, password) VALUES ('$id','$email','$pass_hache')");
        return $id;
    }

    function connexion($email, $pass) {
        $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
        $pass_hache = $passwordHasher->hash($pass);
        $play = $this->find('first', array('conditions' => array('email' => $email, 'password' => $pass_hache)));
        if (empty($play)) {
            echo 'Mauvais identifiant ou mot de passe !';
            RETURN FALSE;
        } else {
            CakeSession::start();
            CakeSession::write('nom', array("id" => $play['Player']['id'], "email" => $email));
            RETURN TRUE;
        }
    }

    function uploadFile($file, $id_player) {
        $maxsize = 2000000000000000000000000;
        $maxheight = 20000000000000000000000;
        $maxwidth = 2000000000000000000000000;
        if ($file['error'] > 0) {
            $erreur = "Erreur lors du transfert";
            return false;
        }
        if ($file['size'] > $maxsize) {
            $erreur = "Le fichier est trop gros";
            return false;
        }
        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
        $extension_upload = strtolower(substr(strrchr($file['name'], '.'), 1));
        if (in_array($extension_upload, $extensions_valides)) {
            echo "Extension correcte";
        } else {
            return false;
        }
        $image_sizes = getimagesize($file['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {
            $erreur = "Image trop grande";
            return false;
        }
        //Créer un dossier 'fichiers/1/' 
        mkdir('fichier/1/', 0777, true);
        //Créer un identifiant difficile à deviner  
        $nom = "{$id_player}.{$extension_upload}";
        $resultat = move_uploaded_file($file['tmp_name'], $nom);
        if ($resultat) {
            echo "Transfert réussi";
        }
    }

}
