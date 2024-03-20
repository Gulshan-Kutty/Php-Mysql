document.getElementById('table').innerHTML='<h2 text-align:"center">Multiplication Table</h2>';


var tb = "<table border='1' cellpadding='15px' cellspacing='0px' align='center' width='80%'>";

tb += "<tr>";
for (let i = 1; i <= 10; i++) {
    tb += "<td>"+i+"</td>";
    
}

tb += "</tr>";
tb += "</table>";

document.getElementById('table').innerHTML += tb+"<br>";

let tb1 = "<table border='1' cellpadding='15px' cellspacing='0px' align='center' width='80%'>";

for (let i = 1; i <=10; i++) {
    tb1 += "<tr>";
    for (let j = 1; j <=10; j++) {
        tb1 += "<td>"+j+" X "+i+" = "+i*j+"</td>";
        
    }
    tb1 += "</tr>";
}
tb1 += "</table>";
document.getElementById('table').innerHTML += tb1;