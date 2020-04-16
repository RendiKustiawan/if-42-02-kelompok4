<div class="col p-5">
  <div class="table-responsive container" style="width: 100%;">
    <table class="table table-dark table-hover table-bordered" id="mydata">
      <thead>
        <tr>
          <th>Jadwal</th>
          <th>Nama Dokter</th>
          <th>Spesialis</th>
          <th>Lama Bekerja</th>
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
        }
      ]
    });
  });
</script>