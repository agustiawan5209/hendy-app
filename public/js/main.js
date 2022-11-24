$(document).ready(function () {

    $("#kriteria_id").change(function (e) {
        e.preventDefault();
        var data = $(this).val();

        var request = $.ajax({
                type: "GET",
                url: "/NilaiBobotAlternatif/update/" + data,
                data: data,
                success: function (response) {
                    console.log(response);
                },

            });
        request.done(function( msg ) {
            $( "#log" ).html( msg );
          });

          request.fail(function( jqXHR, textStatus ) {
            console.log( "Request failed: " + textStatus );
          });
        console.log(data)
    });
});
