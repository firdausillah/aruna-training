<!DOCTYPE html>
<html>

<head>
  <title><?= $title ? $title : '' ?> | Seblang Wangi</title>
  <style>
    @media print {
      .page-break {
        page-break-before: always;
      }
    }
  </style>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <?php $this->load->view($content) ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Skrip yang ingin dijalankan setelah halaman dimuat
      // window.print(); // Contoh: beralih ke mode cetak
    });
  </script>
</body>

</html>