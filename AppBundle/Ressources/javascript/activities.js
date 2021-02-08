$(document).ready(function () {
    $.ajax({
        url: "../Management/getActivities.php",
        type: "POST",
        dataType: "json",
        success: function(result){
            printActivities(result["item"]);
            cardClick();
        },
        error: function (message, er) {
            console.log("downloading book list: " + er);
        }
    });
    function printActivities(list) {
        for (i = 0; i < list.length; i++) {
            $(".main").append(
                "<div class='card'>" +
                "<div class='card_id'>" +  + "</div>" +
                    // "<div class="card_date">" +
                    //     //TODO add if in loop to check if activity lasts 1 day or more. if more show date and time else 1 date and from time to time
                    //     "<div class='card_month'>" + Février + "</div>" +
                    //     "<div class='card_day'>" + 10 + "</div>" +
                    //     "<div class='card_time'>" +
                    //         "<div class='card_from'>" + 09:30:00 + "</div>" +
                    //         "<div class='card_time_link'> à</div>" +
                    //         "<div class='card_to'>" + 19:00:00 + "</div>" +
                    //     "</div>" +
                    // "</div>" +
                    "<div>" + $.format.date("2021-02-10 19:30:00", "h:mm a") + "</div>" +
                    "<div class='id'>" + list[i][0] + "</div>" +
                    "<div class='name'>" + list[i][1] + "</div>" +
                    "<div class='description'>" + list[i][2] + "</div>" +
                    "<div class='location'>" + list[i][3] + "</div>" +
                    "<div class='dateStart'>" + $.format.date(list[i][4], "dd MMMM yyyy ") + "</div>" +
                    "<div class='dateEnd'>" + list[i][5] + "</div>" +
                    "<div class='maxCapacity'>" + list[i][6] + "</div>" +
                    "<div class='items'>" + list[i][7] + "</div>" +
                "</div>");
        }
    }
    function cardClick() {

    }
});