<?php
class Database {
    
    //faire $dbh = Database::connect() avant les appels de fonction qui requiert $dbh
    //faire $dbh = null lorsque plus besoin de la base de données

    public static function connect() {
        $dsn = 'mysql:dbname=LACOMPO;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}
 
function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille) {
    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
    $sth = $dbh->prepare('INSERT INTO joueurs (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `sport`, `poste`) VALUES(?,?,?,?,?,?,?,?)');
    $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
}

function afficher($dbh){
    $query = "SELECT * FROM joueurs";
    $sth = $dbh->prepare($query);
    $request_succeeded = $sth->execute();
    while ($request_succeeded and $courant =  $sth->fetch(PDO::FETCH_ASSOC)){
        // affichage des champs d'intérêt : $courant['nom'], etc
    }
}
$dbh = null;
?>