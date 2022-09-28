<?php
    $page_list = array(
        array(
            "name"=>"welcome",
            "title"=>"Accueil",
            "menutitle"=>"Accueil"),
        array(
            "name"=>"register",
            "title"=>"Inscription",
            "menutitle"=>"Inscription"),
        array(
            "name"=>"connexionPlayer",
            "title"=>"Connection",
            "menutitle"=>"Connection"),
        array(
            "name"=>"connexionCoach",
            "title"=>"Connection",
            "menutitle"=>"Connection"),
        array(
            "name"=>"changePassword",
            "title"=>"Changer de mot de passe",
            "menutitle"=>"Change Password"),
        array(
            "name"=>"deleteUser",
            "title"=>"Supprimer mon compte",
            "menutitle"=>"Delete User"),
        array(
            "name"=>"monCompte",
            "title"=>"Mon Compte",
            "menutitle"=>"Mon compte"),
        array(
            "name"=>"ficheJoueur",
            "title"=>"Fiche Joueur",
            "menutitle"=>"Ma fiche"),
        array(
            "name"=>"team",
            "title"=>"Mon équipe",
            "menutitle"=>"Mon équipe"),
        array(
            "name"=>"changePhoto",
            "title"=>"Modifier ma photo",
            "menutitle"=>"Modifier ma photo"),
        );
        
    
    function checkPage($askedPage){
        global $page_list;
        foreach($page_list as $page){
            if ($page["name"] == $askedPage) return true;
        }
        return false;
    }

    function getPageTitle($pageName){
        global $page_list;
        foreach($page_list as $page){
            if($page["name"] == $pageName) return $page["title"];
        }
        return;
    }

    function generateMenu(){
        echo <<<CHAINE_DE_FIN
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
                <div class="container-fluid">
                    <a class="navbar-brand" href='http://localhost/LACOMPO/index.php?page=welcome'>LA COMPO</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">    
CHAINE_DE_FIN;

        if(array_key_exists('loggedIn',$_SESSION) && $_SESSION['loggedIn'] == false) {
            echo <<<CHAINE_DE_FIN
CHAINE_DE_FIN;
        }

        else{
            if($_SESSION['type'] == 'player'){
                echo <<<CHAINE_DE_FIN
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='http://localhost/LACOMPO/index.php?page=ficheJoueur'>Ma fiche</a>
                            </li>
CHAINE_DE_FIN;
            }
            $login = $_SESSION['login'];
            echo <<<CHAINE_DE_FIN
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='http://localhost/LACOMPO/index.php?page=team'>Mon équipe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='http://localhost/LACOMPO/index.php?page=monCompte'>Mon Compte ($login)</a>
                            </li>
                            <li class="nav-item">
                                <a href='http://localhost/LACOMPO/index.php?todo=logout' class="btn btn-outline-danger active" role="button" title="Lien 1">Se déconnecter</a>
                            </li>
                        
CHAINE_DE_FIN;
        }
        echo <<<CHAINE_DE_FIN
                        </ul>  
                    </div> 
                </div>  
            </nav>
CHAINE_DE_FIN;
    }

    function generateHTMLHeader($title, $style){
        echo <<<CHAINE_DE_FIN
            <!DOCTYPE html>
            <html>
            <head>
            <link href="CSS/bootstrap-5.1.3/css/bootstrap.min.css" rel="stylesheet">
            <script src="CSS/bootstrap-5.1.3/js/bootstrap.min.js"></script>
            <meta charset='UTF-8'/>
            <meta name='author' content='NavAxel'/>
            <meta name='keywords' content='Mots clefs relatifs à cette page'/>
            <meta name='description' content='Descriptif court'/>
            <title>$title</title>
            <link rel='stylesheet' type='text/css' href='CSS/Perso/$style.css'/>
            </head>
            <body>
CHAINE_DE_FIN;
    }

    function generateHTMLFooter(){
        echo <<<CHAINE_DE_FIN
            </body>
            </html>
CHAINE_DE_FIN;
    }

?>