function addActivity(name,
                     description,
                     inputCity,
                     inputState,
                     inputStreet,
                     inputSuite,
                     inputZip,
                     dateStart,
                     dateEnd,
                     maxCapacity) {
    $.ajax({
       url: "../../Management/addActivity.php",
       type: "post",
       data: {
           "name": name,
           "description": description,
           "location": {
               "city": inputCity,
               "province": inputState,
               "address": inputStreet,
               "apartment": inputSuite,
               "postalCode": inputZip
           },
           "dateStart": dateStart,
           "dateEnd": dateEnd,
           "maxCapacity": maxCapacity
       },
        dataType: "json",
        success: function (result) {
            if (result !== "success") {
                $(".messages").append("<div>Une erreur est survenue lors de l'ajout.<br>" +
                    "Veuillez réessayer plus tard.</div>");
            }
            window.open("Les-Activités.html");
        },
        error: function (message, error) {
            $(".messages").append("<div>Une erreur est survenue lors de votre requête.<br>" +
                "Veuillez réessayer plus tard.</div>");
            window.open("Les-Activités.html", "_self");
        }
    });
}
function updateActivity(id,
                        name,
                        description,
                        inputCity,
                        inputState,
                        inputStreet,
                        inputSuite,
                        inputZip,
                        dateStart,
                        dateEnd,
                        maxCapacity) {
    $.ajax({
       url: "../../Management/updateActivity.php",
       type: "post",
       data: {
           "id": id,
           "name": name,
           "description": description,
           "location": {
               "city": inputCity,
               "province": inputState,
               "address": inputStreet,
               "apartment": inputSuite,
               "postalCode": inputZip
           },
           "dateStart": dateStart,
           "dateEnd": dateEnd,
           "maxCapacity": maxCapacity
       },
        dataType: "json",
        success: function (result) {
            if (result !== "success") {
                $(".messages").append("<div>Une erreur est survenue lors de la modification.<br>" +
                    "Veuillez réessayer plus tard.</div>");
            }
            window.open("Les-Activités.html");
        },
        error: function (message, error) {
            $(".messages").append("<div>Une erreur est survenue lors de votre requête.<br>" +
                "Veuillez réessayer plus tard.</div>");
            window.open("Les-Activités.html");
        }
    });
}