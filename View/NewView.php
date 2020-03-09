<?php

    class NewView extends View {
        

        /**
         * Affichage de la page d'accueil
         * Liste des infos issues de la BDD selon que le visiteur est authentifié ou non
         * Si non authentifié => accès seulement à la lecture des news
         * Si authentifié => accès à tout le CRUD
         *
         * @param array $listNews
         * @return void
         */
        public function displayHome($listNews) {
            
            $this->page .= "<h1>Liste des informations</h1>";
            if (isset($_SESSION['user'])) {
                $this->page .= "<p><a href='index.php?controller=new&action=addForm'><button class='btn btn-primary'>Ajouter</button></a></p>";
            }
            $this->page .= "<table class='table'>";
            $this->page .= "<tr style='background-color: #e3f2fd'>";
            // $this->page .= "<th>ID</th>";
            $this->page .= "<th class='text-center'>Titre</th>";
            $this->page .= "<th class='text-center'>Description</th>";
            $this->page .= "<th class='text-center'>Catégorie</th>";
            $this->page .= "<th class='text-center'>Détail</th>";
            if (isset($_SESSION['user'])) {
                $this->page .= "<th class='text-center'>Modifier</th>";
                $this->page .= "<th class='text-center'>Supprimer</th>";
            }
            $this->page .= "</tr>";
            
            if (isset($_SESSION['user'])) {
                foreach($listNews as $news) {
                    $this->page .= "<tr>" 
                    . "<td>" . $news['title'] . "</td>"
                    . "<td>" . $news['description'] . "</td>"
                    . "<td>" . $news['name_category'] . "</td>"
                    . "<td class='text-center'><a href='index.php?controller=new&action=detailNew&id="
                    . $news['id']
                    . "' class='btn btn-success' title='Lire' ><i class='fas fa-eye'></i></a>"  
                    . "</td>"
                    . "<td class='text-center'><a href='index.php?controller=new&action=updateForm&id="
                    . $news['id']
                    . "' class='btn btn-warning' title='mise à jour' ><i class='fas fa-pen'></i></a>"  
                    . "</td>"
                    . "<td class='text-center'><a href='index.php?controller=new&action=suppDB&id="
                    . $news['id']
                    . "' class='btn btn-danger' title='supprimer' ><i class='fas fa-trash-alt'></i></a>"  
                    . "</td>"
                    . "</tr>";
                    
                }
            } else {
                foreach($listNews as $news) {
                    $this->page .= "<tr>" 
                    . "<td>" . $news['title'] . "</td>"
                    . "<td>" . $news['description'] . "</td>"
                    . "<td>" . $news['name_category'] . "</td>"
                    . "<td class='text-center'><a href='index.php?controller=new&action=detailNew&id="
                    . $news['id']
                    . "' class='btn btn-success' title='Lire' ><i class='fas fa-eye'></i></a>"  
                    . "</td>"
                    . "</tr>";
                }
            }
            $this->page .= "</table>";
            $this->displayPage();
        }

        /**
         * Affichage du formulaire
         *
         * @return void
         */
        public function addForm($listCategories) {
            $this->page .= "<h1>Ajout d'une information</h1>";
            $this->page .= "<p>J'ajoute une info via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formNew.html');
            
            $this->page = str_replace('{action}', 'addDB', $this->page);
            $this->page = str_replace('{id}', '', $this->page);
            $this->page = str_replace('{title}', '', $this->page);
            $this->page = str_replace('{description}', '', $this->page);
            $categories = "";

            foreach($listCategories as $category) {
                $categories .= "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            }
            
            $this->page = str_replace('{categories}', $categories, $this->page);

            $this->displayPage();
        }

        /**
         * Affichage du formulaire contenant l'info à modifier
         * avec la possibilité de modifier la catégorie à laquelle l'info est rattachée
         *
         * @param array $new
         * @return void
         */
        public function updateForm($new, $listCategories) {
            // var_dump($new);
            $this->page .= "<h1>Modification de l'information</h1>";
            $this->page .= "<p>Je modifie une info via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formNew.html');
            
            $this->page = str_replace('{action}', 'updateDB', $this->page);
            $this->page = str_replace('{id}', $new['id'], $this->page);
            $this->page = str_replace('{title}', $new['title'], $this->page);
            $this->page = str_replace('{description}', $new['description'], $this->page);
            $categories = "";

            foreach($listCategories as $category) {
                $selected = "";
                if ($new['category'] == $category['id']) {
                    $selected = 'selected';
                }
                $categories .= "<option $selected value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            }
            
            $this->page = str_replace('{categories}', $categories, $this->page);

            $this->displayPage();
        }

        /**
         * Affiche le détail de l'info sélectionnée dans la liste des infos
         *
         * @return void
         */
        public function detailNew($new) {
            $this->page .= "<h1>Détail de l'information</h1>";
            $this->page .= "<table class='table'>";
            $this->page .= "<tr style='background-color: #e3f2fd'>";
            $this->page .= "<th class='text-center'>Titre</th>";
            $this->page .= "<th class='text-center'>Description</th>";
            $this->page .= "<th class='text-center'>Catégorie</th>";
            $this->page .= "</tr>";
            $this->page .= "<tr>" 
                    . "<td>" . $new['title'] . "</td>"
                    . "<td>" . $new['description'] . "</td>"
                    . "<td>" . $new['name_category'] . "</td>"
                    . "</tr>";
            $this->page .= "</table>";
            $this->page .= "<p><a href='index.php?controller=new&action=start'><button class='btn btn-primary justify-content-center'>Retour à la liste</button></a></p>";
        
            // var_dump($new);

            $this->displayPage();
        }
    }