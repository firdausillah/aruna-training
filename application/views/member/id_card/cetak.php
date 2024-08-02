<div style="display: flex; flex-wrap: wrap;">
    <div style="position: relative; height: 468px; width: 359px; background-size: 100% 100%; background-image: url('<?= base_url('uploads/img/id_card/id_card.png') ?>');  display: flex; position: relative; flex-wrap: wrap; align-content: between; overflow: hidden;">
        <div style="margin-left: auto; margin-right: auto; margin-top:auto; margin-bottom:auto; position: relative;">
            <img src="<?= base_url('uploads/img/member/' . $_SESSION['foto']) ?>" width="110px" style="border-radius: 10px;" alt="">
        </div>
        <div style="text-align: center; width: 100%; height: 33%; position: absolute; z-index: 100; bottom: 0;">
            <h3>PESERTA</h3>
            <p><?= $_SESSION['event_nama'] ?></p>
            <p><?= $_SESSION['nama'] ?></p>
            <p><?= $_SESSION['instansi'] ?></p>
            <p><?php print_r($_SESSION) ?></p>
        </div>
    </div>
</div>