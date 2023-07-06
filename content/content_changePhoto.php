<?php 
    function affiche(){
        echo "<h1>Modifier mes informations</h1>";
        if (!$_SESSION['loggedIn']){
            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Connectez vous avant de modifier votre compte.</div>";
        }

        else{
            $dbh = Database::connect();
            $login = $_SESSION['login'];

            //On récupère l'utilisateur(dépend de si c'est un joueur ou un coach)
            if ($_SESSION['type'] == 'player'){
                $user = Joueur::getUtilisateur($dbh, $login);
            }
            else {
                $user = Coach::getUtilisateur($dbh, $login);
            }
            
            if ($user == null){
                echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Votre compte n'existe pas dans la base de donnée, veuillez changer de compte.</div>";
            }
            else {
                if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'changePhoto'){
                    if(isset($_POST['up'])){
                        $mdp = $_POST['up'];
                        if(!$user->testerMdp($dbh, $mdp)){
                            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Mot de passe incorrect.</div>";
                            printChangePhotoForm();
                        }
                        else {
                            // ex pour une image jpg
                            if (!empty($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
                                // Le fichier a bien été téléchargé
                                // Par sécurité on utilise getimagesize plutot que les variables $_FILES
                                list($larg,$haut,$type,$attr) = getimagesize($_FILES['photo']['tmp_name']);
                                // JPEG => type=2
                                if ($type == 2) {

                                    $image = file_get_contents("/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg");
                                    //on supprime l'ancienne photo de profil tout en gardant une sauvegarde si jamais l'importation ne fonctionne pas
                                    unlink("/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg");

                                    if(move_uploaded_file($_FILES['photo']['tmp_name'],"/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg")){
                                    echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Changement de photo effectué. Allez voir votre nouveau profil dans la section ma fiche.</div>";
                                    }
                                    else{
                                        echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Erreur de copie.</div>";
                                        //on remet l'ancienne image en tant que photo de profil
                                        move_uploaded_file($image,"/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg");
                                        printChangePhotoForm();
                                    }
                                
                                }
                                else {
                                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Mauvais type de fichier pour la photo. Veuillez choisir une image au format .jpg.</div>";
                                    printChangePhotoForm();
                                }
                            }
                            else {
                                echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>a.</div>";
                                printChangePhotoForm();
                            }
                        }
                    }
                    else {
                        echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>b.</div>";
                        printChangePhotoForm();
                    }
                    
                }
                else {
                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>c.</div>";
                    printChangePhotoForm();
                }
                

            }
        }
    }
?>