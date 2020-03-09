<?php

    class SecurityModel extends Model {
        
        
        /**
         * Récupération du username et du password à partir de la base de données
         * pour que l'utilisateur puisse se connecter
         *
         * @return void
         */
        public function login() {

            $username = $_POST['username'];
            $password = $_POST['password'];

            // var_dump($_POST);

            $requete = $this->connexion->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
            $requete->bindParam(':username', $username);
            $requete->bindParam(':password', $password);
            $result = $requete->execute();
            $user = $requete->fetch(PDO::FETCH_ASSOC);
            // var_dump($requete->errorInfo());
            // var_dump($result);

            if ($user) {
                $_SESSION['user'] = $user;
            }

            return $user;
        }

        /**
         * Déconnexion de l'utilisateur
         *
         * @return void
         */
        public function logout() {
            unset($_SESSION['user']);
        }
    }