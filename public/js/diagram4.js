var ctx4 = document.getElementById('Diagram4').getContext('2d');

var PieChart2 = new Chart(ctx4, {
    type: 'pie',
    data: {
        labels:  recupName ,
        datasets: [
        {
            borderWidth : 1,
            backgroundColor: tableColor,
            borderColor: 'rgb(0, 0, 0)',
            data: recupId,
                            
        }]
    },
    options: {
        legend: {
            display: false
        },
        
    }
});