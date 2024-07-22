<div class="row">
    <div class="col-md-8 mb-4">

        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-daftar-calon" aria-controls="navs-daftar-calon" aria-selected="false">
                        Daftar Calon
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-daftar-pemilih" aria-controls="navs-daftar-pemilih" aria-selected="false">
                        Daftar Pemilih
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="navs-daftar-calon" role="tabpanel">
                    <div class="d-flex justify-content-end">
                        <!-- <h5 class="my-auto">Detail <?= $title ? $title : '' ?></h5> -->
                        <span>
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#form_vote_data_d">
                                Tambah data
                            </button>
                        </span>
                    </div>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_vote_data_d" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>foto</th>
                                    <th>file</th>
                                    <th>Jumlah Pemilih</th>
                                    <th>Keterangan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-daftar-pemilih" role="tabpanel">
                    <div class="d-flex justify-content-end">
                        <!-- <h5 class="my-auto">Detail <?= $title ? $title : '' ?></h5> -->
                        <span>
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#form_vote_data_d_voters_import">
                                Reset
                            </button>
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#form_vote_data_d_voters_import">
                                Import
                            </button>
                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#form_vote_data_d_voters">
                                Tambah
                            </button>
                        </span>
                    </div>
                    <div class="table-responsive text-nowrap mt-2">
                        <table id="table_vote_data_d_voters" class="table table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>nama</th>
                                    <th>nomor identitas</th>
                                    <th>suara terpakai</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
            </div>
            <div class="card-body">
                <div class="table-responsive text-nowrap mt-2">
                    <table id="table" class="table table-hover">
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>Nama Event</td>
                                <td>: <?= @$vote_data_h->nama ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Dibuka</td>
                                <td>: <?= @$vote_data_h->start_date ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Ditutup</td>
                                <td>: <?= @$vote_data_h->end_date ?></td>
                            </tr>
                            <tr>
                                <td>Total Pemilih</td>
                                <td>: <?= @$total_vote_voters->counter ?></td>
                            </tr>
                            <tr>
                                <td>Maksimal Pemilih</td>
                                <td>: <?= @$vote_data_h->max_voters ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>: <?= @$vote_data_h->keterangan ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="<?= base_url('admin/vote_data/vote_data_h') ?>" class=" btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="form_vote_data_d" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?= form_open_multipart(base_url('admin/vote_data/vote_data_d/save')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Form Daftar Calon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="id_vote_data_h" id="id_vote_data_h" value="<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="keterangan">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="foto">Foto</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="" id="gambar" name="gambar">
                </div>
                <div class="mb-3">
                    <img src="#" id="img_placeholder" height="100px" alt="">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="file">File</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="" id="file_name" name="file_name">
                </div>
                <div class="mb-3">
                    <a href="#" id="file_placeholder" target="_blank">File</a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="form_vote_data_d_voters_import" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?= form_open_multipart(base_url('admin/vote_data/vote_data_d_voters/importExcel')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Form Daftar Pemilih</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_vote_data_h" id="id_vote_data_h" value="<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label class="form-label" for="excel">File Excel <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="excel" id="excel" value="" required>
                    <small>download template excel : <a class="text-success" href="<?= base_url('admin/vote_data/vote_data_d_voters/exportExcel/' . $_GET['id']) ?>">Download</a> </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="form_vote_data_d_voters" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?= form_open_multipart(base_url('admin/vote_data/vote_data_d_voters/save')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Form Daftar Pemilih</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="id_vote_data_h" id="id_vote_data_h" value="<?= $_GET['id'] ?>">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="identity_number">Nomor Identitas <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="identity_number" id="identity_number" value="" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
    $(document).ready(function() {
        let id_vote_data_h = 0;

        table_vote_data_d = $('#table_vote_data_d').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/vote_data/vote_data_d/getData/' . $_GET['id']) ?>',
            select: true,
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
                        return '<a href="<?= base_url() ?>uploads/img/vote_data_d/' + data + '" target="_blank"><img src="<?= base_url() ?>uploads/img/vote_data_d/' + data + '" height="100px"></a>';
                    }
                },
                {
                    data: 'file',
                    render: function(data, type, row) {
                        return '<a href="<?= base_url() ?>uploads/file/vote_data_d/' + data + '" target="_blank">file</a>';
                    }
                },
                {
                    data: 'counter'
                },
                {
                    data: 'keterangan'
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        if (data != '') {
                            return '<a class="text-info" href="#" onclick="edit_vote_data_d(' + data + ')"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="return confirmDelete(\'<?= base_url('admin/vote_data/vote_data_d/delete/') ?>' + data + '/' + row.id_vote_data_h + '\')"><i class="bx bx-trash me-1"></i></a>';
                        } else {
                            return '';
                        }
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            rowCallback: function(row, data) {
                $(row).attr('data-id_vote_data_d', data.id);
            }
        });

        $("#form_vote_data_d").on('hide.bs.modal', function() {
            $('#form_vote_data_d input').val('');
            $('#img_placeholder').attr('src', '');
            $('#file_placeholder').html('');
            $('#file_placeholder').attr('href', '');
        });

        table_vote_data_d_voters = $('#table_vote_data_d_voters').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/vote_data/vote_data_d_voters/getData/' . $_GET['id']) ?>',
            select: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'identity_number'
                },
                {
                    data: 'counter',
                    render: function(data, type, row) {
                        if (data == 1) {
                            return `
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-check"></i>
                                        </button>
                                        <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item" href="javascript:void(0);" onclick="canceledVoteBtn(` + row.id_vote_data_t + `)">Batalkan</a></li>
                                        </ul>
                                    </div>
                                    `;
                        } else {
                            return `
                                <button type="button" class="btn btn-secondary btn-sm">
                                    <i class="bx bx-minus"></i>
                                </button>
                            `;
                        }
                    }
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        if (data != '') {
                            return '<a class="text-info" href="#" onclick="edit_vote_data_d_voters(' + data + ')"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="return confirmDelete(\'<?= base_url('admin/vote_data/vote_data_d_voters/delete/') ?>' + data + '/' + row.id_vote_data_h + '\')"><i class="bx bx-trash me-1"></i></a>';
                        } else {
                            return '';
                        }
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            rowCallback: function(row, data) {
                $(row).attr('data-id_vote_data_d_voters', data.id);
            }
        });

        $("#form_vote_data_d_voters").on('hide.bs.modal', function() {
            $('#form_vote_data_d_voters input').val('');
        });

    });

    function edit_vote_data_d(id) {
        var file_base_url = '<?= base_url('uploads/file/vote_data_d/') ?>';
        var img_base_url = '<?= base_url('uploads/img/vote_data_d/') ?>';
        $.ajax({
            url: '<?= base_url('admin/vote_data/vote_data_d/getDataBy') ?>',
            type: 'GET',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(json) {
                console.log();
                if (json != undefined) {
                    $('#form_vote_data_d').modal('show');

                    console.log(json);


                    $('#form_vote_data_d #id').val(json.data.id)
                    $('#form_vote_data_d #id_vote_data_h').val(json.data.id_vote_data_h)
                    $('#form_vote_data_d #nama').val(json.data.nama)
                    $('#form_vote_data_d #keterangan').val(json.data.keterangan)
                    $('#form_vote_data_d #gambar').val(json.data.foto);
                    $('#form_vote_data_d #file_name').val(json.data.file);
                    $('#form_vote_data_d #img_placeholder').attr('src', img_base_url + json.data.foto);
                    $('#form_vote_data_d #file_placeholder').attr('href', file_base_url + json.data.file);
                }
            }
        });
    }

    function canceledVoteBtn(id_vote_data_t) {
        console.log(id_vote_data_t);
        $.ajax({
            url: '<?= base_url('admin/vote_data/vote_data_d/cancel_vote') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id_vote_data_t: id_vote_data_t
            },
            success: function(json) {
                Toast.fire({
                    icon: json.status,
                    title: json.message
                });

                table_vote_data_d_voters.ajax.reload(null, false);
                table_vote_data_d.ajax.reload(null, false);
            }
        });
    }
</script>