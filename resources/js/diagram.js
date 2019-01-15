var randomColor = require('randomcolor');
var ctx1 = document.getElementById('Diagram1').getContext('2d');
var ctx2 = document.getElementById('Diagram2').getContext('2d');


var color = randomColor();
var size = recupName.length;
var tableColor = [color];

for(var i = 0; i < size ; i++)
{
    var color = randomColor();
    tableColor.push(color);
}

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
if(formulaire == true){
    var ctx3 = document.getElementById('Diagram3').getContext('2d');
    var BarChart2 = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels:  recupMouthSociety ,
            datasets: [
            {
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
}
randomColor({
    luminosity: 'light',
    hue: 'random'
 });