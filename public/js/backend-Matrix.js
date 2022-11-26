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

    function MatrixAHPkriteria() {
        var url = "/NilaiBobotKriteria/Matrix/Kriteria";
        var ReturnHasil;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response, status, data) {
                // console.log(response);
                ReturnHasil = response;
            }
        })
        return ReturnHasil;
    }
    let Matrix = MatrixAHPkriteria();
    // Isi Table Matrix Kriteria
    function TableMatrixKriteria(NamaTable) {
        var MaxKriteria = MatrixAHPkriteria();
        const HasilMatrixAHPKriteria = {
            "kriteria": MaxKriteria['kriteria'],
            "bobot": MaxKriteria['bobot'],
        }
        var Hasil_array = HasilMatrixAHPKriteria.kriteria;
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        var Hasil_kolo = new Array(batas);
        for (let i = 0; i < batas; i++) {
            Hasil_kolo[i] = [i];
        }
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Kode</th>";
        for (let baris = 0; baris < batas; baris++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + kriteria[baris]['kode'] + "</th> ";
        }
        tr += "</tr>";
        for (let baris = 0; baris < batas; baris++) {

            tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + kriteria[baris]['name'] + "</th>";

            for (let kolom = 0; kolom < batas; kolom++) {
                tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(Hasil_array[baris][kolom]).toLocaleString() + "</td> ";
                Hasil_kolo[kolom][baris] = Hasil_array[baris][kolom]
            }
            tr += "</tr>";


        }
        tr += "<x-tr> <th class='bg-info text-info-content'>Hasil</th>"
        for (let i = 0; i < batas; i++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + HasilMatrixAHPKriteria.bobot[i] + "</th>"
        }
        tr += "</tr>";
        $(NamaTable).html(tr);
    }
    // Masukkan Ke dalam Table Kriteria Matrix
    var TableKriteria = $('.TableMatrixKriteria');
    if (TableKriteria.length > 0) {
        $('.TableMatrixKriteria').html(TableMatrixKriteria('.TableMatrixKriteria'));
    }
    // Fungsi Jumlah Kolom Kriteria

    // // Fungsi Mendapatkan Nilai Prioritas;
    function getNilaiPrioritas() {
        var url = "/NilaiBobotKriteria/Matrix/Prioritas";
        var ReturnHasil;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response, status, data) {
                // console.log(response);
                ReturnHasil = response;
            }
        })
        return ReturnHasil;
    }
    // // Fungsi Hitung Matrix Nilai Kriteria
    function GetMatrixNilaiKriteria(NamaTable) {
        var Hasil_prioritas = getNilaiPrioritas();
        const TablePrioritas = {
            "matrix": Hasil_prioritas['matrix'],
            "jumlah": Hasil_prioritas['jumlah'],
            "prioritas": Hasil_prioritas['prioritas'],
        }
        var Hasil_array = TablePrioritas.matrix;
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        var Hasil_Matrix = new Array(batas);
        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
        }
        let Nilai = 0;
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Kode</th>";
        for (let baris = 0; baris < batas; baris++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + kriteria[baris]['kode'] + "</th> ";
        }
        tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>Jumlah</th> ";
        tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>Prioritas</th> ";
        tr += "</tr>";
        for (let baris = 0; baris < batas; baris++) {

            tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + kriteria[baris]['name'] + "</th>";
            for (let kolom = 0; kolom < batas; kolom++) {
                // Hitung Nilai Martrix
                Nilai = Hasil_array[baris][kolom];
                tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Nilai + "</td> ";
                // Hasil_Matrix[baris][kolom] = Nilai
            }
            // console.log(Hasil_Matrix);
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + TablePrioritas.jumlah[baris] + "</td>"
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + TablePrioritas.prioritas[baris] + "</td>"
            tr += "</tr>";
        }
        $(NamaTable).html(tr);
    }
    // // Hasil Matrix Perhitungan Kriteria
    var MatrixNilaiKriteria = $('#MatrixNilaiKriteria');
    if (MatrixNilaiKriteria.length > 0) {
        $('#MatrixNilaiKriteria').html(GetMatrixNilaiKriteria('#MatrixNilaiKriteria'));
    }


    // // Fungsi Matrix Penjumlahan Setiap Baris atau
    // // Matriks Konsistensi Kriteria
    function MatrixKonsistensi(param) {
        var url = "/NilaiBobotKriteria/Matrix/ConsistencyMeasure";
        var ReturnHasil;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response, status, data) {
                // console.log(response);
                ReturnHasil = response;
            }
        })
        return ReturnHasil;
    }

    // // FUngsi Table CM
    function TabelCMKriteria(NamaTable) {
        var Hasil_prioritas = getNilaiPrioritas();
        let Matrix_Konsistensi = MatrixKonsistensi();
        const TablePrioritas = Hasil_prioritas['matrix'];
        var Hasil_array = TablePrioritas;

        console.log(Matrix_Konsistensi);
        var Matrix = Matrix_Konsistensi['Matrix_CM'];
        var NilaiCM = Matrix_Konsistensi['Hasil_CM'];
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai_Matrix = new Array(batas);
        var Nilai = 0;

        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
            Nilai_Matrix[i] = [i];
        }
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Kode</th>";
        for (let baris = 0; baris < batas; baris++) {
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + kriteria[baris]['kode'] + "</th> ";
        }
        tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>CM</th> ";
        tr += "</tr>";
        for (let baris = 0; baris < batas; baris++) {

            tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx text-center bg-info text-info-content'><th class='bg-info text-info-content'>" + kriteria[baris]['name'] + "</th>";
            for (let kolom = 0; kolom < batas; kolom++) {
                tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Hasil_array[baris][kolom] + "</td> ";

            }
            // console.log(Hasil_Matrix);
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + NilaiCM[baris] + "</td>"
            tr += "</tr>";
        }
        // $(NamaTable).html(tr);
        return tr;
    }
    var MatrixCMKriteria = $('#MatrixCMKriteria');
    if (MatrixCMKriteria.length > 0) {
        $('#MatrixCMKriteria').html(TabelCMKriteria('#MatrixCMKriteria'));
    }

    function getRatioIndex() {
        var url = "/NilaiBobotKriteria/Matrix/RatioKonsistensi";
        var Hasil_CM;
        $.ajax({
            type: "GET",
            url: url,
            async: false,
            success: function (response, status, data) {
                console.log(response);
                Hasil_CM = response;
            }
        })
        return Hasil_CM;
    }

    function OrderMatrix() {
        let Ratio = getRatioIndex();
        var Ratio_index = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.46, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];
        var Array_order = GetTableKriteria().length;
        var tr = '';
        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Ordo matriks</th>";
        for (let baris = 0; baris < Ratio_index.length; baris++) {
            if (Ratio_index[baris] == Ratio['Ratio_index']) {
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-white'>" + (baris + 1) + "</th> ";
            } else {
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + (baris + 1) + "</th> ";

            }
        }
        tr += "</tr>"

        tr += "<x-tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info text-center bg-info text-info-content'><th class='bg-info text-info-content'>Ratio index</th>";
        for (let baris = 0; baris < Ratio_index.length; baris++) {
            if (Ratio_index[baris] == Ratio['Ratio_index']) {
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-white'>" + Ratio_index[baris] + "</th> ";

            } else {
                tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Ratio_index[baris] + "</th> ";

            }
        }
        tr += "</tr>"
        const Hasil = {
            "Nilai": Array_order,
            "Table": tr,
            "Consistency_Index": Ratio['CI'],
            "Ratio_Index": Ratio['Ratio_index'],
            "Consistency_Ratio": Ratio['CR']
        }
        return Hasil;
    }
    let OMatr = OrderMatrix();
    var TableOrderMatrix = $("#OrdoMatrix");
    if (TableOrderMatrix.length > 0) {
        $("#OrdoMatrix").html(OMatr.Table);
        $("#Consistency_Index").html(OMatr.Consistency_Index)
        $("#Ratio_Index").html(OMatr.Ratio_Index)
        $("#Consistency_Ratio").html(OMatr.Consistency_Ratio)
    }
    // End Matrix Kriteria

});
