'use strict';

let  num = 4;

$('#load').on('click', function () {
    $.ajax({
        type: 'GET',
        url: 'loader.php',
        data: {"num": num},
        cache: false,
        success: function (data) {
            num += 2;
            $("#products").append(data);
            if (!data) {
                $("#load").remove();
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
});

