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
                <!-- <div class="d-flex align-items-start align-items-sm-center justify-content-center gap-4 mb-4">
                <div style="width: 70px; height: 70px;" class="overflow-hidden rounded">
                    <img src="<?= base_url('uploads/img/member/') . $_SESSION['foto']; ?>" alt="user-avatar" class="d-block img-fluid" id="uploadedAvatar">
                </div>
                <div class="button-wrapper">
                    <h3 style="font-size: large; margin-bottom: 3px;"><?= $_SESSION['nama'] ?></h3>

                    <p class="text-muted mb-0" style="font-size: medium;"><?= $_SESSION['instansi'] ?></p>
                    <p class="text-muted mb-0" style="font-size: medium;">Peserta - <?= $_SESSION['event_nama'] ?></p>
                </div>
            </div> -->