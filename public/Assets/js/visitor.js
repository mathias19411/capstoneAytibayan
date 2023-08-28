function updatemenu() {
    if (document.getElementById('responsive-menu').checked == true) {
        document.getElementById('menu').style.borderBottomRightRadius = '0';
        document.getElementById('menu').style.borderBottomLeftRadius = '0';
    } else {
        document.getElementById('menu').style.borderRadius = '10px';
    }
}

// rubber band scrolling effect
const content = document.querySelector('.events-main');

let isRubberBandActive = true;

content.addEventListener('scroll', () => {
    if (isRubberBandActive) {
        const scrollTop = content.scrollTop;
        const scrollHeight = content.scrollHeight;
        const clientHeight = content.clientHeight;

        if (scrollTop <= 0) {
            // Reached the top edge
            content.scrollTop = 1; // Move the content down slightly
        } else if (scrollTop + clientHeight >= scrollHeight) {
            // Reached the bottom edge
            content.scrollTop = scrollHeight - clientHeight - 1; // Move the content up slightly
        }
    }
});

// ---------------------------Charts-----------------------------

//Bar Chart
var barChartOptions = {
          series: [{
          data: [50, 45, 30, 43, 39]
        }],
          chart: {
          type: 'bar',
          height: 300,
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
            horizontal: false,
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
          categories: ['Lead', 'AgriPinay', 'Binhi', 'Akbay', 'Abaka'
          ],
          title: {
            text: "Programs"
          }
        },
        yaxis: {
            title: {
                text: "Beneficiaries"
            }
        }
        };

        var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
        barChart.render();


        // Show/hide the button based on the user's scroll position
window.onscroll = function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollToTopButton").style.display = "block";
  } else {
    document.getElementById("scrollToTopButton").style.display = "none";
  }
};

// Scroll to the top when the button is clicked
document.getElementById("scrollToTopButton").addEventListener("click", function() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
});

// Scroll to the top when the button is clicked
document.getElementsByClassName("scrollToTopButton").addEventListener("click", function() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
});
