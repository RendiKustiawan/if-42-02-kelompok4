<div class="py-5">
  <div class="table-responsive container">
    <table class="table table-dark table-hover table-bordered" id="mydata" style="width: 100%">
      <thead>
        <tr>
          <th>NIP</th>
          <th>No Antrian</th>
          <th>Usia Anak</th>
          <th>Tinggi Anak</th>
          <th>Berat Anak</th>
          <th>Keluhan</th>
          <th>Aksi</th>
          <!-- <?php if ($this->session->userdata("hak_akses") == 3) {
                  echo "<th>Aksi</th>";
                } ?> -->
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
        "url": "<?= base_url('PendaftarController/data_pendaftar') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "nip"
        },
        {
          "data": "no_antrian"
        },
        {
          "data": "usia_anak"
        },
        {
          "data": "tinggi_anak"
        },
        {
          "data": "berat_anak"
        },
        {
          "data": "keluhan"
        },
        {
          "data": "id_tabel_pendaftar",
          "render": function(data, type, row) {
            return <?= $this->session->userdata("hak_akses") ?> == 3 ? `<button class="btn btn-danger" data-toggle="modal"
            data-target="#deleteModal" data-nip="${row.nip}"  data-antrian="${row.no_antrian}"  data-whatever="${data}"><i class="fas fa-trash"></i></button>` : ""
          }
        }
      ]
    });

    $('#deleteModal').on('show.bs.modal', function(event) {
      let id_tabel_pendaftar = $(event.relatedTarget).data('whatever');
      let nip = $(event.relatedTarget).data('nip');
      let no_antrian = $(event.relatedTarget).data('antrian');
      let modal = $(this)
      modal.find('#dataName').text("nip " + nip + " antrian " + no_antrian);
      $('#deleteButton').on('click', function() {
        $.ajax({
          url: `<?= base_url('PendaftarController/delete_pendaftar/') ?>${id_tabel_pendaftar}`,
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