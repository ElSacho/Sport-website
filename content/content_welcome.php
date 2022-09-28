<?php
    function affiche(){
        if(array_key_exists('loggedIn',$_SESSION) && $_SESSION["loggedIn"]){
            echo "<h1>[Insérer mes prochains matchs].</h1>";
        
        }
        else {
        echo "<h1>Bienvenue sur le site de LA COMPO.</h1>";
        echo "<h1>[Insérer les prochains matchs à l'X].</h1>"; 
        echo <<<CHAINE_DE_FIN
        <div class="p-3 mb-2 bg-dark text-white">
            <div class="row">
                <div style="text-align:center" class="col-sm-8 connection">
                    <h2>SE CONNECTER :</h2>
                </div>
                <div style="text-align:center" class="col-sm-4 connection">
                    <h2>S'INSCRIRE :</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <a href='http://localhost/LACOMPO/index.php?page=connexionPlayer' class="btn btn-outline-danger active btn-lg" role="button" title="Lien 1">Joueur</a>
                        </div>
                    </p>
                </div>

                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <a href='http://localhost/LACOMPO/index.php?page=connexionCoach' class="btn btn-outline-warning active btn-lg" role="button" title="Lien 1">Entraineur</a>
                        </div>
                    </p>
                </div>

                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <a href='http://localhost/LACOMPO/index.php?page=register' class="btn btn-outline-light active btn-lg" role="button" title="Lien 1">Inscription</a>
                        </div>
                    </p>
                </div>
            </div>
            <div class="row">
                <div style="text-align:center" class="col-sm-4">
                    <p>
                        Je suis un joueur d'une équipe de l'X.
                    </p>
                </div>

                <div style="text-align:center" class="col-sm-4">
                    <p>
                        Je suis un chef de section ou un entraineur de l'X.
                    </p>
                </div>

                <div style="text-align:center" class="col-sm-4">
                    <p>
                        Je suis un nouvel entraineur ou joueur de l'X.
                    </p>
                </div>
            </div>
        </div>
CHAINE_DE_FIN;
        }
    }
?>
