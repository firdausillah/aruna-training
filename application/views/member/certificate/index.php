                <div class="d-flex justify-content-center mb-5 gap-3">
                    <div style="width: 70px; height: 70px;" class="overflow-hidden rounded">
                        <img src="<?= base_url('uploads/img/member/') . $_SESSION['foto']; ?>" alt="user-avatar" class="d-block img-fluid" id="uploadedAvatar">
                    </div>
                    <div class="d-flex flex-column">
                        <small class="text-white">Wellcome Back!</small>
                        <span class="text-white"><?= $_SESSION['nama'] ?></span>
                        <small class="text-light" style="">Peserta - <?= $_SESSION['event_nama'] ?></small>
                    </div>
                </div>
                <div class="text-center d-flex justify-content-center">
                    <?php if ($certificate != null) : ?>
                        <a href="<?= base_url('uploads/file/certificate/'.$certificate->file); ?>" target="_blank" class="btn btn-light">Download Sertifikat</a>
                    <?php else : ?>
                        <div class="alert alert-danger mb-0 col-sm-6 alert-dismissible" role="alert">eSertifikat Belum Tersedia.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
                    <?php endif ?>
                </div>