<?php

    abstract class Model {
        
        const SERVER = "localhost";
        const USER = "root";
        const PASSWORD = "";
        const BASE = "poo";
        
        // const SERVER = "";
        // const USER = "";
        // const PASSWORD = "";
        // const BASE = "";

        protected $connexion;

        /**
         * Mise en place de la connexion à la base de données
         */
        public function __construct() {
            
            // déclaration en local
            // define('SERVER'     ,"localhost");
            // define('USER'       ,"root");
            // define('PASSWORD'   ,"");
            // define('BASE'       ,"news"); 

            // déclaration à distance
            // define('SERVER'     ,"");
            // define('USER'       ,"");
            // define('PASSWORD'   ,"");
            // define('BASE'       ,"");

            // connexion
            try { 
                // il est nécessaire d'utiliser le mot clé "self::" devant le nom de chaque constante pour les utiliser à l'intérieur d'une classe
                $this->connexion = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
                $this->connexion->exec("SET NAMES 'UTF8'");
                // echo "<p>Vous êtes connecté</p>";
            } catch (Exception $e) { 
                echo '<p>Erreur : ' . $e->getMessage() . ' </p>';
            }
        }

        /**
         * Récupération de la liste de catégories à partir de la base de données
         *
         * @return void
         */
        public function getCategories() {

            $requete = "SELECT * FROM category";
            $result = $this->connexion->query($requete);
            $listCategories = $result->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($listCategories);
            return $listCategories;

            $listCategories = ['category1', 'category2', 'category3'];
            return $listCategories;
        }

    }