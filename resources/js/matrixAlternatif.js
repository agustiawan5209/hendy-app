// $(function () {

//     $("table tr").addClass('!bg-gray-800 !text-content-info');


//     // Matrix Perhitungan Nilai Kriteria
//     function Countalternatif() {
//         var url = '/NilaiBobotAlternatif/GetKriteria/alternatif';
//         var Nilai;
//         $.ajax({
//             type: "GET",
//             url: url,
//             async: false,
//             success: function (response) {
//                 Nilai = response;
//             }
//         });
//         return Nilai;
//     }

//     function MatrixAlternatif() {
//         var url = '/NilaiBobotAlternatif/Bobot/alternatif';
//         var Nilai;
//         $.ajax({
//             type: "GET",
//             url: url,
//             async: false,
//             success: function (response) {
//                 Nilai = response;
//             }
//         });
//         return Nilai;
//     }

//     function GetNilaiBobot(NamaTable) {
//         let alternatif = Countalternatif();
//         let batas = alternatif.length;
//         var table = '';
//         for (let baris = 0; baris < batas; baris++) {
//             var url = '/NilaiBobotAlternatif/Matrix/alternatif/' + alternatif[baris];
//             $.ajax({
//                 type: "GET",
//                 url: url,
//                 success: function (response) {
//                 let kriteria = GetTableKriteria();

//                     var Matrix_alternatif = response['alternatif'];
//                     var Matrix_bobot = response['bobot'];
//                     var Matrix_nilai_bobot = response['Matrix_alternatif'];
//                     var Nama_table = response['nama_table'];
//                     var bobot_prioritas = response['bobot_prioritas'];
//                     var batas_alternatif = response['alternatif'].length;

//                     // Pembeuatan Table Matrix Dari Database;
//                     table += "<table border='1' class='table table-compact w-full'>";
//                     table += "<tr ><td  colspan=" + (batas_alternatif + 1) + " class='bg-gray-800 text-white'>Matriks Perbandingan Alternatif Berdasarkan Kriteria <span class='text-white font-bold'> " + kriteria[baris].name + " </span></td> </tr>";
//                     table += "<tr>";
//                     table += `<th class='bg-info text-info-content !border border-white'>kode</th>`;

//                     for (let i = 0; i < batas_alternatif; i++) {
//                         table += `<th class='bg-info text-info-content !border border-white'>${Nama_table[i].kode}</th>`;
//                     }
//                     table += "</tr>";

//                     for (let i = 0; i < batas_alternatif; i++) {
//                         table += "<tr>";
//                         table += `<th class='bg-info text-info-content !border border-white'>${Nama_table[i].kode}</th>`;
//                         for (let k = 0; k < batas_alternatif; k++) {
//                             table += `<th class='bg-info text-info-content !border border-white'>${Matrix_alternatif[i][k]}</th>`;
//                         }
//                         table += "</tr>";

//                     }
//                     table += "<tr>";
//                     table += `<th class='bg-info text-info-content !border border-white'>Hasil Kolom</th>`;
//                     for (let k = 0; k < batas_alternatif; k++) {
//                         table += `<th class='bg-info text-info-content !border border-white'>${Matrix_bobot[k]}</th>`;
//                     }
//                     table += "</tr>";
//                     table += "</table> <br>";


//                     // Matrix Hasil Pembobotan Alternatif
//                     // Matrik bobot prioritas alternatif berdasarkan Kriteria
//                     table += "<table border='1' class='table table-compact w-full'>";
//                     table += "<tr ><td  colspan=" + (batas_alternatif + 1) + " class='bg-gray-800 text-white'>Matrik bobot prioritas alternatif berdasarkan Kriteria <span class='text-white font-bold'> " + kriteria[baris].name + " </span></td> </tr>";

//                     table += "<tr>";
//                     table += `<th class='bg-info text-info-content !border border-white'>Kode</th>`;
//                     for (let i = 0; i < batas_alternatif; i++) {
//                         table += `<th class='bg-info text-info-content !border border-white'>${Nama_table[i].kode}</th>`;
//                     }
//                     table += `<th class='bg-info text-info-content !border border-white'>Bobot</th>`;
//                     // table += `<th class='bg-info text-info-content !border border-white'>Bobot</th>`;
//                     table += "</tr>";

//                     for (let i = 0; i < batas_alternatif; i++) {
//                         table += "<tr>";
//                         table += `<td class='bg-info text-info-content !border border-white'>${Nama_table[i].kode}</td>`;
//                         for (let k = 0; k < batas_alternatif; k++) {
//                             table += `<td class='bg-info text-info-content !border border-white'>${Matrix_nilai_bobot[i][k]}</td>`;
//                         }
//                         table += `<td class='bg-info text-info-content !border border-white'>${bobot_prioritas[i]}</td>`;
//                         table += "</tr>";

//                     }
//                     table += "</table> <br>";
//                     $(NamaTable).html(table);
//                 }
//             });
//         }
//         // return table;
//     }
//     var template = $("#TemplateTable");
//     if (template.length > 0) {
//         let Matrix = GetNilaiBobot("#TemplateTable");
//         // let Hasilakhir = Hasil_akhir("#HasilAlternatif");
//         $(template).html(Matrix)
//         // $("#HasilAlternatif").html(Hasilakhir)
//         // console.log(Hasilakhir);
//         let AlternatifHasil = getHasilAlternatif();
//         $("#HasilAlternatif").html(AlternatifHasil)
//     }

//     function getHasilAlternatif() {
//         var url = '/NilaiBobotAlternatif/NilaiAKhir/Hasil';
//         $.ajax({
//             type: "GET",
//             url: url,
//             success: function (response) {
//                 var table = '';
//                 let kriteria = GetTableKriteria();
//                 table += `<tr>`
//                 table += `<th class='bg-info text-info-content border-info border'>Kode</th>`;
//                 for (let baris = 0; baris < kriteria.length; baris++) {
//                     table += `<th class='bg-info text-info-content border-info border'>${kriteria[baris].kode}</th>`;
//                 }
//                 table += `<th class='bg-info text-info-content border-info border'>Hasil</th>`;
//                 table += `<th class='bg-info text-info-content border-info border'>Ranking</th>`;
//                 table += `</tr>`
//                 for (let index = 0; index < response.length; index++) {
//                     table += `<tr>`;
//                     table += `<td class='bg-info text-info-content border-info border'>${response[index].kode} - ${response[index].nama}</td>`
//                     var parse = response[index].data.split('/');
//                     // console.log(parse.length);
//                     for (let ik = 0; ik < parse.length; ik++) {
//                         table += `<td class='bg-info text-info-content border-info border'>${parse[ik]}</td>`

//                     }
//                     table += `<td class='bg-info text-info-content border-info border'>${response[index].ranking}</td>`
//                     table += `<td class='bg-info text-info-content border-info border'>${index + 1}</td>`
//                     table += `</tr>`;

//                 }
//                 $("#HasilAlternatif").html(table)
//             }
//         });
//     }

//     function GetTableKriteria() {
//         var Kriteria;
//         $.ajax({
//             type: "GET",
//             url: "/NilaiBobotKriteria/GetKriteria",
//             async: false,
//             success: function (response) {
//                 Kriteria = response['kriteria'];
//             }
//         });
//         return Kriteria
//     }

// });
