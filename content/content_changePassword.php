<?php 
    function affiche(){
        echo "<h1>Changer de mot de passe</h1>";
        if (!$_SESSION['loggedIn']){
            echo "<p>Connectez vous avant de changer de mot de passe.</p>";
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
                if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'changePassword'){
                    if(isset($_POST['up']) && isset($_POST['up2']) && isset($_POST['up3'])){
                        $oldMdp = $_POST['up'];
                        $newMdp = $_POST['up2'];
                        $newMdp2 = $_POST['up3'];
                        if(!$user->testerMdp($dbh, $oldMdp)){
                            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>L'ancien mot de passe est incorrect.</div>";
                            printChangePasswordForm();
                        }
                        else {
                            if ($newMdp != $newMdp2){
                                echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Les champs pour le nouveau mot de passe sont différents.</div>";
                                printChangePasswordForm();
                            }
                            else{
                                if ($_SESSION['type'] == 'player'){
                                    $query = "UPDATE joueurs SET mdp=? WHERE login=?";
                                }
                                else {
                                    $query = "UPDATE entraineurs SET mdp=? WHERE login=?";
                                }
                                $newMdpHash = password_hash($newMdp,PASSWORD_DEFAULT);
                                $sth = $dbh->prepare($query);
                                $sth->execute(array($newMdpHash,$login));
                                echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Mot de passe changé avec succès.</div>";
                            }
                        }
                    }
                    else {
                        printChangePasswordForm();
                    }
                    
                }
                else {
                    printChangePasswordForm();
                }
                

            }
        }
    }
?>