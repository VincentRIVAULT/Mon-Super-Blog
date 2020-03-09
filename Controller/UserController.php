<?php

include 'View/UserView.php';
include 'Model/UserModel.php';

    class UserController extends Controller {


        /**
         * Instanciation des class View et Model
         */
        public function __construct() {
            $this->view = new UserView();
            $this->model = new UserModel();
        }

        /**
         * Construction de la page d'accueil
         *  affichant la liste des utilisateurs
         *
         * @return void
         */
        public function start() {
            $listUsers = $this->model->getUsers();
            // var_dump($listUsers);

            $this->view->displayHome($listUsers);
        }

        /**
         * Gestion de l'affichage du formulaire
         *
         * @return void
         */
        public function addForm() {
            $listUsers = $this->model->getUsers();
            $this->view->addForm($listUsers);
        }

        /**
         * Ajout d'un utilisateur en BDD
         *
         * @return void
         */
        public function addDB() {
            $this->model->addDB();
            header('location: index.php?controller=user');
        }

        /**
         * Suppression de l'utilisateur en BDD
         *
         * @return void
         */
        public function suppDB() {
            $this->model->suppDB();
            header('location: index.php?controller=user');
        }

        /**
         * Affichage du formulaire contenant le détail de
         * l'utilisateur sélectionné dans la liste
         *
         * @return void
         */
        public function updateForm() {
            $user = $this->model->getUser();
            $this->view->updateForm($user);
        }

        /**
         * Mise à jour de l'utilisateur en BDD
         *
         * @return void
         */
        public function updateDB() {
            $this->model->updateDB();
            header('location: index.php?controller=user');
        }
    }