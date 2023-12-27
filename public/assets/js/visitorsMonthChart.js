function visitorMonthChart(data) {
    var options = {
        series: [
            {
                name: "Jumlah Pengunjung",
                data: data,
            },
        ],
        colors: ["#62C3D0"],
        chart: {
            height: 350,
            type: "line",
            zoom: {
                enabled: false,
            },
        },
        markers: {
            size: 4,
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: "straight",
        },
        grid: {
            row: {
                colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
                opacity: 0.5,
            },
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            title: {
                text: 'Bulan',
            }
        },
        yaxis: {
            title: {
                text: 'Jumlah Pengunjung',
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#visitorsMonthChart"), options);
    chart.render();
}
