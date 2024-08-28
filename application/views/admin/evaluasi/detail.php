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
                        <!-- <input type="date" class="form-control" id="filter_evaluasi_harian" value="2024-08-18" aria-describedby="button-addon2"> -->
                        <input type="date" class="form-control" id="filter_evaluasi_harian" value="<?= date("Y-m-d", strtotime('now')); ?>" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2" onclick="filter_tanggal_harian()">Filter</button>
                    </div>

                    <label class="display-6" for="chart_keadaan">Keadaan Peserta</label>
                    <div id="chart_keadaan"></div>

                    <label class="display-6 mt-5" for="penjelasan_keadaan_peserta">Penjelasan Keadaan Peserta</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_penjelasan_keadaan_peserta" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Keadaan Peserta</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                    <label class="display-6 mt-5" for="chart_pemahaman_materi">Pemahaman Materi</label>
                    <div id="chart_pemahaman_materi"></div>

                    <label class="display-6 mt-5" for="materi_saran">Saran Untuk Materi</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_materi_saran" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Saran Untuk Materi</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                    <label class="display-6 mt-5" for="chart_performa_pemateri">Performa Pemateri</label>
                    <div id="chart_performa_pemateri"></div>

                    <label class="display-6 mt-5" for="trainer_saran">Saran Untuk Pemateri</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_trainer_saran" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Saran Untuk Pemateri</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                    <label class="display-6 mt-5" for="chart_pelayanan_panitia">Pelayanan Panitia</label>
                    <div id="chart_pelayanan_panitia"></div>

                    <label class="display-6 mt-5" for="pelayanan_alasan">Komentar Pelayanan Panitia</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_pelayanan_alasan" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Komentar Pelayanan Panitia</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                    <label class="display-6 mt-5" for="komentar_usulan">Komentar dan Usulan</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_komentar_usulan" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Komentar dan Usulan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="evaluasi_akhir" role="tabpanel">
                    <div class="input-group mb-4">
                        <!-- <input type="date" class="form-control" id="filter_evaluasi_harian" value="2024-08-18" aria-describedby="button-addon2"> -->
                        <input type="date" class="form-control" id="filter_evaluasi_akhir" value="<?= date("Y-m-d", strtotime('now')); ?>" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="button" id="button-addon2" onclick="filter_tanggal_akhir()">Filter</button>
                    </div>

                    <label class="display-6 mt-5" for="chart_evaluasi_akhir">Evaluasi Akhir</label>
                    <div id="chart_evaluasi_akhir"></div>

                    <label class="display-6 mt-5" for="komentar">Komentar</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_komentar" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Komentar</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>

                    <label class="display-6 mt-5" for="usul_saran">Saran untuk kegiatan kedepan</label>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_usul_saran" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Saran untuk kegiatan kedepan</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>
<script>
    var id_event = <?= $_GET['id_event'] ?>;
    var chart_keadaan, chart_pemahaman_materi, chart_performa_pemateri, chart_pelayanan_panitia, chart_evaluasi_akhir;
    var options_chart_keadaan, options_chart_pemahaman_materi, options_chart_performa_pemateri, options_chart_pelayanan_panitia, option_chart_evaluasi_akhir;
    var tanggal;

    $(document).ready(function() {
        // BEGIN table_penjelasan_keadaan_peserta
        table_penjelasan_keadaan_peserta = $('#table_penjelasan_keadaan_peserta').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'keadaan_alasan'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_penjelasan_keadaan_peserta

        // BEGIN table_materi_saran
        table_materi_saran = $('#table_materi_saran').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'materi_saran'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_materi_saran

        // BEGIN table_trainer_saran
        table_trainer_saran = $('#table_trainer_saran').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'trainer_saran'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_trainer_saran

        // BEGIN table_pelayanan_alasan
        table_pelayanan_alasan = $('#table_pelayanan_alasan').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'pelayanan_alasan'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_pelayanan_alasan

        // BEGIN table_komentar_usulan
        table_komentar_usulan = $('#table_komentar_usulan').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'komentar_usulan'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_komentar_usulan

        // BEGIN table_komentar
        table_komentar = $('#table_komentar').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'komentar'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_komentar

        // BEGIN table_usul_saran
        table_usul_saran = $('#table_usul_saran').DataTable({
            responsive: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'usul_saran'
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
        // END table_usul_saran

        filter_tanggal_harian();
        filter_tanggal_akhir();
    });

    function filter_tanggal_harian() {
        tanggal = $('#filter_evaluasi_harian').val();

        get_evaluasi_harian(tanggal);
        get_chart_keadaan(tanggal);
        get_chart_pemahaman_materi(tanggal);
        get_chart_performa_pemateri(tanggal);
        get_chart_pelayanan_panitia(tanggal);
    }

    function filter_tanggal_akhir() {
        tanggal = $('#filter_evaluasi_akhir').val();

        get_evaluasi_akhir(tanggal);
        get_chart_evaluasi_akhir(tanggal);
    }

    function get_evaluasi_harian(tanggal) {
        table_penjelasan_keadaan_peserta.ajax.url('<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=keadaan_alasan').load();
        table_materi_saran.ajax.url('<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=materi_saran').load();
        table_trainer_saran.ajax.url('<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=trainer_saran').load();
        table_pelayanan_alasan.ajax.url('<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=pelayanan_alasan').load();
        table_komentar_usulan.ajax.url('<?= base_url('admin/_evaluasi/harian/getEvaluasiHarian?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=komentar_usulan').load();
    }

    function get_evaluasi_akhir(tanggal) {
        table_komentar.ajax.url('<?= base_url('admin/_evaluasi/akhir/getEvaluasi?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=komentar').load();
        table_usul_saran.ajax.url('<?= base_url('admin/_evaluasi/akhir/getEvaluasi?tanggal=') ?>' + tanggal + '&id_event=' + id_event + '&field=usul_saran').load();
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
                if (json.data.length != 0) {
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
                if (json.data.length != 0) {
                    materi_data = json.data;
                    var materi_category = []
                    var materi_sangat_baik = []
                    var materi_baik = []
                    var materi_cukup = []
                    var materi_kurang = []
                    var materi_sangat_kurang = []

                    for (let i = 0; i < materi_data.length; i++) {
                        materi_category.push(materi_data[i].activity_nama);
                        materi_sangat_baik.push(materi_data[i].sangat_baik);
                        materi_baik.push(materi_data[i].baik);
                        materi_cukup.push(materi_data[i].cukup);
                        materi_kurang.push(materi_data[i].kurang);
                        materi_sangat_kurang.push(materi_data[i].sangat_kurang);
                    }

                    options_chart_pemahaman_materi = {
                        series: [{
                            name: 'Sangat Kurang',
                            data: materi_sangat_baik
                        }, {
                            name: 'Kurang',
                            data: materi_baik
                        }, {
                            name: 'Cukup',
                            data: materi_cukup
                        }, {
                            name: 'Baik',
                            data: materi_kurang
                        }, {
                            name: 'Sangat Baik',
                            data: materi_sangat_kurang
                        }],
                        chart: {
                            type: 'bar',
                            // height: 630
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
                            categories: materi_category,
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
                if (json.data.length != 0) {
                    pemateri_data = json.data;
                    var pemateri_category = []
                    var pemateri_sangat_baik = []
                    var pemateri_baik = []
                    var pemateri_cukup = []
                    var pemateri_kurang = []
                    var pemateri_sangat_kurang = []

                    for (let i = 0; i < pemateri_data.length; i++) {
                        pemateri_category.push(pemateri_data[i].trainer_nama);
                        pemateri_sangat_baik.push(pemateri_data[i].sangat_baik);
                        pemateri_baik.push(pemateri_data[i].baik);
                        pemateri_cukup.push(pemateri_data[i].cukup);
                        pemateri_kurang.push(pemateri_data[i].kurang);
                        pemateri_sangat_kurang.push(pemateri_data[i].sangat_kurang);
                    }

                    options_chart_performa_pemateri = {
                        series: [{
                            name: 'Sangat Kurang',
                            data: pemateri_sangat_baik
                        }, {
                            name: 'Kurang',
                            data: pemateri_baik
                        }, {
                            name: 'Cukup',
                            data: pemateri_cukup
                        }, {
                            name: 'Baik',
                            data: pemateri_kurang
                        }, {
                            name: 'Sangat Baik',
                            data: pemateri_sangat_kurang
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
                            categories: pemateri_category,
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
                if (json.data.length != 0) {
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

    function get_chart_evaluasi_akhir(tanggal) {
        $.ajax({
            url: '<?= base_url('admin/_evaluasi/akhir/getEvaluasiAkhir') ?>',
            type: 'GET',
            data: {
                id_event: id_event,
                tanggal: tanggal
            },
            dataType: 'json',
            success: function(json) {
                if (json.data.length != 0) {
                    evaluasi_akhir_data = json.data;
                    var evaluasi_akhir_category = []
                    var evaluasi_akhir_sangat_baik = []
                    var evaluasi_akhir_baik = []
                    var evaluasi_akhir_cukup = []
                    var evaluasi_akhir_kurang = []
                    var evaluasi_akhir_sangat_kurang = []

                    for (let i = 0; i < evaluasi_akhir_data.length; i++) {
                        evaluasi_akhir_category.push(evaluasi_akhir_data[i].category);
                        evaluasi_akhir_sangat_baik.push(evaluasi_akhir_data[i].sangat_baik);
                        evaluasi_akhir_baik.push(evaluasi_akhir_data[i].baik);
                        evaluasi_akhir_cukup.push(evaluasi_akhir_data[i].cukup);
                        evaluasi_akhir_kurang.push(evaluasi_akhir_data[i].kurang);
                        evaluasi_akhir_sangat_kurang.push(evaluasi_akhir_data[i].sangat_kurang);
                    }

                    option_chart_evaluasi_akhir = {
                        series: [{
                            name: 'Sangat Kurang',
                            data: evaluasi_akhir_sangat_baik
                        }, {
                            name: 'Kurang',
                            data: evaluasi_akhir_baik
                        }, {
                            name: 'Cukup',
                            data: evaluasi_akhir_cukup
                        }, {
                            name: 'Baik',
                            data: evaluasi_akhir_kurang
                        }, {
                            name: 'Sangat Baik',
                            data: evaluasi_akhir_sangat_kurang
                        }],
                        chart: {
                            type: 'bar',
                            height: 1030
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
                            categories: evaluasi_akhir_category,
                        },
                    };

                    if (chart_evaluasi_akhir) {
                        // Update chart with new data
                        chart_evaluasi_akhir.updateOptions(option_chart_evaluasi_akhir);
                    } else {
                        // Create new chart if it doesn't exist
                        chart_evaluasi_akhir = new ApexCharts(document.querySelector("#chart_evaluasi_akhir"), option_chart_evaluasi_akhir);
                        chart_evaluasi_akhir.render();
                    }


                }
            }
        });
    }
</script>