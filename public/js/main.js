$(document).ready(function () {

    $("#kriteria_id").change(function (e) {
        e.preventDefault();
        var data = $(this).val();

        var request = $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/update/" + data,
            data: data,
            success: function (response) {
                var parse = response['alternatif'];
                var bobot = response['bobot'];
                var batas = response['alternatif'].length;
                var hasil_matrix = new Array(batas);

                for (var i = 0; i < batas; i++) {
                    hasil_matrix[i] = [i];
                }

                var zero = 0;
                var tr = '';
                var td = '';
                for (let i = 0; i < batas; i++) {
                    // tr += "<tr>" ;
                    for (let k = 0; k < batas; k++) {
                        if (i == k) {
                            hasil_matrix[i][k] = 1
                            // td = "<td>"+ hasil_matrix[i][k] +"</td>"
                        } else if (i < k) {
                            hasil_matrix[i][k] = bobot[i]['nilai_banding'];
                            // td = "<td>"+ hasil_matrix[i][k] +"</td>"

                        } else {
                            hasil_matrix[i][k] = bobot[i]['nilai_banding'] / bobot[k]['nilai_banding'];
                            // td = "<td>"+ hasil_matrix[i][k] +"</td>"
                        }
                    }

                    // tr += '</tr>';
                }
                for (var i = 0; i < batas; i++) {
                    tr += "<tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>"+ parse[i]['kode'] +"</th>";

                    for (var j = 0; j < batas; j++)

                    {
                        tr += td = "<td class='!text-sm !md:text-base !border !border-mx !border-black bg-info text-info-content'>" + hasil_matrix[i][j] + "</td> ";
                    }
                    tr += "</tr>";

                }
                $("#table_banding_alternatif").html(tr);
                console.log(tr)

            },

        });
        request.done(function (msg) {
            $("#log").html(msg);
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
        console.log(data)
    });
});
