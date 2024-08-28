<div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('uploads/img/id_card/id_card.png') ?>');">
    <table style="height: 100px; position:absolute;">
        <tr>
            <td style="width: 50%; height:300px; position:relative; vertical-align: bottom; text-align:center;">
                <div style="position: absolute; margin-top:100%;">
                    <img src="<?= base_url('uploads/img/trainer/' . $trainer->foto) ?>" width="110px" style="border-radius: 10px; position:absolute;" alt="">
                </div>

            </td>
        </tr>
        <tr>
            <td style="text-align: center; height: 120px;">
                <div style="width: 100%; height: 100%; position: absolute; z-index: 100; bottom: 0;">
                    <h2 style="margin-top: 3px; margin-bottom:0;">TRAINER</h2>
                    <p style="margin-top: 3px; margin-bottom:0;"><?= $trainer->event_nama ?></p>
                    <h3 style="margin-top: 3px; margin-bottom:0;"><?= $trainer->trainer_nama ?></h3>
                    <small><?= $trainer->pelaksanaan_tempat . ', ' . $trainer->pelaksanaan_tanggal ?></small>
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
