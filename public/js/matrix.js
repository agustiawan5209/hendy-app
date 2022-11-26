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
                                Hasil_array[baris][kolom] = nilai.responseText / nilai_banding2.responseText;
                                Hasil = nilai.responseText / nilai_banding2.responseText
                            }
                        }
                        Hasil_Matrix[baris][kolom] = Number(Hasil);

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
            tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(sumArray(Hasil_kolo[i])).toFixed(2) + "</th>"
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
    function HasilMatrixKriteria() {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        var Hasil_kolo = new Array(batas);
        var returnNilai = [];
        for (let i = 0; i < batas; i++) {
            Hasil_kolo[i] = [i];

        }
        for (let baris = 0; baris < batas; baris++) {
            for (let kolom = 0; kolom < batas; kolom++) {
                Hasil_kolo[kolom][baris] = Hasil_array[baris][kolom]
            }
        }
        for (let i = 0; i < batas; i++) {
            returnNilai[i] = Number(sumArray(Hasil_kolo[i]))
        }
        return returnNilai;
    }
    // Fungsi Mendapatkan Nilai Prioritas;
    function getNilaiPrioritas() {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai = 0;
        var prioritas = [];
        let HasilMatrix = HasilMatrixKriteria();

        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
        }
        for (let baris = 0; baris < batas; baris++) {

            for (let kolom = 0; kolom < batas; kolom++) {
                Nilai = Hasil_array[baris][kolom] / HasilMatrix[kolom];
                Hasil_Matrix[baris][kolom] = Nilai;
                // console.log(Hasil_array[kolom][baris] + " / " + HasilMatrix[baris])
            }
            prioritas[baris] = Number(sumArray(Hasil_Matrix[baris]) / batas).toFixed(3)
        }
        return prioritas;
    }
    // Fungsi Hitung Matrix Nilai Kriteria
    function GetMatrixNilaiKriteria(NamaTable) {
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai_Matrix = new Array(batas);
        var Nilai = 0;
        let Prioritas = getNilaiPrioritas();
        let HasilMatrix = HasilMatrixKriteria();

        for (let i = 0; i < batas; i++) {
            Hasil_Matrix[i] = [i];
            Nilai_Matrix[i] = [i];
        }
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
                Nilai = Hasil_array[baris][kolom] / HasilMatrix[kolom];
                tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(Nilai).toFixed(4) + "</td> ";
                Hasil_Matrix[baris][kolom] = Nilai
            }
            // console.log(Hasil_Matrix);
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(sumArray(Hasil_Matrix[baris])).toFixed(3) + "</td>"
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Prioritas[baris] + "</td>"
            tr += "</tr>";
        }
        $(NamaTable).html(tr);
    }
    // Hasil Matrix Perhitungan Kriteria
    var MatrixNilaiKriteria = $('#MatrixNilaiKriteria');
    if (MatrixNilaiKriteria.length > 0) {
        $('#MatrixNilaiKriteria').html(GetMatrixNilaiKriteria('#MatrixNilaiKriteria'));
    }


    // Fungsi Matrix Penjumlahan Setiap Baris atau
    // Matriks Konsistensi Kriteria
    function MatrixKonsistensi(param) {
        var Kriteria = GetTableKriteria();
        var Matrix_kriteria = MatrixAHPkriteria();
        var batas = Kriteria.length;
        var Hasil_Matrix = new Array(batas);
        let Prioritas = getNilaiPrioritas();
        let CM = new Array(batas);
        let Nilai;
        var Cek = new Array(batas);
        for (let i = 0; i < Kriteria.length; i++) {
            Hasil_Matrix[i] = [i];
            CM[i] = [i];
            Cek[i] = [i];
        }
        for (let baris = 0; baris < batas; baris++) {
            for (let kolom = 0; kolom < batas; kolom++) {
                Nilai = Matrix_kriteria[kolom][baris] * Prioritas[baris]
                Hasil_Matrix[kolom][baris] = Nilai
                Cek[kolom][baris] = Matrix_kriteria[kolom][baris] + " * " + Prioritas[baris]

            }
        }
        for (let i = 0; i < batas; i++) {
            CM[i] = Number(sumArray(Hasil_Matrix[i]) / Prioritas[i]);
        }
        const Hasil = {
            "Matrix": Hasil_Matrix,
            "CM": CM,
            "AA0": Cek,
        }
        return Hasil;
    }

    // FUngsi Table CM
    function TabelCMKriteria(NamaTable) {
        let Matrix_Konsistensi = MatrixKonsistensi();
        var Matrix =  Matrix_Konsistensi.Matrix;
        var NilaiCM =  Matrix_Konsistensi.CM;
        var Hasil_array = MatrixAHPkriteria();
        var kriteria = GetTableKriteria();
        var batas = kriteria.length;
        let Hasil_Matrix = new Array(batas);
        let Nilai_Matrix = new Array(batas);
        var Nilai = 0;
        let Prioritas = getNilaiPrioritas();
        let HasilMatrix = HasilMatrixKriteria();

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
                // Hitung Nilai Martrix
                Nilai = Matrix[baris][kolom] ;
                tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Number(Nilai).toFixed(4) + "</td> ";
                Hasil_Matrix[baris][kolom] = Nilai
            }
            // console.log(Hasil_Matrix);
            tr += "<td class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" +Number(NilaiCM[baris]).toFixed(2) + "</td>"
            tr += "</tr>";
        }
        // $(NamaTable).html(tr);
        return tr;
    }
    var MatrixCMKriteria = $('#MatrixCMKriteria');
    if (MatrixCMKriteria.length > 0) {
        $('#MatrixCMKriteria').html(TabelCMKriteria('#MatrixCMKriteria'));
    }
    // End Matrix Kriteria
});
