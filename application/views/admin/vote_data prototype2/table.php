<div class="card p-3 mb-4">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <span>
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#form_vote_data_h">
                Tambah data
            </button>
        </span>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_vote_data_h" class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nama event</th>
                    <th>tanggal dibuka</th>
                    <th>tanggal ditutup</th>
                    <th>total pemilih</th>
                    <th>maksimal pemilih</th>
                    <th>Keterangan</th>
                    <th>Actions</th>
                </tr>
            </thead>

        </table>
    </div>
</div>

<div class="modal fade" id="form_vote_data_h" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?= form_open_multipart(base_url('admin/vote_data/vote_data_h/save')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Event <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="start_date">tanggal dibuka <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="end_date">tanggal ditutup <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="max_voters">jumlah pemilih maksimal <span class="text-danger">*</span></label>
                    <input type="number" name="max_voters" id="max_voters" value="" class="form-control" placeholder="jumlah pemilih maksimal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" value="" class="form-control" placeholder="keterangan">
                </div>
                <!-- <a href="<?= base_url() ?>admin/vote_data/vote_data_h" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button> -->
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

        table_vote_data_h = $('#table_vote_data_h').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/vote_data/vote_data_h/getData') ?>',
            select: true,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama',
                    render: function(data, type, row) {
                        return '<a href="<?= base_url() ?>admin/vote_data/vote_data_h?page=detail&id=' + row.id + '">' + data + '</a>'
                    }
                },
                {
                    data: 'start_date'
                },
                {
                    data: 'end_date'
                },
                {
                    data: 'max_voters'
                },
                {
                    data: 'max_voters'
                },
                {
                    data: 'keterangan'
                },
                {
                    data: "id",
                    render: function(data, type, row) {
                        if (data != '') {
                            return '<a class="text-success" href="<?= base_url() ?>admin/vote_data/vote_data_h?page=detail&id=' + data + '"><i class="bx bx-detail me-1"></i></a>' +
                                '<a class="text-info" href="#" onclick="edit_vote_data_h(' + data + ')"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="return confirmDelete(\'<?= base_url('admin/vote_data/vote_data_h/delete/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i></a>';
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
                $(row).attr('data-id_vote_data_h', data.id);
            }
        });

        $("#form_vote_data_h").on('hide.bs.modal', function() {
            $('#form_vote_data_h input').val('');
        });

    });

    function edit_vote_data_h(id) {
        $.ajax({
            url: '<?= base_url('admin/vote_data/vote_data_h/getDataBy') ?>',
            type: 'GET',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(json) {
                console.log();
                if (json != undefined) {
                    $('#form_vote_data_h').modal('show');


                    $('#id').val(json.data.id)
                    $('#nama').val(json.data.nama)
                    $('#start_date').val(json.data.start_date)
                    $('#end_date').val(json.data.end_date)
                    $('#max_voters').val(json.data.max_voters)
                    $('#keterangan').val(json.data.keterangan)
                }
            }
        });
    }
</script>