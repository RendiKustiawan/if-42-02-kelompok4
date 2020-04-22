<div class="py-5">
<h1 class="text-center"><?= $title ?></h1>
  <div class="table-responsive container">
  <div class="d-flex justify-content-end px-3 mt-2">
      <button type="button" class="btn btn-primary" id="tambah" data-toggle="modal" data-target="#tambahModal">Tambah <?= $title ?></button>
    </div>
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

<!-- Edit Modal Pendaftar
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
            <label for="username" class="col-form-label">Usia Anak</label>
            <input type="text" class="form-control" id="usia_anak" name="usia_anak">
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">Tinggi Anak</label>
            <input type="text" class="form-control" id="tinggi_anak" name="tinggi_anak">
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">Berat Anak</label>
            <input type="text" class="form-control" id="berat_anak" name="berat_anak">
          </div>
          <div class="form-group">
            <label for="username" class="col-form-label">Keluhan</label>
            <input type="text" class="form-control" id="keluhan" name="keluhan">
          </div>

        </div>
        <div class="form-button modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="tambahSubmit">Edit</button>
        </div>
      </form>
     -->

     <!-- Tambah Modal Pendaftar -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah <?= $title ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="tambahForm" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="nip" class="col-form-label">NIP</label>
            <input type="text" class="form-control" value="<?= $this->session->userdata('id') ?>" id="nip" name="nip" readonly>
          </div>
          <div class="form-group">
            <label for="no_antrian" class="col-form-label">No Antrian</label>
            <input type="text" class="form-control" id="no_antrian" name="no_antrian">
          </div>
          <div class="form-group">
            <label for="usia_anak" class="col-form-label">Usia Anak</label>
            <input type="text" class="form-control" id="usia_anak" name="usia_anak">
          </div>
          <div class="form-group">
            <label for="tinggi_anak" class="col-form-label">Tinggi Anak</label>
            <input type="text" class="form-control" id="tinggi_anak" name="tinggi_anak">
          </div>
          <div class="form-group">
            <label for="berat_anak" class="col-form-label">Berat Anak</label>
            <input type="text" class="form-control" id="berat_anak" name="berat_anak">
          </div>
          <div class="form-group">
            <label for="keluhan" class="col-form-label">Keluhan</label>
            <input type="text" class="form-control" id="keluhan" name="keluhan">
          </div>
          <div class="form-group">
            <label for="tanggal" class="col-form-label">Tanggal</label>
            <select class="form-control" id="tanggal" name="tanggal">
              <?php 
                $query= $this->db->get('jadwal_imunisasi');
                $result= $query->result_array();
                foreach ($result as $key) {
                  echo "<option value='".$key['id_jadwal']."'>".$key['tanggal']."</option>";
                } 
              ?>
            </select>
          </div>
        </div>
        <div class="form-button modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" id="editSubmit">Submit</button>
        </div>
      </form>
    </div>
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

    $('#tambahForm').on('submit', function(event) {
      event.preventDefault();
      let form = $(this);

      $.ajax({
        url: `<?= base_url('PendaftarController/add_pendaftar') ?>`,
        type: 'post',
        data: form.serialize(),
        dataType: 'json',
        success: function(res) {
          if (res.success == true) {
            table.ajax.reload();
            $("#tambahModal").modal('hide');
          } else {
            $.each(res.messages, function(key, value) {
              let el = $('#' + key);
              el.closest('div.form-group').find("div.error").remove();
              el.after(value);
            })
          }
          // console.log(res)
        }
      });
    });

    $('#tambahModal').on('hide.bs.modal', function() {
      $("#no_antrian").val("");
      $("#usia_anak").val("");
      $("#tinggi_anak").val("");
      $("#berat_anak").val("");
      $("#keluhan").val("");
    })
  });
</script>