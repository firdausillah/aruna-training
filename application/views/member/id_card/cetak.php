<div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('uploads/img/id_card/id_card.png') ?>');">
    <table style="height: 100px; position:absolute;">
        <tr>
            <td style="width: 50%; height:300px; position:relative; vertical-align: bottom; text-align:center;">
                <div style="position: absolute; margin-top:100%;">
                    <img src="<?= base_url('uploads/img/member/' . $_SESSION['foto']) ?>" width="110px" style="border-radius: 10px; position:absolute;" alt="">
                </div>

            </td>
        </tr>
        <tr>
            <td style="text-align: center; height: 120px;">
                <div style="width: 100%; height: 100%; position: absolute; z-index: 100; bottom: 0;">
                    <h2 style="margin-top: 3px; margin-bottom:0;">PESERTA</h2>
                    <p style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['event_nama'] ?></p>
                    <h3 style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['nama'] ?></h3>
                    <p style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['instansi'] ?></p>
                    <small><?= $member->pelaksanaan_tempat . ', ' . $member->pelaksanaan_tanggal ?></small>
                </div>

            </td>
        </tr>
        <tr>
            <td style="text-align: right; height: 40px; vertical-align: bottom;">
                <small style="position: absolute; z-index: 100; bottom: 0; right: 3px; padding: 3px 8px; text-align: right;">
                    <small style="margin-bottom: 0;">Aruna Training</small> <br>
                    <small>Sistem Informasi Pelatihan</small>

                </small>

            </td>
        </tr>
    </table>
</div>


<!-- <div style="">
    <div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('uploads/img/id_card/id_card.png') ?>');">
        <div style="position: absolute;">
            <img src="<?= base_url('uploads/img/member/' . $_SESSION['foto']) ?>" width="110px" style="border-radius: 10px;" alt="">
        </div>
        <div style="text-align: center; width: 100%; height: 33%; position: absolute; z-index: 100; bottom: 0;">
            <h2 style="margin-top: 3px; margin-bottom:0;">PESERTA</h2>
            <p style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['event_nama'] ?></p>
            <h3 style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['nama'] ?></h3>
            <p style="margin-top: 3px; margin-bottom:0;"><?= $_SESSION['instansi'] ?></p>
            <small><?= $member->pelaksanaan_tempat . ', ' . $member->pelaksanaan_tanggal ?></small>
        </div>
        <small style="position: absolute; z-index: 100; bottom: 0; right: 3px; padding: 3px 8px; text-align: right;">
            <small style="margin-bottom: 0;">Aruna Training</small> <br>
            <small>Sistem Informasi Pelatihan</small>

        </small>
    </div>
</div> -->




<!-- <div style="display: flex; flex-wrap: wrap;">
    <div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('uploads/img/id_card/id_card.png') ?>');  display: flex; position: relative; flex-wrap: wrap; align-content: between; overflow: hidden;">
        <div style="margin-left: auto; margin-right: auto; margin-top:auto; margin-bottom:auto; position: relative;">
            <img src="<?= base_url('uploads/img/member/' . $_SESSION['foto']) ?>" width="110px" style="border-radius: 10px;" alt="">
        </div>
        <div style="text-align: center; width: 100%; height: 33%; position: absolute; z-index: 100; bottom: 0;">
            <h2 style="margin: 3px;">PESERTA</h2>
            <p style="margin: 3px;"><?= $_SESSION['event_nama'] ?></p>
            <h3 style="margin: 3px;"><?= $_SESSION['nama'] ?></h3>
            <p style="margin: 3px;"><?= $_SESSION['instansi'] ?></p>
            <small><?= $member->pelaksanaan_tempat . ', ' . $member->pelaksanaan_tanggal ?></small>
        </div>
        <small style="position: absolute; z-index: 100; bottom: 0; right: 3px; padding: 3px 8px; text-align: right;">
            <small style="margin-bottom: 0;">Aruna Training</small> <br>
            <small>Sistem Informasi Pelatihan</small>

        </small>
    </div>
</div> -->


<!-- <table style="width: 100%; height:100px; border-collapse: collapse; background-color: grey;">
    <tr>
        <td style="width: 50%; height:100px; text-align: center; vertical-align: middle; background-color: blue; margin: 0 auto;">
            <div style="width: 50px; height: 50px; background-color: aquamarine;">sdf</div>
        </td>
    </tr>
</table> -->