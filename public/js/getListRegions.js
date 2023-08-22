let travelRegion = document.querySelector("#travel_region");

getListRegions();

function getListRegions() {

    $.ajax({
        url: "/controllers/GetRegions.controller.php",
        type: "POST",
        dataType: 'json',
        success: function(response) {
            if(response.error === 0) {
                travelRegion.insertAdjacentHTML("beforeend", templateListRegions(response.result));
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            }   
        }
    });
}

function templateListRegions(data) {
    let countRegions = data.length;
    let template = "";
    
    for($i = 0; $i < countRegions; $i++) {
        template += `<option value="${data[$i][0]}" data-travel-time="${data[$i][2]}">
                        ${data[$i][1]}
                    </option>`;
    }
    return template;
}