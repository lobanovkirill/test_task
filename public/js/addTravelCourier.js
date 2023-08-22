let addTravelForm = document.querySelector("#add_travel_for_courier");
let addRegion = document.querySelector("#travel_region").value;
let fromCityDate = document.querySelector("#from_city_date").value;
let selectedCourier = document.querySelector("#listCouriers").value;


addTravelForm.addEventListener("submit", e => addTravelCourier(e));

function addTravelCourier(e) {
    e.preventDefault();

    $.ajax({
        url: "/controllers/AddTravelCourier.controller.php",
        type: "POST",
        dataType: 'json',
        data: $("#add_travel_for_courier").serialize(),
        success: function(response) {
            console.log(response);
            if(response.error === 0) {
                $('.error_message').html(`<p style="color: green;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            }
        }
    });
}
