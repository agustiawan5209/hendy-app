// $(document).ready(function () {
//     function sumArray(array) {
//         return array.reduce((a, b) => a + b, 0)
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
//     function getRatioIndex() {
//         var url = "/NilaiBobotKriteria/Matrix/RatioKonsistensi";
//         var Hasil_CM;
//         $.ajax({
//             type: "GET",
//             url: url,
//             async: false,
//             success: function (response, status, data) {
//                 // console.log(response);
//                 Hasil_CM = response;
//             }
//         })
//         return Hasil_CM;
//     }

//     function OrderMatrix() {
//         let Ratio = getRatioIndex();
//         var Ratio_index = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.46, 1.49, 1.51, 1.48, 1.56, 1.57, 1.59];
//         var Array_order = GetTableKriteria().length;
//         var tr = '';
//         tr += "<tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info  bg-info text-info-content'><th class='bg-info text-info-content'>Ordo matriks</th>";
//         for (let baris = 0; baris < Ratio_index.length; baris++) {
//             if (Ratio_index[baris] == Ratio['Ratio_index']) {
//                 tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-warning text-white '>" + (baris + 1) + "</th> ";
//             } else {
//                 tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + (baris + 1) + "</th> ";

//             }
//         }
//         tr += "</tr>"

//         tr += "<tr class='!text-xs !md:text-sm font-semibold !border !border-mx !border-info  bg-info text-info-content'><th class='bg-info text-info-content'>Ratio index</th>";
//         for (let baris = 0; baris < Ratio_index.length; baris++) {
//             if (Ratio_index[baris] == Ratio['Ratio_index']) {
//                 tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-warning text-white'>" + Ratio_index[baris] + "</th> ";

//             } else {
//                 tr += "<th class='!text-sm !md:text-base !border !border-mx !border-info bg-info text-info-content'>" + Ratio_index[baris] + "</th> ";

//             }
//         }
//         tr += "</tr>"
//         const Hasil = {
//             "Nilai": Array_order,
//             "Table": tr,
//             "Consistency_Index": Ratio['CI'],
//             "Ratio_Index": Ratio['Ratio_index'],
//             "Consistency_Ratio": Ratio['CR']
//         }
//         return Hasil;
//     }
//     let OMatr = OrderMatrix();
//     var TableOrderMatrix = $("#OrdoMatrix");
//     if (TableOrderMatrix.length > 0) {
//         $("#OrdoMatrix").html(OMatr.Table);
//         $("#Consistency_Index").html(OMatr.Consistency_Index)
//         $("#Ratio_Index").html(OMatr.Ratio_Index)
//         $("#Consistency_Ratio").html(OMatr.Consistency_Ratio)
//     }
//     // End Matrix Kriteria

// });
