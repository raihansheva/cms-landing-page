
$(document).ready(function () {
    $('#tabelfitur').DataTable();
    // UNTUK TAMBAH SOLUSI
    $(document).on('submit', '#form-data-fitur', function (e) {
        e.preventDefault();
        // alert('oke');
        $.ajax({
            url: "/tambahfitur",
            type: 'post',
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    alert('anda berhasil menyimpan data solusi'); 
                }
            }
        })
    })
    // UNTUK UBAH SOLUSI
    $(document).on('submit', '#form-data-ubah', function (e) {
        e.preventDefault();
        // alert('oke');
        $.ajax({
            url: "/ubahfitur",
            type: 'post',
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    alert('anda berhasil mengahapus data solusi'); 
                }
            }
        })
    })
    // UNTUK HAPUS SOLUSi
    $(document).on('submit', '#form-data-hapus', function (e) {
        e.preventDefault();
        // alert('oke');
        $.ajax({
            url: "/hapusfitur",
            type: 'post',
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    alert('anda berhasil mengahapus data solusi'); 
                }
            }
        })
    })
    // $('#btn-simpan').click(function () {
    //     const formdata = new FormData($("form#form-data")[0]);
    //     $.ajax({
    //         type: 'post',
    //         headers:{'X-Requested-With': 'XMLHttpRequest'},
    //         url: '/tambahbanner' ,
    //         data: formdata,
    //         dataType: "json",
    //         success: function (res) {
    //             if (res.status) {
    //                 alert('anda berhasil menyimpan data');
    //             }
    //         }
    //     })
    // });

})