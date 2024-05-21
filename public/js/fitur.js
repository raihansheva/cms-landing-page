const inputGambar = document.getElementById('gambar');
const pratinjauGambar = document.getElementById('preview');
const tombolHapusGambar = document.getElementById('hapusGambar');

// inputGambar.addEventListener('change', function () {
//     const file = this.files[0];

//     if (file) {
//         const reader = new FileReader();

//         reader.addEventListener('load', function () {
//             pratinjauGambar.src = this.result;
//             pratinjauGambar.classList.remove('d-none');
//             tombolHapusGambar.classList.remove('d-none');
//         });

//         reader.readAsDataURL(file);

//     } else {
//         pratinjauGambar.src = "#";
//         pratinjauGambar.classList.add('d-none');
//         tombolHapusGambar.classList.add('d-none');
//     }
// });

// tombolHapusGambar.addEventListener('click', function () {
//     pratinjauGambar.src = "#";
//     pratinjauGambar.classList.add('d-none');
//     tombolHapusGambar.classList.add('d-none');
//     inputGambar.value = ""; // Menghapus file dari input file
// });

$(document).ready(function () {
    $('#tabelfitur').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/fitur/getdatafitur',
        },
        columns: [{
            data: 'nama_fitur',
        },
        {
            data: 'deskripsiF',
        },
        {
            data: 'nama_solusi',
        },
        {
            data: 'icon',
            render: function (data, type, row) {
                // console.log(row);
                return '<img src="'+ row.icon +'" alt="" width="40px" height="40px">'
            },
        },
        {
            data: 'idF',
            render: function (data, type, row) {
                // console.log(row);
                return '<div class="d-flex gap-2"><a class="btn btn-primary d-flex btn-sm" href="/detail-fitur/'+ data +'"><i class="ti ti-list-details pe-2 fs-6 align-middle p-1 "></i><p class="m-0 p-1 align-middle">Detail</p></a><button type="button" class="btn d-flex btn-sm btn-edit" style="background-color: #03C988; color:white;" data-id="' + data + '" data-nama_fitur="' + row.nama_fitur + '" data-deskripsi="'+ row.deskripsi +'" data-idS="'+ row.id_solusi +'" data-icon="'+ row.icon +'"> <i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i> <p class="m-0 p-1 align-middle">Ubah</p></button><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
            },
            orderable: false
        },
        ]
    });
    //$('#tabelfitur').DataTable();
    $('#tabelfitur').on("click", '.btn-edit', function () {
        let id = $(this).data('id');
        let nama = $(this).data('nama_fitur');
        let desk = $(this).data('deskripsi');
        let idS = $(this).data('idS');
        // alert(desk);
        $('#id').val(id)
        $('#nama_fitur_ubah').val(nama)
        $('#deskripsi_ubah').val(desk)
        $('#id_solusi_ubah').val(idS)
        $('#exampleModaleditfitur').modal('show')
    });

    $('#tabelfitur').on("click", '.btn-hapus', function () {
        let id = $(this).data('id');
        $('#id_fitur_hapus').val(id)
        // alert(id);
        $('#exampleModalhapusfitur').modal('show')
    });

});