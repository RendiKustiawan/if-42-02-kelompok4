<div class="py-5">
  <h1 class="text-center"><?= $title ?></h1>
  <div class="table-responsive container">
    <table class="table table-dark table-hover table-bordered" id="mydata" style="width: 100%">
      <thead>
        <tr>
          <th>Username</th>
          <th>NIP</th>
          <th>Nama Pasien</th>
          <th>Aksi</th>
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
        [1, 'asc']
      ],
      "ajax": {
        "url": "<?= base_url('PasienController/all_data_pasien') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "username"
        },
        {
          "data": "nip"
        },
        {
          "data": "nama"
        },
        {
          "data": "username",
          "render": function(data, type, row) {
            return `<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="${data}"><i class="fas fa-trash"></i></button>`
          }
        }
      ]
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
      let username = $(event.relatedTarget).data('whatever');
      let modal = $(this)
      modal.find('#dataName').text(username)
      $('#deleteButton').on('click', function() {
        $.ajax({
          url: `<?= base_url('PasienController/delete_pasien/') ?>${username}`,
          type: "GET",
          async: true,
          dataType: "JSON"
        })
        table.ajax.reload();
        $("#deleteModal").modal('hide');
      })
    });
  });
</script>