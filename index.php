<?php
    session_name("NomDeSessionAModifierSelonVotreGout");
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }

    require("utilities/printForms.php");
    require("classes/Database.php");
    require("classes/Joueurs.php");
    require("classes/Coachs.php");
    require("utilities/utils.php");
    require("utilities/logInOut.php");
    require("utilities/printCards.php");
    
    $dbh = Database::connect();
    if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'login'){
        logIn($dbh);
    }
    if (array_key_exists('todo',$_GET) && $_GET['todo'] == 'logout'){
        logOut($dbh);
    }
    if(isset($_GET["page"]) && checkPage($_GET["page"])) {
        $askedPage = $_GET["page"];
    }
    else {
        $askedPage = 'welcome';
    }

    $pageTitle = getPageTitle($askedPage);
    generateHTMLHeader($pageTitle,"feuilleStyle");
    echo "<nav id='menu'>";
        generateMenu();
    echo "</nav>";
    

    echo "<div id='content'>";
    require("content/content_$askedPage.php");
    affiche($askedPage);
    echo "</div>";
    
    //var_dump($_SESSION);
    
    $dbh = null;
    generateHTMLFooter();
?>