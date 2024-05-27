<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="https://cdn.datatables.net/v/ju/dt-2.0.7/datatables.min.css" rel="stylesheet">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/poppins/font.css">
<link rel="stylesheet" href="<?= base_url('assets/poppins/font.css')  ?>">
<style>
    * {
        font-family: 'poppins', sans-serif;
    }
</style>

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <div class="col-8 d-flex align-center">
                <a href="/fitur" class="text-dark">
                    <i class="ti ti-chevron-left pe-4 align-middle p-1" style="font-size: 34px;"></i>
                </a>
                <h2>Detail Fitur</h2>
            </div>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah detail fitur</p>
                </button>
            </div>


            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahdetailfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah detail fitur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 ">
                                    <div class="ps-2" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                            Layout : </label>
                                    </div>
                                    <div class="col-12 d-flex gap-2">
                                        <?php foreach ($layout as $key => $value) { ?>
                                            <div class="mb-3 p-2 col">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                                        <img class="img-thumbnail" src="/<?= $value['layout'] ?>" alt="" width="100%" height="100%">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                    <input class="form-check-input" type="radio" name="layout" value="<?= $value['id'] ?>" id="layout">
                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between"><?= $value['nama_layout'] ?></label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Detail :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan judul detail" name="judul_detail">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7.5" name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                                        <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                                        <div class="col-12 mt-2 text-end">
                                            <!-- !-- <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                Gambar</button> -->
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <input type="text" value="<?= $idF ?>" name="id_fitur" id="id_fitur" hidden>
                                <!-- <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    
                                </div> -->
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <br>
        <!-- <div class="card col-4" style="height: 200px; border:1px solid rgb(229, 234, 239);"> -->
        <div class="col-12 " style="height: 100%;">
            <table id="tabelfitur" class="table col-12 " style="height: auto; background-color: white; border-radius: 10px;">
                <thead class="">
                    <tr class="p-2">
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">Judul Detail</th>
                        <th scope="col">Nama Fitur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Layout</th>
                        <!-- <th scope="col"></th>
                        <th scope="col"></th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- modal edit detail fitur -->
<div class="modal fade" id="exampleModaleditdetailfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form action="/ubahdetailfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="text" id="id" name="id" hidden>
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah detail Fitur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 ">
                        <div class="ps-2" style="text-align: left;">
                            <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                Layout : </label>
                        </div>
                        <div class="col-12 d-flex gap-2">
                            <?php foreach ($layout as $key => $value) { ?>
                                <div class="mb-3 p-2 col" style="text-align: left;">
                                    <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                        <img class="img-thumbnail" src="/<?= $value['layout'] ?>" alt="" width="100%" height="100%">
                                    </div>
                                    <br>
                                    <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                        <input class="form-check-input" type="radio" name="layout" value="<?= $value['id'] ?>" id="layout_ubah">
                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                            <?= $value['nama_layout'] ?></label>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>
                    </div>
                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                        <label for="exampleFormControlInput1" class="form-label">Judul Detail :</label>
                        <input type="text" class="form-control" id="judul_detail_ubah" placeholder="Masukan judul detail" name="judul_detail">
                    </div>
                    <div class="col-12 d-flex">
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" id="deskripsi_ubah" rows="7.5" name="deskripsi"></textarea>
                        </div>
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                            <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                            <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                            <div class="col-12 mt-2 text-end">
                                <!-- !-- <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                Gambar</button> -->
                                <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                            </div>
                        </div>
                    </div>
                    <input type="text" value="<?= $idF ?>" name="id_fitur" id="id_fitur" hidden>
                    <!-- <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    
                                </div> -->
                </div>
                <div class="modal-footer border-top pe-4">
                    <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalhapusdetailfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus detail fitur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hapusdetailfitur" method="post" id="form-data-hapus">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-center">Yakin ingin hapus detail ini?</p>
                    <input type="text" value="" name="id" id="id_detail_fitur_hapus" hidden>
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
<!-- Skrip jQuery -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Skrip DataTables -->
<script src="../node_modules/datatables.net.jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabelfitur').DataTable({
            "pageLength": 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: '/fitur/getdatadetailfitur/' + '<?= $idF ?>',
            },
            columns: [{
                    data: 'judul_detail',
                },
                {
                    data: 'nama_fitur',
                },
                {
                    data: 'deskripsiDF',
                },
                {
                    data: 'gambar',
                },
                {
                    data: 'nama_layout',
                },
                {
                    data: 'idD',
                    render: function(data, type, row) {
                        console.log(row);
                        return '<div class="d-flex gap-2"><button type="button" class="btn d-flex btn-sm btn-edit-detail" style="background-color: #03C988; color:white;" data-id="' + data + '" data-judul_detail="' + row.judul_detail + '" data-deskripsi="' + row.deskripsiDF + '" data-gambar="' + row.gambar + '" data-id_fitur="' + row.id_fitur + '" data-layout="' + row.layout + '"> <i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i> <p class="m-0 p-1 align-middle">Ubah</p></button><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus-detail" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
                    },
                    orderable: false
                },
            ]
        });
        //$('#tabelfitur').DataTable();
        $('#tabelfitur').on("click", '.btn-edit-detail', function() {
            let id = $(this).data('id');
            let judul = $(this).data('judul_detail');
            let desk = $(this).data('deskripsi');
            let gambar = $(this).data('gambar');
            let idF = $(this).data('id_fitur');
            let layout = $(this).data('layout');
            // // alert(desk);
            $('#id').val(id)
            $('#judul_detail_ubah').val(judul)
            $('#deskripsi_ubah').val(desk)
            $('#gambar_ubah').val(gambar)
            $('#layout_ubah').val(layout)
            $('#id_fitur_ubah').val(idF)
            $('#exampleModaleditdetailfitur').modal('show')
        });

        $('#tabelfitur').on("click", '.btn-hapus-detail', function() {
            let id = $(this).data('id');
            $('#id_detail_fitur_hapus').val(id)
            // alert(id);
            $('#exampleModalhapusdetailfitur').modal('show')
        });
    });
    // });
</script>
<!-- <script src="../js/detail-fitur.js"></script> -->
<?php $this->endsection() ?>