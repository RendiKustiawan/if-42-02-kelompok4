<aside class="side-nav-wrapper col-lg-2 col-md-3" id="sideNav">
  <div class="side-nav-container">
    <a href="<?= site_url('Landing/dashboard') ?>">
      <i class="fas fa-columns"></i>
      Dashboard
    </a>
    <a href="<?= site_url('AkunController') ?>" class="<?php if ($this->session->userdata('hak_akses') != 1) {echo "hide-nav";} ?>">
      <i class="fas fa-user-circle"></i>
      Akun
    </a>
    <a href="<?= site_url('AdminController') ?>" class="<?php if ($this->session->userdata('hak_akses') != 1) {echo "hide-nav";} ?>">
      <i class="fas fa-user-cog"></i>
      Admin
    </a>
    <a href="<?= site_url('DokterController') ?>" class="<?php if ($this->session->userdata('hak_akses') == 3) {echo "hide-nav";} ?>">
      <i class="fas fa-user-md"></i>
      Dokter
    </a>
    <a href="<?= site_url('PasienController') ?>" class="<?php if ($this->session->userdata('hak_akses') != 1) {echo "hide-nav";} ?>">
      <i class="fas fa-hospital-user"></i>
      Pasien
    </a>
    <a href="<?= site_url('PendaftarController') ?>">
      <i class="fas fa-notes-medical"></i>
      Pendaftaran
    </a>
    <a href="<?= site_url('JadwalController') ?>">
      <i class="fas fa-calendar"></i>
      Jadwal Imunisasi
    </a>
  </div>
</aside>