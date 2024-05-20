$(document).ready(function () {
    const formatter = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
    $('#tabelharga').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/harga/getdataharga',
        },
        columns: [{
            data: 'nama_paket',
            name: 'nama_paket'
        },
        {
            data: 'kategori_harga',
            name: 'kategori_harga'
        },
        {
            data: 'deskripsi',
            name: 'deskripsi'
        },
        {
            data: 'harga',
            name: 'harga',
            render: function (data, type, row) {
                console.log(row);
                return formatter.format(row.harga)
            },
            orderable: false
        },
        {
            data: 'id_solusi',
            name: 'id_solusi',
        },
        {
            data: 'id',
            name: 'id',
            render: function (data, type, row) {
                console.log(row);
                return '<div class="d-flex gap-2"><a class="btn btn-primary d-flex btn-sm" href="/benefit/'+ data +'"><i class="ti ti-list-details pe-2 fs-6 align-middle p-1 "></i><p class="m-0 p-1 align-middle">Benefit</p></a><button type="button" class="btn d-flex btn-sm btn-edit-harga" style="background-color: #03C988; color:white;" data-id="' + data + '" data-nama_paket="' + row.nama_paket + '" data-kategori="'+ row.kategori_harga +'" data-deskripsi="'+ row.deskripsi +'" data-harga="'+ row.harga +'" data-idS="'+ row.id_solusi +'"> <i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i> <p class="m-0 p-1 align-middle">Ubah</p></button><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus-harga" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
            },
            orderable: false
        },
        ]
    });
    
    
    //$('#tabelfitur').DataTable();
    $('#tabelharga').on("click", '.btn-edit-harga', function () {
        let id = $(this).data('id');
        let nama = $(this).data('nama_paket');
        let kat = $(this).data('kategori');
        let desk = $(this).data('deskripsi');
        let harga = formatter.format($(this).data('harga'));
        let solusi = $(this).data('id_solusi');
        // alert(id);
        $('#id').val(id);
        $('#nama_paket_ubah').val(nama);
        $('#kategori_harga_ubah').val(kat);
        $('#deskripsi_ubah').val(desk);
        $('#harga_ubah').val(harga);
        $('#id_solusi_ubah').val(solusi);
        $('#exampleModaleditharga').modal('show');
    });

    $('#tabelharga').on("click", '.btn-hapus-harga', function () {
        let id = $(this).data('id');
        $('#idPH').val(id)
        // alert(id);
        $('#exampleModalhapusharga').modal('show')
    });

});