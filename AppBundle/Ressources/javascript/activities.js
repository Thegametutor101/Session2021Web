$(document).ready(function () {
    $.ajax({
        url: "../Management/getActivities.php",
        type: "POST",
        dataType: "json",
        success: function(result){
            let value = result["item"];
            console.log("result: " + result);
            console.log("value: " + value);
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
                "<div class='id'>" + list[i][0] + "</div>" +
                "<div class='name'>" + list[i][1] + "</div>" +
                "<div class='description'>" + list[i][2] + "</div>" +
                "</div>");
        }
    }
    function cardClick() {

    }
});