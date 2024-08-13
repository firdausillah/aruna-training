<div class="row">
    <div class="col-12">
        <h5 class="text-white"><?= $title ? $title : '' ?></h5>
        <div class="nav-align-top mb-4">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#evaluasi_harian" aria-controls="evaluasi_harian" aria-selected="true">
                        Evaluasi Harian
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#evaluasi_akhir" aria-controls="evaluasi_akhir" aria-selected="false">
                        Evaluasi Akhir
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="evaluasi_harian" role="tabpanel">
                    <p>
                        Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps
                        powder. Bear claw candy topping.
                    </p>
                    <p class="mb-0">
                        Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                        jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                        jujubes sweet.
                    </p>
                </div>
                <div class="tab-pane fade" id="evaluasi_akhir" role="tabpanel">
                    <form action="<?= base_url('member/_evaluasi/akhir/save_evaluasi_akhir') ?>" method="POST" id="form_evaluasi_akhir">
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Kesesuaian pelatihan dengan kebutuhan</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kesesuaian_pelatihan_dengan_kebutuhan" id="kesesuaian_pelatihan_dengan_kebutuhan1" value="1">
                                    <label class="form-check-label" for="kesesuaian_pelatihan_dengan_kebutuhan1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kesesuaian_pelatihan_dengan_kebutuhan" id="kesesuaian_pelatihan_dengan_kebutuhan2" value="2">
                                    <label class="form-check-label" for="kesesuaian_pelatihan_dengan_kebutuhan2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kesesuaian_pelatihan_dengan_kebutuhan" id="kesesuaian_pelatihan_dengan_kebutuhan3" value="3">
                                    <label class="form-check-label" for="kesesuaian_pelatihan_dengan_kebutuhan3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kesesuaian_pelatihan_dengan_kebutuhan" id="kesesuaian_pelatihan_dengan_kebutuhan4" value="4">
                                    <label class="form-check-label" for="kesesuaian_pelatihan_dengan_kebutuhan4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kesesuaian_pelatihan_dengan_kebutuhan" id="kesesuaian_pelatihan_dengan_kebutuhan5" value="5">
                                    <label class="form-check-label" for="kesesuaian_pelatihan_dengan_kebutuhan5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="kesesuaian_pelatihan_dengan_kebutuhanError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Narasumber & Fasilitator</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="narasumber_fasilitator" id="narasumber_fasilitator1" value="1">
                                    <label class="form-check-label" for="narasumber_fasilitator1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="narasumber_fasilitator" id="narasumber_fasilitator2" value="2">
                                    <label class="form-check-label" for="narasumber_fasilitator2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="narasumber_fasilitator" id="narasumber_fasilitator3" value="3">
                                    <label class="form-check-label" for="narasumber_fasilitator3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="narasumber_fasilitator" id="narasumber_fasilitator4" value="4">
                                    <label class="form-check-label" for="narasumber_fasilitator4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="narasumber_fasilitator" id="narasumber_fasilitator5" value="5">
                                    <label class="form-check-label" for="narasumber_fasilitator5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="narasumber_fasilitatorError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Materi pelatihan</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="materi_pelatihan" id="materi_pelatihan1" value="1">
                                    <label class="form-check-label" for="materi_pelatihan1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="materi_pelatihan" id="materi_pelatihan2" value="2">
                                    <label class="form-check-label" for="materi_pelatihan2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="materi_pelatihan" id="materi_pelatihan3" value="3">
                                    <label class="form-check-label" for="materi_pelatihan3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="materi_pelatihan" id="materi_pelatihan4" value="4">
                                    <label class="form-check-label" for="materi_pelatihan4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="materi_pelatihan" id="materi_pelatihan5" value="5">
                                    <label class="form-check-label" for="materi_pelatihan5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="materi_pelatihanError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Metode, bahan dan alat</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_bahan_alat" id="metode_bahan_alat1" value="1">
                                    <label class="form-check-label" for="metode_bahan_alat1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_bahan_alat" id="metode_bahan_alat2" value="2">
                                    <label class="form-check-label" for="metode_bahan_alat2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_bahan_alat" id="metode_bahan_alat3" value="3">
                                    <label class="form-check-label" for="metode_bahan_alat3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_bahan_alat" id="metode_bahan_alat4" value="4">
                                    <label class="form-check-label" for="metode_bahan_alat4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="metode_bahan_alat" id="metode_bahan_alat5" value="5">
                                    <label class="form-check-label" for="metode_bahan_alat5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="metode_bahan_alatError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Pengaturan waktu untuk berbagai keperluan</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengaturan_waktu" id="pengaturan_waktu1" value="1">
                                    <label class="form-check-label" for="pengaturan_waktu1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengaturan_waktu" id="pengaturan_waktu2" value="2">
                                    <label class="form-check-label" for="pengaturan_waktu2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengaturan_waktu" id="pengaturan_waktu3" value="3">
                                    <label class="form-check-label" for="pengaturan_waktu3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengaturan_waktu" id="pengaturan_waktu4" value="4">
                                    <label class="form-check-label" for="pengaturan_waktu4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pengaturan_waktu" id="pengaturan_waktu5" value="5">
                                    <label class="form-check-label" for="pengaturan_waktu5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="pengaturan_waktuError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Penyerapan materi oleh peserta</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyerapan_materi_oleh_peserta" id="penyerapan_materi_oleh_peserta1" value="1">
                                    <label class="form-check-label" for="penyerapan_materi_oleh_peserta1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyerapan_materi_oleh_peserta" id="penyerapan_materi_oleh_peserta2" value="2">
                                    <label class="form-check-label" for="penyerapan_materi_oleh_peserta2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyerapan_materi_oleh_peserta" id="penyerapan_materi_oleh_peserta3" value="3">
                                    <label class="form-check-label" for="penyerapan_materi_oleh_peserta3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyerapan_materi_oleh_peserta" id="penyerapan_materi_oleh_peserta4" value="4">
                                    <label class="form-check-label" for="penyerapan_materi_oleh_peserta4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penyerapan_materi_oleh_peserta" id="penyerapan_materi_oleh_peserta5" value="5">
                                    <label class="form-check-label" for="penyerapan_materi_oleh_peserta5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="penyerapan_materi_oleh_pesertaError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Partisipasi peserta</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partisipasi_peserta" id="partisipasi_peserta1" value="1">
                                    <label class="form-check-label" for="partisipasi_peserta1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partisipasi_peserta" id="partisipasi_peserta2" value="2">
                                    <label class="form-check-label" for="partisipasi_peserta2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partisipasi_peserta" id="partisipasi_peserta3" value="3">
                                    <label class="form-check-label" for="partisipasi_peserta3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partisipasi_peserta" id="partisipasi_peserta4" value="4">
                                    <label class="form-check-label" for="partisipasi_peserta4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partisipasi_peserta" id="partisipasi_peserta5" value="5">
                                    <label class="form-check-label" for="partisipasi_peserta5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="partisipasi_pesertaError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Akomodasi dan konsumsi</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akomodasi_konsumsi" id="akomodasi_konsumsi1" value="1">
                                    <label class="form-check-label" for="akomodasi_konsumsi1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akomodasi_konsumsi" id="akomodasi_konsumsi2" value="2">
                                    <label class="form-check-label" for="akomodasi_konsumsi2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akomodasi_konsumsi" id="akomodasi_konsumsi3" value="3">
                                    <label class="form-check-label" for="akomodasi_konsumsi3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akomodasi_konsumsi" id="akomodasi_konsumsi4" value="4">
                                    <label class="form-check-label" for="akomodasi_konsumsi4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="akomodasi_konsumsi" id="akomodasi_konsumsi5" value="5">
                                    <label class="form-check-label" for="akomodasi_konsumsi5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="akomodasi_konsumsiError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Pelaksanaan secara keseluruhan</label>
                            <div class="col-lg-8 d-flex flex-column flex-md-row justify-content-evenly mx-auto">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelaksanaan_secara_keseluruhan" id="pelaksanaan_secara_keseluruhan1" value="1">
                                    <label class="form-check-label" for="pelaksanaan_secara_keseluruhan1">Sangat Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelaksanaan_secara_keseluruhan" id="pelaksanaan_secara_keseluruhan2" value="2">
                                    <label class="form-check-label" for="pelaksanaan_secara_keseluruhan2">Kurang</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelaksanaan_secara_keseluruhan" id="pelaksanaan_secara_keseluruhan3" value="3">
                                    <label class="form-check-label" for="pelaksanaan_secara_keseluruhan3">Cukup</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelaksanaan_secara_keseluruhan" id="pelaksanaan_secara_keseluruhan4" value="4">
                                    <label class="form-check-label" for="pelaksanaan_secara_keseluruhan4">Baik</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="pelaksanaan_secara_keseluruhan" id="pelaksanaan_secara_keseluruhan5" value="5">
                                    <label class="form-check-label" for="pelaksanaan_secara_keseluruhan5">Sangat Baik</label>
                                </div>
                            </div>
                            <small id="pelaksanaan_secara_keseluruhanError" class="form-text text-danger" style="display:none;">Pilih salah satu opsi!</small>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Komentar</label>
                            <textarea class="form-control" name="komentar" id="komentar" cols="20" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="fw-medium fs-5 fs-md-6 mb-2">Saran untuk kegiatan kedepan</label>
                            <textarea class="form-control" name="usul_saran" id="usul_saran" cols="20" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    $('#form_evaluasi_akhir').on('submit', function(e) {
        e.preventDefault();

        let isValid = true;

        if (!$('input[name="pelaksanaan_secara_keseluruhan"]:checked').val()) {
            $('#pelaksanaan_secara_keseluruhanError').show();
            isValid = false;
        } else {
            $('#pelaksanaan_secara_keseluruhanError').hide();
        }

        if (!$('input[name="kesesuaian_pelatihan_dengan_kebutuhan"]:checked').val()) {
            $('#kesesuaian_pelatihan_dengan_kebutuhanError').show();
            isValid = false;
        } else {
            $('#kesesuaian_pelatihan_dengan_kebutuhanError').hide();
        }

        if (!$('input[name="narasumber_fasilitator"]:checked').val()) {
            $('#narasumber_fasilitatorError').show();
            isValid = false;
        } else {
            $('#narasumber_fasilitatorError').hide();
        }

        if (!$('input[name="materi_pelatihan"]:checked').val()) {
            $('#materi_pelatihanError').show();
            isValid = false;
        } else {
            $('#materi_pelatihanError').hide();
        }

        if (!$('input[name="metode_bahan_alat"]:checked').val()) {
            $('#metode_bahan_alatError').show();
            isValid = false;
        } else {
            $('#metode_bahan_alatError').hide();
        }

        if (!$('input[name="pengaturan_waktu"]:checked').val()) {
            $('#pengaturan_waktuError').show();
            isValid = false;
        } else {
            $('#pengaturan_waktuError').hide();
        }

        if (!$('input[name="penyerapan_materi_oleh_peserta"]:checked').val()) {
            $('#penyerapan_materi_oleh_pesertaError').show();
            isValid = false;
        } else {
            $('#penyerapan_materi_oleh_pesertaError').hide();
        }

        if (!$('input[name="partisipasi_peserta"]:checked').val()) {
            $('#partisipasi_pesertaError').show();
            isValid = false;
        } else {
            $('#partisipasi_pesertaError').hide();
        }

        if (!$('input[name="akomodasi_konsumsi"]:checked').val()) {
            $('#akomodasi_konsumsiError').show();
            isValid = false;
        } else {
            $('#akomodasi_konsumsiError').hide();
        }

        if (!$('input[name="pelaksanaan_secara_keseluruhan"]:checked').val()) {
            $('#pelaksanaan_secara_keseluruhanError').show();
            isValid = false;
        } else {
            $('#pelaksanaan_secara_keseluruhanError').hide();
        }

        // Jika tidak ada error, form akan disubmit
        if (isValid) {
            $('#form_evaluasi_akhir')[0].reset();
            this.submit();
        }
    });
</script>