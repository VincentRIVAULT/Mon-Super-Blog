<?php

include 'View/SecurityView.php';
include 'Model/SecurityModel.php';

    class SecurityController extends Controller {


        /**
         * Instanciation des class View et Model
         */
        public function __construct() {
            $this->view = new SecurityView();
            $this->model = new SecurityModel();
        }

        /**
         * Affiche le formulaire de Login dans la vue
         *
         * @return void
         */
        public function formLogin() {
            $this->view->formLogin();
        }

        /**
         * Fonction de connexion d'un utilisateur
         * Authentification de l'utilisateur si le username et le password correspondent à ceux de l'utilisateur stockés dans la BDD
         * ou retour au formulaire d'authentification en cas de non correspondance
         *
         * @return void
         */
        public function login() {
            $user = $this->model->login();

            

            if ($user != false) {
                // var_dump($user);
                header('location: index.php?controller=new');
            } else {
                // var_dump($user);
                header('location: index.php?controller=security&action=formLogin');
            }
        }

        /**
         * Fonction de déconnexion de l'utilisateur
         *
         * @return void
         */
        public function logout() {
            $this->model->logout();
            header('location: index.php?controller=new&action=start');
        }
    }