document.addEventListener("DOMContentLoaded", () => {
    let avgStock, avgSold;

    function fetchAndCalculateAverages() {
        return fetch("/sales-data")
            .then((response) => response.json())
            .then((data) => {
                console.log("Data fetched from PHP:", data);

                avgStock =
                    data.reduce((sum, item) => sum + item.stockCount, 0) /
                    data.length;
                avgSold =
                    data.reduce((sum, item) => sum + item.stockSold, 0) /
                    data.length;

                console.log("avg Stock:", avgStock);
                console.log("avg Sold:", avgSold);
            })
            .catch((error) =>
                console.error("Error fetching the stock data:", error)
            );
    }

    function saveAvgSalesReport() {
        console.log("saveAvgSalesReport function called");

        const dataToSave = {
            report_generated: new Date().toISOString().split("T")[0],
            generation_time: new Date()
                .toISOString()
                .split("T")[1]
                .split(".")[0],
            total_avg_levels: avgStock,
            total_avg_sales: avgSold,
        };

        fetch("/save-avg-sales-report", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(dataToSave),
        })
            .then((response) => response.json())
            .then((result) => {
                console.log("Result:", result.message);
                alert(result.message);
            })
            .catch((error) => {
                error.text().then((errorMessage) => {
                    console.error(
                        "Error saving avg sales report:",
                        errorMessage
                    );
                });
            });
    }

    fetchAndCalculateAverages().then(() => {
        document
            .getElementById("avg-sales-history")
            .addEventListener("click", saveAvgSalesReport);
    });
});
