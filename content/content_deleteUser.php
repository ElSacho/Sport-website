<?php 
    function affiche(){
        echo "<h1>Supprimer mon compte</h1>";
        if (!$_SESSION['loggedIn']){
            echo "<p>Connectez vous à un compte avant de vouloir le supprimer.</p>";
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
                if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'deleteUser'){
                    if(isset($_POST['up'])){
                        $mdp = $_POST['up'];
                        if(!$user->testerMdp($dbh, $mdp)){
                            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Le mot de passe est incorrect.</div>";
                            printDeleteUserForm();
                        }
                        else {
                            if ($_SESSION['type'] == 'player'){
                                unlink("/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg");
                                $query = "DELETE FROM joueurs WHERE login=?;";
                            }
                            else {
                                unlink("/Applications/XAMPP/xamppfiles/htdocs/LACOMPO/images/$login.jpg");
                                $query = "DELETE FROM entraineurs WHERE login=?;";
                            }
                            
                            $sth = $dbh->prepare($query);
                            $sth->execute(array($login));
                            logOut();
                            echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Compte supprimé.</div>";
                        }
                    }
                    else {
                        printDeleteUserForm();
                    }
                    
                }
                else {
                    printDeleteUserForm();
                }
                

            }
        }
    }
?>