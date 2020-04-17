<div class="p-5">
  <h1 class="text-center"><?= $title ?></h1>
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Username</th>
          <th>Nama Admin</th>
        </tr>
      </thead>
    </table>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    let table = $('#mydata').DataTable({
      "searching": false,
      "ordering": true,
      "order": [
        [0, 'asc']
      ],
      "ajax": {
        "url": "<?= base_url('AdminController/data_admin') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "username"
        },
        {
          "data": "nama_admin"
        }
      ]
    });
  });
</script>