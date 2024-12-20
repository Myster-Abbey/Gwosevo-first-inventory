
var chartPieBasicChart = "";
function loadCharts() {
    var pie_statistics = document.getElementById("simple_pie_chart").dataset.redemptions;
    pie_statistics = JSON.parse(pie_statistics);

    (e = getChartColorsArray("simple_pie_chart"))
        &&
        ((t = {
            series: pie_statistics['data'],
            chart: { height: 300, type: "pie" },
            labels: pie_statistics['category'],
            legend: { position: "bottom" },
            dataLabels: { dropShadow: { enabled: !1 } },
            colors: e,
        }),
            "" != chartPieBasicChart && chartPieBasicChart.destroy(),
            (chartPieBasicChart = new ApexCharts(
                document.querySelector("#simple_pie_chart"),
                t
            )).render());
}

window.addEventListener("resize", function () {
    setTimeout(() => {
        loadCharts();
    }, 250);
}),
    loadCharts();
