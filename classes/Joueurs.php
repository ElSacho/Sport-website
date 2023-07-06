<?php

class Joueur {
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $sport;
    public $poste;
    

    public static function getAllUsers($dbh){
        $query = "SELECT * FROM joueurs";
        $tab = array();
        $i = 0;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Joueur');
        $sth->execute();
        while ($courant =  $sth->fetch()){
            $tab[$i++] = $courant;
        }
        $sth->closeCursor();
        return $tab;
    }
 
    public static function getUtilisateur($dbh, $login) {
        $query = "SELECT * FROM joueurs WHERE login = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Joueur');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
    }
    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$sport,$poste) {
        if(Joueur::getUtilisateur($dbh,$login) == null){
            $mdp = password_hash($mdp,PASSWORD_DEFAULT);
            $sth = $dbh->prepare('INSERT INTO joueurs (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `sport`, `poste`) VALUES(?,?,?,?,?,?,?,?)');
            $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$sport,$poste));
        }
    }
 
    public function testerMdp($dbh, $mdp) {
        return password_verify($mdp, $this->mdp);
    }

    public static function getPlayersByPosition($dbh,$sport,$poste){
        $query = "SELECT * FROM joueurs WHERE sport=? AND poste=?";
        $tab = array();
        $i = 0;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Joueur');
        $sth->execute(array($sport,$poste));
        while ($courant =  $sth->fetch()){
            $tab[$i++] = $courant;
        }
        $sth->closeCursor();
        return $tab;
    }

}
