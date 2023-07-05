$(function() {

    $('.tombolTambahData').on('click', function() {

        $('#modalLabel').html('Tambah Data Barang');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        
    });
    
    $('.tampilModalUbah').on('click', function() {

        $('#modalLabel').html('Ubah Data Barang');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/PKL/phpmvc/public/barang/ubah')


        const id = $(this).data('id');
        
        $.ajax({
            url: 'http://localhost/PKL/phpmvc/public/barang/getUbah',
            data: {id : id},
            method: 'post',
            dataType : 'json',
            success : function(data) {
                $('#nama').val(data.Nama_Barang);
                $('#kate').val(data.Kat_Barang);
                $('#harg').val(data.Harga_Barang);
                $('#id').val(data.ID);
                console.log(data);
            }
        })

    });

});