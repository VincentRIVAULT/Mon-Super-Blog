<?php

include 'View/NewView.php';
include 'Model/NewModel.php';

    class NewController extends Controller {


        /**
         * Instanciation des class View et Model
         */
        public function __construct() {
            $this->view = new NewView();
            $this->model = new NewModel();
        }

        /**
         * Construction de la page d'accueil
         *  affichant la liste des informations
         *
         * @return void
         */
        public function start() {
            $listNews = $this->model->getNews();
            // var_dump($listNews);

            $this->view->displayHome($listNews);
        }

        /**
         * Gestion de l'affichage du formulaire
         *
         * @return void
         */
        public function addForm() {
            $listCategories = $this->model->getCategories();
            $this->view->addForm($listCategories);
        }

        /**
         * Ajout d'une info en BDD
         *
         * @return void
         */
        public function addDB() {
            $this->model->addDB();
            header('location: index.php?controller=new');
        }

        /**
         * Suppression de l'info en BDD
         *
         * @return void
         */
        public function suppDB() {
            $this->model->suppDB();
            header('location: index.php?controller=new');
        }

        /**
         * Affichage du formulaire contenant le détail de
         * l'info sélectionnée dans la liste
         *
         * @return void
         */
        public function updateForm() {
            $listCategories = $this->model->getCategories();
            $new = $this->model->getNew();
            $this->view->updateForm($new, $listCategories);
        }

        /**
         * Mise à jour de l'info en BDD
         *
         * @return void
         */
        public function updateDB() {
            $this->model->updateDB();
            header('location: index.php?controller=new');
        }

        /**
         * Affichage du détail de l'info sélectionnée
         *
         * @return void
         */
        public function detailNew() {
            $new = $this->model->getNew();
            $this->view->detailNew($new);
        }
    }