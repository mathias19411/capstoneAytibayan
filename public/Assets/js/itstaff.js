//sidebar toogle

// let sidebarOpen = false;
// let sidebar = document.getElementById("sidebar");

// function openSidebar()
// {
//     if(!sidebarOpen)
//     {
//         sidebar.classList.add("sidebar-responsive");
//         sidebarOpen = true;
//     }
// }

// let btn = document.querySelector('#btn');
// let sidebar = document.querySelector('#sidebar');

// btn.onclick = function () {
//     sidebar.classList.toggle('active');
// };

// function closeSidebar()
// {
//     if(sidebarOpen)
//     {
//         sidebar.classList.remove("sidebar-responsive");
//         sidebarOpen = false;
//     }
// }

// ---------------------------Charts-----------------------------

//Bar Chart
var barChartOptions = {
          series: [{
          data: [100000, 95000, 110000, 100000, 99000, 105000, 130000, 110000, 89000, 130000, 100000, 150000]
        }],
          chart: {
          type: 'bar',
          height: 350,
        //   toolbar: { //toolbar enabled, users can DL the chart into svg, csv, and png
        //     show: false
        //   },
        },
        colors: [
            "#7bb701",
            "#f0a60f",
            "#7bb701",
            "#f0a60f",
            "#7bb701",
            "#f0a60f",
            "#7bb701",
            "#f0a60f",
            "#7bb701",
            "#f0a60f",
            "#7bb701",
            "#f0a60f"
        ],
        plotOptions: {
          bar: {
            distributed: true, //distributes the custom colors defined
            borderRadius: 4,
            horizontal: true,
            columnWidth: '40%',
          }
        },
        dataLabels: {
          enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
          ],
          title: {
            text: "Pesos"
          }
        },
        yaxis: {
            title: {
                text: "Month"
            }
        }
        };

        var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
        barChart.render();

//Area Charts
var areaChartOptions = {
          series: [{
          name: 'Active Beneficiaries',
        //   type: 'area',
          data: [44, 155, 131, 147, 31, 143, 126, 141, 91, 147, 133, 124]
        }, {
          name: 'Inactive Beneficiaries',
        //   type: 'line',
          data: [55, 169, 145, 161, 93, 154, 137, 152, 144, 161, 83, 124]
        }],
          chart: {
          height: 350,
        //   type: 'line',
          type: 'area',
          //   toolbar: { //toolbar enabled, users can DL the chart into svg, csv, and png
        //     show: false
        //   },
        },
        colors: ["#f0a60f", "#7bb701"],
        dataLabels: {
            enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        // fill: {
        //   type:'solid',
        //   opacity: [0.35, 1],
        // },
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        markers: {
          size: 0
        },
        yaxis: [
          {
            title: {
              text: 'Active Beneficiaries',
            },
          },
          {
            opposite: true,
            title: {
              text: 'Inactive Beneficiaries',
            },
          },
        ],
        tooltip: {
          shared: true,
          intersect: false,
          y: {
            formatter: function (y) {
              if(typeof y !== "undefined") {
                return  y.toFixed(0) + " Beneficiaries";
              }
              return y;
            }
          }
        //    formatter function is used to format the tooltip's y-axis values by rounding them to the nearest integer and adding " points" as a suffix.
        }
        };

        var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
        areaChart.render();