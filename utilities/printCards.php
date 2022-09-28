<?php 
    function printPlayerCard($player){
        echo <<<CHAINE_DE_FIN
            <div class="card" style="text-align:center">
                <div class="card-body">
                    <img class="fit-picture" src="images/$player->login.jpg" height=100>
                    <h2>$player->prenom</h2>
                    <h2>$player->nom</h2>
                    <p>$player->poste</p>
                    <a href='http://localhost/LACOMPO/index.php?page=ficheJoueur&player=$player->login' class="btn btn-primary stretched-link">Voir fiche</a>
                </div>
            </div>
CHAINE_DE_FIN;
    }

    function printMatchCard(){
        
    }
?>