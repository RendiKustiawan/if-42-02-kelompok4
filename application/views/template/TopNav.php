<nav class="dashboard-navbar navbar navbar-light fixed-top bg-white flex-wrap-none" style="padding: 0;">
  <div class="dashboard-brand d-flex align-items-center pl-2 mr-auto" style="background-color: #adb7d9">
    <button class="navbar-toggler">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="<?= site_url("Landing/dashboard") ?>" class="navbar-brand landing-logo ml-3">Posyandu</a>
  </div>

  <ul class="navbar-nav d-flex flex-row pr-3">
    <li class="nav-item" id="menuUser">
      <a class="nav-link">
        Welcome!
        <?= $this->session->userdata('nama') ?>
      </a>
      <?php if ($this->session->userdata('hak_akses') == 3) { ?>
        <div class="d-none" id="floatingMenu">
          <a href="<?= site_url('PasienController') ?>">Profile</a>
          <a href="<?= site_url('Landing/logout') ?>">logout</a>
        </div>
      <?php } else { ?>
        <div class="d-none" id="floatingMenu">
          <a href="<?= site_url('Landing/logout') ?>">logout</a>
        </div>
      <?php } ?>
    </li>
  </ul>
</nav>

<script type="text/javascript">
  $(document).ready(function() {
    $("#menuUser").click(function() {
      $("#floatingMenu").toggleClass("d-none");
    })

    $(".navbar-toggler").click(function() {
      $("#sideNav").toggleClass("d-none");
    })

    $(window).resize(function() {
      if ($(window).width() < 769) {
        if (!($("#sideNav").hasClass("d-none"))) {
          $("#sideNav").toggleClass("d-none");
        }
      } else {
        if (($("#sideNav").hasClass("d-none"))) {
          $("#sideNav").toggleClass("d-none");
        }
      }
    })
  })
</script>