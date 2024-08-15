<div class="row">
    <div class="col-12">
        <h5 class="my-auto">Evaluasi <?= $title ? $title : '' ?></h5>
        <div class="nav-align-top my-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#evaluasi_harian" aria-controls="evaluasi_harian" aria-selected="true">
                        Evaluasi Harian
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#evaluasi_akhir" aria-controls="evaluasi_akhir" aria-selected="false">
                        Evaluasi Akhir
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="evaluasi_harian" role="tabpanel">
                    <div class="input-group mb-4">
                        <input type="date" class="form-control" id="filter_evaluasi_harian" value="<?= date("Y-m-d", strtotime('now')); ?>" aria-describedby="button-addon2">
                        <button class="btn btn-outline-primary" type="button" id="button-addon2" onclick="filter_tanggal()">Filter</button>
                    </div>

                    <label for="chart_keadaan">Keadaan Peserta</label>
                    <div id="chart_keadaan"></div>

                    <label for="penjelasan_keadaan_peserta">Penjelasan Keadaan Peserta</label>
                    <div id="penjelasan_keadaan_peserta"></div>

                </div>
                <div class="tab-pane fade" id="evaluasi_akhir" role="tabpanel">

                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
    var id_event = <?= $_GET['id_event'] ?>;
    var chart;
    var options_chart_keadaan;
    var tanggal;

    function filter_tanggal() {
        tanggal = $('#filter_evaluasi_harian').val();

        get_chart_keadaan(tanggal);
    }

    function get_chart_keadaan(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getEvaluasi') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {
                    options_chart_keadaan = {
                        series: [{
                            data: [json.data[0].tidak_baik, json.data[0].biasa, json.data[0].baik]
                        }],
                        chart: {
                            type: 'bar',
                            height: 150
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                borderRadiusApplication: 'end',
                                horizontal: true,
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: ['Tidak baik', 'Biasa', 'Baik'],
                        }
                    };

                    if (chart) {
                        // Update chart with new data
                        chart.updateOptions(options_chart_keadaan);
                    } else {
                        // Create new chart if it doesn't exist
                        chart = new ApexCharts(document.querySelector("#chart_keadaan"), options_chart_keadaan);
                        chart.render();
                    }

                }
            }
        });
    }
</script>