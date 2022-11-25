$(document).ready(function () {
    function sumArray(array) {
        return array.reduce((a, b) => a + b, 0)
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

    // Fungsi Dapatkan Nilai Bobot Kriteria
    function getNilaiBobotKriteria(param) {
        var url = "/NilaiBobotKriteria/getNilaiBobotKriteria/" + param;
        var nilai = $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response) {
                return response.data;
            }
        });
        return nilai;
    }

    function getNilaiBobotKriteria2(param) {
        var url = "/NilaiBobotKriteria/getNilaiBobotKriteria2/" + param;
        var nilai = $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response) {
                return response.data;
            }
        });
        return nilai;
    }
    // Matrix Perbandingan Kriteria
    //
    function MatrixAHPkriteria() {
        var url = "/NilaiBobotKriteria/GetKriteria";
        var ReturnHasil;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response, status, data) {
                var batas = response['kriteria'].length;
                var bobotKriteria = response['bobot'];
                var kriteria = response['kriteria'];
                var Hasil_array = new Array(batas);
                var Hasil_Matrix = new Array(batas);
                var Hasil;
                for (let i = 0; i < batas; i++) {
                    Hasil_array[i] = [i];
                    Hasil_Matrix[i] = [i];

                }
                for (let baris = 0; baris < batas; baris++) {
                    // Hasil_array[baris] = baris
                    for (let kolom = 0; kolom < batas; kolom++) {
                        if (baris == kolom) {
                            Hasil_array[baris][kolom] = 1;
                            Hasil = 1;
                        } else {
                            if (baris < kolom) {
                                // Hasil_array[baris][kolom] = response[baris]['kode']  + " : "+ response[kolom]['kode']
                                param = kriteria[baris]['kode'] + "/" + kriteria[kolom]['kode'];
                                let nilai = getNilaiBobotKriteria(param);
                                Hasil_array[baris][kolom] = nilai.responseText;
                                Hasil = nilai.responseText;
                            } else {
                                param = kriteria[baris]['kode'] + "/" + kriteria[kolom]['kode'];
                                let nilai = getNilaiBobotKriteria(param);
                                param = kriteria[baris]['kode'] + "/" + kriteria[kolom]['kode'];
                                let nilai_banding2 = getNilaiBobotKriteria2(param);
                                // Hasil_array[baris][kolom] = bobotKriteria[kolom]['kriteria2'] + " : "+  kriteria[kolom]['kode'] ;
                                Hasil_array[baris][kolom] = Number(nilai.responseText / nilai_banding2.responseText).toLocaleString(2);
                                Hasil = Number(nilai.responseText / nilai_banding2.responseText).toLocaleString(2);
                            }
                        }
                        Hasil_Matrix[kolom][baris] = Number(Hasil);

                    }
                }
                ReturnHasil = Hasil_Matrix;
            }
        })
        return ReturnHasil;
    }
    // Isi Table Matrix Kriteria
    function TableMatrixKriteria(NamaTable) {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Kode</th>";
        for (let baris = 0; baris < batas; baris++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + kriteria[baris]['kode'] + "</th> ";
        }
        tr += "</tr>";
        for (let baris = 0; baris < batas; baris++) {

            tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + kriteria[baris]['name'] + "</th>";

            for (let kolom = 0; kolom < batas; kolom++) {
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Hasil_array[kolom][baris] + "</th> ";
            }
            tr += "</tr>";


        }
        tr += "<x-tr> <th class='bg-info text-info-content'>Hasil</th>"
        for (let i = 0; i < batas; i++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + sumArray(Hasil_array[i]) + "</th>"
        }
        tr += "</tr>";
        $(NamaTable).html(tr);
    }
    // Masukkan Ke dalam Table Kriteria Matrix
    var TableKriteria = $('.TableMatrixKriteria');
    if (TableKriteria.length > 0) {
        $('.TableMatrixKriteria').html(TableMatrixKriteria('.TableMatrixKriteria'));
    }

    function getNilaiPrioritas() {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai = 0;
        var prioritas = [];
        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
        }
        for (let baris = 0; baris < batas; baris++) {

            for (let kolom = 0; kolom < batas; kolom++) {
                Nilai = Hasil_array[kolom][baris] / sumArray(Hasil_array[kolom]);
                Hasil_Matrix[baris][kolom] = Nilai
            }
            prioritas[baris] = Number(sumArray(Hasil_Matrix[baris])).toLocaleString() / batas;
        }
        return prioritas;
    }
    // Fungsi Hitung Matrix Kriteria
    function GetMatrixNilaiKriteria(NamaTable) {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai = 0;
        let Prioritas = getNilaiPrioritas();

        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
        }
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Kode</th>";
        for (let baris = 0; baris < batas; baris++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + kriteria[baris]['kode'] + "</th> ";
        }
        tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>Hasil</th> ";
        tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>Prioritas</th> ";
        tr += "</tr>";
        for (let baris = 0; baris < batas; baris++) {

            tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + kriteria[baris]['name'] + "</th>";

            for (let kolom = 0; kolom < batas; kolom++) {
                Nilai = Hasil_array[kolom][baris] / sumArray(Hasil_array[kolom]);
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(Nilai).toLocaleString() + "</th> ";
                Hasil_Matrix[baris][kolom] = Nilai
            }
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(sumArray(Hasil_Matrix[baris])).toLocaleString() + "</th>"
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(Prioritas[baris]) + "</th>"
            tr += "</tr>";


        }
        $(NamaTable).html(tr);
    }
    // Hasil Matrix Perhitungan Kriteria
    var MatrixNilaiKriteria = $('#MatrixNilaiKriteria');
    if (MatrixNilaiKriteria.length > 0) {
        $('#MatrixNilaiKriteria').html(GetMatrixNilaiKriteria('#MatrixNilaiKriteria'));
    }



    // End Matrix Kriteria
});
