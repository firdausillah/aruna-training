<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('member/presensi/save')) ?>
        <input type="hidden" name="id" value="<?= @$presensi->id ?>">
        <div class="mb-3">
            <label class="form-label" for="id_activity">Aktifitas <span class="text-danger">*</span></label>
            <select class="form-control" name="id_activity" id="id_acitvity">
                <option value="">-- Pilih --</option>
                <?php foreach ($activities as $key => $value) : ?>
                    <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="file">File</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$presensi->foto ?>" name="gambar" accept="image/*" capture="camera">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/member/' . @$presensi->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$presensi->keterangan ?>" class="form-control">
            </div>
        </div>
        <a href="<?= base_url() ?>member/presensi" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>