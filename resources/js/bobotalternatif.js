$(document).ready(function () {

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

    function getNilaiBobotAlternatif2(param) {
        var hasil = '';
        var nilai = $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/GetBobot2/" + param,
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
        $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/update/" + data,
            async: false,
            success: function (response) {
                $(".animation-loading").fadeIn(500, function () {
                    $(this).fadeOut();
                });
                var parse = response['alternatif'];
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
                                var param = data + '/' + parse[i]['kode'] + '/' + parse[k]['kode'];
                                var NilaiBobot = 0;
                                let books2 = getNilaiBobotAlternatif2(param);
                                let books = getNilaiBobotAlternatif(param);
                                hasil_matrix[i][k] = Number(books.responseText / books2.responseText).toLocaleString(2);
                                // td = "<td>"+ hasil_matrix[i][k] +"</td>"

                            } else {
                                var param = data + '/' + parse[i]['kode'] + '/' + parse[k]['kode'];
                                var NilaiBobot = 0;
                                let books = getNilaiBobotAlternatif(param);
                                let books2 = getNilaiBobotAlternatif2(param);
                                // Tampilan Perbandingan
                                // hasil_matrix[i][k] = bobot[i]['alternatif2'] + ' :' + bobot[k]['alternatif2'] + '( Nilai = ' + bobot[k]['nilai_banding'] + ' / ' + books.responseText + ')';
                                hasil_matrix[i][k] = Number(books.responseText / books2.responseText).toLocaleString(2);
                                // td = "<td>"+ hasil_matrix[i][k] +"</td>"
                            }
                        }
                    }

                    tr += '</tr>';
                }
                for (var i = 0; i < batas; i++) {
                    tr += "<tr class='!text-xs !md:text-sm font-semibold  !border-mx text-center bg-info text-info-content !border border-info'><th class='bg-info text-info-content !border border-info'>" + parse[i]['kode'] + "</th>";

                    for (var j = 0; j < batas; j++)

                    {
                        tr += "<td class='!text-sm !md:text-base  !border-mx  bg-info text-info-content !border border-info'>" + hasil_matrix[i][j] + "</td> ";
                    }
                    tr += "</tr>";

                }
                $("#table_banding_alternatif").html(tr);

            },

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
    });
});
