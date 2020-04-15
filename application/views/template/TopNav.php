<nav class="dashboard-navbar navbar navbar-light fixed-top bg-white" style="padding: 0;">
  <div class="dashboard-brand d-flex align-items-center pl-2 pr-5 mr-auto" style="background-color: #adb7d9">
    <button class="navbar-toggler">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="<?= site_url("Landing/dashboard") ?>" class="navbar-brand landing-logo ml-3">Posyandu</a>
  </div>

  <ul class="navbar-nav d-flex flex-row pr-3">
    <li class="nav-item">
      <a class="nav-link">
        Welcome!
        <?= $this->session->userdata('username') ?>
      </a>
    </li>
  </ul>
</nav>