<?php

    class CategoryModel extends Model {
        

        /**
         * Ajout d'une catégorie (name & description) à la base de données
         *
         * @return void
         */
        public function addDB() {
            
            // insert la catégorie
            $name = $_POST['name'];
            $description = $_POST['description'];

            $requete = $this->connexion->prepare("INSERT INTO category VALUES (NULL, :name, :description)");
            $requete->bindParam(':name', $name);
            $requete->bindParam(':description', $description);
            $result = $requete->execute();
            // var_dump($result);
        }

        /**
         * Suppression d'une catégorie (name & description) de la base de données à partir de son id
         *
         * @return void
         */
        public function suppDB() {
            
            // suppression de l'info
            $id = $_GET['id'];

            $requete = $this->connexion->prepare("DELETE FROM category WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            // var_dump($result);
            // var_dump($requete);
            // var_dump($id);
        }

        /**
         * Extraction d'une catégorie de la table
         *
         * @return void
         */
        public function getCategory() {
            $id = $_GET['id'];
            
            $requete = $this->connexion->prepare("SELECT * FROM category WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            $category = $requete->fetch(PDO::FETCH_ASSOC);

            // var_dump($category);

            return $category;
        }

        /**
         * Mise à jour d'une catégorie dans la table
         *
         * @return void
         */
        public function updateDB() {
            
            // mise à jour de la catégorie
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $requete = $this->connexion->prepare("UPDATE category SET name = :name, description = :description WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':name', $name);
            $requete->bindParam(':description', $description);
            $result = $requete->execute();
            // var_dump($result);
        }
    }