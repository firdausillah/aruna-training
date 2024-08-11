    <div class="misc-wrapper container relative">
        <div class="row">
            <div id="chart"></div>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script>
        var options = {
            series: [{
                name: 'Net Profit',
                data: [44, 55, 57, 56, 61]
            }, {
                name: 'Revenue',
                data: [76, 85, 101, 98, 87]
            }, {
                name: 'Free Cash Flow',
                data: [35, 41, 36, 26, 45]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '30%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: true
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun'],
            },
            yaxis: {
                title: {
                    text: '$ (thousands)'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "$ " + val + " thousands"
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>