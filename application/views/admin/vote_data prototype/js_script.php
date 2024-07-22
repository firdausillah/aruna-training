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
                    data: 'nama'
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
                            return '<a class="text-info" href="#" onclick="edit_vote_data_h('+data+')"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="confirmDelete(\'<?= base_url('admin/vote_data/vote_data_h/delete/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i></a>';
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

        $('#table_vote_data_h').on('click', 'tbody tr', function(event) {
            if ($(this).hasClass('table-active')) {
                $(this).removeClass('table-active');

                ambil_data('null');
                table_vote_data_d.ajax.reload(null, false);
            } else {
                $('#table_vote_data_h tbody tr').removeClass('table-active');
                $(this).addClass('table-active');
                id_vote_data_h = $(this).attr('data-id_vote_data_h');

                ambil_data(id_vote_data_h);
                table_vote_data_d.ajax.reload(null, false);

            }


        });

        table_vote_data_d = $('#table_vote_data_d').DataTable({
            responsive: true,
            // ajax: '<?= base_url('admin/vote_data/vote_data_d/getData/') ?>' + id_vote_data_h,
            columns: [{
                    data: 'id',
                    visible: false
                },
                {
                    data: 'nama'
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
                            return '<a class="text-info" href="<?= base_url() ?>admin/vote_data/vote_data_h?page=edit&id=' + data + '"><i class="bx bx-edit-alt me-1"></i></a>' +
                                '<a class="text-danger" href="#" onclick="confirmDelete(\'<?= base_url('admin/vote_data/vote_data_h/delete/') ?>' + data + '\')"><i class="bx bx-trash me-1"></i></a>';
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

        function ambil_data(id_vote_data_h) {
            Loading.fire({})

            // ambil data peserta
            table_vote_data_d.ajax.url('<?= base_url('admin/vote_data/vote_data_d/getData/') ?>' + id_vote_data_h).load(function() {
                Swal.close()
            });
            return false;
        }

        function edit_vote_data_h(data){

            console.log(data);
        }

        $("#form_vote_data_h").on('hide.bs.modal', function() {
            $('#form_vote_data_h input').val('');
        });
    });
</script>