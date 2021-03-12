/* Examine pour voir s'il y a un utilisateur de connecté en administratif, si ce n'est pas le cas, oblige la connexion */
checkConnection();

/* Charge le menu slide de gauche sur la page */
$.ajax("sideNav.html", {
    success: function (response) {
        let body = response.replace(/^.*?<body>(.*?)<\/body>.*?$/s, "$1");
        $("#mySidenav").html(body);
        $("#navHome").addClass("selectedPage");
    }
});

/* Permet d'ouvrir le slide menu de gauche */
function openNav(){ $("#mySidenav").css("transform", "translateX(0)"); }

/* Permet de fermer le slide menu de gauche */
function closeNav() { $("#mySidenav").css("transform", "translateX(-100%)"); }