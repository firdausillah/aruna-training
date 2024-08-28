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
                <div class="text-center">
                    <a href="<?= base_url('member/id_card/cetak');?>" target="_blank" class="btn btn-light">Download Id Card</a>
                </div>
