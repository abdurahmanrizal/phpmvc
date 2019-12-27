$(function(){
    $('.btn-tambah').on('click', function(){
        $('#judul').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#id').val('');
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');
    });

    $('span #btn-edit').on('click', function(){

        $('#judul').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');

        const id = $(this).data('id');
        
        $.ajax({
            url      :'http://localhost/phpmvc/public/mahasiswa/getDataMahasiswa',
            data     : {id : id},
            method   : 'post',
            dataType : 'json',
            success  : function(data) {
               $('#id').val(data.id);
               $('#nama').val(data.nama);
               $('#nim').val(data.nim);
               $('#email').val(data.email);
               $('#jurusan').val(data.jurusan);
            }

        });
    });

    $('#keyword').keyup(function(){

        const keyword = $(this).val();
        if(keyword != "") {
            $.ajax({
                url      : 'http://localhost/phpmvc/public/mahasiswa/cari',
                method   : 'post',
                data     : {keyword:keyword},
                success  : function(data) {
                   $('ul#list-mahasiswa').remove();
                   $('#result').html(data);
                }
            });
        }else {
            $.ajax({
                url      : 'http://localhost/phpmvc/public/mahasiswa/cari',
                method   : 'post',
                data     : {keyword:keyword},
                success  : function(data) {
                   $('#result').html(data);
                }
            });
        }
    
    })
});