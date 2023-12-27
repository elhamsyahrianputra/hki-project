function visitorDayChart(data) {
    const dates = data;

    var options = {
        series: [
            {
                name: "Jumlah Pegunjung",
                data: dates,
            },
        ],
        colors: ["#62C3D0"],
        chart: {
            type: "area",
            stacked: false,
            height: 350,
            zoom: {
                type: "x",
                enabled: true,
                autoScaleYaxis: true,
            },
            toolbar: {
                autoSelected: "zoom",
            },
        },
        dataLabels: {
            enabled: false,
        },
        markers: {
            size: 4,
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 1,
                inverseColors: false,
                opacityFrom: 0.5,
                opacityTo: 0,
                stops: [0, 90, 100],
            },
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return val.toFixed(0);
                },
            },
            title: {
                text: "Jumlah Pengunjung",
                fontFamily: "Open Sans",
                fontWeight: 400,
            },
        },
        xaxis: {
            type: "datetime",
            title: {
                text: "Tanggal",
                fontFamily: "Helvetica",
            },
            min: new Date('2023-11-25').getTime(),
            max: new Date('2023-12-25').getTime(),
        },
        tooltip: {
            shared: false,
            y: {
                formatter: function (val) {
                    return val.toFixed(0);
                },
            },
        },
    };

    var chart = new ApexCharts(
        document.querySelector("#visitorsDayChart"),
        options
    );
    chart.render();
}
