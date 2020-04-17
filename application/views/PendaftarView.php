<div class="col p-5">
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Pendaftar</th>
          <th>NIP</th>
          <th>Id_Jadwal</th>
          <th>No_Antrian</th>
          <th>Usia_Anak</th>
          <th>Tinggi_Anak</th>
          <th>Berat_Anak</th>
          <th>Sesi</th>
          <th>Keluhan</th>
        </tr>
      </thead>
    </table>
  </div>
<!-- </div> -->


<script type="text/javascript">
  $(document).ready(function() {
    $('#mydata').DataTable({
      "ordering": true,
      "order": [
        [0, 'asc']
      ],
      "ajax": {
        "url": "<?= site_url('PendaftarController/data_pendaftar') ?>",
        "type": "GET",
        "dataSrc": ""
      },
      "columns": [{
          "data": "pendaftar"
        },
        {
          "data": "nip"
        },
        {
          "data": "id_jadwal"
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
          "data": "sesi"
        },
        {
          "data": "keluhan"
        }
      ]
    });
  });
</script>