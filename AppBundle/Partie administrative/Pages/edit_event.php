<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Modification d'événement</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="icon" href="../../Ressources/assets/img/logo-departement-informatique.svg">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          crossorigin="anonymous">
    <link rel="stylesheet"
          type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet"
          type="text/css"
          href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <!-- STYLESHEET -->
    <script src="../../Ressources/javascript/jquery-dateformat.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../Ressources/css/Style-Les_Evenements.css">
    <link rel="stylesheet" href="../Ressources/css/Style-Partie-Administrative.css">
    <link rel="stylesheet" href="../Ressources/css/main.css">
    <!-- SCRIPT jquery et fontawesome -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/86aa9796b2.js" crossorigin="anonymous"></script>
    <script src="../../Ressources/javascript/jquery-dateformat.js"></script>
    <script src="../Ressources/javascript/main.js"></script>
</head>

<body>

<!-- Le slide menu à gauche -->
<div class="sidenav" id="mySidenav"></div>

<img onclick="openNav()" src="../Ressources/images/Logo_Slide_Menu.png">-

<!-- La div principale qui contient toutes les informations du site web. L'id "main" doit obligatoirement être présent -->
<div id="main">

    <form>

        <div class="card mx-auto" style="width: 85%">

            <h5 class="card-header">Modification d'événement</h5>
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
                <button type="submit" id="bt-modifier" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>

</div>
</body>


<script>
    checkConnection();
    $(document).ready(function () {
        function dateFormat(date){
            let dateVal = new Date(date);
            let day = dateVal.getDate().toString().padStart(2, "0");
            let month = (1 + dateVal.getMonth()).toString().padStart(2, "0");
            let hour = dateVal.getHours().toString().padStart(2, "0");
            let minute = dateVal.getMinutes().toString().padStart(2, "0");
            let sec = dateVal.getSeconds().toString().padStart(2, "0");
            let ms = dateVal.getMilliseconds().toString().padStart(3, "0");
            let inputDate = dateVal.getFullYear() + "-" + (month) + "-" + (day) + "T" + (hour) + ":" + (minute) + ":" + (sec) + "." + (ms);
            return inputDate
        }
        $.ajax({
            url: "../../Management/getEvent.php",
            type: "POST",
            dataType: "json",
            data: {
                "id":  <?php echo $_POST['id'];?>
            },
            success: function (reponse) {
                let location = JSON.parse(reponse['location'])
                $('#nom').val(reponse['name']);
                $('#description').val(reponse['description']);
                $('#dateStart').val(dateFormat(reponse['dateStart']));
                $('#dateEnd').val(dateFormat(reponse['dateStart']));
                $('#maxCapacity').val(reponse['maxCapacity']);
                $('#inputCity').val(location[0].city);
                $('#inputState').val(location[0].province);
                $('#inputStreet').val(location[0].address);
                $('#inputSuite').val(location[0].apartment);
                $('#inputZip').val(location[0].postalCode);
            },
            error: function (message, e) {
                console.log(e)
            }

        });

        $('#bt-modifier').click(function (e) {
            e.preventDefault()
            $.ajax({
                url: "../../Management/editEvent.php",
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
                    "id":   <?php echo $_POST['id'];?>
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
    $.ajax("sideNav.html", {
        success: function (response) {
            let body = response.replace(/^.*?<body>(.*?)<\/body>.*?$/s, "$1");
            $("#mySidenav").html(body);
            $("#navEvents").addClass("selectedPage");
        }
    });

    /* Permet d'ouvrir le slide menu de gauche */
    function openNav() {
        $("#mySidenav").css("transform", "translateX(0)");
    }

    /* Permet de fermer le slide menu de gauche */
    function closeNav() {
        $("#mySidenav").css("transform", "translateX(-100%)");
    }
</script>
</html>