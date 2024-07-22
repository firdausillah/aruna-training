<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <h5 class="my-auto">Detail <?= $title ? $title : '' ?></h5>
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
                            <th>Keterangan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                </table>
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
                                <td>: <?= @$vote_data_h->max_voters ?></td>
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
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
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
                    <small class="text-primary">gunakan foto dengan background merah</small>
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
                    data: 'keterangan'
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        if (data != '') {
                            return '<a class="text-success" href="<?= base_url() ?>admin/vote_data/vote_data_d?page=detail&id=' + data + '"><i class="bx bx-detail me-1"></i></a>' +
                                '<a class="text-info" href="#" onclick="edit_vote_data_d(' + data + ')"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="return confirmDelete(\'<?= base_url('admin/vote_data/vote_data_d/delete/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i></a>';
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


                    $('#id').val(json.data.id)
                    $('#id_vote_data_h').val(json.data.id_vote_data_h)
                    $('#nama').val(json.data.nama)
                    $('#keterangan').val(json.data.keterangan)
                    $('#gambar').val(json.data.foto);
                    $('#file_name').val(json.data.file);
                    $('#img_placeholder').attr('src', img_base_url + json.data.foto);
                    $('#file_placeholder').attr('href', file_base_url + json.data.file);
                }
            }
        });
    }
</script>