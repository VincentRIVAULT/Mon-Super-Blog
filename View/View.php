<?php

    abstract class View {
        
        protected $page;

        /**
         * Affichage de l'entete de la page HTML
         */
        public function __construct() {
            $this->page = file_get_contents('template/head.html');
            $this->page .= file_get_contents('template/nav.html');
            // var_dump($_SESSION);
            
            if (isset($_SESSION['user'])) {
                $optionConnect = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=security&action=logout'>Se déconnecter</a></li>";
                $profil = "<li class='nav-item'>Bonjour </li>";
                $nav = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=new'>News</a></li>
                        <li class='nav-item'><a class='nav-link active' href='index.php?controller=category'>Categorie</a></li>
                        <li class='nav-item'><a class='nav-link active' href='index.php?controller=user'>Utilisateur</a></li>";
                // $info = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=new'>News</a></li>";
                // $cat = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=category'>Categorie</a></li>";
                // $util = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=user'>Utilisateur</a></li>";                
                // var_dump($_SESSION['user']);
                // var_dump($profil);
                // var_dump($cat);
                // var_dump($util);

            } else {
                $optionConnect = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=security&action=formLogin'>S'authentifier</a></li>";
                $profil = "";
                $nav = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=new'>News</a></li>";
                // $info = "<li class='nav-item'><a class='nav-link active' href='index.php?controller=new'>News</a></li>";
                // $cat = "";
                // $util = "";
                // var_dump($_SESSION['user']);
                // var_dump($profil);
                // var_dump($cat);
                // var_dump($util);
            }
            $this->page = str_replace('{optionConnect}', $optionConnect, $this->page);
            // $this->page = str_replace('{profil}', $profil, $this->page);
            $this->page = str_replace('{nav}', $nav, $this->page);
            // $this->page = str_replace('{info}', $info, $this->page);
            // $this->page = str_replace('{cat}', $cat, $this->page);
            // $this->page = str_replace('{util}', $util, $this->page);
            

            // var_dump($optionConnect);
            // var_dump($profil);
            // var_dump($cat);
            // var_dump($util);
            
            // var_dump($_SESSION['user']);
            
        }

        

        /**
         * Affichage de la page entière avec le footer
         *
         * @return void
         */
        protected function displayPage() {
            $this->page .= file_get_contents('template/footer.html');
            echo $this->page;
        }
    }