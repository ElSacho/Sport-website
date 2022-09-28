<?php 
    $POSTE = array(
        "Rugby" => array("1ère ligne","2ème ligne","3ème ligne","Charnière","Centre","Ailier/Arrière")
    );
    function affiche(){
        global $POSTE;
        if(array_key_exists('loggedIn',$_SESSION) && $_SESSION["loggedIn"]){
            $dbh = Database::connect();
            if ($_SESSION['type'] == 'player'){
                $sport = Joueur::getUtilisateur($dbh,$_SESSION['login'])->sport;
            }
            else {
                $sport = Coach::getUtilisateur($dbh,$_SESSION['login'])->sport;
            }
            foreach($POSTE[$sport] as $poste){
                echo "<div style='text-align:center' class='row'>";
                echo "<span class='d-block p-2 bg-dark text-white'>$poste</span>";
                $tab = Joueur::getPlayersByPosition($dbh,$sport,$poste);
                foreach($tab as $player){
                    echo "<div class='col-sm-2'>";
                    printPlayerCard($player);
                    echo "</div>";
                }
                echo "</div>";
            }
        }
        else {
            echo "<div class='bg-danger p-2 text-dark bg-opacity-50'>Erreur. Connectez-vous à votre compte pour voir vos équipes.</div>";
        }
    }
?>