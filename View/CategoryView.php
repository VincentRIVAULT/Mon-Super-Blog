<?php

    class CategoryView extends View {
        

        /**
         * Affichage de la liste des catégories issues de la BDD
         *
         * @param array $listCategories
         * @return void
         */
        public function displayHome($listCategories) {
            $this->page .= "<h1>Liste des catégories</h1>";
            $this->page .= "<p><a href='index.php?controller=category&action=addForm'><button class='btn btn-primary'>Ajouter</button></a></p>";
            $this->page .= "<table class='table'>";
            $this->page .= "<tr style='background-color: #e3f2fd'>";
            // $this->page .= "<th>ID</th>";
            $this->page .= "<th class='text-center'>Nom</th>";
            $this->page .= "<th class='text-center'>Description</th>";
            $this->page .= "<th class='text-center'>Modifier</th>";
            $this->page .= "<th class='text-center'>Supprimer</th>";
            $this->page .= "</tr>";
            foreach($listCategories as $categories) {
                $this->page .= "<tr>" 
                . "<td>" . $categories['name'] . "</td>"
                . "<td>" . $categories['description'] . "</td>"
                . "<td class='text-center'><a href='index.php?controller=category&action=updateForm&id="
                . $categories['id']
                . "' class='btn btn-warning' title='mise à jour' ><i class='fas fa-pen'></i></a>"  
                . "</td>"
                . "<td class='text-center'><a href='index.php?controller=category&action=suppDB&id="
                . $categories['id']
                . "' class='btn btn-danger' title='supprimer' ><i class='fas fa-trash-alt'></i></a>"  
                . "</td>"
                . "</tr>";
                
            }
            $this->page .= "</table>";
            $this->displayPage();
        }

        /**
         * Affichage du formulaire
         *
         * @return void
         */
        public function addForm() {
            $this->page .= "<h1>Ajout d'une catégorie</h1>";
            $this->page .= "<p>J'ajoute une categorie via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formCategory.html');
            
            $this->page = str_replace('{action}', 'addDB', $this->page);
            $this->page = str_replace('{id}', '', $this->page);
            $this->page = str_replace('{name}', '', $this->page);
            $this->page = str_replace('{description}', '', $this->page);

            $this->displayPage();
        }

        /**
         * Affichage du formulaire contenant la catégorie à modifier
         *
         * @param array $category
         * @return void
         */
        public function updateForm($category) {
            // var_dump($categorie);
            $this->page .= "<h1>Modification d'une categorie</h1>";
            $this->page .= "<p>Je modifie une categorie via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formCategory.html');
            
            $this->page = str_replace('{action}', 'updateDB', $this->page);
            $this->page = str_replace('{id}', $category['id'], $this->page);
            $this->page = str_replace('{name}', $category['name'], $this->page);
            $this->page = str_replace('{description}', $category['description'], $this->page);

            $this->displayPage();
        }

    }