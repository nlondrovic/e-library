<div class="relative">
    <h3 class="capitalize mb-[20px] text-left py-[30px] text-center text-[20px]">
        {{ __('Book statistics') }}
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
        const labels = ["{{__('Checkouts')}}", "{{__('Reserved')}}", "{{__('Overdue')}}"]

        const data = {
            labels: labels,
            datasets: [{
                label: "{{__('Number of books')}}",
                data: [{{ $checkouts_count }}, {{ $reserved_count }}, {{ $overdue_count }}],
                backgroundColor: [
                    'rgba(41, 153, 72, 0.75)',
                    'rgba(45, 81, 171, 0.75)',
                    'rgba(220, 40, 10, 0.75)',
                ],
                borderColor: [
                    'rgba(41, 153, 72, 0.2)',
                    'rgba(45, 81, 171, 0.2)',
                    'rgba(220, 60, 10, 0.2)',
                ],
                borderWidth: 1,
            }]
        };

        const config = {
            type: 'bar',
            data,
            options: {
                ticks: {
                    precision: 0
                },
                indexAxis: 'y',
                scales: {
                    x: {
                        grid: {
                            // beginAtZero: true,
                            color: "rgba(235,235,235)",
                            borderWidth: 1,
                            // borderOffset: 2,
                            borderColor: "rgba(120,120,120)"
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            borderWidth: 1,
                            // borderOffset: 2,
                            borderColor: "rgba(120,120,120)"
                        }
                    }
                }
            }
        };

        const myChart = new Chart(document.getElementById('myChart'), config);
    </script>

</div>
