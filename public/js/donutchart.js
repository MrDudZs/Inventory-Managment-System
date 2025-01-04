document.addEventListener("DOMContentLoaded", () => {
    fetch("/sales-data")
        .then((response) => response.json())
        .then((data) => {
            console.log("Data fetched from PHP:", data);

            const avgStock =
                data.reduce((sum, item) => sum + item.stockCount, 0) /
                data.length;
            const avgSold =
                data.reduce((sum, item) => sum + item.stockSold, 0) /
                data.length;

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

            var doughnutCtx = document
                .getElementById("doughnutChart")
                .getContext("2d");

            var doughnutChart = new Chart(doughnutCtx, {
                type: "doughnut",
                data: doughnutData,
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    const dataset = tooltipItem.dataset.data;
                                    const total = dataset.reduce(
                                        (acc, value) => acc + value,
                                        0
                                    );
                                    const percentage = (
                                        (tooltipItem.raw / total) *
                                        100
                                    ).toFixed(2);
                                    return `${tooltipItem.label}: ${percentage}% (${tooltipItem.raw} units)`;
                                },
                            },
                        },
                    },
                },
            });

            console.log("Chart created successfully:", doughnutChart);
        })
        .catch((error) =>
            console.error("Error fetching the stock data:", error)
        );
});
