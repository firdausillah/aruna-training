<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('member/materi?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_materi" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul materi</th>
                    <th>File</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        table_materi = $('#table_materi').DataTable({
            responsive: true,
            ajax: '<?= base_url('member/materi/getMateri') ?>',
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama'
                },
                {
                    data: 'file',
                    render: function(data, type, row) {
                        return '<a href="<?= base_url('uploads/file/materi/') ?>' + data + '" target="_blank" class="text-black"><span class="text-info">' + data + '</span></a>'
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