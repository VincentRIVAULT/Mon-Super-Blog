<?php

    class UserView extends View {
        

        /**
         * Affichage de la page d'accueil
         * Liste des utilisateurs issues de la BDD
         *
         * @param array $listUsers
         * @return void
         */
        public function displayHome($listUsers) {
            $this->page .= "<h1>Liste des utilisateurs</h1>";
            $this->page .= "<p><a href='index.php?controller=user&action=addForm'><button class='btn btn-primary'>Ajouter</button></a></p>";
            $this->page .= "<table class='table'>";
            $this->page .= "<tr style='background-color: #e3f2fd'>";
            // $this->page .= "<th>ID</th>";
            $this->page .= "<th class='text-center'>Nom d'utilisateur</th>";
            $this->page .= "<th class='text-center'>Mot de passe</th>";
            $this->page .= "<th class='text-center'>Nom</th>";
            $this->page .= "<th class='text-center'>Prénom</th>";
            $this->page .= "<th class='text-center'>Modifier</th>";
            $this->page .= "<th class='text-center'>Supprimer</th>";
            $this->page .= "</tr>";
            foreach($listUsers as $user) {
                $this->page .= "<tr>" 
                . "<td>" . $user['username'] . "</td>"
                . "<td>" . $user['password'] . "</td>"
                . "<td>" . $user['lastname'] . "</td>"
                . "<td>" . $user['firstname'] . "</td>"
                . "<td class='text-center'><a href='index.php?controller=user&action=updateForm&id="
                . $user['id']
                . "' class='btn btn-warning' title='mise à jour' ><i class='fas fa-pen'></i></a>"  
                . "</td>"
                . "<td class='text-center'><a href='index.php?controller=user&action=suppDB&id="
                . $user['id']
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
        public function addForm($listUsers) {
            $this->page .= "<h1>Ajout d'un utilisateur</h1>";
            $this->page .= "<p>J'ajoute un utilisateur via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formUser.html');
            
            $this->page = str_replace('{action}', 'addDB', $this->page);
            $this->page = str_replace('{id}', '', $this->page);
            $this->page = str_replace('{username}', '', $this->page);
            $this->page = str_replace('{password}', '', $this->page);
            $this->page = str_replace('{lastname}', '', $this->page);
            $this->page = str_replace('{firstname}', '', $this->page);
            // $categories = "";

            // foreach($listCategories as $category) {
            //     $categories .= "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            // }
            
            // $this->page = str_replace('{categories}', $categories, $this->page);

            $this->displayPage();
        }

        /**
         * Affichage du formulaire contenant l'utilisateur à modifier
         *
         * @param array $user
         * @return void
         */
        public function updateForm($user) {
            // var_dump($user);
            $this->page .= "<h1>Modification de l'utilisateur</h1>";
            $this->page .= "<p>Je modifie un utilisateur via un formulaire</p>";
            
            $this->page .= file_get_contents('template/formUser.html');
            
            $this->page = str_replace('{action}', 'updateDB', $this->page);
            $this->page = str_replace('{id}', $user['id'], $this->page);
            $this->page = str_replace('{username}', $user['username'], $this->page);
            $this->page = str_replace('{password}', $user['password'], $this->page);
            $this->page = str_replace('{lastname}', $user['lastname'], $this->page);
            $this->page = str_replace('{firstname}', $user['firstname'], $this->page);
            // $categories = "";

            // foreach($listCategories as $category) {
            //     $selected = "";
            //     if ($new['category'] == $category['id']) {
            //         $selected = 'selected';
            //     }
            //     $categories .= "<option $selected value='" . $category['id'] . "'>" . $category['name'] . "</option>";
            // }
            
            // $this->page = str_replace('{categories}', $categories, $this->page);

            $this->displayPage();
        }

    }