<?php

require_once 'config/Manager.php';

class UserManager extends Manager {

    // Inscription (Déjà fait)
    public function inscription($pseudo, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $user = [
            'pseudo' => htmlspecialchars($pseudo),
            'password' => $passwordHash,
            'date_inscription' => new MongoDB\BSON\UTCDateTime()
        ];
        $this->insertOne('users', $user);
    }


    public function connexion($pseudo, $password) {

        $users = $this->executeQuery('users', ['pseudo' => $pseudo]);

        if (!empty($users)) {
            $user = $users[0]; 


            if (password_verify($password, $user->password)) {
                return $user; 
            }
        }
        return false;
    }
}
?>
