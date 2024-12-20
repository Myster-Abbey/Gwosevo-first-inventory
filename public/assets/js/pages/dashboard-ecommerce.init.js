
function getChartColorsArray(e) {
    var r = document.getElementById(e);
    if (r) {
        r = r.dataset.colors;
        if (r)
            return JSON.parse(r).map((e) => {
                var r = e.replace(/\s/g, "");
                return r.includes(",")
                    ? 2 === (e = e.split(",")).length
                        ? `rgba(${getComputedStyle(
                            document.documentElement
                        ).getPropertyValue(e[0])}, ${e[1]})`
                        : r
                    : getComputedStyle(
                        document.documentElement
                    ).getPropertyValue(r) || r;
            });
        console.warn("data-colors attribute not found on: " + e);
    }
}
var marketOverviewChart = "",
    areachartmini6Chart = "",
    areachartmini7Chart = "",
    chartColumnChart = "";

function loadCharts() {
    var redemptions = document.getElementById("market-overview");
    var week_statistics = redemptions.dataset.redemptions;
    week_statistics = JSON.parse(week_statistics);


    (r = getChartColorsArray("market-overview")) &&
        ((e = {
            series: [
                // {
                //     name: "Disbursed Amount",
                //     data: week_statistics['disbursed_amounts'],
                // },
                {
                    name: "Redemptions",
                    data: week_statistics['total_redemptions'],
                },
            ],
            chart: {
                type: "bar",
                height: 328,
                stacked: !0,
                toolbar: { show: !1 },
            },
            stroke: { width: 5, colors: "#000", lineCap: "round" },
            grid: {
                show: !0,
                borderColor: "#000",
                xaxis: { lines: { show: !1 } },
                yaxis: { lines: { show: !1 } },
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%",
                    borderRadius: 5,
                    lineCap: "round",
                    borderRadiusOnAllStackedSeries: !0,
                },
            },
            colors: r,
            fill: { opacity: 1 },
            dataLabels: { enabled: !1, textAnchor: "top" },
            yaxis: {
                labels: {
                    show: !0,
                    formatter: function (e) {
                        return e.toFixed(0); // + "₵";
                    },
                },
            },
            legend: { show: !1, position: "top", horizontalAlign: "right" },
            xaxis: {
                categories: week_statistics['weeks'],
                labels: { rotate: -90 },
                axisTicks: { show: !0 },
                axisBorder: { show: !0, stroke: { width: 1 } },
            },
        }),
            "" != marketOverviewChart && marketOverviewChart.destroy(),
            (marketOverviewChart = new ApexCharts(
                document.querySelector("#market-overview"),
                e
            )).render());

}

window.addEventListener("resize", function () {
    setTimeout(() => {
        loadCharts();
    }, 250);
}),

    loadCharts();
var options = {
    valueNames: [
        "order_date",
        "order_id",
        "shop",
        "customer",
        "products",
        "amount",
        "status",
        "rating",
    ],
},
    contactList = new List("contactList", options).on("updated", function (e) {
        0 == e.matchingItems.length
            ? (document.getElementsByClassName("noresult")[0].style.display =
                "block")
            : (document.getElementsByClassName("noresult")[0].style.display =
                "none"),
            0 < e.matchingItems.length
                ? (document.getElementsByClassName(
                    "noresult"
                )[0].style.display = "none")
                : (document.getElementsByClassName(
                    "noresult"
                )[0].style.display = "block");
    }),
    sorttableDropdown = document.querySelectorAll(".sortble-dropdown");
sorttableDropdown &&
    sorttableDropdown.forEach(function (t) {
        t.querySelectorAll(".dropdown-menu .dropdown-item").forEach(function (
            r
        ) {
            r.addEventListener("click", function () {
                var e = r.innerHTML;
                t.querySelector(".dropdown-title").innerHTML = e;
            });
        });
    });
