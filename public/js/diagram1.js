var ctx1 = document.getElementById('Diagram1').getContext('2d');

var PieChart1 = new Chart(ctx1, {
    
    type: 'pie',

    // The data for our dataset
    data: {
        labels:  recupName ,
        datasets: [
        {
            backgroundColor: tableColor,
            borderColor: 'rgb(0, 0, 0)',
            data: recupId,
                            
        }]
    },

    // Configuration options go here
    options: {
        legend: {
            display: false
        }
    }
});