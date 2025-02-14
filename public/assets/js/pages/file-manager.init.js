function getChartColorsArray(e) {
    var t = document.getElementById(e);
    if (t) {
        t = t.dataset.colors;
        if (t)
            return JSON.parse(t).map((e) => {
                var t = e.replace(/\s/g, "");
                return t.includes(",")
                    ? 2 === (e = e.split(",")).length
                        ? `rgba(${getComputedStyle(
                            document.documentElement
                        ).getPropertyValue(e[0])}, ${e[1]})`
                        : t
                    : getComputedStyle(
                        document.documentElement
                    ).getPropertyValue(t) || t;
            });
        console.warn("data-colors attribute not found on: " + e);
    }
}
var chartDom,
    pieChart,
    option,
    previewTemplate,
    dropzone,
    storageColors = getChartColorsArray("storageChart"),
    dropzonePreviewNode =
        (storageColors &&
            ((chartDom = document.getElementById("storageChart")),
                (pieChart = echarts.init(chartDom)),
                (option = {
                    grid: {
                        left: "0%",
                        right: "0%",
                        bottom: "0%",
                        top: "4%",
                        containLabel: !0,
                    },
                    tooltip: { trigger: "item" },
                    legend: {
                        bottom: "-5px",
                        left: "center",
                        textStyle: { color: "#87888a" },
                    },
                    series: [
                        {
                            name: "Storage",
                            type: "pie",
                            radius: ["75%", "90%"],
                            avoidLabelOverlap: !1,
                            itemStyle: {
                                borderRadius: 8,
                                borderColor: "#fff",
                                borderWidth: 5,
                            },
                            label: { show: !1, position: "center" },
                            emphasis: {
                                label: {
                                    show: !0,
                                    fontSize: 15,
                                    fontWeight: "bold",
                                },
                            },
                            tooltip: { backgroundColor: "#fff", padding: 15 },
                            labelLine: { show: !1 },
                            data: [
                                { value: 1048, name: "Dcomuents" },
                                { value: 735, name: "Audio" },
                                { value: 580, name: "Images" },
                                { value: 484, name: "Video" },
                                { value: 300, name: "Others" },
                            ],
                            color: storageColors,
                        },
                    ],
                })) &&
            "object" == typeof option &&
            option &&
            pieChart.setOption(option),
            window.addEventListener("resize", function () {
                pieChart && pieChart.resize();
            }),
            document.querySelector("#dropzone-preview-list")),
    options =
        ((dropzonePreviewNode.id = ""),
            dropzonePreviewNode &&
            ((previewTemplate = dropzonePreviewNode.parentNode.innerHTML),
                dropzonePreviewNode.parentNode.removeChild(dropzonePreviewNode),
                (dropzone = new Dropzone(".file-dropzone", {
                    url: "https://httpbin.org/post",
                    method: "post",
                    previewTemplate: previewTemplate,
                    previewsContainer: "#dropzone-preview",
                }))),
        {
            valueNames: [
                "docs_type",
                "document_name",
                "size",
                "file_item",
                "date",
            ],
        }),
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
    sorttableDropdown = document.querySelectorAll(".sortble-dropdown"),
    bodyElement =
        (sorttableDropdown &&
            sorttableDropdown.forEach(function (o) {
                o.querySelectorAll(".dropdown-menu .dropdown-item").forEach(
                    function (t) {
                        t.addEventListener("click", function () {
                            var e = t.innerHTML;
                            o.querySelector(".dropdown-title").innerHTML = e;
                        });
                    }
                );
            }),
            document.getElementsByTagName("body")[0]),
    isShowMenu =
        (Array.from(document.querySelectorAll("#file-list tr")).forEach(
            function (e) {
                e.querySelector(".view-item-btn").addEventListener(
                    "click",
                    function () {
                        bodyElement.classList.add("file-detail-show"),
                            pieChart.resize();
                    }
                );
            }
        ),
            Array.from(document.querySelectorAll(".close-btn-overview")).forEach(
                function (e) {
                    e.addEventListener("click", function () {
                        bodyElement.classList.remove("file-detail-show");
                    });
                }
            ),
            !1),
    emailMenuSidebar = document.getElementsByClassName("file-manager-wrapper");
function windowResize() {
    document.documentElement.clientWidth < 1400
        ? document.body.classList.remove("file-detail-show")
        : document.body.classList.add("file-detail-show");
}
Array.from(document.querySelectorAll(".file-menu-btn")).forEach(function (e) {
    e.addEventListener("click", function () {
        Array.from(emailMenuSidebar).forEach(function (e) {
            e.classList.add("menubar-show"), (isShowMenu = !0);
        });
    });
}),
    window.addEventListener("click", function (e) {
        document
            .querySelector(".file-manager-wrapper")
            .classList.contains("menubar-show") &&
            (isShowMenu ||
                document
                    .querySelector(".file-manager-wrapper")
                    .classList.remove("menubar-show"),
                (isShowMenu = !1));
    }),
    windowResize(),
    window.addEventListener("resize", windowResize);
