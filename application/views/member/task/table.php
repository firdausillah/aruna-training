<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('member/task?page=add') ?>" class="btn btn-sm btn-success my-auto">Kumpulkan Tugas</a>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_task" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Aktivitas/Materi</th>
                    <th>Nama Tugas</th>
                    <th>Link Tugas</th>
                    <th>Detail Tugas</th>
                    <th>Waktu Pengumpulan</th>
                    <th>Nilai</th>
                    <th>Catatan</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function() {
        table_task = $('#table_task').DataTable({
            responsive: true,
            ajax: '<?= base_url('member/task/getTask') ?>',
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'activity_nama'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'task_link',
                    render: function(data, type, row) {
                        return `<a href="` + row.task_link + `" class="btn btn-success rounded-pill btn-sm" target='_blank'>
                                        Lihat Tugas
                                    </a>`;
                    }
                },
                {
                    data: 'task_detail'
                },
                {
                    data: 'created_on',
                    render: function(data, rype, row){
                        return `<span class="badge rounded-pill bg-secondary">`+data+`</span>`
                    }
                },
                {
                    data: 'nilai'
                },
                {
                    data: 'keterangan'
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<td>` +
                            `<a class="text-danger" href="#" onclick="confirmDelete('<?= base_url('member/task/delete/') ?>` + data + `')"><i class=" bx bx-trash me-1 "></i></a>` +
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