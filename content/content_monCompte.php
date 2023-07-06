<?php
    function affiche(){
        echo <<<CHAINE_DE_FIN
            <h1>Mon Compte</h1>
            <h2>Paramètres</h2>
            <ul>
                <li><a href='http://localhost/LACOMPO/index.php?page=changePassword' class='btn btn-outline-success active btn-block' role='button' >Modifier mon mot de passe</a></li>
                <li><a href='http://localhost/LACOMPO/index.php?page=deleteUser' class='btn btn-outline-danger active btn-block' role='button' >Supprimer mon compte</a></li>
                <li><a href='http://localhost/LACOMPO/index.php?page=changePhoto' class='btn btn-outline-primary active btn-block' role='button' >Changer ma photo</a></li>
            </ul>
CHAINE_DE_FIN;
    }
?>