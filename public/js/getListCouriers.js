let listCouriers = document.querySelector("#listCouriers");

getListCouriers();

function getListCouriers() {

    $.ajax({
        url: "/controllers/GetListCouriers.controller.php",
        type: "POST",
        dataType: 'json',
        success: function(response) {
            if(response.error === 0) {
                listCouriers.insertAdjacentHTML("beforeend", templateListCouriers(response.result));
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            }
        }
    });
}

function templateListCouriers(data) {
    let countCouriers = data.length;
    if(countCouriers == 0) {
        $('.error_message').html('<p style="color: red;">Не удалось получить список курьеров! Пожалуйста, обновите страницу.</p>');
    }
    let template = "";
    
    for($i = 0; $i < countCouriers; $i++) {
        template += `<option value="${data[$i][0]}">
                        ${data[$i][1]}
                    </option>`;
    }
    return template;
}