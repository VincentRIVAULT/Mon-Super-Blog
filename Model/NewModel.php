<?php

    class NewModel extends Model {
        
        
        /**
         * Récupération de la liste d'infos à partir de la base de données
         *
         * @return void
         */
        public function getNews() {

            $requete = "SELECT news.*, category.id AS id_category, category.name AS name_category, category.description AS description_category 
            FROM news 
            LEFT JOIN category 
            ON news.category = category.id
            ORDER BY news.title";
            // $requete = "SELECT * FROM news";
            $result = $this->connexion->query($requete);
            $listNews = $result->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($listNews);
            return $listNews;

            $listNews = ['info1', 'info2', 'info3'];
            return $listNews;
        }

        /**
         * Ajout d'une info (title & description) à la base de données
         *
         * @return void
         */
        public function addDB() {
            
            // insert l'info
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            if (empty($category)) {
                $category = NULL;
            }

            // var_dump($_POST);

            $requete = $this->connexion->prepare("INSERT INTO news VALUES (NULL, :title, :description, :category)");
            $requete->bindParam(':title', $title);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':category', $category);
            $result = $requete->execute();
            
            // var_dump($requete->errorInfo());
            // var_dump($result);

        }

        /**
         * Suppression d'une info (title & description) de la base de données à partir de son id
         *
         * @return void
         */
        public function suppDB() {
            
            // suppression de l'info
            $id = $_GET['id'];

            $requete = $this->connexion->prepare("DELETE FROM news WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            // var_dump($result);
            // var_dump($requete);
            // var_dump($id);
        }

        /**
         * Extraction d'une information de la table
         *
         * @return void
         */
        public function getNew() {
            $id = $_GET['id'];
            
            $requete = $this->connexion->prepare("SELECT news.*, category.id AS id_category, category.name AS name_category 
                                                FROM news 
                                                LEFT JOIN category 
                                                ON news.category = category.id
                                                WHERE news.id = :id");
            // $requete = $this->connexion->prepare("SELECT * FROM news WHERE id = :id");
            $requete->bindParam(':id', $id);
            $result = $requete->execute();
            $new = $requete->fetch(PDO::FETCH_ASSOC);

            // var_dump($new);

            return $new;
        }

        /**
         * Mise à jour de l'info dans la table
         *
         * @return void
         */
        public function updateDB() {
            
            // mise à jour de l'info
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $category = $_POST['category'];
            if (empty($category)) {
                $category = NULL;
            }

            $requete = $this->connexion->prepare("UPDATE news 
            SET title = :title, description = :description, category = :category 
            WHERE id = :id");
            $requete->bindParam(':id', $id);
            $requete->bindParam(':title', $title);
            $requete->bindParam(':description', $description);
            $requete->bindParam(':category', $category);
            $result = $requete->execute();
            // var_dump($result);
        }
    }