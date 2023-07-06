<?php 
    function printLoginPlayerForm(){
        echo "<form action='index.php?todo=login&page=connexionPlayer' method='POST'>";
        echo "<p>Nom d'utilisateur :</p>";
        echo '<input type="text" name="login" placeholder="login" required/>';
        echo '<p></p>';
        echo '<p>Mot de passe :</p>';
        echo '<input type="password" name="password" placeholder="password" required />';
        echo '<p></p>';
        echo '<p><input type="submit" class="btn btn-success" value="Valider" /></p>';
        echo '</form>';
    }

    function printLoginCoachForm(){
        echo "<form action='index.php?todo=login&page=connexionCoach' method='POST'>";
        echo "<p>Nom d'utilisateur :</p>";
        echo '<input type="text" name="login" placeholder="login" required/>';
        echo '<p></p>';
        echo '<p>Mot de passe :</p>';
        echo '<input type="password" name="password" placeholder="password" required />';
        echo '<p></p>';
        echo '<p><input type="submit" class="btn btn-success" value="Valider" /></p>';
        echo '</form>';
    }

    function prinLogoutForm(){
        echo "<div style='text-align:right'>";
            echo "<a href='index.php?page=accueil&todo=logout'><input type='submit' value='Deconnexion' class='btn btn-danger'></a>";
            echo "<a href='index.php?page=compte><input type='button' value='Mon compte' class='btn btn-primary'></a>";
        echo "</div>";
    }

    function printRegisterForm(){
        echo <<<CHAINE_DE_FIN
            <div class='row'>
                <div class='col-sm-2'></div>
                <div style='text-align:center' class='col-sm-8'>
                    <h1>Inscription :</h1>
                    <h3>Êtes-vous :</h3>
                </div>
                <div class='col-sm-2'></div>";
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            JOUEUR
                            </button>
                        </div>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card text-center">
                            <div class="card-body">
                                <p class="card-text">Tu es un élève de l'X qui pratique un sport en section.</p>
                                <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerPlayer" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="photo">Photo :</label>
                                        <input type="file" required name="photo"/>
                                    </p>

                                    <p>
                                        <label for="naissance">Date de naissance :</label>
                                        <input id="naissance" type=date required name=naissance>
                                    </p>

                                    <p>
                                        <label for="promotion">Promotion :</label>
                                        <select class="form-select" id="promotion" type=text required name=promotion aria-label="Default select example">
                                            <option selected></option>
                                            <option value="X2019">X2019</option>
                                            <option value="X2020">X2020</option>
                                            <option value="X2021">X2021</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Master">Master</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="poste">Poste :</label>
                                        <select class="form-select" id="poste" type=text required name=poste aria-label="Default select example">
                                            <option selected></option>
                                            <option value="1ère ligne">1ère ligne</option>
                                            <option value="2ème ligne">2ème ligne</option>
                                            <option value="3ème ligne">3ème ligne</option>
                                            <option value="Charnière">Charnière</option>
                                            <option value="Centre">Centre</option>
                                            <option value="Ailier/Arrière">Ailier/Arrière</option>
                                        </select>
                                    </p>
                                    
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                        <p>
                            <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    ENTRAINEUR
                                    </button>
                                </div>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="card-text">Tu es chef de section ou entraineur d'une équipe de l'X.</p>
                                        <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerCoach" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="photo">Photo :</label>
                                        <input type="file" required name="photo"/>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>
            
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
            </div>
CHAINE_DE_FIN;

    }

    function printRegisterPlayerForm($login,$nom,$prenom,$promotion,$naissance,$sport,$poste){
        echo <<<CHAINE_DE_FIN
            <div class='row'>
                <div class='col-sm-2'></div>
                <div style='text-align:center' class='col-sm-8'>
                    <h1>Inscription :</h1>
                    <h3>Êtes-vous :</h3>
                </div>
                <div class='col-sm-2'></div>";
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            JOUEUR
                            </button>
                        </div>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card text-center">
                            <div class="card-body">
                                <p class="card-text">Tu es un élève de l'X qui pratique un sport en section.</p>
                                <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerPlayer" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" value=$login placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" value=$nom placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" value=$prenom placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="photo">Photo :</label>
                                        <input type="file" value=images/$login.jpg required name="photo"/>
                                    </p>

                                    <p>
                                        <label for="naissance">Date de naissance :</label>
                                        <input id="naissance" value=$naissance type=date required name=naissance>
                                    </p>

                                    <p>
                                        <label for="promotion">Promotion :</label>
                                        <select class="form-select" id="promotion" type=text required name=promotion aria-label="Default select example">
                                            <option selected>$promotion</option>
                                            <option value="X2019">X2019</option>
                                            <option value="X2020">X2020</option>
                                            <option value="X2021">X2021</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Master">Master</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected>$sport</option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="poste">Poste :</label>
                                        <select class="form-select" id="poste" type=text required name=poste aria-label="Default select example">
                                            <option selected>$poste</option>
                                            <option value="1ère ligne">1ère ligne</option>
                                            <option value="2ème ligne">2ème ligne</option>
                                            <option value="3ème ligne">3ème ligne</option>
                                            <option value="Charnière">Charnière</option>
                                            <option value="Centre">Centre</option>
                                            <option value="Ailier/Arrière">Ailier/Arrière</option>
                                        </select>
                                    </p>
            
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                        <p>
                            <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    ENTRAINEUR
                                    </button>
                                </div>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="card-text">Tu es chef de section ou entraineur d'une équipe de l'X.</p>
                                        <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerCoach" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="photo">Photo :</label>
                                        <input type="file" required name="photo"/>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>
            
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
            </div>
CHAINE_DE_FIN;

    }

    function printRegisterCoachForm($login,$nom,$prenom,$sport){
        echo <<<CHAINE_DE_FIN
            <div class='row'>
                <div class='col-sm-2'></div>
                <div style='text-align:center' class='col-sm-8'>
                    <h1>Inscription :</h1>
                    <h3>Êtes-vous :</h3>
                </div>
                <div class='col-sm-2'></div>";
            </div>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <p>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            JOUEUR
                            </button>
                        </div>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card text-center">
                            <div class="card-body">
                                <p class="card-text">Tu es un élève de l'X qui pratique un sport en section.</p>
                                <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerPlayer" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="photo">Photo :</label>
                                        <input type="file" required name="photo"/>
                                    </p>
            
                                    <p>
                                        <label for="naissance">Date de naissance :</label>
                                        <input id="naissance" type=date required name=naissance>
                                    </p>

                                    <p>
                                        <label for="promotion">Promotion :</label>
                                        <select class="form-select" id="promotion" type=text required name=promotion aria-label="Default select example">
                                            <option selected></option>
                                            <option value="X2019">X2019</option>
                                            <option value="X2020">X2020</option>
                                            <option value="X2021">X2021</option>
                                            <option value="Bachelor">Bachelor</option>
                                            <option value="Master">Master</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected></option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>

                                    <p>
                                        <label for="poste">Poste :</label>
                                        <select class="form-select" id="poste" type=text required name=poste aria-label="Default select example">
                                            <option selected></option>
                                            <option value="1ère ligne">1ère ligne</option>
                                            <option value="2ème ligne">2ème ligne</option>
                                            <option value="3ème ligne">3ème ligne</option>
                                            <option value="Charnière">Charnière</option>
                                            <option value="Centre">Centre</option>
                                            <option value="Ailier/Arrière">Ailier/Arrière</option>
                                        </select>
                                    </p>
            
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                        <p>
                            <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    ENTRAINEUR
                                    </button>
                                </div>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card text-center">
                                    <div class="card-body">
                                        <p class="card-text">Tu es chef de section ou entraineur d'une équipe de l'X.</p>
                                        <p class="card-text"> 
                                    <form action="index.php?page=register&todo=registerCoach" method=post
                                    oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')" enctype="multipart/form-data">

                                    <p>
                                        <label for="login">Login :</label>
                                        <input id="login" value=$login placeholder="Login" type=text required name=login>
                                    </p>

                                    <p>
                                        <label for="nom">Nom :</label>
                                        <input id="nom" value=$nom placeholder="Nom" type=text required name=nom>
                                    </p>
            
                                    <p>
                                        <label for="prenom">Prénom :</label>
                                        <input id="prenom" value=$prenom placeholder="Prénom" type=text required name=prenom>
                                    </p>

                                    <p>
                                        <label for="sport">Sport :</label>
                                        <select class="form-select" id="sport" type=text required name=sport aria-label="Default select example">
                                            <option selected>$sport</option>
                                            <option value="Rugby">Rugby</option>
                                            <option value="Handball">Handball</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Volleyball">Voleyball</option>
                                        </select>
                                    </p>
            
                                    <p>
                                        <label for="password1">Mot de passe :</label>
                                        <input id="password1" type=password required name=up>
                                    </p>
            
                                    <p>
                                        <label for="password2">Confirmer mot de passe :</label>
                                        <input id="password2" type=password name=up2>
                                    </p>
            
                                    <input type=submit class="btn btn-outline-success" value="Create account">
                                    </form>
                                </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
            </div>
CHAINE_DE_FIN;

    }

    function printChangePasswordForm(){
        echo <<<CHAINE_DE_FIN
            <form action="index.php?page=changePassword&todo=changePassword" method=post>

             <p>
              <label for="password1">Ancien mot de passe:</label>
              <input id="password1" type=password required name=up>
             </p>
            
             <p>
              <label for="password2">Nouveau mot de passe:</label>
              <input id="password2" type=password name=up2>
             </p>

             <p>
              <label for="password3">Confirmer nouveau mot de passe:</label>
              <input id="password3" type=password name=up3>
             </p>
            
              <input type=submit value="Changer mot de passe">
            </form>
CHAINE_DE_FIN;
    }

    function printDeleteUserForm(){
        $login = $_SESSION['login'];
        echo <<<CHAINE_DE_FIN
            <form action="index.php?page=deleteUser&todo=deleteUser" method=post>

             <p>
              <label for="password">Mot de passe:</label>
              <input id="password" type=password required name=up>
             </p>
            
              <input type=submit value="Supprimer le compte associé au login : $login">
            </form>
CHAINE_DE_FIN;
    }

    function printChangePhotoForm(){
        echo <<<CHAINE_DE_FIN
            <form action="index.php?page=changePhoto&todo=changePhoto" method=post enctype="multipart/form-data">
                
                <p>
                    <label for="photo">Photo :</label>
                    <input type="file" required name="photo"/>
                </p>

                <p>
                    <label for="password">Mot de passe:</label>
                    <input id="password" type=password required name=up>
                </p>
              <input type=submit value="Modifier ma photo">
            </form>
CHAINE_DE_FIN;
    }
?>