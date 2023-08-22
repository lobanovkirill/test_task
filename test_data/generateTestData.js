let generateTestDataBtn = document.querySelector("#generateTestData");


generateTestDataBtn.addEventListener("click", e => uploadToDBTestData(e));

function uploadToDBTestData(e) {
    e.preventDefault();

    $.ajax({
        url: "/controllers/GenerateTestData.controller.php",
        type: "POST",
        dataType: 'json',
        data: {},
        success: function(response) {
            console.log(response);
            if(response.error === 0) {
                $('.error_message').html(`<p style="color: green;">${response.message}</p>`);
            } else {
                $('.error_message').html(`<p style="color: red;">${response.message}</p>`);
            }
        }
    });
}