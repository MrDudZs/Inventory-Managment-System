document.addEventListener('DOMContentLoaded', () => {
    fetch('php/Includes/stockData.php')
        .then(response => response.json())
        .then(data => {
            console.log('Data fetched from PHP:', data);

            const labels = data.map(item => item.stockName);
            const stockCounts = data.map(item => item.stockCount);
            const stockSolds = data.map(item => item.stockSold);

            console.log('Labels:', labels);
            console.log('Stock Counts:', stockCounts);
            console.log('Stock Solds:', stockSolds);

            var barData = {
                labels: labels,
                datasets: [
                    {
                        label: 'Stock Count',
                        data: stockCounts,
                        backgroundColor: 'darkgreen',
                        borderColor: 'darkgreen',
                        borderWidth: 1
                    },
                    {
                        label: 'Stock Sold',
                        data: stockSolds,
                        backgroundColor: 'lightgreen',
                        borderColor: 'lightgreen',
                        borderWidth: 1
                    }
                ]
            };

            var barCtx = document.getElementById('barChart').getContext('2d');

            var barChart = new Chart(barCtx, {
                type: 'bar',
                data: barData,
                options: {
                    scales: {
                        x: {
                            beginAtZero: true,
                            stacked: false,
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            stacked: false,
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                title: function(tooltipItem) {
                                    return tooltipItem[0].label;
                                },
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + ' units - ' + tooltipItem.label;
                                }
                            }
                        }
                    }
                }
            });

            console.log('Chart created successfully:', barChart);
        })
        .catch(error => console.error('Error fetching the stock data:', error));
});
