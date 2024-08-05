<div class="card accordion-item mb-4">
    <h2 class="accordion-header" id="headingOne">
        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionOne" aria-expanded="false" aria-controls="accordionOne">
            Tata cara pengumpulan tugas:
        </button>
    </h2>

    <div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            1. Upload file / gambar / folder tugas anda kedalam google drive <br>
            2. Buka akses link google drive tugas yang ingin anda kumpulkan <a href="https://support.google.com/googleone/answer/2494822?hl=id&co=GENIE.Platform%3DDesktop" target="_blank">(tutorial)</a> <br>
            3. Salin link google drive tugas yang ingin anda kumpulkan <br>
            4. Tempel link google drive tugas kedalam kolom <strong>Link Tugas</strong> <br>
            5. Klik simpan pada form pengumpulan tugas
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><?= $title ? $title : '' ?></h5>
    </div>
    <div class="card-body">
        <!-- <div class="alert alert-info" role="alert">
            <br>

        </div> -->
        <?= form_open_multipart(base_url('member/task/save')) ?>
        <input type="hidden" name="id" value="<?= @$task->id ?>">
        <div class="mb-3">
            <label class="form-label" for="id_activity">Aktifitas/Materi <span class="text-danger">*</span></label>
            <select class="form-control" name="id_activity" id="id_acitvity">
                <option value="">-- Pilih --</option>
                <?php foreach ($activities as $key => $value) : ?>
                    <option value="<?= $value->id ?>"><?= $value->nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label" for="task_link">link tugas</label>
            <div class="input-group input-group-merge">
                <input type="text" name="task_link" id="task_link" value="<?= @$task->task_link ?>" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="keterangan">Keterangan</label>
            <div class="input-group input-group-merge">
                <!-- <input type="text" name="keterangan" id="keterangan" value="<?= @$task->keterangan ?>" class="form-control"> -->
                <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"><?=@$task->keterangan?></textarea>
            </div>
        </div>
        <a href="<?= base_url() ?>member/task" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>