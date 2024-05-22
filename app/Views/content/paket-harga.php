<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="https://cdn.datatables.net/v/ju/dt-2.0.7/datatables.min.css" rel="stylesheet">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link
    href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css"
    rel="stylesheet">


<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">

            <h2>Paket Harga</h2>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah paket harga</p>
                </button>
            </div>


            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahharga" method="post" id="form-data-fitur" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah paket harga</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Paket :</label>
                                        <input type="text" class="form-control" id="nama_paket"
                                            placeholder="Masukan Nama Paket" name="nama_paket">
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Kategori :</label>
                                        <input type="text" class="form-control" id="kategori_harga"
                                            placeholder="Masukan kategori" name="kategori_harga">
                                    </div>
                                </div>

                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" rows="7.5" id="deskripsi" cols="80"
                                            name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                            <label for="exampleFormControlInput1" class="form-label">Harga :</label>
                                            <input type="number" class="form-control" id="harga"
                                                placeholder="Masukan harga" name="harga">
                                        </div>
                                        <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Solusi
                                                :</label>
                                            <select name="id_solusi" id="id_solusi" class="form-select">
                                                <option value=""></option>
                                                <?php foreach ($solusi as $key => $value) { ?>
                                                    <option value="<?= $value['id'] ?>"><?= $value['nama_solusi'] ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit"
                                    style="background-color: #03C988; color:white;"><i
                                        class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
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
            <table id="tabelharga" class="table col-12 " style="height: auto;">
                <thead class="">
                    <tr class="p-2">
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Nama Solusi</th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                </thead>
                
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModaleditharga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form action="/ubahharga" method="post" id="form-data-fitur" class="modal-dialog-scrollable"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <input type="text" value="" name="id" id="id" hidden>
                <div class="modal-header border-bottom">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah paket harga
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 d-flex">
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlInput1" class="form-label">Nama
                                Paket :</label>
                            <input type="text" class="form-control" id="nama_paket_ubah" placeholder="Masukan Nama Paket"
                                name="nama_paket" value="">
                        </div>
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlInput1" class="form-label">Kategori :</label>
                            <input type="text" class="form-control" id="kategori_harga_ubah" placeholder="Masukan kategori"
                                name="kategori_harga" value="">
                        </div>
                    </div>

                    <div class="col-12 d-flex">
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" rows="7.5" id="deskripsi_ubah" cols="80"
                                name="deskripsi"></textarea>
                        </div>
                        <div class="col-6">
                            <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Harga :</label>
                                <input type="text" class="form-control" id="harga_ubah" placeholder="Masukan harga"
                                    name="harga" value="">

                            </div>
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Nama Solusi
                                    :</label>
                                <select name="id_solusi" id="id_solusi_ubah" class="form-select">
                                    <option value=""></option>
                                    <?php foreach ($solusi as $key => $value) { ?>
                                        <option value="<?= $value['id'] ?>">
                                            <?= $value['nama_solusi'] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top pe-4">
                    <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i
                            class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalhapusharga" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="width: 250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus paket harga</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hapusharga" method="post" id="form-data-hapus">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-center">Yakin ingin hapus paket ini?</p>
                    <input type="text" value="" name="id" id="idPH" hidden>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger d-flex btn-delete" type="submit"><i
                            class="ti ti-trash pe-2 fs-6 align-middle p-1" id="btn-delete"></i>
                        <p class="m-0 p-1 align-middle">Hapus</p>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Skrip jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
<!-- <script src="js/ajax_fitur.js"></script> -->
<script src="js/paket_harga.js"></script>
<!-- <script>
    $(document).ready(function () {
        $('#tabelfitur').DataTable();
    });
</script> -->
<?php $this->endsection() ?>