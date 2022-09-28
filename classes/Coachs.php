<?php

class Coach {
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $sport;
    
    

    public static function getAllUsers($dbh){
        $query = "SELECT * FROM entraineurs";
        $tab = array();
        $i = 0;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Coach');
        $sth->execute();
        while ($courant =  $sth->fetch()){
            $tab[$i++] = $courant;
        }
        $sth->closeCursor();
        return $tab;
    }
 
    public static function getUtilisateur($dbh, $login) {
        $query = "SELECT * FROM entraineurs WHERE login = ?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Coach');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
    }
    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$sport) {
        if(Coach::getUtilisateur($dbh,$login) == null){
            $mdp = password_hash($mdp,PASSWORD_DEFAULT);
            $sth = $dbh->prepare('INSERT INTO entraineurs (`login`, `mdp`, `nom`, `prenom`, `sport`) VALUES(?,?,?,?,?,?,?,?)');
            $sth->execute(array($login,$mdp,$nom,$prenom,$sport));
        }
    }
 
    public function testerMdp($dbh, $mdp) {
        return password_verify($mdp, $this->mdp);
    }


}