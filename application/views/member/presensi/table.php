<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('member/presensi?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_presensi" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aktivitas</th>
                    <th>Foto</th>
                    <th>Jam Presensi</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        table_presensi = $('#table_presensi').DataTable({
            responsive: true,
            ajax: '<?= base_url('member/presensi/getPresensi') ?>',
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'activity_nama'
                },
                {
                    data: 'foto',
                    render: function(data, type, row) {
                        return '<img src="<?= base_url('uploads/img/presensi/') ?>' + data + '" height="100px" alt=""><img src="' + data + '" alt="">'
                    }
                },
                {
                    data: 'created_on'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<td>` +
                            `<a class="text-info" href="<?= base_url('member/presensi?page=edit&id=') ?>` + data + `"><i class="bx bx-edit-alt me-1"></i></a>` +
                            `<a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('member/presensi/delete/') ?>` + data + `')"><i class=" bx bx-trash me-1 "></i></a>` +
                            `</td>`
                    }
                }
            ],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }]
        });
    })
</script>