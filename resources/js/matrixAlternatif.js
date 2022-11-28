$(function () {

    $("table tr").addClass('!bg-gray-800 !text-content-info');

    $.ajax({
        type: "GET",
        url: "/NilaiBobotAlternatif/Matrix/alternatif",
        success: function (response) {
            console.log(response);
        }
    });

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
                                var param = data + '/' + bobot[i]['alternatif2'] + '/' + bobot[k]['alternatif2'];
                                var NilaiBobot = 0;
                                let books2 = getNilaiBobotAlternatif2(param);
                                let books = getNilaiBobotAlternatif(param);
                                hasil_matrix[i][k] =  Number(books.responseText / books2.responseText).toLocaleString(2);
                                // td = "<td>"+ hasil_matrix[i][k] +"</td>"

                            } else {
                                var param = data + '/' + bobot[i]['alternatif2'] + '/' + bobot[k]['alternatif2'];
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
        $(".animation").fadeIn(500, function () {
            $(this).fadeOut();
        });
        var data = $(this).val();
        MatrixAHPalternatif(data);
    });

    // Matrix Perhitungan Nilai Kriteria
    function Countalternatif() {
        var url = '/NilaiBobotAlternatif/GetKriteria/alternatif';
        var Nilai;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response) {
                Nilai = response;
            }
        });
        return Nilai;
    }

    function MatrixAlternatif() {
        var url = '/NilaiBobotAlternatif/Bobot/alternatif';
        var Nilai;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response) {
                Nilai = response;
            }
        });
        return Nilai;
    }

    function GetNilaiBobot(NamaTable) {
        let alternatif = Countalternatif();
        let batas = alternatif.length;
        var table = '';
        for (let baris = 0; baris < batas; baris++) {
            var url = '/NilaiBobotAlternatif/Matrix/alternatif/' + alternatif[baris];
            $.ajax({
                type: "GET",
                url: url,
                success: function (response) {
                let kriteria = GetTableKriteria();

                    var Matrix_alternatif = response['alternatif'];
                    var Matrix_bobot = response['bobot'];
                    var Matrix_nilai_bobot = response['Matrix_alternatif'];
                    var Nama_table = response['nama_table'];
                    var bobot_prioritas = response['bobot_prioritas'];
                    var batas_alternatif = response['alternatif'].length;

                    // Pembeuatan Table Matrix Dari Database;
                    table += "<table border='1' class='table table-compact w-full'>";
                    table += "<tr ><td  colspan=" + (batas_alternatif + 1) + " class='bg-gray-800 text-white'>Matriks Perbandingan Alternatif Berdasarkan Kriteria <span class='text-white font-bold'> " + kriteria[baris].name + " </span></td> </tr>";
                    table += "<tr>";
                    table += `<th class='bg-info text-info-content !border border-info'>kode</th>`;

                    for (let i = 0; i < batas_alternatif; i++) {
                        table += `<th class='bg-info text-info-content !border border-info'>${Nama_table[i].kode}</th>`;
                    }
                    table += "</tr>";

                    for (let i = 0; i < batas_alternatif; i++) {
                        table += "<tr>";
                        table += `<th class='bg-info text-info-content !border border-info'>${Nama_table[i].kode}</th>`;
                        for (let k = 0; k < batas_alternatif; k++) {
                            table += `<th class='bg-info text-info-content !border border-info'>${Matrix_alternatif[i][k]}</th>`;
                        }
                        table += "</tr>";

                    }
                    table += "<tr>";
                    table += `<th class='bg-info text-info-content !border border-info'>Hasil Kolom</th>`;
                    for (let k = 0; k < batas_alternatif; k++) {
                        table += `<th class='bg-info text-info-content !border border-info'>${Matrix_bobot[k]}</th>`;
                    }
                    table += "</tr>";
                    table += "</table> <br>";


                    // Matrix Hasil Pembobotan Alternatif
                    // Matrik bobot prioritas alternatif berdasarkan Kriteria
                    table += "<table border='1' class='table table-compact w-full'>";
                    table += "<tr ><td  colspan=" + (batas_alternatif + 1) + " class='bg-gray-800 text-white'>Matrik bobot prioritas alternatif berdasarkan Kriteria <span class='text-white font-bold'> " + kriteria[baris].name + " </span></td> </tr>";

                    table += "<tr>";
                    table += `<th class='bg-info text-info-content !border border-info'>Kode</th>`;
                    for (let i = 0; i < batas_alternatif; i++) {
                        table += `<th class='bg-info text-info-content !border border-info'>${Nama_table[i].kode}</th>`;
                    }
                    table += `<th class='bg-info text-info-content !border border-info'>Bobot</th>`;
                    // table += `<th class='bg-info text-info-content !border border-info'>Bobot</th>`;
                    table += "</tr>";

                    for (let i = 0; i < batas_alternatif; i++) {
                        table += "<tr>";
                        table += `<td class='bg-info text-info-content !border border-info'>${Nama_table[i].kode}</td>`;
                        for (let k = 0; k < batas_alternatif; k++) {
                            table += `<td class='bg-info text-info-content !border border-info'>${Matrix_nilai_bobot[i][k]}</td>`;
                        }
                        table += `<td class='bg-info text-info-content !border border-info'>${bobot_prioritas[i]}</td>`;
                        table += "</tr>";

                    }
                    table += "</table> <br>";
                    $(NamaTable).html(table);
                }
            });
        }
        // return table;
    }
    var template = $("#TemplateTable");
    if (template.length > 0) {
        let Matrix = GetNilaiBobot("#TemplateTable");
        // let Hasilakhir = Hasil_akhir("#HasilAlternatif");
        $(template).html(Matrix)
        // $("#HasilAlternatif").html(Hasilakhir)
        // console.log(Hasilakhir);
        let AlternatifHasil = getHasilAlternatif();
        $("#HasilAlternatif").html(AlternatifHasil)
    }

    function getHasilAlternatif() {
        var url = '/NilaiBobotAlternatif/NilaiAKhir/Hasil';
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                var table = '';
                let kriteria = GetTableKriteria();
                table += `<tr>`
                table += `<th class='bg-info text-info-content border-info border'>Kode</th>`;
                for (let baris = 0; baris < kriteria.length; baris++) {
                    table += `<th class='bg-info text-info-content border-info border'>${kriteria[baris].kode}</th>`;
                }
                table += `<th class='bg-info text-info-content border-info border'>Hasil</th>`;
                table += `<th class='bg-info text-info-content border-info border'>Ranking</th>`;
                table += `</tr>`
                for (let index = 0; index < response.length; index++) {
                    table += `<tr>`;
                    table += `<td class='bg-info text-info-content border-info border'>${response[index].kode} - ${response[index].nama}</td>`
                    var parse = response[index].data.split('/');
                    console.log(parse.length);
                    for (let ik = 0; ik < parse.length; ik++) {
                        table += `<td class='bg-info text-info-content border-info border'>${parse[ik]}</td>`

                    }
                    table += `<td class='bg-info text-info-content border-info border'>${response[index].ranking}</td>`
                    table += `<td class='bg-info text-info-content border-info border'>${index + 1}</td>`
                    table += `</tr>`;

                }
                $("#HasilAlternatif").html(table)
            }
        });
    }

    function GetTableKriteria() {
        var Kriteria;
        $.ajax({
            type: "GET",
            url: "/NilaiBobotKriteria/GetKriteria",
            async: false,
            success: function (response) {
                Kriteria = response['kriteria'];
            }
        });
        return Kriteria
    }

});
