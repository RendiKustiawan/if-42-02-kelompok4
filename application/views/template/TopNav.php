<nav class="dashboard-navbar navbar navbar-light fixed-top bg-white" style="padding: 0;">
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
      <div class="d-none" id="floatingMenu">
        <a href="<?= site_url('Landing/logout') ?>">logout</a>
      </div>
    </li>
  </ul>
</nav>

<script type="text/javascript">
  $(document).ready(function() {
    $("#menuUser").click(function() {
      $("#floatingMenu").toggleClass("d-none");
    })
  })
</script>