<div class="col p-5">
  <h1 class="text-center"><?= $title ?></h1>
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Username</th>
          <th>Nama Dokter</th>
          <th>Spesialis</th>
          <th>Lama Bekerja</th>
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
        [0, 'asc']
      ],
      "ajax": {
        "url": "<?= site_url('DokterController/data_dokter') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "username"
        },
        {
          "data": "nama_dokter"
        },
        {
          "data": "spesialis"
        },
        {
          "data": "lama_bekerja"
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
          url: `<?= base_url('DokterController/delete_dokter/') ?>${username}`,
          type: "GET",
          async: true,
          dataType: "JSON",
        })
        table.ajax.reload();
        $("#deleteModal").modal('hide');
      })
    });
  });
</script>