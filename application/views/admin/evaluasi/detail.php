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
                        <button class="btn btn-primary" type="button" id="button-addon2" onclick="filter_tanggal()">Filter</button>
                    </div>

                    <label for="chart_keadaan">Keadaan Peserta</label>
                    <div id="chart_keadaan"></div>

                    <label for="penjelasan_keadaan_peserta">Penjelasan Keadaan Peserta</label>
                    <div id="penjelasan_keadaan_peserta" class="row">
                    </div>

                    <label for="chart_pemahaman_materi">Pemahaman Materi</label>
                    <div id="chart_pemahaman_materi"></div>

                    <label for="chart_performa_pemateri">Performa Pemateri</label>
                    <div id="chart_performa_pemateri"></div>

                    <label for="chart_pelayanan_panitia">Pelayanan Panitia</label>
                    <div id="chart_pelayanan_panitia"></div>

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
    var chart_keadaan, chart_pemahaman_materi, chart_performa_pemateri, chart_pelayanan_panitia;
    var options_chart_keadaan, options_chart_pemahaman_materi, options_chart_performa_pemateri, options_chart_pelayanan_panitia;
    var tanggal;

    $(document).ready(function() {
        filter_tanggal();
    });

    function filter_tanggal() {
        tanggal = $('#filter_evaluasi_harian').val();

        get_evaluasi_harian(tanggal);
        get_chart_keadaan(tanggal);
        get_chart_pemahaman_materi(tanggal);
        get_chart_performa_pemateri(tanggal);
        get_chart_pelayanan_panitia(tanggal);
    }

    function get_evaluasi_harian(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {
                    console.log(json);

                }
            }
        });
    }

    function get_chart_keadaan(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getKeadaan') ?>',
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

                    if (chart_keadaan) {
                        // Update chart with new data
                        chart_keadaan.updateOptions(options_chart_keadaan);
                    } else {
                        // Create new chart if it doesn't exist
                        chart_keadaan = new ApexCharts(document.querySelector("#chart_keadaan"), options_chart_keadaan);
                        chart_keadaan.render();
                    }

                }
            }
        });
    }

    function get_chart_pemahaman_materi(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getPemahamanMateri') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {

                    options_chart_pemahaman_materi = {
                        series: [{
                            name: 'tidak baik',
                            data: [44, 55, 41, 64, 22, 43, 21]
                        }, {
                            data: [53, 32, 33, 52, 13, 44, 32]
                        }, {
                            data: [32, 43, 23, 45, 45, 53, 27]
                        }, {
                            data: [32, 43, 23, 45, 45, 53, 27]
                        }, {
                            data: [32, 43, 23, 45, 45, 53, 27]
                        }],
                        chart: {
                            type: 'bar',
                            height: 630
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            offsetX: -6,
                            style: {
                                fontSize: '8px',
                                colors: ['#fff']
                            }
                        },
                        stroke: {
                            show: true,
                            width: 1,
                            colors: ['#fff']
                        },
                        tooltip: {
                            shared: true,
                            intersect: false
                        },
                        xaxis: {
                            categories: ['Lorem ipsum dolor sit amet consectetur.', 'Lorem, ipsum dolor.', 'Lorem, ipsum dolor.', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit.', 'Lorem ipsum dolor sit amet.'],
                        },
                    };

                    if (chart_pemahaman_materi) {
                        // Update chart with new data
                        chart_pemahaman_materi.updateOptions(options_chart_pemahaman_materi);
                    } else {
                        // Create new chart if it doesn't exist
                        chart_pemahaman_materi = new ApexCharts(document.querySelector("#chart_pemahaman_materi"), options_chart_pemahaman_materi);
                        chart_pemahaman_materi.render();
                    }


                }
            }
        });
    }

    function get_chart_performa_pemateri(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getPerformaPemateri') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {

                    options_chart_performa_pemateri = {
                        series: [{
                            name: 'tidak baik',
                            data: [4, 5, 4, 4, 2, 3, 2]
                        }, {
                            data: [3, 2, 3, 2, 3, 4, 3]
                        }, {
                            data: [3, 2, 3, 2, 3, 4, 3]
                        }, {
                            data: [2, 3, 2, 5, 5, 3, 2]
                        }, {
                            data: [2, 3, 2, 5, 5, 3, 2]
                        }],
                        chart: {
                            type: 'bar',
                            height: 630
                        },
                        plotOptions: {
                            bar: {
                                horizontal: true,
                                dataLabels: {
                                    position: 'top',
                                },
                            }
                        },
                        dataLabels: {
                            enabled: true,
                            offsetX: -6,
                            style: {
                                fontSize: '8px',
                                colors: ['#fff']
                            }
                        },
                        stroke: {
                            show: true,
                            width: 1,
                            colors: ['#fff']
                        },
                        tooltip: {
                            shared: true,
                            intersect: false
                        },
                        xaxis: {
                            categories: ['Lorem ipsum dolor sit amet consectetur.', 'Lorem, ipsum dolor.', 'Lorem, ipsum dolor.', 'Lorem ipsum dolor sit amet consectetur.', 'Lorem ipsum dolor sit amet.', 'Lorem ipsum dolor sit.', 'Lorem ipsum dolor sit amet.'],
                        },
                    };

                    if (chart_performa_pemateri) {
                        // Update chart with new data
                        chart_performa_pemateri.updateOptions(options_chart_performa_pemateri);
                    } else {
                        // Create new chart if it doesn't exist
                        chart_performa_pemateri = new ApexCharts(document.querySelector("#chart_performa_pemateri"), options_chart_performa_pemateri);
                        chart_performa_pemateri.render();
                    }


                }
            }
        });
    }

    function get_chart_pelayanan_panitia(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/harian/getPelayananPanitia') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {
                    options_chart_pelayanan_panitia = {
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

                    if (chart_pelayanan_panitia) {
                        // Update chart with new data
                        chart_pelayanan_panitia.updateOptions(options_chart_pelayanan_panitia);
                    } else {
                        // Create new chart if it doesn't exist
                        chart_pelayanan_panitia = new ApexCharts(document.querySelector("#chart_pelayanan_panitia"), options_chart_pelayanan_panitia);
                        chart_pelayanan_panitia.render();
                    }

                }
            }
        });
    }
</script>