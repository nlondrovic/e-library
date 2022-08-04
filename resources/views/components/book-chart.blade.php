<div class="relative">
    <h3 class="uppercase mb-[20px] text-left py-[30px]">
        Book statistics
    </h3>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style rel="stylesheet" type="text/css">
        .chartBox {
            width: 600px;
        }
    </style>

    <div class="chartBox">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        const labels = ['Checkouts', 'Reserved', 'Overdue']

        const data = {
            labels: labels,
            datasets: [{
                label: '# of books',
                data: [{{ $checkouts }}, {{ $reserved }}, {{ $overdue }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {ticks: {
                    precision:0
                },
                indexAxis: 'y',
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(document.getElementById('myChart'),
            config
        );
    </script>

</div>
