//gradient bar chart 1
const barChart_1 = document.getElementById("barChart_1").getContext('2d');
//generate gradient 1
const barChart_1gradientStroke = barChart_1.createLinearGradient(0, 0, 0, 250);
barChart_1gradientStroke.addColorStop(0, "rgba(26, 51, 213, 1)");
barChart_1gradientStroke.addColorStop(1, "rgba(26, 51, 213, 0.5)");

barChart_1.height = 100;

new Chart(barChart_1, {
    type: 'bar',
    data: {
        defaultFontFamily: 'Poppins',
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"],
        datasets: [
            {
                label: "Jumlah Pegawai",
                data: data_sakit,
                borderColor: barChart_1gradientStroke,
                borderWidth: "0",
                backgroundColor: barChart_1gradientStroke, 
                hoverBackgroundColor: barChart_1gradientStroke
            }
        ]
    },
    options: {
        legend: false, 
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
                barPercentage: 0.8
            }]
        }
    }
});

//gradient bar chart 2
const barChart_2 = document.getElementById("barChart_2").getContext('2d');
//generate gradient 2
const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
barChart_2gradientStroke.addColorStop(0, "rgba(26, 51, 213, 1)");
barChart_2gradientStroke.addColorStop(1, "rgba(26, 51, 213, 0.5)");

barChart_2.height = 100;

new Chart(barChart_2, {
    type: 'bar',
    data: {
        defaultFontFamily: 'Poppins',
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"],
        datasets: [
            {
                label: "Jumlah Pegawai",
                data: data_cuti,
                borderColor: barChart_2gradientStroke,
                borderWidth: "0",
                backgroundColor: barChart_2gradientStroke, 
                hoverBackgroundColor: barChart_2gradientStroke
            }
        ]
    },
    options: {
        legend: false, 
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
            xAxes: [{
                // Change here
                barPercentage: 0.8
            }]
        }
    }
});