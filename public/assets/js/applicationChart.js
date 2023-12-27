function applicationChart(accepted, process, rejected) {
    const dataChart = {
        series: [accepted, process, rejected],
        colors: ["#71DD37", "#FFAB00", "#FF3E1D"],
        labels: ["Diterima", "Diproses", "Direvisi"]
    };

    // Konfigurasi chart
    const chartOptions = {
        chart: {
            type: "donut",
            // height: 350,
        },
        stroke: {
            width: 5,
        },
        labels: dataChart.labels,
        legend: {
            show: false,
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            show: true,
                        },
                        total: {
                            offsetY: 0,
                            show: true,
                            label: "Total",
                            color: "black",
                            fontFamily: "Helvetica",
                            fontSize: '0.8125rem',
                            formatter: function () {
                                var total = dataChart.series.reduce((a, b) => a + b, 0);
                                return total;
                            },
                        },
                        value: {
                            formatter: function (val) {
                                var total = dataChart.series.reduce((a,b) => a + b, 0);
                                return (Math.round(val/total * 100)) + "%";
                            },
                            offsetY: 0,
                            fontSize: "1.5rem",
                            fontFamily: "Public Sans",
                            show: true,
                        },
                    },
                },
            },
        },
        dataLabels: {
            enabled: false,
        },
        responsive: [
            {
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200,
                    },
                    legend: {
                        position: "bottom",
                    },
                },
            },
        ],
        grid: {
        padding: {
        left: 0, // Adjust the padding as needed
        right: 0,
        top: 0,
        bottom: 0
        }
    }

    };

    // Membuat chart menggunakan ApexCharts
    const chart = new ApexCharts(document.querySelector("#chart"), {
        ...chartOptions,
        series: dataChart.series,
        colors: dataChart.colors,
    });

    // Menggambar chart
    chart.render();
}