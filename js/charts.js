// Bar Chart for Sold Stock to Current Stock
document.addEventListener("DOMContentLoaded", () => {
  fetch("php/Includes/stockData.php")
    .then((response) => response.json())
    .then((data) => {
      console.log("Data fetched from PHP:", data);

      const labels = data.map((item) => item.stockName);
      const stockCounts = data.map((item) => item.stockCount);
      const stockSolds = data.map((item) => item.stockSold);

      console.log("Labels:", labels);
      console.log("Stock Counts:", stockCounts);
      console.log("Stock Solds:", stockSolds);

      var barData = {
        labels: labels,
        datasets: [
          {
            label: "Stock Count",
            data: stockCounts,
            backgroundColor: "darkgreen",
            borderColor: "darkgreen",
            borderWidth: 1,
          },
          {
            label: "Stock Sold",
            data: stockSolds,
            backgroundColor: "lightgreen",
            borderColor: "lightgreen",
            borderWidth: 1,
          },
        ],
      };

      var barCtx = document.getElementById("barChart").getContext("2d");

      var barChart = new Chart(barCtx, {
        type: "bar",
        data: barData,
        options: {
          scales: {
            x: {
              beginAtZero: true,
              stacked: false,
              grid: {
                display: false,
              },
            },
            y: {
              beginAtZero: true,
              stacked: false,
            },
          },
          plugins: {
            tooltip: {
              callbacks: {
                title: function (tooltipItem) {
                  return tooltipItem[0].label;
                },
                label: function (tooltipItem) {
                  return tooltipItem.raw + " units - " + tooltipItem.label;
                },
              },
            },
          },
        },
      });

      console.log("Chart created successfully:", barChart);
    })
    .catch((error) => console.error("Error fetching the stock data:", error));
});



// doughnut Chart for Avg Stock - Avg Sold
document.addEventListener("DOMContentLoaded", () => {
  fetch("php/Includes/salesData.php")
    .then((response) => response.json())
    .then((data) => {
      console.log("Data fetched from PHP:", data);

      const avgStock =
        data.reduce((sum, item) => sum + item.stockCount, 0) / data.length;
      const avgSold =
        data.reduce((sum, item) => sum + item.stockSold, 0) / data.length;

      console.log("avg Stock:", avgStock);
      console.log("avg Sold:", avgSold);

      var doughnutData = {
        labels: ["Avg Stock", "Avg Sold"],
        datasets: [
          {
            label: "Avg Stock vs Avg Sold",
            data: [avgStock, avgSold],
            backgroundColor: ["#FFE62A", "#FF9933"],
            borderColor: ["#FFE62A", "#FF9933"],
            borderWidth: 1,
          },
        ],
      };

      var doughnutCtx = document.getElementById("doughnutChart").getContext("2d");

      var doughnutChart = new Chart(doughnutCtx, {
        type: "doughnut",
        data: doughnutData,
        options: {
          plugins: {
            tooltip: {
              callbacks: {
                label: function (tooltipItem) {
                  const dataset = tooltipItem.dataset.data;
                  const total = dataset.reduce((acc, value) => acc + value, 0);
                  const percentage = ((tooltipItem.raw / total) * 100).toFixed(
                    2
                  );
                  return `${tooltipItem.label}: ${percentage}% (${tooltipItem.raw} units)`;
                },
              },
            },
          },
        },
      });

      console.log("Chart created successfully:", doughnutChart);
    })
    .catch((error) => console.error("Error fetching the stock data:", error));
});
