let dateTimeFieldAddReavel = document.querySelector("#from_city_date");
let selectRegion = document.querySelector("#travel_region");
let btnAddNewTrip = document.querySelector("#add_new_trip_btn");
let arrivedDateField = document.querySelector("#arrive_date");
let notifyMessage = document.querySelector(".error_message");

function ajaxCalculateArrivedDate(data) {
    let result;
    console.log(data);
    $.ajax({
        url: "/controllers/CalculateArrivedDate.controller.php",
        type: "POST",
        data: data,
        dataType: 'json',
        success: function(response) {
            // return result = response;
            console.log(response);
            if(response.error === 0) {
                showArrivedDate(response.result.data);
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            }
        }
    });
    return result;
}

function showArrivedDate(data) {
    arrivedDateField.setAttribute("value", data);
}

function changeFormatDateToRU(timeObj) {
    return timeObj.toLocaleDateString('ru-RU', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
      });
}

function showHideNotifyMessage(obj) {
    if(obj.style.display != "block"){
        obj.style.display = "block";
    }

    setTimeout(() => {
        obj.style.display = "none";
    }, 3000);
}
    