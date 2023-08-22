// let dateTimeField = document.querySelector("#from_city_date");
// let selectRegion = document.querySelector("#travel_region");
// let btnAddNewTrip = document.querySelector("#add_new_trip_btn");

dateTimeFieldAddReavel.addEventListener('change', e => chageDateStart());

function chageDateStart() {
    ajaxCalculateArrivedDate(
                    {from_city_date: dateTimeFieldAddReavel.value,
                    region_id: selectRegion.value});
    
}
