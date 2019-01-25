var ctx3 = document.getElementById('Diagram3').getContext('2d');

var BarChart2 = new Chart(ctx3, {
    type: 'bar',
    data: {
        labels:  recupMouthSociety ,
        datasets: [
        {
            borderWidth : 1,
            backgroundColor: tableColor,
            borderColor: 'rgb(0, 0, 0)',
            data: recupTotalMoisHtBcSociety,
                                
        }]
    },
    options: {
        legend: {
            display: false
        }
    }
});