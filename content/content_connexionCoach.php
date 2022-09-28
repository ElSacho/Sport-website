<?php
function affiche(){
    if(array_key_exists('loggedIn',$_SESSION) && $_SESSION["loggedIn"]) {
        echo "<p>Vous êtes actuellement connecté. Pour se connecter à une autre session, déconnectez-vous d'abord de la session actuelle.</p>";
    }
    else {
        $_POST['type'] = 'coach';
        echo <<<CHAINE_DE_FIN
        <div class='row'>
            <div class='col-sm-2'></div>
            <div style='text-align:center' class='col-sm-8'><h1>Connection en tant qu'entraineur :</h1></div>
            <div class='col-sm-2'></div>";
        </div>
        <div class='row'>
            <div class='col-sm-4'></div>
            <div style="text-align:center" class="col-sm-4">
                <div class="card">
                    <h5 class="card-header bg-warning text-black">Remplir les champs suivants :</h5>
                    <div class="card-body bg-dark text-white">
CHAINE_DE_FIN;
        printLoginCoachForm();
        echo <<<CHAINE_DE_FIN
                    </div>
                </div>
            </div>
        </div>
CHAINE_DE_FIN;
    }
}

?>