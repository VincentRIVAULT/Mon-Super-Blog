<?php

    class SecurityView extends View {

        /**
         * Affichage du formulaire de login
         *
         * @return void
         */
        public function formLogin() {
            $this->page .= "<h1>Authentification d'un utilisateur</h1>";
            $this->page .= "<p>Je m'authentifie via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formSecurity.html');
        
            $this->displayPage();
        }

    }