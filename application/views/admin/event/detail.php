    <div class="mb-3">
        <div class="d-flex justify-content-end mb-2">
            <a href="<?= base_url('admin/event/event') ?>" class=" btn btn-secondary me-1">Kembali</a>
            <a class="btn btn-primary me-1 collapsed" data-bs-toggle="collapse" href="#collapseDetail" role="button" aria-expanded="false" aria-controls="collapseDetail">
                Detail Event
            </a>
        </div>
        <div class="collapse" id="collapseDetail" style="">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Detail <?= @$event->nama ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap mt-2">
                            <table id="table" class="table table-hover">
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td>Nama Event</td>
                                        <td>:</td>
                                        <td><?= @$event->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Periode Pendaftaran</td>
                                        <td>:</td>
                                        <td><?= (@$event->tanggal_buka_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime(@$event->tanggal_buka_pendaftaran))) . ' s/d ' . (@$event->tanggal_tutup_pendaftaran == '0000-00-00' ? '' : date('d M Y', strtotime(@$event->tanggal_tutup_pendaftaran))) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Poster</td>
                                        <td>:</td>
                                        <td>
                                            <a href="<?= base_url('uploads/img/event/admin/' . @$event->foto) ?>" target="_blank"><span class="text-info"><?= @$event->foto ?></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>File Informasi</td>
                                        <td>:</td>
                                        <td>
                                            <a href="<?= base_url('uploads/file/event/admin/' . @$event->file_info) ?>" target="_blank" class="text-black"><span class="text-info"><?= @$event->file_info ?></span></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td><?= @$event->keterangan ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#peserta" aria-controls="peserta" aria-selected="true">
                            Peserta
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#trainer" aria-controls="trainer" aria-selected="fasle">
                            Trainer
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#materi" aria-controls="materi" aria-selected="fasle">
                            Materi
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#kegiatan" aria-controls="kegiatan" aria-selected="fasle">
                            Kegiatan
                        </button>
                    </li>
                    <!-- <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#tugas" aria-controls="tugas" aria-selected="fasle">
                        Tugas
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#data_unit" aria-controls="data_unit" aria-selected="fasle">
                        DATA PENDAFTARAN UNIT
                    </button>
                </li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="peserta" role="tabpanel">
                        <div class="d-flex justify-content-between">
                            <h5 class="my-auto">Peserta <?= @$event->nama ?></h5>
                        </div>
                        <div class="table-responsive text-nowrap mt-2">
                            <table id="table_event_member" class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th width="10%">Status Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>File Persyaratan</th>
                                        <th width="10%">Foto</th>
                                        <th>Catatan</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="trainer" role="tabpanel">
                        <div class="d-flex justify-content-between">
                            <h5 class="my-auto">Trainer <?= @$event->nama ?></h5>
                            <button type="button" class="btn btn-sm btn-success" onclick="open_form_add_trainer()">
                                Tambah data
                            </button>
                        </div>
                        <div class="table-responsive text-nowrap mt-2">
                            <table id="table_trainer" class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <!-- <th width="10%">Spesifikasi</th> -->
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="materi" role="tabpanel">
                        <div class="d-flex justify-content-between">
                            <h5 class="my-auto">Materi <?= @$event->nama ?></h5>
                        </div>
                        <div class="table-responsive text-nowrap mt-2">
                            <table id="datatables_table2" class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Catatan</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kegiatan" role="tabpanel">
                        <div class="d-flex justify-content-between">
                            <h5 class="my-auto">Kegiatan <?= @$event->nama ?></h5>
                            <button type="button" class="btn btn-sm btn-success" onclick="open_form_add_activity()">
                                Tambah data
                            </button>
                        </div>
                        <div class="table-responsive text-nowrap mt-2">
                            <table id="table_activity" class="table table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th width="10%">Actions</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="tab-pane fade" id="tugas" role="tabpanel">
                    <div class="d-flex justify-content-between">
                        <h5 class="my-auto">Tugas <?= @$event->nama ?></h5>
                    </div>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="datatables_table2" class="table table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Status Pendaftaran</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Catatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="data_unit" role="tabpanel">
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table" class="table table-hover">
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td width="20%">Nama Unit</td>
                                    <td width="2%">:</td>
                                    <td width="70%" id="unit_nama"></td>
                                </tr>
                                <tr>
                                    <td>Status Pendaftaran</td>
                                    <td>:</td>
                                    <td id="is_approve"></td>
                                </tr>
                                <tr>
                                    <td>Kordinator</td>
                                    <td>:</td>
                                    <td id="kordinator_nama"></td>
                                </tr>
                                <tr>
                                    <td>kontak</td>
                                    <td>:</td>
                                    <td id="kontak"></td>
                                </tr>
                                <tr>
                                    <td>Jenis Unit</td>
                                    <td>:</td>
                                    <td id="unit_jenis"></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pendaftaran</td>
                                    <td>:</td>
                                    <td id="created_on"></td>
                                </tr>
                                <tr>
                                    <td>File Surat Tugas</td>
                                    <td>:</td>
                                    <td id="file_surat_tugas"></td>
                                </tr>
                                <tr>
                                    <td>Print ID Card</td>
                                    <td>:</td>
                                    <td id="cetak_id_card"></td>
                                </tr>
                                <tr>
                                    <td>Catatan</td>
                                    <td>:</td>
                                    <td>
                                        <div class="input-group input-group-merge mb-2">
                                            <input type="text" name="keterangan" id="event_unit_keterangan" value="" class="form-control">
                                        </div>
                                        <input type="hidden" id="id_event_unit" value="" class="form-control">
                                        <button type="submit" id="btn_save_catatan" onclick="update_catatan_unit()" class="btn btn-sm btn-primary disabled">Simpan Catatan</button>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
                </div>
            </div>
        </div>

    </div>

    <div class="nav-align-top mb-4">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#tugas" aria-controls="tugas" aria-selected="true">
                    Tugas
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#presensi" aria-controls="presensi" aria-selected="fasle">
                    Presensi
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#bio_data" aria-controls="bio_data" aria-selected="fasle">
                    Bio Data
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tugas" role="tabpanel">
                <div class="d-flex justify-content-between">
                    <h5 class="my-auto">Tugas <?= @$event->nama ?></h5>
                </div>
                <div class="table-responsive text-nowrap mt-2">
                    <table id="datatables_table1" class="table table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status Pendaftaran</th>
                                <th>Nama</th>
                                <th>File Persyaratan</th>
                                <th>Foto</th>
                                <th>Catatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="presensi" role="tabpanel">
                <div class="d-flex justify-content-between">
                    <h5 class="my-auto">Presensi <?= @$event->nama ?></h5>
                </div>
                <div class="table-responsive text-nowrap mt-2">
                    <table id="datatables_table2" class="table table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Status Pendaftaran</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Catatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bio_data" role="tabpanel">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="table" class="table table-hover">
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td width="20%">Nama Unit</td>
                                <td width="2%">:</td>
                                <td width="70%" id="unit_nama"></td>
                            </tr>
                            <tr>
                                <td>Status Pendaftaran</td>
                                <td>:</td>
                                <td id="is_approve"></td>
                            </tr>
                            <tr>
                                <td>Kordinator</td>
                                <td>:</td>
                                <td id="kordinator_nama"></td>
                            </tr>
                            <tr>
                                <td>kontak</td>
                                <td>:</td>
                                <td id="kontak"></td>
                            </tr>
                            <tr>
                                <td>Jenis Unit</td>
                                <td>:</td>
                                <td id="unit_jenis"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pendaftaran</td>
                                <td>:</td>
                                <td id="created_on"></td>
                            </tr>
                            <tr>
                                <td>File Surat Tugas</td>
                                <td>:</td>
                                <td id="file_surat_tugas"></td>
                            </tr>
                            <tr>
                                <td>Print ID Card</td>
                                <td>:</td>
                                <td id="cetak_id_card"></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td>
                                    <div class="input-group input-group-merge mb-2">
                                        <input type="text" name="keterangan" id="event_unit_keterangan" value="" class="form-control">
                                    </div>
                                    <input type="hidden" id="id_event_unit" value="" class="form-control">
                                    <button type="submit" id="btn_save_catatan" onclick="update_catatan_unit()" class="btn btn-sm btn-primary disabled">Simpan Catatan</button>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN Modal Edit Catatan Member -->
    <div class="modal fade" id="form_edit_member" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_edit_memberTitle">Form Peserta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- <form action=""> -->
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id_event_member" name="id_event_member" value="">
                        <div class="mb-3">
                            <label for="event_member_keterangan" class="form-label">Catatan</label>
                            <div class="input-group input-group-merge">
                                <input type="text" name="event_member_keterangan" id="event_member_keterangan" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="button" onclick="action_update_catatan_member()" class="btn btn-primary">Simpan</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <!-- END Modal Edit Catatan Member -->

    <!-- BEGIN Modal Event Trainer -->
    <div class="modal fade" id="form_add_trainer" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Trainer <span class="text-danger">*</span></label>
                        <select name="id_trainer" id="id_trainer" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="action_form_add_trainer()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Event Trainer -->

    <!-- BEGIN Modal Event Activity -->
    <div class="modal fade" id="form_add_activity" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Kegiatan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary" onclick="action_form_add_activity()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Event Activity -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script type="text/javascript">
        var id_event = <?= @$event->id ?>;
        $(document).ready(function() {
            // BEGIN Event Trainer
            table_event_member = $('#table_event_member').DataTable({
                responsive: true,
                ajax: '<?= base_url('admin/_event/event_member_t/getEventMember?id_event=') ?>' + id_event,
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'is_approve',
                        render: function(data, type, row) {
                            var id = row.id;
                            var bg = '';
                            var is_approve = '';

                            if (data == 1) {
                                bg = 'success';
                                is_approve = 'Disetujui';
                            } else if (data == 0) {
                                bg = 'warning';
                                is_approve = 'Diperiksa';
                            } else {
                                bg = 'danger';
                                is_approve = 'Ditolak';
                            }

                            if (data != '') {
                                return `<div class='btn-group'>
                                        <button type='button' class='btn btn-sm btn-` + bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>
                                            ` + is_approve + `
                                        </button>
                                        <ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_member(` + id + `,1)'>Disetujui</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_member(` + id + `,0)'>Diperiksa</a></li>
                                            <li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_status_member(` + id + `,2)'>Ditolak</a></li>
                                        </ul>
                                    </div>`;
                            } else {
                                return '';
                            }
                        }
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'file',
                        render: function(data, type, row) {
                            return '<a href="<?= base_url('uploads/file/member/') ?>' + data + '" target="_blank" class="text-black"><span class="text-info">' + data + '</span></a>'
                        }
                    },
                    {
                        data: 'foto',
                        render: function(data, type, row) {
                            return `
                                <a href="<?= base_url('uploads/img/member/') ?>` + data + `" target="_blank">
                                    <img src="<?= base_url('uploads/img/member/') ?>` + data + `" height="100px" alt="">
                                </a>
                            `
                        }
                    },
                    {
                        data: 'keterangan'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<span>' +
                                '<a href="<?= base_url('admin/event/cetak/id_card_event_member/') ?>' + data + '" target="_blank" class="text-success"><i class="bx bxs-download me-2 "></i></a>' +
                                '<a href="#" onClick="open_form_edit_member(' + data + ')" class="text-info"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '</span>'

                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }]
            });
            // END Event Trainer

            // BEGIN Event Trainer
            table_trainer = $('#table_trainer').DataTable({
                responsive: true,
                ajax: '<?= base_url('admin/_event/event_trainer_t/getEventTrainer?id_event=') ?>' + id_event,
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'foto',
                        render: function(data, type, row) {
                            return `
                                <a href="<?= base_url('uploads/img/trainer/') ?>` + data + `" target="_blank">
                                    <img src="<?= base_url('uploads/img/trainer/') ?>` + data + `" height="100px" alt="">
                                </a>
                            `
                        }
                    },
                    // {
                    //     data: 'specialization'
                    // },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<span>' +
                                '<a href="<?= base_url('admin/event/cetak/id_card_event_pendamping/') ?>' + data + '" target="_blank" class="text-success"><i class="bx bxs-download me-2 "></i></a>' +
                                '<a class="text-danger" href="#" onclick="return action_delete_trainer(' + row.id_trainer + ', ' + row.id_event + ')"><i class="bx bx-trash me-1"></i></a>' +
                                '</span>'

                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }]
            });
            // END Event Trainer

            // BEGIN Event Activity
            table_activity = $('#table_activity').DataTable({
                responsive: true,
                ajax: '<?= base_url('admin/_event/event_activity_t/getActivity?id_event=') ?>' + id_event,
                columns: [{
                        data: 'id',
                        visible: false
                    },
                    {
                        data: 'nama'
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return '<span>' +
                                '<a href="<?= base_url('admin/event/cetak/id_card_event_pendamping/') ?>' + data + '" target="_blank" class="text-success"><i class="bx bxs-download me-2 "></i></a>' +
                                '<a class="text-danger" href="#" onclick="return action_delete_activity(' + data + ', ' + row.id_event + ')"><i class="bx bx-trash me-1"></i></a>' +
                                '</span>'

                        }
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }]
            });
            // END Event Activity

        });

        // BEGIN Event Member
        function open_form_edit_member(id_event_member, keterangan) {
            $("#form_edit_member").modal('show');
            $("#form_edit_member #id_event_member").val(id_event_member);

            $.ajax({
                url: '<?= base_url('admin/_event/event_member_t/getKeterangan?id_member=') ?>' + id_event_member,
                type: 'POST',
                dataType: 'json',
                success: function(json) {
                    if (json != undefined) {
                        var keterangan = json.data.keterangan;
                        $("#form_edit_member #event_member_keterangan").val(keterangan);
                    }
                    Swal.close()
                }
            });
        }

        function action_update_catatan_member() {
            let id_event_member = $('#id_event_member').val();
            let event_member_keterangan = $('#event_member_keterangan').val();

            Loading.fire({})
            $.ajax({
                url: '<?= base_url('admin/_event/event_member_t/update_catatan') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_event_member: id_event_member,
                    event_member_keterangan: event_member_keterangan
                },
                success: function(json) {
                    table_event_member.ajax.reload(function() {
                        Swal.close();
                        Toast.fire({
                            icon: json.status,
                            title: json.message
                        });
                    });

                    $("#form_edit_member").modal('hide');

                    event_member_keterangan = '';
                    id_event_member = '';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                }
            });

            // $("#modalForm")[0].reset();
        }

        function action_update_status_member(id, is_approve) {
            Loading.fire({})
            $.ajax({
                url: '<?= base_url('admin/_event/event_member_t/update_status_member') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    is_approve: is_approve
                },
                success: function(json) {
                    table_event_member.ajax.reload(function() {
                        Swal.close();
                        Toast.fire({
                            icon: json.status,
                            title: json.message
                        });
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                    table_event_member.ajax.reload();
                }
            });
        }
        // END Event Member

        // BEGIN Event Trainer
        function open_form_add_trainer() {
            $("#form_add_trainer").modal('show');
            Loading.fire({})
            $.ajax({
                url: '<?= base_url('admin/_event/event_trainer_t/getOptEventTrainer?id_event=') ?>' + id_event,
                type: 'POST',
                dataType: 'json',
                success: function(json) {
                    if (json != undefined) {
                        var newOptions = json.data;
                        var select_trainer = $("#form_add_trainer #id_trainer");
                        select_trainer.empty(); // remove old options
                        $.each(newOptions, function(key, val) {
                            select_trainer.append($("<option></option>")
                                .attr("value", val['id_trainer']).text(val['trainer_nama']));
                        });
                    }
                    Swal.close()
                }
            });

        }

        function action_form_add_trainer() {
            let id_trainer = $('#form_add_trainer #id_trainer').val();

            Loading.fire({})
            $.ajax({
                url: '<?= base_url('admin/_event/event_trainer_t/save_event_trainer') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_trainer: id_trainer,
                    id_event: id_event
                },
                success: function(json) {
                    table_trainer.ajax.reload(function() {
                        Swal.close();
                        Toast.fire({
                            icon: json.status,
                            title: json.message
                        });
                    });

                    $("#form_add_trainer").modal('hide');

                    id_trainer = '';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                }
            });
        }

        function action_delete_trainer(id_trainer, id_event) {
            Swal.fire({
                title: "Anda yakin?",
                text: "Data akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('admin/_event/event_trainer_t/delete') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id_trainer: id_trainer,
                            id_event: id_event
                        },
                        success: function(json) {
                            table_trainer.ajax.reload(function() {
                                Swal.close();
                                Toast.fire({
                                    icon: json.status,
                                    title: json.message
                                });
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', status, error);
                        }
                    });
                }
            });
        }
        // END Event Trainer

        // BEGIN Event Activity
        function open_form_add_activity() {
            $("#form_add_activity").modal('show');
            $('#form_add_activity #nama').val('');
        }

        function action_form_add_activity() {
            let nama = $('#form_add_activity #nama').val();

            Loading.fire({})
            $.ajax({
                url: '<?= base_url('admin/_event/event_activity_t/save_event_activity') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    nama: nama,
                    id_event: id_event
                },
                success: function(json) {
                    table_activity.ajax.reload(function() {
                        Swal.close();
                        Toast.fire({
                            icon: json.status,
                            title: json.message
                        });
                    });

                    $("#form_add_activity").modal('hide');

                    nama = '';
                },
                error: function(xhr, status, error) {
                    console.error('Error:', status, error);
                }
            });
        }

        function action_delete_activity(id_activity, id_event) {
            Swal.fire({
                title: "Anda yakin?",
                text: "Data akan dihapus!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('admin/_event/event_activity_t/delete') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id_activity: id_activity,
                            id_event: id_event
                        },
                        success: function(json) {
                            table_activity.ajax.reload(function() {
                                Swal.close();
                                Toast.fire({
                                    icon: json.status,
                                    title: json.message
                                });
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', status, error);
                        }
                    });
                }
            });
        }
        // END Event Activity
    </script>