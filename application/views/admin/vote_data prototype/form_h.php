<div class="modal fade" id="form_vote_data_h" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?= form_open_multipart(base_url('admin/vote_data/vote_data_h/save')) ?>
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= @$vote_data_h->id ?>">
                <div class="mb-3">
                    <label class="form-label" for="nama">Nama Event <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= @$vote_data_h->nama ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="start_date">tanggal dibuka <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="<?= @$vote_data_h->start_date ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="end_date">tanggal ditutup <span class="text-danger">*</span></label>
                    <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="<?= @$vote_data_h->end_date ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="max_voters">jumlah pemilih maksimal <span class="text-danger">*</span></label>
                    <input type="number" name="max_voters" id="max_voters" value="<?= @$vote_data_h->max_voters ?>" class="form-control" placeholder="jumlah pemilih maksimal" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" value="<?= @$vote_data_h->keterangan ?>" class="form-control" placeholder="keterangan">
                </div>
                <!-- <a href="<?= base_url() ?>admin/vote_data/vote_data_h" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>