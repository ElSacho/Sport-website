<?php
//require('classes/Utilisateurs.php');
//require('classes/Database.php');
//require('utilities/printForms.php');
function affiche(){
    if(array_key_exists('loggedIn',$_SESSION) && $_SESSION["loggedIn"]) {
        echo "<p>Vous êtes actuellement connecté. Pour créer une nouvelle session, déconnectez-vous d'abord de la session actuelle.</p>";
    }
    else {
        //Si l'utilisateur fait une demande d'inscription en tant que joueur
        if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'registerPlayer'){
            $form_values_valid=false;
            $dbh = Database::connect();
            //Si tous les champs ont été remplis
            if(isset($_POST["login"]) && $_POST["login"] != "" &&
            isset($_POST["nom"]) && $_POST["nom"] != "" &&
            isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
            isset($_POST["naissance"]) && $_POST["naissance"] != "" &&
            isset($_POST["promotion"]) && $_POST["promotion"] != "" &&
            isset($_POST["sport"]) && $_POST["sport"] != "" &&
            isset($_POST["poste"]) && $_POST["poste"] != "" &&
            isset($_POST["up"]) && $_POST["up"] != "" &&
            isset($_POST["up2"]) && $_POST["up2"] != "") {  
                $login = $_POST["login"];
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $naissance = $_POST["naissance"];
                $promotion = $_POST["promotion"];
                $sport = $_POST["sport"];
                $poste = $_POST["poste"];
                $mdp = $_POST["up"];
                $mdp2 = $_POST["up2"];
                if (Joueur::getUtilisateur($dbh, $login) == null && $mdp == $mdp2) {
                    // ex pour une image jpg
                    if (!empty($_FILES['photo']['tmp_name']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
                    // Le fichier a bien été téléchargé
                    // Par sécurité on utilise getimagesize plutot que les variables $_FILES
                        list($larg,$haut,$type,$attr) = getimagesize($_FILES['photo']['tmp_name']);
                        // JPEG => type=2
                        if ($type == 2) {
                            if(move_uploaded_file($_FILES['photo']['tmp_name'],"/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg")){
                                echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Enregistrement effectué. Pour vous connectez à ce compte, veuillez retourner à l'accueil pour vous connecter en tant que joueur avec vos identifiants.</div>";
                                Joueur::insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$sport,$poste);
                            }
                            else{
                                echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Erreur de copie.</div>";
                            }
                            
                        }
                        else {
                            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Mauvais type de fichier pour la photo. Veuillez choisir une image au format .jpg.</div>";
                            printRegisterPlayerForm($login,$nom,$prenom,$promotion,$naissance,$sport,$poste);
                        }
                    }
                    else {
                        printRegisterPlayerForm($login,$nom,$prenom,$promotion,$naissance,$sport,$poste);
                    }
                }
                else {
                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Ce login existe déjà, veuillez le modifier.</div>";
                    printRegisterPlayerForm($login,$nom,$prenom,$promotion,$naissance,$sport,$poste);
                    
                }
            }

            //Si un champ n'a pas été rempli
            else{
                printRegisterForm();
            }
        } 

        //Si l'utilisateur fait une demande d'inscription en tant qu'entraineur)
        else if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'registerCoach'){
            $form_values_valid=false;
            $dbh = Database::connect();

            //Si tous les champs ont été remplis
            if(isset($_POST["login"]) && $_POST["login"] != "" &&
            isset($_POST["nom"]) && $_POST["nom"] != "" &&
            isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
            isset($_POST["sport"]) && $_POST["sport"] != "" &&
            isset($_POST["up"]) && $_POST["up"] != "" &&
            isset($_POST["up2"]) && $_POST["up2"] != "") {  
                $login = $_POST["login"];
                $nom = $_POST["nom"];
                $prenom = $_POST["prenom"];
                $sport = $_POST["sport"];
                $mdp = $_POST["up"];
                $mdp2 = $_POST["up2"];
                if (Coach::getUtilisateur($dbh, $login) == null && $mdp == $mdp2) {
                    $form_values_valid = true;
                    echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Enregistrement effectué. Pour vous connectez à ce compte, veuillez retourner à l'accueil pour vous connecter en tant que joueur avec vos identifiants.</div>";
                    Coach::insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$sport);
                }
                if (!$form_values_valid) {
                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Ce login existe déjà, veuillez le modifier.</div>";
                    printRegisterCoachForm($login,$nom,$prenom,$sport);
                    
                }
            }
        }
        else {
            printRegisterForm();
        }
    }
}   
?>