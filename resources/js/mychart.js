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
                        label: 'Grafik Bar Bobot Nilai',
                        backgroundColor: 'rgb(51, 91, 138)',
                        borderColor: 'rgb(255, 99, 132, 0.5)',
                        data: ranking,
                        stack: 'combined',
                        type: 'bar'
                    },
                    {
                        label: 'Grafik Line Bobot Nilai',
                        backgroundColor: 'rgb(76, 241, 11)',
                        borderColor: 'rgb(255, 99, 132, 0.5)',
                        data: ranking,
                        stack: 'combined'
                    }
                ]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    },
                    scales: {
                        y: {
                            stacked: true
                        }
                    }

                },
            };

            new Chart(
                document.getElementById('myChart'),
                config
            );

        }
    });
}
