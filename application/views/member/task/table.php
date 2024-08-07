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

<!-- BEGIN Modal Detail Task -->
<div class="modal fade" id="modal_detail_task" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_detail_taskTitle">Detail Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td><strong>Aktivitas/Materi</strong></td>
                                <td id="activity_nama"></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Tugas</strong></td>
                                <td id="nama"></td>
                            </tr>
                            <tr>
                                <td><strong>Link Tugas</strong></td>
                                <td>
                                    <a href="#" id="task_link" target='_blank'> Lihat Tugas </a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Detail Tugas</strong></td>
                                <td id="task_detail"></td>
                            </tr>
                            <tr>
                                <td><strong>Waktu Pengumpulan</strong></td>
                                <td id="created_on"></td>
                            </tr>
                            <tr>
                                <td><strong>Nilai</strong></td>
                                <td id="nilai"></td>
                            </tr>
                            <tr>
                                <td><strong>Catatan</strong></td>
                                <td id="keterangan"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>
<!-- END Modal Detail Task -->

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
                    data: 'task_detail',
                    visible: false
                },
                {
                    data: 'created_on',
                    render: function(data, type, row) {
                        return ` <span class = "badge rounded-pill bg-secondary" > ` + data + ` </span>`
                    }
                },
                {
                    data: 'nilai'
                },
                {
                    data: 'keterangan',
                    render: function(data, type, row) {
                        if (data != '') {
                            return `<span class="text-warning">Ada catatan</span>`
                        }else{
                            return `<span class="text-success">Tidak ada catatan</span>`
                        }
                    }
                },
                {
                    data: 'id',
                    render: function(data, type, row) {
                        return `<td>` +
                            '<a href="#" onClick="open_modal_detail_task(' + data + ')" class="text-success"><i class="bx bx-detail me-1"></i></a>' +
                            // '<a href="#" onClick="open_form_edit_task(' + data + ')" class="text-info"><i class="bx bx-edit-alt me-1"></i></a>' +
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

    function open_modal_detail_task(id_task) {
        $("#modal_detail_task").modal('show');
        $("#modal_detail_task #id_task").val(id_task);

        $.ajax({
            url: '<?= base_url('member/task/getTaskRow?id_task=') ?>' + id_task,
            type: 'POST',
            dataType: 'json',
            success: function(json) {
                if (json != undefined) {
                    console.log(json)
                    $("#modal_detail_task #activity_nama").html(json.data.activity_nama);
                    $("#modal_detail_task #nama").html(json.data.nama);
                    $("#modal_detail_task #task_link").attr("href", json.data.task_link);
                    $("#modal_detail_task #task_link").html(json.data.task_link);
                    $("#modal_detail_task #task_detail").html(json.data.task_detail);
                    $("#modal_detail_task #created_on").html(json.data.created_on);
                    $("#modal_detail_task #nilai").html(json.data.nilai);
                    $("#modal_detail_task #keterangan").html(json.data.keterangan);
                }
                Swal.close()
            }
        });
    }
</script>