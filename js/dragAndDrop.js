var composition = [];


function onDragStart(event) {
    event
      .dataTransfer
      .setData('text/plain', event.target.id);

    event
          .currentTarget
          .style
}

function onDragOver(event) {
    event.preventDefault();
}

function onDrop(event) {
    const id = event
        .dataTransfer
        .getData('text');
    const draggableElement = document.getElementById(id);
    const dropzone = event.target;
    if(draggableElement != null){
        dropzone.prepend(draggableElement);
    
        var i = dropzone.getAttribute("id");

        //Afficher le bouton d'annulation
        $("#b"+i).show();

        event
            .dataTransfer
            .clearData();

        //On ajoute le joueur à la composition
        composition[i] = draggableElement.getAttribute("id");

        //On ne peut plus drop des joueurs dans le slot
        dropzone.removeAttribute("ondragover");
        dropzone.removeAttribute("ondrop");
        draggableElement.removeAttribute("ondragstart");
        draggableElement.removeAttribute("draggable")
    }
    


    if(testCompo()){
        document.getElementById("compo").setAttribute("value",composition);
        document.getElementById("valid").setAttribute("class", "btn btn-lg secular btn-success");
    }

}


//Pour obtenir l'objet contenu dans un div on fait : document.getElementById(i).childNodes[0];
    

function cancel(i) {
    //On retire le joueur de la composition
    composition[i] = null;

    const dropzone = document.getElementById(i);
    //dropzone.style.height = "20px";
    var joueur = dropzone.childNodes[0];
    var poste = joueur.getAttribute('data-bs-poste');
    const listeJoueur = document.getElementById('multiCollapseExample'+poste);
    listeJoueur.appendChild(joueur);
    
    //On cache le bouton d'annulation
    $("#b"+i).hide();

    //On redonne la capaicté de drop des joueurs dans le slot et on redonne la capacité au joueur d'être drag&drop
    dropzone.setAttribute("ondragover","onDragOver(event);");
    dropzone.setAttribute("ondrop","onDrop(event);");
    joueur.setAttribute("ondragstart","onDragStart(event)");
    joueur.setAttribute("draggable","true");

    document.getElementById("valid").setAttribute("class", "btn btn-lg btn-success secular disabled");
}

function testCompo(){
    for (let i = 1; i < 24; i++){
        if (composition[i] == null){
            return false;
        }
    }
    return true;
}