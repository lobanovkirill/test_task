// let travelRegionOption = document.querySelector("#travel_region");
// let arrivedDateField = document.querySelector("#arrive_date");

// travelRegionOption.addEventListener("change", e => changeArrivedDate());
selectRegion.addEventListener("change", e => changeArrivedDate());

function changeArrivedDate() {
    ajaxCalculateArrivedDate(
                {from_city_date: dateTimeFieldAddReavel.value,
                region_id: selectRegion.value});

}