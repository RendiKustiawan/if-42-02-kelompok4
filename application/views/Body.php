<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?= base_url('assets/logo.png') ?>" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title><?= $title ?></title>

  <script src="http://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <?php
  if ($this->session->userdata('username')) {
    $this->load->view('template/TopNav');
    ?>
    <div class="dashboard-wrapper container-fluid">
      <div class="row d-flex align-items-stretch">
        <?php $this->load->view('template/SideNav'); ?>
        <div class="col">
          <?php $this->load->view($main_view); ?>
        </div>
      </div>
    </div>
  <?php
  } else {
    $this->load->view($main_view);
  }
  ?>
</body>

</html>