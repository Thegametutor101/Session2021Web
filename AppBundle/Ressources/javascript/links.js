$(document).ready(function () {
    $.ajax({
        url: "../Management/getLinks.php",
        type: "POST",
        dataType: "json",
        success: function (reponse) {
            reponse.forEach(function (item) {
                ajout(item['id'], item['name'], item['description'], item['link'])
            })
        },
        error: function (message, e) {

        }
    });

    function ajout(id, name, desc, link) {
        let content = " <div class='grid-item'>";
        content += " <div class='card'>"
        content += " <div class='card-content'>"
        content += "<h1 class='card-header'>" + name + "</h1>"
        content += " <p class='card-text'>'" + desc + "'</p>"
        content += "<a href='https://" + link + "'  class='card-btn'>Consulté <span>&rarr;</span></a>"
        content += "</div>";
        content += "</div>";
        content += "</div>";
        document.getElementById('grid').innerHTML += content;
    }
});

