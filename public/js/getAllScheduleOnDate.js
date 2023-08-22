let divForTable = document.querySelector(".scheduled_data");
let dateOne = document.querySelector("#start_time");
let dateTwo = document.querySelector("#end_time");
let filterForm = document.querySelector("#show_scheduled_data");

filterForm.addEventListener("submit", e => getAllSchedulOnDate(e));

function getAllSchedulOnDate(e) {
    e.preventDefault();
    
    $.ajax({
        url: "/controllers/GetAllScheduleOnDate.controller.php",
        type: "POST",
        dataType: 'json',
        data: $("#show_scheduled_data").serialize(),
        success: function(response) {
            console.log(response);
            if(response.error === 0) { 
                removeTable(divForTable.children[0]);
                drawTable(response.result);
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
                showHideNotifyMessage(notifyMessage);
            }
        }
    });
}

function drawTable(data) {
    let rowsTable = data.length;
    if(rowsTable == 0) {
        $('.error_message').html('<p style="color: red;">Нет данных для вывода...</p>');
        showHideNotifyMessage(notifyMessage);
        return;
    }
    divForTable.insertAdjacentHTML("beforeend", templateTableSchedule(rowsTable, data));
}

function templateTableSchedule(rowsTable, data) {
    
    let template = `
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Город</th>
                            <th>Имя курьера</th>
                            <th>Дата выезда</th>
                            <th>Дата окончания поездки</th>
                        </tr>
                    </thead>`;
    
    for($i = 0; $i < rowsTable; $i++) {
        template += `
            <tr>
                <td>${data[$i]["id"]}</td>
                <td>${data[$i]["city"]}</td>
                <td>${data[$i]["courier_name"]}</td>
                <td>${data[$i]["date_start"]}</td>
                <td>${data[$i]["date_finish"]}</td>
            </tr>
        `;
    }
    template += "</table>";
    return template;
}

function removeTable(table) {
    if(typeof table !== "undefined") {
        table.remove();
    }
}