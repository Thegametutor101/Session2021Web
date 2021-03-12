/* Examine pour voir s'il y a un utilisateur de connecté en administratif, si ce n'est pas le cas, oblige la connexion */
checkConnection();

/* Sélectionne tous les utilisateurs de la base de données */
function selectUsers(){
    $(document).ready(function (){
        $.ajax({
            url: "../../Management/getUsers.php",
            type: "POST",
            dataType: "json",
            success: function(response) {
                var nbrEntrees = 0;
                for (i = 0; i < response['item'].length; i++) {
                    let item = response['item'][i];
                    nbrEntrees += 1;
                    $("#liste-Users").append(
                        "<tr>" +
                        "    <th scope=\"row\">" + nbrEntrees + "</th>" +
                        "    <td width=\"50%;\">" + item["username"] + "</td>" +
                        "     <td>" +
                        "         <img src=\"../Ressources/images/Modif.jpg\" class=\"rounded-circle avatar-xs\" alt=\"\" title=\"Modification\" onclick='ouvertureModalModif(\"" + item["username"] + "\")'/>" +
                        "     </td>" +
                        "     <td>" +
                        "          <img src=\"../Ressources/images/supprimer.png\" class=\"rounded-circle avatar-xs\" alt=\"\" title=\"Supression\" onclick='supression(\"" + item["username"] + "\")'/>" +
                        "     </td>" +
                        "</tr>"
                    );
                }
            },
            error: function (message){
                console.log(message);
            }
        });
    })
}

/* Charge le menu slide de gauche sur la page */
$.ajax("sideNav.html", {
    success: function (response) {
        let body = response.replace(/^.*?<body>(.*?)<\/body>.*?$/s, "$1");
        $("#mySidenav").html(body);
        $("#navUsers").addClass("selectedPage");
    }
});

/* Permet d'ouvrir le slide menu de gauche */
function openNav(){ $("#mySidenav").css("transform", "translateX(0)"); }

/* Permet de fermer le slide menu de gauche */
function closeNav() { $("#mySidenav").css("transform", "translateX(-100%)"); }


/* Pour les modals */
let modal_creation = document.getElementById("modal_creation");
let btn_creation = document.getElementById("creation_utilisateur");
let span = document.getElementsByClassName("close")[0];
/* Si l'on clique sur les boutons */
btn_creation.onclick = function () {
    modal_creation.style.display = "block";
    document.getElementById("titreCreationUtilisateurModal").innerHTML = "Création d'utilisateur";
    document.getElementById("bouton_confirmation_creation_modal").value = "Confirmer la création";
    document.getElementById("username_creation_modal").disabled = false;
    document.getElementById("username_creation_modal").value = "";
    document.getElementById("mdp_creation_modal").value = "";
    document.getElementById("confirmation_mdp_creation_modal").value = "";
}
/* Si l'on clique sur X */
span.onclick = function () {
    modal_creation.style.display = "none";
}
/* Si l'on appuie hors du slide menu de gauche */
window.onclick = function(event){
    if (event.target == modal_creation) {
        modal_creation.style.display = "none";
    }
}

/* Ouvre le modal de la page afin de pouvoir modifier un objet */
function ouvertureModalModif(username)
{
    modal_creation.style.display = "block";
    document.getElementById("titreCreationUtilisateurModal").innerHTML = "Modification d'utilisateur";
    document.getElementById("bouton_confirmation_creation_modal").value = "Enregistrer les modifications";
    document.getElementById("username_creation_modal").disabled = true;
    document.getElementById("username_creation_modal").value = username;
    document.getElementById("mdp_creation_modal").value = "";
    document.getElementById("confirmation_mdp_creation_modal").value = "";
}

/* Demande à l'utilisateur s'il veut supprimer */
function supression(username){
    if (confirm("Voulez-vous vraiment supprimer l'utilisateur " + username + "?")){
        $(document).ready(function (){
            $.ajax({
                url: "../../Management/deleteUser.php",
                type: "POST",
                dataType: "json",
                data: {
                    "username": username
                },
                success: function() {
                    alert("L'utilisateur a bien été supprimé de la base de donnée");
                    location.reload();
                },
                error: function (message){
                    console.log(message);
                }
            });
        })
    }
}

/* Fait une action spécifique dans la base de données selon le texte écrit sur le bouton de confirmation du modal */
function actionBoutonModal(){
    var username = document.getElementById("username_creation_modal");
    var mdp = document.getElementById("mdp_creation_modal");
    var confirm_mdp = document.getElementById("confirmation_mdp_creation_modal");

    /* Si le bouton de confirmation est écrit "Confirmer la création"*/
    if (document.getElementById("bouton_confirmation_creation_modal").value === "Confirmer la création") {
        if (username.value === "" || mdp.value === "" || confirm_mdp.value === "") {
            alert("Veuillez remplir tous les champs");
        }
        else if (mdp.value === confirm_mdp.value){
            $.ajax({
                url: "../../Management/addUser.php",
                type: "POST",
                dataType: "json",
                data: {
                    "username": username.value,
                    "password":  mdp.value
                },
                success: function() {
                    alert("L'utilisateur a bien été ajouté à la base de données");
                    location.reload();
                },
                error: function (message){
                    console.log(message);
                }
            });
        }
        else{
            alert("Les deux mots de passes entrées ne correspondent pas.")
        }
    }
    /* Si le bouton de confirmation est écrit "Enregistrer les modifications" */
    else{
        if (mdp.value === "" || confirm_mdp.value === "") {
            alert("Veuillez remplir tous les champs");
        } else if(mdp.value === confirm_mdp.value){
            if (confirm("Voulez-vous enregistrer les modifications de l'utilisateur " + username.value + "?")){
                $.ajax({
                    url: "../../Management/updateUser.php",
                    type: "POST",
                    dataType: "json",
                    data: {
                        "username": username.value,
                        "password": mdp.value
                    },
                    success: function() {
                        alert("L'utilisateur a bien été modifié dans la base de données");
                        location.reload();
                    },
                    error: function (message){
                        console.log(message);
                    }
                });
            }
        }
        else{
            alert("Les deux mots de passes que vous avez entrées ne sont pas identiques.");
        }
    }
}