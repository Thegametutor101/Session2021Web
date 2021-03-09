<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Modification lien</title>
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
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
          rel="stylesheet">
    <!-- STYLESHEET -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../Ressources/css/Style-Les_Evenements.css">
    <link rel="stylesheet" href="../Ressources/css/Style-Partie-Administrative.css">
    <link rel="stylesheet" href="../Ressources/css/main.css">
    <!-- SCRIPT jquery et fontawesome -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/86aa9796b2.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="../../Ressources/javascript/jquery-dateformat.js"></script>
    <script src="../Ressources/javascript/main.js"></script>
    <script>
        $(function () {
            let ua = window.navigator.userAgent;
            //espace volontaire dans le indexOf
            let msie = ua.indexOf("MSIE ");
            if ($.browser.mozilla || (msie > 0)) {
                $("#dateStart").datepicker();
                $("#dateEnd").datepicker();
            }
        });
    </script>
</head>
<body style="background-color: #222831">
<!-- Le slide menu à gauche -->
<div class="sidenav" id="mySidenav"></div>
<img onclick="openNav()" src="../Ressources/images/Logo_Slide_Menu.png">-
<!-- La div principale qui contient toutes les informations du site web. L'id "main" doit obligatoirement être présent -->
<div id="main">
    <form>
        <div class="card mx-auto" style="width: 85%">
            <h5 class="card-header">Modification d'un lien utile</h5>
            <div class="card-body">
                <div class="mb-4">
                    <label for="Nom">Nom</label>
                    <input type="text" class="form-control" id="nom" placeholder="Nom" required>
                </div>
                <div class="mb-4">
                    <label for="Nom">Description</label>
                    <input type="text" class="form-control" id="description" placeholder="Description" required>
                </div>
                <div class="mb-4">
                    <label for="Nom">Lien</label>
                    <input type="text" class="form-control" id="link" placeholder="Lien" required>
                </div>

                <button id="bt-modifier" type="submit" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </form>

</div>
</body>
<script>
    checkConnection();
    $.ajax("sideNav.html", {
        success: function (response) {
            let body = response.replace(/^.*?<body>(.*?)<\/body>.*?$/s, "$1");
            $("#mySidenav").html(body);
            $("#navLinks").addClass("selectedPage");
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

    $(document).ready(function () {

        $.ajax({
            url: "../../Management/getLink.php",
            type: "POST",
            dataType: "json",
            data: {
                "id":  <?php echo $_POST['id'];?>
            },
            success: function (reponse) {
                $('#nom').val(reponse['name']);
                $('#description').val(reponse['description']);
                $('#link').val(reponse['link']);
            },
            error: function (message, e) {
                console.log(e)
            }

        });


        $('#bt-modifier').click(function (e) {
            e.preventDefault()
            $.ajax({
                url: "../../Management/editLink.php",
                type: "POST",
                dataType: "json",
                data: {
                    "name": $('#nom').val(),
                    "description": $('#description').val(),
                    "link": $('#link').val(),
                    "id":   <?php echo $_POST['id'];?>
                },
                success: function (reponse) {
                    let timerInterval
                    Swal.fire({
                        icon: 'success',
                        title: 'Succès',
                        text: 'Le lien à été modifier',
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
                        window.location.href = 'Les-Liens.html'
                    })
                },
                error: function (message, e) {
                    console.log(message);
                }
            });
        });

    });
</script>
</html>