d = new Date();
n = d.getFullYear()
console.log(n)
content = "<div id='" + (n) + "'>"
content += "<h3 class='year'>" + n + "</h3>"
content += "</div>"
$(document).ready(function () {
    $(document).on('click', '.event', function () {
        let id = this.id.split('event_')[1]
        $.ajax({
            url: "../Management/getEvent.php",
            type: "POST",
            dataType: "json",
            data: {
                "requete": "getEvent",
                "id":id
            },
            success: function (reponse) {
               let location = JSON.parse(reponse['location']);
               let emplacement = location[0].address + ", " + location[0].city + ", " + location[0].province + " " + location[0].postalCode + " App : " + location[0].apartment;

                Swal.fire({
                    padding: 1,
                    width: '50%',
                    title: reponse['name'],
                    html: '<ul>' +
                        '<li>Description :'+reponse['description']+'</li>' +
                        '<li>Date de début :'+reponse['dateStart']+' </li>' +
                        '<li>Date de fin :'+reponse['dateEnd']+' </li>' +
                        '<li>Addresse : '+emplacement +'</li>' +
                        '<li>Capacité de l\'evenement :'+reponse['maxCapacity']+' </li>' +
                        '</ul> ' +
                        '</li>' +
                        '</ul>',
                    imageUrl: 'https://unsplash.it/400/200',
                    imageWidth: '100%',
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                })
            },
            error: function (message, e) {
               console.log(message);
            }
        });

    });

    for (let i = n + 1; i < (n + 2); i++) {
        console.log(i)
        content += "<div id='" + (i) + "'>"
        content += "<h3 class='year'>" + i + "</h3>"
        content += "</div>"
    }
    document.getElementById("event-container").innerHTML = content;

    $.ajax({
        url: "../Management/getEvents.php",
        type: "POST",
        dataType: "json",
        success: function (reponse) {
            reponse.forEach(function (item) {
                ajout(item['dateStart'], item['name'], item['description'],item['id'])
            })
        },
        error: function (message, e) {

        }
    });

    function getMonthName(date) {
        const monthNames = ["Janv", "Fevr", "Mars", "Avr", "Mai", "Juin",
            "Juill", "Août", "Sept", "Oct", "Nov", "Dec"
        ];
        return monthNames[date.getMonth()]
    }

    function ajout(date, title, desc,id) {
        let d = new Date(date)
        let content = "<div class='event' id='event_"+id+"'>";
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
