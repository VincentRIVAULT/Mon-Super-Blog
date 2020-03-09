<?php

    abstract class Controller {

        protected $view;
        protected $model;

        /**
         * Gestion de l'affichage du formulaire
         *
         * @return void
         */
        public function addForm() {
            $this->view->addForm();
        }
    }