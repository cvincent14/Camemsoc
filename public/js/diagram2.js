
var ctx2 = document.getElementById('Diagram2').getContext('2d');

var BarChart1 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels:  recupMois ,
        datasets: [
        {
            backgroundColor: tableColor,
            borderColor: 'rgb(0, 0, 0)',
            data: recupTotalMoisHtBc,
                            
        }]
    },
    options: {
        legend: {
            display: false
        }
    }
});