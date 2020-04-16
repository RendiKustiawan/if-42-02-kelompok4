<table class="table table-striped" id="mydata">
    <thead>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="show_data">

    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_akun(); //pemanggilan fungsi tampil barang.

        $('#mydata').DataTable();

        //fungsi tampil barang
        function tampil_data_akun() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('AkunController/data_akun') ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].password + '</td>' +
                            '<td>' + data[i].hak_akses + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                    console.log(html);
                }

            });
        }

    });
</script>