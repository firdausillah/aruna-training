<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <?= form_open_multipart(base_url('admin/materi/save')) ?>
        <input type="hidden" name="id" value="<?= @$materi->id ?>">
        <div class="mb-3">
            <label class="form-label" for="nama">Nama Materi <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= @$materi->nama ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="file">File</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group input-group-merge">
                        <input class="form-control file" type="file" name="file">
                    </div>
                    <input type="hidden" class="form-control" value="<?= @$materi->file ?>" name="file_name">
                </div>
                <div class="col-md-6">
                    <a href="<?= base_url('uploads/file/materi/' . @$materi->file) ?>" target="_blank" class="text-black">File : <span class="text-info"><?= @$materi->file ?></span></a>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <input type="text" name="keterangan" id="keterangan" value="<?= @$materi->keterangan ?>" class="form-control">
            </div>
        </div>
        <a href="<?= base_url() ?>admin/materi" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>