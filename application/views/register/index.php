<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Registrasi | Aruna Training</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="<?= base_url() ?>assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?= base_url() ?>assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <!-- <div class="authentication-inner"> -->
      <div class="authentication-inner" style="max-width:800px; position: relative;">
        <div class=" flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>" data-fdstatus="<?= $this->session->flashdata('status') ?>"></div>

        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="<?= base_url('') ?>" class="d-flex flex-column gap-2">
                <span class=" d-flex justify-content-center">
                  <img src="<?= base_url('assets/img/aruna-logo-gram.png') ?>" width="50">
                </span>
                <span class="app-brand-text fs-4 text-body fw-bolder">ARUNA TRAINING</span>
              </a>
            </div>
            <!-- /Logo -->
            <h5 class="mb-4">Daftar Pelatihan</h5>


            <?= form_open_multipart(base_url('register/save')) ?>
            <input type="hidden" name="token" value="<?= $_GET['token'] ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="" autofocus required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="instansi" class="form-label">instansi</label>
                  <input type="text" class="form-control" id="instansi" name="instansi" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukan Angka. Contoh: 08561426576" required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="email" name="email" required />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="" autofocus required />
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password" required />
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
                  <input type="hidden" class="form-control" value="" name="gambar">
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="file">File Persyaratan</label>
                  <div class="input-group input-group-merge">
                    <input class="form-control file" type="file" name="file">
                  </div>
                  <input type="hidden" class="form-control" value="" name="file_name">
                </div>
              </div>
            </div>


            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
            </div>
            <div class="mb-3">
              <a class="btn btn-secondary d-grid w-100" type="" href="<?= base_url('login') ?>">Batal</a>
            </div>
            </form>

          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= base_url() ?>assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/popper/popper.js"></script>
  <script src="<?= base_url() ?>assets/vendor/js/bootstrap.js"></script>
  <script src="<?= base_url() ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="<?= base_url() ?>assets/js/sweetalert2.all.min.js"></script>

  <script src="<?= base_url() ?>assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="<?= base_url() ?>assets/js/main.js"></script>

  <!-- <script src="<?= base_url() ?>assets/js/ui-modals.js"></script> -->

  <!-- Page JS -->
  <script src="<?= base_url() ?>assets/js/myScript.js"></script>

  <!-- Cropper -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/cropper.css" />


  <!-- Cropper -->
  <!-- Modal Upload Gambar -->
  <div class="modal fade" id="modalUpload" tabindex="-1" role="dialog" aria-labelledby="modalUploadLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Crop image</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
            <div class="row">
              <div class="col-md-8">
                <!--  default image where we will set the src via jquery-->
                <img class="cropper" id="foto">
              </div>
              <div class="col-md-4">
                <div class="preview"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="crop">Potong</button>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  <script src="<?= base_url() ?>assets/js/cropper.js"></script>

  <?php ;$this->load->view('components/hd_cropper'); ?>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>