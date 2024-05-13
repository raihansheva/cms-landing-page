
$(document).ready(function () {
    $(document).on('submit', '#form-data', function (e) {
        e.preventDefault();
        // alert('oke');
        // $.ajax({
        //     url: "/tambahbanner",
        //     type: 'post',
        //     data: $(this).serialize(),
        //     dataType: "json",
        //     success: function (res) {
        //         if (res.status) {
        //             alert('anda berhasil menyimpan data'); 
        //         }
        //     }
        // })
    })

})