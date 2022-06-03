var colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"],
  dataColors = $("#campaign-sent-chart").data("colors");
dataColors && (colors = dataColors.split(","));
var options1 = {
  chart: { type: "bar", height: 60, sparkline: { enabled: !0 } },
  plotOptions: { bar: { columnWidth: "60%" } },
  colors: colors,
  series: [{ data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54] }],
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
  xaxis: { crosshairs: { width: 1 } },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (o) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
};
new ApexCharts(
  document.querySelector("#campaign-sent-chart"),
  options1
).render();
colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
(dataColors = $("#new-leads-chart").data("colors")) &&
  (colors = dataColors.split(","));
var options2 = {
  chart: { type: "line", height: 60, sparkline: { enabled: !0 } },
  series: [{ data: [25, 66, 41, 89, 63, 25, 44, 12, 36, 9, 54] }],
  stroke: { width: 2, curve: "smooth" },
  markers: { size: 0 },
  colors: colors,
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (o) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
};
new ApexCharts(document.querySelector("#new-leads-chart"), options2).render();
colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
(dataColors = $("#deals-chart").data("colors")) &&
  (colors = dataColors.split(","));
var options3 = {
  chart: { type: "bar", height: 60, sparkline: { enabled: !0 } },
  plotOptions: { bar: { columnWidth: "60%" } },
  colors: colors,
  series: [{ data: [12, 14, 2, 47, 42, 15, 47, 75, 65, 19, 14] }],
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
  xaxis: { crosshairs: { width: 1 } },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (o) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
};
new ApexCharts(document.querySelector("#deals-chart"), options3).render();
colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
(dataColors = $("#booked-revenue-chart").data("colors")) &&
  (colors = dataColors.split(","));
var options4 = {
  chart: { type: "bar", height: 60, sparkline: { enabled: !0 } },
  plotOptions: { bar: { columnWidth: "60%" } },
  colors: colors,
  series: [{ data: [47, 45, 74, 14, 56, 74, 14, 11, 7, 39, 82] }],
  labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
  xaxis: { crosshairs: { width: 1 } },
  tooltip: {
    fixed: { enabled: !1 },
    x: { show: !1 },
    y: {
      title: {
        formatter: function (o) {
          return "";
        },
      },
    },
    marker: { show: !1 },
  },
};
new ApexCharts(
  document.querySelector("#booked-revenue-chart"),
  options4
).render();
colors = ["#727cf5", "#0acf97", "#fa5c7c", "#ffbc00"];
(dataColors = $("#dash-campaigns-chart").data("colors")) &&
  (colors = dataColors.split(","));
var options = {
    chart: { height: 304, type: "radialBar" },
    colors: colors,
    series: [86, 36, 50],
    labels: ["Total Sent", "Reached", "Opened"],
    plotOptions: { radialBar: { track: { margin: 8 } } },
  },
  

;
    let el = document.querySelector("#dash-campaigns-chart");
    let options = {
        chart: { height: 321, type: "line", toolbar: { show: !1 } },
        stroke: { curve: "smooth", width: 2 },
        series: [
            {
              name: "Total Revenue",
              type: "area",
              data: taux,
            },
            {
              name: "Total Pipeline",
              type: "line",
              data: taux,
            },
          ],
          fill: { type: "solid", opacity: [0.35, 1] },
  labels: title,
        yaxis: {
            min: 0,
            max: 100
        }
    };
    let chart = new ApexCharts(el, options);
    chart.render();

    function verTrimestre(trimestre){
        
        axios.post('http://localhost/survey_f/dt.php', { trimestre: trimestre }).
        then(function(resposta){

            chart.updateSeries(
                [
                    {
                        data: resposta.data
                    }
                ]
            );

        })
        .catch(function(error){
            console.log('Erro: ' + error)
        });
    }

    verTrimestre(1);

