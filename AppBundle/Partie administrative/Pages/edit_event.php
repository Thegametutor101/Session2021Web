<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Moddification d'événement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          rel="stylesheet">
    <link href="../Ressources/css/Style-Les_Evenements.css" rel="stylesheet">
    <link href="../Ressources/css/Style-Partie-Administrative.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/86aa9796b2.js"></script>
</head>

<body>

<!-- Le slide menu à gauche -->
<div class="sidenav" id="mySidenav">
    <a class="closebtn" href="javascript:void(0)" onclick="closeNav()">&times;</a>
    <a href="Accueil-Administratif.html">Accueil Administratif</a>
    <a href="Les-Utilisateurs.html">Utilisateurs</a>
    <a href="Les-Actualites.html">Actualités</a>
    <a href="Les-Evenements.html">Évènements</a>
    <a href="Les-Liens.html">Liens</a>
    <a href="Le-Contact.html" id="Page-Selectionne">event</a>
    <a href="Les-Temoignages.html">Témoignages</a>
    <a href="Presentation-Programme.html">Présentation du Programme</a>
    <a href="Video-Accueil.html">Vidéo d'Accueil</a>
    <a href="Logs-Site-Web.html">Logs du Site Web</a>
    <a href="Deconnexion.html" id="deconnexion" onclick="closeWin()" target="_blank">Déconnexion</a>
</div>

<img onclick="openNav()" src="../Ressources/images/Logo_Slide_Menu.png">-

<!-- La div principale qui contient toutes les informations du site web. L'id "main" doit obligatoirement être présent -->
<div id="main">

    <form>

        <div class="card mx-auto" style="width: 85%">

            <h5 class="card-header">Modificaion d'événement</h5>
            <div class="card-body">
                <div class="mb-4">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" required>
                </div>
                <div class="mb-4">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Description" required>
                </div>
                <div class="form-row location mb-4">
                    <div class="form-group col-md-2">
                        <label for="inputCity">Ville</label>
                        <input type="text" class="form-control" id="inputCity" placeholder="Ville" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Province</label>
                        <select id="inputState" class="form-control">
                            <option value="AB">Alberta</option>
                            <option value="BC">Colombie-Britannique</option>
                            <option value="MB">Manitoba</option>
                            <option value="NB">Nouveau-Brunswick</option>
                            <option value="NL">Terre-Neuve-et-Labrador</option>
                            <option value="NT">Territoires du Nord-Ouest</option>
                            <option value="NS">Nouvelle-Écosse</option>
                            <option value="NU">Nunavut</option>
                            <option value="ON">Ontario</option>
                            <option value="PE">Île-du-Prince-Édouard</option>
                            <option value="QC">Québec</option>
                            <option value="SK">Saskatchewan</option>
                            <option value="YT">Yukon</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputStreet">Rue</label>
                        <input type="text" class="form-control" id="inputStreet" placeholder="Rue" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputSuite">App.</label>
                        <input type="text" class="form-control" id="inputSuite" placeholder="Appartement" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Code Postal</label>
                        <input type="text" class="form-control" id="inputZip" placeholder="Code Postal" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="dateStart">Date de début</label>
                    <input type="datetime-local" class="form-control" id="dateStart" placeholder="Date de début"
                           required>
                </div>
                <div class="mb-4">
                    <label for="dateEnd">Date de fin</label>
                    <input type="datetime-local" class="form-control" id="dateEnd" placeholder="Date de fin" required>
                </div>
                <div class="mb-4">
                    <label for="maxCapacity">Capacité</label>
                    <input type="number" class="form-control" id="maxCapacity" placeholder="Capacité" min="0" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>

</div>
</body>


<script>
    $(document).ready(function () {


        $('#bt-modifier').click(function (e) {
            e.preventDefault()
            $.ajax({
                url: "../Management/editEvent.php",
                type: "POST",
                dataType: "json",
                data: {
                    "name": $('#nom').val(),
                    "description": $('#description').val(),
                    "location": $('#location').val(),
                    "dateStart": $('#dateStart').val(),
                    "dateEnd": $('#dateEnd').val(),
                    "maxCapacity": $('#maxCapacity').val(),
                    "city": $('#inputCity').val(),
                    "state": $('#inputState').val(),
                    "street": $('#inputStreet').val(),
                    "suite": $('#inputSuite').val(),
                    "zip": $('#inputZip').val(),
                    "id":   <?php echo  $_POST['val'];?>
                },
                success: function (reponse) {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: 'L\'événement à été modifier',
                        timer: 1500,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent()
                                if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft()
                                    }
                                }
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        }
                    }).then((result) => {
                        window.location.href = 'Les-Evenements.html'
                    })
                },
                error: function (message, e) {
                    console.log(message);
                }
            });
        });
    });

    /* Fait fermer la fenêtre */
    function closeWin() {
        window.top.close();
    }

    /* Permet d'ouvrir le slide menu de gauche */
    function openNav() {
        document.getElementById("mySidenav").style.width = "400px";
        document.getElementById("main").style.marginLeft = "400px";
    }

    /* Permet de fermer le slide menu de gauche */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
</html>