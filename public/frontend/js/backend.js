$(document).ready(function () {
    let vaccine = 1;
     $.ajax({
        type: "GET",
        url: BASE_URL+"/vaccine/data/"+vaccine,
        data: {vaccine:vaccine},
        dataType: "json",
        success: function (response) {
            let vaccine = response;
            console.log(vaccine);
        }
    });
});
