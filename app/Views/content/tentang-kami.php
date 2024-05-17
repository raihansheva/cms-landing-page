<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Tentang Kami.</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahsolusi"
                    style="background-color: #03C988; color:white; height: 45px;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 105px;">Ubah</span>
                </button>
            </div>
        
            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahsolusi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <form action="/ubahartikel" method="post" id="form-data-solusi" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">

                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Artikel :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Nama Artikel" name="nama_artikel">
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5"
                                        name="deskripsi"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"
                                    id="btn-simpan"><i class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="col-12">
            <div class="col-12 text-center">
                <h3>judul......</h3>
            </div>
            <div class="col-12 text-center">
                <p>deskripsiii....</p>
            </div>
        </div>
        <br>
        <div class="col-12 d-flex flex-wrap gap-2"
            style="border: 1px black; height: 100%; display: flex; flex-wrap: wrap;">
            <div class="card" style="padding: 24px; height: fit-content; width: 100%;">
                <div class="col-12 text-right p-0 mt-3">
                    <h4>misi</h4>
                </div>
                <div class="col-12 text-right">
                    <p>deskripsi</p>
                </div>
            </div>
            <div class="card" style="padding: 24px; height: fit-content; width: 100%;">
                <div class="col-12 text-end p-0 mt-3">
                    <h4>visi</h4>
                </div>
                <div class="col-12 text-end">
                    <p>deskripsi</p>
                </div>
            </div>

            <div class="card" style="padding: 24px; height: fit-content; width: 100%;">
                <div class="col-12 text-center p-0 mt-3">
                    <h4>histori</h4>
                </div>
                <div class="col-12 text-center">
                    <p>deskripsi</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<?php $this->endsection() ?>