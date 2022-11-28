import Chart from 'chart.js/auto';

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
function colorize(opaque) {
    return (ctx) => {
      const v = ctx.parsed.y;
      const c = v < -50 ? '#D60000'
        : v < 0 ? '#F46300'
        : v < 50 ? '#0358B6'
        : '#44DE28';

      return opaque ? c : Utils.transparentize(c, 1 - Math.abs(v / 150));
    };
  }
var url = '/NilaiBobotAlternatif/NilaiAKhir/Hasil';
$.ajax({
    type: "GET",
    url: url,
    success: function (response) {
        var nama = new Array()
        var ranking = new Array()
        var table = '';
        let kriteria = GetTableKriteria();
        // console.log(response);
        // console.log(response.length);
        response.forEach((element,index,array) => {
            nama.push(element.nama);
            ranking.push(parseFloat(element.ranking));
        });
        const data = {
            labels: nama,
            datasets: [{
                label: 'Bobot Nilai',
                backgroundColor: 'rgb(34, 74, 255)',
                borderColor: 'rgb(255, 99, 132)',
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

