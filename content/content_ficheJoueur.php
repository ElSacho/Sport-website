<?php

function affiche(){
    if (array_key_exists('player',$_GET)) {
        $login = $_GET['player'];
    }
    else if ($_SESSION['type'] == 'player'){
        $login = $_SESSION['login'];
    }
    else {
        echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Aucun joueur précisé dans l'URL et vous n'êtes pas connecté à un compte joueur.</div>";
        return;
    }
    $dbh = Database::connect();
    $user = Joueur::getUtilisateur($dbh,$login);
    var_dump($login);
    echo <<<CHAINE_DE_FIN
        <div class='row'>
            <div class='col-sm-2'></div>
            <div style='text-align:center' class='col-sm-8'>
                
                <img class="fit-picture" src="images/$login.jpg" height=200>
                
                <h1>$user->prenom $user->nom</h1>
                <p></p>

                <h2>Promotion</h2>
                <p>$user->promotion</p>
                <p></p>
            
                <h2>Poste</h2>
                <p>$user->poste</p>
                <p></p>

                <h2>Note moyenne</h2>
                <p></p>
                <p></p>

                <h2>Mes matchs</h2>

            </div>
            <div class='col-sm-2'></div>";
        </div>
CHAINE_DE_FIN;
}

?>