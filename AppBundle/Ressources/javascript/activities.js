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
            console.log("error loading activities: " + er);
        }
    });
    function printActivities(list) {
        for (i = 0; i < list.length; i++) {
            $(".main").append(
                "<div class='card'>" +
                    "<div class='card_id'>" + list[i][0] + "</div>" +
                    "<div class='card_date'>" +
                        "<div class='card_month'>" + $.format.date(list[i][4], "MMMM") + "</div>" +
                        "<div class='card_day'>" + checkActivityDateDay(list[i][4], list[i][5]) + "</div>" +
                        "<div class='card_time'>" +
                            checkActivityDateTime(list[i][4], list[i][5]) +
                        "</div>" +
                    "</div>" +
                    "<div class='card_info'>" +
                        "<div class='card_name'>" + list[i][1] + "</div>" +
                        "<div class='card_description'>" + list[i][2] + "</div>" +
                        "<div class='card_bottom'>" +
                            "<div class='card_location'>" + JSON.parse(list[i][3])['apartment'] + "-" +
                                                            JSON.parse(list[i][3])['address'] + " " +
                                                            JSON.parse(list[i][3])['city'] + ", " +
                                                            JSON.parse(list[i][3])['province'] + " " +
                                                            JSON.parse(list[i][3])['postalCode'] + "</div>" +
                            "<div class='cap'>" +
                                "<div class='card_maxCapacity'>" + list[i][6] + "</div>" +
                                "<div class='material-icons'>person</div>" +
                            "</div>" +
                        "</div>" +
                    "</div>" +
                    // "<div class='card_items'><div id='" + list[i][7] + "'></div>" +
                    //     itemList(list[i][7]) + "</div>" +
                "</div>");
        }
    }
    function cardClick() {

    }
    function checkActivityDateDay(start, end) {
        if($.format.date(start, "dd") === $.format.date(end, "dd")) {
            return $.format.date(start, "dd");
        } else {
            return $.format.date(start, "dd") + " - " + $.format.date(end, "dd");
        }
    }
    function checkActivityDateTime(start, end) {
        if($.format.date(start, "dd") === $.format.date(end, "dd")) {
            return "<div class='card_from'>" + $.format.date(start, "h:mm a") + "</div>" +
                    "<div class='card_time_link'> à</div>" +
                    "<div class='card_to'>" + $.format.date(end, "h:mm a") + "</div>"
        } else {
            return "<div class='card_time_link'> Début à " + $.format.date(start, "h:mm a") + "</div>"
        }
    }
    function itemList(items) {
        $.ajax({
            url: "../Management/getActivityItems.php",
            type: "POST",
            data: {'number': items},
            dataType: "json",
            success: function (result) {
                for (i = 0; i < result['item'].length; i++) {
                    $(".card").find("#" + items).append("<div>" + result['item'][i][2] + "</div>");
                }
            },
            error: function (message, er) {
                console.log("error loading activity items: " + er);
            }
        });
        return "";
    }
});