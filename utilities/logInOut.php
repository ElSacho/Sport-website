<?php 
    function logIn($dbh){
        if (array_key_exists('login',$_POST) && array_key_exists('password',$_POST)){
            $login = $_POST["login"];
            $mdp = $_POST["password"];

            if (!isset($_GET["page"])) {
                echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Erreur de page.</div>";
            }

            else if ($_GET['page'] == 'connexionPlayer'){
                $user = Joueur::getUtilisateur($dbh,$login);
                if ($user == null){
                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Ce joueur n'existe pas.</div>";
                }
                else {
                    if($user->testerMdp($dbh,$mdp)){
                        echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Félicitations ! Tu es désormais connecté à ton compte, tu peux naviguer à travers les différents onglets dans la barre de navigation.</div>";
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['login'] = $login;
                        $_SESSION['type'] = 'player';
                    }
                    else {
                        echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Mot de passe incorrect.</div>";
                    }
                }
            }
            
            else if ($_GET['page'] == 'connexionCoach'){
                $user = Coach::getUtilisateur($dbh,$login);
                if ($user == null){
                    echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Cet entraineur n'existe pas.</div>";
                }
                else {
                    if($user->testerMdp($dbh,$mdp)){
                        echo "<div class='bg-success p-2 text-dark bg-opacity-50'>Félicitations ! Tu es désormais connecté à ton compte, tu peux naviguer à travers les différents onglets dans la barre de navigation.</div>";
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['login'] = $login;
                        $_SESSION['type'] = 'coach';
                    }
                    else {
                        echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Mot de passe incorrect.</div>";
                    }
                }
            }

        }
    }
        

    function logOut(){
        $_SESSION['loggedIn'] = false;
        unset($_SESSION['type']);
        unset($_SESSION['login']);
    }
?>