let d = new Date();
let n = d.getFullYear()
console.log(n)
let content = "<div id='" + (n) + "'>"
content += "<h3 class='year'>" + n + "</h3>"
content += "</div>"
$(document).ready(function () {
    for (let i = n + 1; i < (n + 2); i++) {
        console.log(i)
        content += "<div id='" + (i) + "'>"
        content += "<h3 class='year'>" + i + "</h3>"
        content += "</div>"
    }
    document.getElementById("event-container").innerHTML = content;

    $.ajax({
        url: "../Ressources/php/bd.php",
        type: "POST",
        dataType: "json",
        data: {
            "requete": "selectEvents",
        },
        success: function (reponse) {
            reponse.forEach(function (item) {
                ajout(item['dateStart'], item['name'], item['description'])
            })
        },
        error: function (message, e) {

        }
    });

    function getMonthName(date) {
        const monthNames = ["Janv", "Fevr", "Mars", "Avr", "Mai", "Juin",
            "Juill", "Août", "Sept", "Oct", "Nov", "Dec"
        ];
        return monthNames[d.getMonth()]
    }

    function ajout(date, title, desc) {
        let d = new Date(date)
        let content = "<div class='event'>";
        content += "<div class='event-left'>";
        content += "<div class='event-date'>";
        content += "<div class='date'>" + d.getDate() + "</div>";
        content += "<div class='month'>" + getMonthName(d) + "</div>";
        content += "</div>";
        content += "</div>";
        content += "  <div class='event-right'>";
        content += "<h3 class='event-title'>" + title + "</h3>";
        content += "<div class='event-description'>" + desc + "</div>";
        content += "<div class='event-timing'><i class=\"far fa-clock\"></i>" + d.getHours() + ":" + ((d.getMinutes() < 10 ? '0' : '') + d.getMinutes()) + "</div>";
        content += "</div>";
        content += "</div>";
        document.getElementById(d.getFullYear()).innerHTML += content;
    }
});
