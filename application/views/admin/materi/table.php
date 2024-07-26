<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
        <a href="<?= base_url('admin/materi?page=add') ?>" class="btn btn-sm btn-success my-auto">Tambah data</a>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_materi" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Materi</th>
                    <th>File</th>
                    <th>Akses Peserta</th>
                    <th>Actions</th>
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
                ajax: '<?= base_url('admin/materi/getMateri') ?>',
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
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return `<td>` +
                                        `<div class='btn-group'>` +
                                            `<button type='button' class='btn btn-sm btn-` + row.bg + ` dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='true'>` +
                                            row.akses +
                                            `</button>` +
                                            `<ul class='dropdown-menu' style='position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 39.5px, 0px);' data-popper-placement='bottom-start'>` +
                                                `<li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_akses_materi(` + data + `,1)'>Buka</a></li>` +
                                                `<li><a class='dropdown-item' href='javascript:void(0);' onClick='action_update_akses_materi(` + data + `,0)'>Tutup</a></li>` +
                                            `</ul>` +
                                        `</div>` +
                                    `</td>`

                        }
                    },
                    {
                        data: 'id',
                        render: function(data, type, row) {
                            return `<td>` +
                                        `<a class="text-info" href="<?= base_url('admin/materi?page=edit&id=') ?>` + data + `"><i class="bx bx-edit-alt me-1"></i></a>` +
                                        `<a class="text-danger" href="#" onclick="confirmDelete(<?= base_url('admin/materi/delete/') ?>`+ data +`')"><i class=" bx bx-trash me-1 "></i></a>` +
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

    function action_update_akses_materi(id, is_approve) {
        Loading.fire({})
        $.ajax({
            url: '<?= base_url('admin/materi/update_akses_materi') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: id,
                is_approve: is_approve
            },
            success: function(json) {
                table_materi.ajax.reload(function() {
                    Swal.close();
                    Toast.fire({
                        icon: json.status,
                        title: json.message
                    });
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', status, error);
                table_materi.ajax.reload();
            }
        });
    }
</script>