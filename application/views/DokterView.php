<div class="container">
    <div class="box">
      <h2>Data Dokter</h2>
      <p>Tabel Data Dokter Posyandu</p>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit1">TAMBAH DOKTER</button>
      <br><br>
      <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>Username</th>
            <th>Nama_Dokter</th>
            <th>Spesialis</th>
            <th>Lama_Bekerja</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1; foreach ($data as $d ) {?>
          <tr>
      
            <form action="">
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->Username ?></td>
              <td><?php echo $d->Nama_Dokter ?></td>
              <td><?php echo $d->Spesialis ?></td>
              <td><?php echo $d->Lama_Bekerja ?></td>

              <!--BUTTON EDIT DOKTER-->
              <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $d->Username ?>"><i class="fas fa-user-edit"></i></button></td>
              <!--BUTTON HAPUS-->
              <td><a type="button" class="btn btn-danger"  href="<?php echo base_url() . 'index.php/Web/hapusdokter/' . $d->Username; ?>" onClick="return confirm('Apakah Anda Yakin?')" ><i class="fas fa-user-times"></i></a></td>
            </form>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<!-- Modal Edit Dokter -->

<?php $no=1; foreach ($data as $d ) {?>
  <div class="modal fade" id="edit<?php echo $d->nim ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <center><h2>EDIT DATA DOKTER </h2></center>
        </div>
        <div class="modal-body">
      
        <form method="post" action="<?php echo base_url() . 'index.php/Web/editdokter'; ?>">
        <input type="hidden" class="form-control" id="formGroupExampleInput" placeholder="Username" name="Username" value="<?php echo $d->Username ?>"  required>
          <div class="form-group">
            <label for="formGroupExampleInput">Nama_Dokter</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama_Dokter" name="Nama_Dokter"  value="<?php echo $d->Nama_Dokter ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Spesialis</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Spesialis" name="Spesialis" value="<?php echo $d->Spesialis ?>" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Lama_Bekerja</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lama_Bekerja" name="Lama_Bekerja" value="<?php echo $d->Lama_Bekerja ?>" required>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
        </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>

<!-- Modal Tambah Dokter -->
<div class="modal fade" id="edit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <center><h2>TAMBAH DATA DOKTER</h2></center>
      </div>
      <div class="modal-body">
     
      <form method="POST" action="<?php echo base_url() . 'index.php/Web/tambahdokter'; ?>">
        <div class="form-group">
          <label for="formGroupExampleInput">Username</label>
          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Username" name="Username" required >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Nama_Dokter</label>
          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama_Dokter" name="Nama_Dokter"required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Spesialis</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Spesialis" name="Spesialis" required>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Lama_Bekerja</label>
          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lama_Bekerja" name="Lama_Bekerja" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <input  type="submit" class="btn btn-primary" id="hapus" value="Submit" placeholder="Simpan">
      </form>
      </div>
    </div>
  </div>
</div>


</body>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table').DataTable();
    } );
  </script>
</html>
