<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/profile/save')) ?>
        <div class="mb-3">
            <label class="form-label" for="nama">nama penyelenggara <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$profile->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="foto">Logo</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$profile->foto ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('uploads/img/profile/' . @$profile->foto) ?>" height="200px" alt="">
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="alamat">alamat</label>
            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= @$profile->alamat ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cp_1">contact Person 1</label>
            <input type="text" class="form-control" name="cp_1" id="cp_1" value="<?= @$profile->cp_1 ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="cp_2">contact Person 2</label>
            <input type="text" class="form-control" name="cp_2" id="cp_2" value="<?= @$profile->cp_2 ?>">
        </div>
        <a href="<?= base_url() ?>admin/profile" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>