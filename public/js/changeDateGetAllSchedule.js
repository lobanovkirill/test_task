let formFilter = document.querySelector("#show_scheduled_data");
let dateFieldStart = document.querySelector("#start_time");
let dateFieldEnd = document.querySelector("#end_time");

document.querySelector("#show_scheduled_data").addEventListener('change', event => changeMinMaxDateInDatePicker(event.target));

function changeMinMaxDateInDatePicker(e) {
    dateFieldStart.setAttribute("max", dateFieldEnd.value);
    dateFieldEnd.setAttribute("min", dateFieldStart.value);
}