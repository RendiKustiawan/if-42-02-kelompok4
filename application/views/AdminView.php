<table class="table table-striped" id="mydata">
    <thead>
        <tr>
            <th>ID Admin</th>
            <th>Username</th>
            <th>Nama Admin</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody id="show_data">

    </tbody>
</table>


<script type="text/javascript">
    $(document).ready(function() {
        tampil_data_admin(); //pemanggilan fungsi tampil barang.

        $('#mydata').DataTable();

        //fungsi tampil barang
        function tampil_data_admin() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url('AdminController/data_admin') ?>',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].id_admin + '</td>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].nama_admin + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                    console.log(html);
                }

            });
        }

    });
</script>