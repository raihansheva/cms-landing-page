<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<!-- <link href="https://cdn.datatables.net/v/ju/dt-2.0.7/datatables.min.css" rel="stylesheet"> -->
 
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php base_url('DataTables/datatables.min.css') ?>" rel="stylesheet">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php base_url('../assets/sweetalert2/dist/sweetalert2.min.css') ?>">
<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">

            <h2>Fitur</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
            <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaljudulfitur" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-layout-navbar pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 130px;">Ubah judul fitur</span>
                </button>
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle fs-3">Tambah fitur</p>
                </button>
            </div>

            <!-- modal judul fitur -->
            <div class="modal fade" id="exampleModaljudulfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/ubahheaderfitur" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah judul fitur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" value="<?= $head[0]['id'] ?>" name="id" id="id" hidden>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul Fitur : <p class="p-0 m-0" id="limitS"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudulS" placeholder="Masukan Judul Solusi" name="judul_fitur" value="<?= $head[0]['judul_fitur'] ?>">
                                    <span class="text-danger" id="limit2S"></span>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"><?= $head[0]['deskripsi'] ?></textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;" id="btn-simpan"><i class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Fitur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Nama Fitur : <p class="p-0 m-0" id="limit"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudul" placeholder="Masukan Nama Fitur" name="nama_fitur">
                                    <span class="text-danger" id="limit2"></span>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Nama Fitur :</label>
                                    <input type="text" class="form-control" id="nama_fitur" placeholder="Masukan Nama Solusi" name="nama_fitur"> -->
                                    
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" rows="7.5" id="deskripsi" cols="80" name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Icon :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="icon" onchange="validateFile()">
                                        <small id="fileErrorTambah" class="text-danger"></small>
                                        <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                                        <div class="col-12 mt-2 ">
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                            <div class="col">
                                                <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid " width="68px" height="68px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>

                                    <select name="id_solusi" id="id_solusi" class="form-select">
                                        <?php foreach ($solusi as $key => $value) { ?>
                                            <option value="<?= $value['id'] ?>"><?= $value['nama_solusi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

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
        <div class="col-12">
            <div class="col-12 text-center">
                <h3><?= $head[0]['judul_fitur'] ?></h3>
            </div>
            <div class="col-12 text-center">
                <p><?= $head[0]['deskripsi'] ?></p>
            </div>
        </div>
        <!-- <div class="card col-4" style="height: 200px; border:1px solid rgb(229, 234, 239);"> -->
        <div class="col-12 " style="height: 100%;">
            <table id="tabelfitur" class="table col-12" style="height: auto; background-color: white; border-radius: 10px; ">
                <thead class="">
                    <tr class="p-2">
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">Nama Fitur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Nama Solusi</th>
                        <th scope="col">Icon</th>
                        <!-- <th scope="col"></th> -->
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModaleditfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <form action="/ubahfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Fitur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" value="" name="id" id="id_fitur" hidden>
                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                            Nama Fitur : <p class="p-0 m-0" id="limitedit1"></p></label>
                        <input type="text" class="form-control m-0" id="nama_fitur_ubah" placeholder="Masukan Nama Fitur" name="nama_fitur">
                        <span class="text-danger" id="limit2edit1"></span>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                            <textarea class="form-control" rows="7.5" id="deskripsi_ubah" cols="80" name="deskripsi"></textarea>
                        </div>
                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                            <label for="exampleFormControlInput1" class="form-label">Icon
                                :</label>
                            <input type="file" class="form-control" id="gambarUbah" placeholder="Pilih Gambar" name="icon" onchange="validateFileEdit()">
                            <small id="fileErrorEdit" class="text-danger"></small>
                            <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                            <div class="col-12 mt-2 ">
                                <i class="ti ti-x d-none" type="button" id="hapusGambarUbah" style="font-size: 24px"></i>
                                <div class="col">
                                    <img src="#" alt="Pratinjau Gambar" id="previewUbah" class="preview-image d-none image-fluid " width="68px" height="68px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                        <label for="exampleFormControlInput1" class="form-label">Nama Solusi
                            :</label>

                        <select name="id_solusi" id="id_solusi_ubah" class="form-select">
                            <option value="">nama solusi
                            </option>
                            <?php foreach ($solusi as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"><?= $value['nama_solusi'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
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
<div class="modal fade" id="exampleModalhapusfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus fitur</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hapusfitur" method="post" id="form-data-hapus">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-center">Yakin ingin hapus fitur ini?</p>
                    <input type="text" value="<?= $value['id'] ?>" name="id" id="id_fitur_hapus" hidden>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- <script src="../node_modules/datatables.net-bs5/js/dataTables.boostrap.min.js"></script> -->
<!-- <script src="../node_modules/datatables.net/js/dataTables.min.js"></script> -->
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>
<!-- <script src="js/ajax_fitur.js"></script> -->
<script src="js/fitur.js"></script>
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?= session()->getFlashdata('sweetalert'); ?>
<?php $this->endsection() ?>