<div class="p-5">
  <h1 class="text-center"><?= $title ?></h1>
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Hak Akses</th>
        </tr>
      </thead>
    </table>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable({
      "searching": false,
      "ordering": true,
      "order": [
        [2, 'asc']
      ],
      "ajax": {
        "url": "<?= site_url('AkunController/data_akun') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "username"
        },
        {
          "data": "password"
        },
        {
          "data": "hak_akses"
        }
      ]
    });
  });
</script>