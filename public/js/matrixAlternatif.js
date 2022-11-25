$(function () {


    function getNilaiBobotAlternatif(param) {
        var hasil = '';
        var nilai = $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/GetBobot/" + param,
            async: false,
            success: function (response) {
                return response.data;
            }
        });
        // console.log(hasil);
        return nilai;
    }
    // Matrix Perbandingan Alernatif
    function MatrixAHPalternatif(data) {
        var request = $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/update/" + data,
            async: false,
            success: function (response) {
                var parse = response['alternatif'];
                var bobot = response['bobot'];
                var batas = response['alternatif'].length;
                var hasil_matrix = new Array(batas);

                for (var i = 0; i < batas; i++) {
                    hasil_matrix[i] = [i];
                }
                var tr = '';
                var td = '';
                for (let i = 0; i < batas; i++) {
                    // tr += "<x-tr>" ;
                    for (let k = 0; k < batas; k++) {
                        if (i == k) {
                            hasil_matrix[i][k] = 1
                            // td = "<td>"+ hasil_matrix[i][k] +"</td>"
                        } else {
                            if (i < k) {
                                hasil_matrix[i][k] = bobot[k]['nilai_banding'];
                                // td = "<td>"+ hasil_matrix[i][k] +"</td>"

                            } else {
                                var param = data + '/' + bobot[i]['alternatif2'] + '/' + bobot[k]['alternatif2'];
                                var NilaiBobot = 0;
                                let books = getNilaiBobotAlternatif(param);
                                // Tampilan Perbandingan
                                // hasil_matrix[i][k] = bobot[i]['alternatif2'] + ' :' + bobot[k]['alternatif2'] + '( Nilai = ' + bobot[k]['nilai_banding'] + ' / ' + books.responseText + ')';
                                hasil_matrix[i][k] = Number(bobot[k]['nilai_banding'] / books.responseText).toLocaleString(2);
                                // td = "<td>"+ hasil_matrix[i][k] +"</td>"
                            }
                        }
                    }

                    tr += '</tr>';
                }
                for (var i = 0; i < batas; i++) {
                    tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + parse[i]['kode'] + "</th>";

                    for (var j = 0; j < batas; j++)

                    {
                        tr += "<td class='!text-sm !md:text-base !border !border-mx !border-black bg-info text-info-content'>" + hasil_matrix[i][j] + "</td> ";
                    }
                    tr += "</tr>";

                }
                $("#table_banding_alternatif").html(tr);

            },

        });
        request.done(function (msg) {
            console.log(msg)
        });

        request.fail(function (jqXHR, textStatus) {
            console.log("Request failed: " + textStatus);
        });
    }
    var data = $('#kriteria_id').val();

    if (data != null) {
        MatrixAHPalternatif(data)
    }
    $("#kriteria_id").change(function (e) {
        e.preventDefault();
        var data = $(this).val();
        MatrixAHPalternatif(data);
        console.log(data)
    });

});
