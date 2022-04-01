$("#products").change(function (e) {
    e.preventDefault();
    let vaccine = $(this).val();
    $.ajax({
        type: "GET",
        url: BASE_URL + "/vaccine/data/" + vaccine,
        data: { vaccine: vaccine },
        dataType: "json",
        success: function (response) {
            let vaccine = response;
            if (vaccine.has_diff_ages) {
                $(".option_input").show();
                let ages = vaccine.diff_ages;
                ages.forEach(age => {
                    let data = age.age;
                    $("#age").append("<option value='" + data + "'>" + data + "</option>");
                });
            }

            if (vaccine.definded_period) {
                let min = vaccine.from;
                let max = vaccine.to;
                $('#day').attr('min', min);
                $('#day').attr('max', max);

            }
        }
    });

    $("#day").change(function (e) {
        e.preventDefault();
        let day = dayname($(this).val());
        $.ajax({
            type: "GET",
            url: BASE_URL + "/interval/" + vaccine + "/" + day,
            data: { vaccine: vaccine },
            dataType: "json",
            success: function (response) {
                let intervals = response;
                intervals.forEach(interval => {
                    let data = timeConvert(interval);
                    $("#ChooseTime").append("<option value='" + data + "'>" + data + "</option>");
                });
            }
        });
    });

});





function dayname(date) {
    return day = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"][new Date(date).getDay()]
}

function timeConvert(time) {
    // Check correct time format and split into components
    time = time.toString().match(/^([01]\d|2[0-3])(:)([0-5]\d)(:[0-5]\d)?$/) || [time];
    if (time.length > 1) { // If time format correct
        time = time.slice(1);  // Remove full string match value
        time[5] = +time[0] < 12 ? ' AM' : ' PM'; // Set AM/PM
        time[0] = +time[0] % 12 || 12; // Adjust hours
    }
    return time.join(''); // return adjusted time or original string
}


var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0');
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
$('#day').attr('min', today);


var disabledDates = ["2022-3-28", "2022-3-29", "2022-3-30"]


