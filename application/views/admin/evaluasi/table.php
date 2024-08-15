<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="table-responsive text-nowrap mt-2">
        <table id="table_event" class="table table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Event</th>
                    <th>Pelaksanaan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // BEGIN Event Trainer
        table_event = $('#table_event').DataTable({
            responsive: true,
            ajax: '<?= base_url('admin/evaluasi/getEvents') ?>',
            columns: [{
                data: 'id',
                visible: false
            }, {
                data: 'nama',
                render: function(data, type, row) {
                    return `<a href="<?= base_url('admin/evaluasi?page=detail&id_event=') ?>` + row.id + `" class="text-black">` + data + `</a>`;
                }
            }, {
                data: 'pelaksanaan_tempat',
                render: function(data, type, row) {
                    return data + ', ' + row.pelaksanaan_tanggal
                }
            }, {
                data: 'token'
            }, {
                data: 'id',
                render: function(data, type, row) {
                    return `<a class="text-success" href="<?= base_url('admin/evaluasi?page=detail&id_event=') ?>`+data+`"><i class="bx bx-detail me-1"></i></a>`
                }
            }],
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            rowCallback: function(row, data) {
                $(row).attr('data-id_event', data.id);
            }
        });
        // END Event Trainer
    });
</script>