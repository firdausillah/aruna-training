<div class="card mb-4">
    <h5 class="card-header">Profile Details</h5>
    <!-- Account -->
    <div class="card-body">
        <div class="d-flex justify-content-center gap-3">
            <div style="width: 70px; height: 70px;" class="overflow-hidden rounded">
                <img src="<?= base_url('uploads/img/member/') . @$member->foto; ?>" alt="user-avatar" class="d-block img-fluid" id="uploadedAvatar">
            </div>
            <div class="d-flex flex-column">
                <span class="text-primary"><?= @$member->nama ?></span>
                <small class="text-light" style="">Peserta - <?= @$_SESSION['event_nama'] ?></small>
            </div>
        </div>
    </div>
    <hr class="my-0">
    <div class="card-body">
        <?= form_open_multipart(base_url('member/biodata/save')) ?>
        <input type="hidden" name="id" value="<?= @$member->id ?>">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= @$member->nama ?>" placeholder="" autofocus required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="instansi" class="form-label">instansi</label>
                    <input type="text" class="form-control" id="instansi" name="instansi" value="<?= @$member->instansi ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" value="<?= @$member->nomor_telepon ?>" placeholder="Masukan Angka. Contoh: 08561426576" required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= @$member->email ?>" required />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= @$member->username ?>" placeholder="" autofocus required />
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= @$member->password ?>" required />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="foto">Foto</label>
                    <div class="input-group input-group-merge">
                        <input class="form-control foto" type="file" name="foto">
                    </div>
                    <input type="hidden" class="form-control foto" type="input" name="file_foto" id="file_foto">
                    <input type="hidden" class="form-control" value="<?= @$member->foto ?>" name="gambar">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label" for="file">File Persyaratan</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group input-group-merge">
                                <input class="form-control file" type="file" name="file">
                            </div>
                            <input type="hidden" class="form-control" value="<?= @$member->file ?>" name="file_name">
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('uploads/file/member/' . @$member->file) ?>" target="_blank" class="text-black">File : <span class="text-info"><?= @$member->file ?></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Simpan</button>
        </div>
        <div class="mb-3">
            <a class="btn btn-secondary d-grid w-100" type="" href="<?= base_url('login') ?>">Batal</a>
        </div>
        </form>
    </div>
    <!-- /Account -->
</div>