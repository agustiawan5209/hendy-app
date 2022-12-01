import Chart from 'chart.js/auto';


var url = '/NilaiBobotAlternatif/NilaiAKhir/Hasil';
var chart = $("#myChart");
if (chart.length > 0) {
    $.ajax({
        type: "GET",
        url: url,
        success: function (response) {
            var nama = new Array();
            var ranking = new Array();
            // console.log(response);
            // console.log(response.length);
            response.forEach((element, index, array) => {
                nama.push(element.nama);
                ranking.push(parseFloat(element.ranking));
            });
            const data = {
                labels: nama,
                datasets: [{
                    label: 'Bobot Nilai',
                    backgroundColor: 'rgb(34, 74, 255, 0.5)',
                    borderColor: 'rgb(255, 99, 132, 0.5)',
                    data: ranking,
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    },

                },
            };

            new Chart(
                document.getElementById('myChart'),
                config
            );

        }
    });
}
