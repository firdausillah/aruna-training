<div class="card p-3">
    <div class="d-flex justify-content-between">
        <h5 class="my-auto"><?= $title ? $title : '' ?></h5>
    </div>

    <div class="card-body">
        <form action="<?= base_url('member/assesment/save') ?>" method="POST" id="assesment_form">

            <div class="mb-3">
                <label for="date" class="fs-5 fs-md-6 fw-medium">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control">
            </div>
            <?php foreach ($activities as $key => $value) : ?>
                <div class="mb-3 row">
                    <label class="fw-medium fs-5 fs-md-6"><?= $value->nama ?></label>
                    <input type="hidden" name="id_activity<?= $key ?>" value="<?= $value->id ?>">
                    <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="point<?= $key ?>" id="point1<?= $key ?>" value="1">
                            <label class="form-check-label" for="point1<?= $key ?>">Sangat Kurang</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="point<?= $key ?>" id="point2<?= $key ?>" value="2">
                            <label class="form-check-label" for="point2<?= $key ?>">Kurang</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="point<?= $key ?>" id="point3<?= $key ?>" value="3">
                            <label class="form-check-label" for="point3<?= $key ?>">Cukup</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="point<?= $key ?>" id="point4<?= $key ?>" value="4">
                            <label class="form-check-label" for="point4<?= $key ?>">Baik</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="point<?= $key ?>" id="point5<?= $key ?>" value="5">
                            <label class="form-check-label" for="point5<?= $key ?>">Sangat Baik</label>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="button" class="btn btn-primary" onClick="action_submit()">Simpan</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    function action_submit(id_activity, id_event) {
        Swal.fire({
            title: "Apakah anda sudah yakin dengan jawaban anda?",
            text: "Pastikan data sudah terisi semua. Data akan dikirim sebagai pertimbangan penyampaian materi oleh pemateri",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yakin!"
        }).then((result) => {
            if (result.isConfirmed) {
                $('#assesment_form').submit();
            }
        });
    }
</script>