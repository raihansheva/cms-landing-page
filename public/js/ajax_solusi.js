
$(document).ready(function () {
    $(document).on('submit', '#form-data-banner', function (e) {
        e.preventDefault();
        // alert('oke');
        $.ajax({
            url: "/tambahbanner",
            type: 'post',
            data: $(this).serialize(),
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    alert('anda berhasil menyimpan data'); 
                }
            }
        })
    })

    $(document).on('submit', '#form-data-solusi', function (e) {
        e.preventDefault();
        // alert('oke');
        $.ajax({
            url: "/tambahsolusi",
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