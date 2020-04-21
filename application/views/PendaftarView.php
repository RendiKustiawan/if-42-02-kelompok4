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

<!-- Edit Modal Pendaftar -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  
  
      </div>
      <form id="EditForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="name" class="col-form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip">
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">No Antrian</label>
            <input type="text" class="form-control" id="no_antrian" name="no_antrian">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Usia Anak</label>
            <input type="password" class="form-control" id="usia_anak" name="usia_anak">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Tinggi Anak</label>
            <input type="password" class="form-control" id="tinggi_anak" name="tinggi_anak">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Berat Anak</label>
            <input type="password" class="form-control" id="berat_anak" name="berat_anak">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">Keluhan</label>
            <input type="password" class="form-control" id="keluhan" name="keluhan">
          </div>

        </div>
        <div class="form-button modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="tambahSubmit">Edit</button>
        </div>
      </form>
    



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