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

    function MatrixAHPalternatif() {
      var kriteria_id =  $('#kriteria_id').val();
      var kecamatan = $("#kecamatan").val();
        $.ajax({
            type: "GET",
            url: "/NilaiBobotAlternatif/Matrix/alternatif/" + kriteria_id + '/'+kecamatan,
            async: false,
            success: function (response) {
                console.log(response);
                var parse = response['nama_table'];
                var batas = response['alternatif'].length;
                var hasil_matrix = response['alternatif'];;

                var tr = '';

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
            error: (error)=> console.log(error)

        });
    }
    var data = $('#kriteria_id').val();

    if (data != null) {
        MatrixAHPalternatif(data)
    }
    $("#cari_alternatif").click(function (e) {
        e.preventDefault();

        var data = $(this).val();
        MatrixAHPalternatif(data);
    });
});
