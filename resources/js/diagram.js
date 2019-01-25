var randomColor = require('randomcolor');

var color = randomColor();
var size = 1;
tableColor = [color];

for(var i = 0; i < size ; i++)
{
    var color = randomColor();
    tableColor.push(color);
}

randomColor({
    luminosity: 'light',
    hue: 'random'
 });
 
 