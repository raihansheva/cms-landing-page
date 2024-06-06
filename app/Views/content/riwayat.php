<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="https://cdn.datatables.net/v/ju/dt-2.0.7/datatables.min.css" rel="stylesheet">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">


<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Riwayat</h2>
        </div>
        <br>
        <!-- <div class="card col-4" style="height: 200px; border:1px solid rgb(229, 234, 239);"> -->
        <div class="col-12 " style="height: 100%;">
            <table id="tabelriwayat" class="table col-12" style="height: auto; background-color: white; border-radius: 10px; ">
                <thead class="">
                    <tr class="p-2">
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">Id_User</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aktivitas</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Created_at</th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalhapuskontak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus kontak</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hapuskontak" method="post" id="form-data-hapus">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-center">Yakin ingin hapus kontak ini?</p>
                    <input type="text" value="" name="id" id="id_kontak_hapus" hidden>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger d-flex btn-delete" type="submit"><i class="ti ti-trash pe-2 fs-6 align-middle p-1" id="btn-delete"></i>
                        <p class="m-0 p-1 align-middle">Hapus</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalpesan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Kontak user</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlTextarea1" class="form-label">Pesan :</label>
                    <textarea class="form-control" rows="7.5" id="pesan" name="pesan" readonly></textarea>
                </div>
            </div>
            <!-- <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger d-flex btn-delete" type="submit"><i
                            class="ti ti-trash pe-2 fs-6 align-middle p-1" id="btn-delete"></i>
                        <p class="m-0 p-1 align-middle">Hapus</p>
                    </button>
                </div> -->
        </div>
    </div>
</div>
<!-- Skrip jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
<!-- <script src="js/ajax_fitur.js"></script> -->
<script>
    $(document).ready(function() {
        $('#tabelriwayat').DataTable({
            "order": [[0, "desc"]],
            "pageLength": 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: '/home/getdatariwayat',
            },
            columns: [{
                    data: 'id_user',
                    // name: 'nama'
                },
                {
                    data: 'nama',
                    // name: 'email'
                },
                {
                    data: 'aktivitas',
                    // name: 'nomor_telepon'
                },
                {
                    data: 'aksi',
                    // name: 'pesan'
                },
                {
                    data: 'created_at',
                    // name: 'pesan'
                },
                {
                    data: 'id',
                    name: 'id',
                    render: function(data, type, row) {
                        console.log(row);
                        return '<div class="d-flex gap-2"><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus-kontak" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
                    },
                    orderable: false
                },
            ]
        });
        // $('#tabelkontak').DataTable();
        // $('#tabelkontak').on("click", '.btn-detail', function() {
        //     // let id = $(this).data('id');
        //     let pesan = $(this).data('pesan');
        //     // alert(id);
        //     $('#pesan').val(pesan)
        //     $('#exampleModalpesan').modal('show')
        // });

        // $('#tabelkontak').on("click", '.btn-hapus-kontak', function() {
        //     let id = $(this).data('id');
        //     $('#id_kontak_hapus').val(id)
        //     // alert(id);
        //     $('#exampleModalhapuskontak').modal('show')
        // });

    });
</script>
<?php $this->endsection() ?>