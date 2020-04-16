<table class="table table-striped" id="mydata">
    <thead>
        <tr>
            <th>Username</th>
            <th>NIP</th>
            <th>Nama Pasien</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="show_data">

    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_pasien(); //pemanggilan fungsi tampil barang.

        $('#mydata').DataTable();

        //fungsi tampil barang
        function tampil_data_pasien() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('PasienController/data_pasien') ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].nip + '</td>' +
                            '<td>' + data[i].nama_pasien + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                    console.log(html);
                }

            });
        }

    });
</script>