<div class="col p-5">
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Jadwal</th>
          <th>Nama Dokter</th>
          <th>Spesialis</th>
          <th>Lama Bekerja</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
<!-- </div> -->


<script type="text/javascript">
  $(document).ready(function() {
    let table = $('#mydata').DataTable({
      "ordering": true,
      "order": [
        [0, 'asc']
      ],
      "ajax": {
        "url": "<?= site_url('JadwalController/data_jadwal') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "tanggal"
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
          "data": "id_jadwal",
          "render": function(data, type, row) {
            return `<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-whatever="${data}" data-name="${row.tanggal}"><i class="fas fa-trash"></i></button>`
          }
        }
      ]
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
      let id_jadwal = $(event.relatedTarget).data('whatever');
      let jadwal = $(event.relatedTarget).data('name');
      let modal = $(this)
      modal.find('#dataName').text(`jadwal ${jadwal}`)
      $('#deleteButton').on('click', function() {
        $.ajax({
          url: `<?= base_url('JadwalController/delete_jadwal/') ?>${id_jadwal}`,
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