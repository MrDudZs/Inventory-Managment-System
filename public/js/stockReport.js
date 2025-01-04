document.addEventListener("DOMContentLoaded", () => {
    function saveStockReport() {
        console.log("saveStockReport function called");
        fetch("/stock-data")
            .then((response) => response.json())
            .then((data) => {
                console.log("Data fetched:", data);
                fetch("/save-stock-report", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    body: JSON.stringify(data),
                })
                    .then((response) => response.json())
                    .then((result) => {
                        console.log("Result:", result.message);
                        alert(result.message);
                    })
                    .catch((error) => {
                        console.error("Error saving stock report:", error);
                    });
            })
            .catch((error) =>
                console.error("Error fetching stock data:", error)
            );
    }

    document
        .getElementById("stock-report")
        .addEventListener("click", saveStockReport);
});
