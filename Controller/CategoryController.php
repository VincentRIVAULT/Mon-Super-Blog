<?php

include 'View/CategoryView.php';
include 'Model/CategoryModel.php';

    class CategoryController extends Controller {

        /**
         * Instanciation des class View et Model
         */
        public function __construct() {
            $this->view = new CategoryView();
            $this->model = new CategoryModel();
        }

        /**
         * Construction de la page d'accueil
         *  affichant la liste des catégories
         *
         * @return void
         */
        public function start() {
            $listCategories = $this->model->getCategories();
            // var_dump($listCategories);

            $this->view->displayHome($listCategories);
        }

        /**
         * Ajout d'une catégorie en BDD
         *
         * @return void
         */
        public function addDB() {
            $this->model->addDB();
            header('location: index.php?controller=category');
        }

        /**
         * Suppression d'une catégorie en BDD
         *
         * @return void
         */
        public function suppDB() {
            $this->model->suppDB();
            header('location: index.php?controller=category');
        }

        /**
         * Affichage du formulaire contenant le détail de
         * la catégorie sélectionnée dans la liste
         *
         * @return void
         */
        public function updateForm() {
            $category = $this->model->getCategory();
            $this->view->updateForm($category);
        }

        /**
         * Mise à jour de la catégorie en BDD
         *
         * @return void
         */
        public function updateDB() {
            $this->model->updateDB();
            header('location: index.php?controller=category');
        }
    }