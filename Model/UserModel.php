<?php

    class UserModel extends Model {
        
        
        /**
         * Récupération de la liste des utilisateurs à partir de la base de données
         *
         * @return void
         */
        public function getUsers() {

            $requete = "SELECT * FROM user";
            
            $result = $this->connexion->query($requete);
            $listUsers = $result->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($listUsers);
            return $listUsers;

            $listUsers = ['info1', 'info2', 'info3'];
            return $listUsers;
        }

        /**
         * Ajout d'un utilisateur à la base de données
         *
         * @return void
         */
        public function addDB() {
            
            // ajout d'un utilisateur à la base de données
            $username = $_POST['username'];
            $password = $_POST['password'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            
            // if (empty($category)) {
            //     $category = NULL;
            // }

            // var_dump($_POST);

            $requete = $this->connexion->prepare("INSERT INTO user VALUES (NULL, :username, :password, :lastname, :firstname)");
            $requete->bindParam(':username', $username);
            $requete->bindParam(':password', $password);
            $requete->bindParam(':lastname', $lastname);
            $requete->bindParam(':firstname', $firstname);
            
            $result = $requete->execute();
            
            // var_dump($requete->errorInfo());
            // var_dump($result);

        }

        /**
         * Suppression d'un utilisateur de la base de données à partir de son id
         *
         * @return void
         */
        public function suppDB() {
            
            // suppression d'un utilisateur
            $id = $_GET['id'];

            $requete = $this->connexion->prepare("DELETE FROM user WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            // var_dump($result);
            // var_dump($requete);
            // var_dump($id);
        }

        /**
         * Extraction d'un utilisateur de la table
         *
         * @return void
         */
        public function getUser() {
            $id = $_GET['id'];
            
            $requete = $this->connexion->prepare("SELECT * FROM user WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            $user = $requete->fetch(PDO::FETCH_ASSOC);

            // var_dump($user);

            return $user;
        }

        /**
         * Mise à jour d'un utilisateur dans la table
         *
         * @return void
         */
        public function updateDB() {
            
            // mise à jour de l'utilisateur
            $username = $_POST['username'];
            $password = $_POST['password'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            
            // if (empty($category)) {
            //     $category = NULL;
            // }

            $requete = $this->connexion->prepare("UPDATE user 
            SET username = :username, password = :password, lastname = :lastname, firstname = :firstname 
            WHERE id = :id");
            $requete->bindParam(':username', $username);
            $requete->bindParam(':password', $password);
            $requete->bindParam(':lastname', $lastname);
            $requete->bindParam(':firstname', $firstname);
            
            $result = $requete->execute();
            // var_dump($result);
        }
    }