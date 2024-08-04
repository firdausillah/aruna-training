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
                <?php if ($member->is_approve == 0) : ?>
                    <div class="alert alert-warning col-sm-6 m-auto" role="alert">
                        Pendaftaran anda sedang di periksa oleh admin. <br>
                        Catatan Admin: <?= $member->keterangan ?>
                    </div>
                <?php elseif($member->is_approve == 2): ?>
                    <div class="alert alert-danger col-sm-6 m-auto" role="alert">
                        Pendaftaran anda ditolak oleh admin. <br>
                        Catatan Admin: <?= $member->keterangan ?>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php
                        $data = [
                            [
                                'title' => 'Biodata',
                                'icon' => 'bx bxs-user-detail ',
                                'url' => 'biodata',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'Presensi',
                                'icon' => 'bx bx-fingerprint ',
                                'url' => 'presensi',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'ID Card',
                                'icon' => 'bx bxs-user-badge ',
                                'url' => 'id_card',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'Materi',
                                'icon' => 'bx bx-book ',
                                'url' => 'materi',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'Tugas',
                                'icon' => 'bx bx-task ',
                                'url' => 'task',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'eSertifikat',
                                'icon' => 'bx bx-certification ',
                                'url' => 'certificate',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'Evaluasi',
                                'icon' => 'bx bx-user-check ',
                                'url' => 'evaluasi',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ],
                            [
                                'title' => 'Assesment',
                                'icon' => 'bx bx-list-check ',
                                'url' => 'assesment',
                                'text-color' => 'primary',
                                'bg-color-light' => ''
                            ]
                        ];
                        foreach ($data as $val) : ?>
                            <div class="col-6 col-sm-4 mb-3">
                                <a href="<?= base_url('member/') . $val['url'] ?>">
                                    <div class="card" style="height:100%;">
                                        <div class="card-body p-2 d-flex justify-content-center">
                                            <div class="text-center m-2 p-1" style="width: min-content; height: min-content;">
                                                <i class="<?= $val['icon'] ?>text-<?= $val['text-color'] ?>" style="font-size: 40px; padding: 6px; border-radius: 30%; background-color: #DEEBEC;"></i>
                                                <p class="mt-1" style="margin-bottom: -3px; font-size: small; font-weight: 400;"><?= $val['title'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
    
                    </div>
                <?php endif; ?>