<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Banner</h2>
            <button class="btn d-flex h-1 " type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModaltambahbanner" style="background-color: #03C988; color:white;"><i
                    class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                <p class="m-0 p-1 align-middle">Tambah banner</p>
            </button>

            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahbanner" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahbanner" method="post" id="form-data" class="modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header  border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Banner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?= csrf_field(); ?>
                                <div class="mb-3 p-2" style="text-align: left;">
                                    <label for="exampleFormControlInput1"
                                        class="form-label d-flex justify-content-between">
                                        Judul : <p class="p-0 m-0" id="limit"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudul"
                                        placeholder="Masukan Judul" name="judul">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="8.5"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar">

                                        <div class="col-12 mt-2 text-end">
                                            <!-- <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                Gambar</button> -->
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar"
                                                style="font-size: 24px"></i>
                                            <img src="#" alt="Pratinjau Gambar" id="preview"
                                                class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer m-2 border-top">
                                <button class="btn d-flex" type="submit"
                                    style="background-color: #03C988; color:white;"><i
                                        class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan</p>
                                </button>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card col-12 p-4 pb-0 gap-2 bg-dark bg-opacity-10"
            style="height: 520px; border:1px solid rgb(229, 234, 239); overflow-y: auto;" id="style-3">
            <div class="card col-12 mb-3" style="padding: 24px;">
                <div class="card-kanan-atas">
                    <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModaleditbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaleditbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <form action="/tambahbanner" method="post" id="form-data" class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah banner</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="mb-3 p-2 pt-0" style="text-align: left; p-2">
                                            <label for="exampleFormControlInput1"
                                                class="form-label d-flex justify-content-between">
                                                Judul : <p class="p-0 m-0" id="limit2"></p></label>
                                            <input type="text" class="form-control" id="inputjudul2"
                                                placeholder="Masukan Judul">
                                        </div>
                                        <div class="col-12 d-flex">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Deskripsi:</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    rows="8.5"></textarea>
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Gambar
                                                    :</label>
                                                <input type="file" class="form-control" id="gambar"
                                                    placeholder="Pilih Gambar">

                                                <div class="col-12 mt-2">
                                                    <img src="#" alt="Pratinjau Gambar" id="preview"
                                                        class="preview-image d-none image-fluid col-12" width="100%">
                                                    <button type="button" id="hapusGambar"
                                                        class="btn btn-danger d-none">Hapus
                                                        Gambar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer pe-4 border-top">
                                        <button class="btn d-flex" type="button"
                                            style="background-color: #03C988; color:white;"><i
                                                class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                            <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ikon hapus -->
                    <i class="ti ti-x" style="font-size: 36px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalhapusbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalhapusbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 250px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Banner</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-danger d-flex" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaltambahsolusi"><i
                                            class="ti ti-trash pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Hapus</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="d-flex">
                    <div class="col-6">
                        <img src="/img/1.jpg" alt="" width="100%" height="100%">
                    </div>
                    <div class="col-6 d-block">
                        <div class="col-12 mt-5"></div>
                        <div class="col-12 text-end mt-5">
                            <h1>Mrs.Lourein</h1>
                        </div>
                        <div class="col-12 text-end ">
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus voluptatem repellendus
                                delectus eos consequuntur sapiente non eligendi dolore ducimus, esse saepe vel harum,
                                architecto asperiores veniam laborum? Cum aut a eligendi. Unde dolorum cumque libero,
                                hic
                                laborum nulla magni quos magnam nobis voluptatibus, tenetur cum nam corrupti vel itaque
                                ea
                                exercitationem optio aut adipisci non. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="col-12 d-flex justify-content-between mb-1">
            <h2>Footer</h2>
            <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal"
                data-bs-target="#exampleModaleditfooter"></i>
            <!-- Modal Edit Footer-->
            <div class="modal fade" id="exampleModaleditfooter" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Footer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <div class="col-12 d-flex ">
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="nama company">
                                </div>
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="example@gmail.com">
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Alamat :</label>
                                    <textarea type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Alamat" rows="4"></textarea>
                                </div>
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nomer Telepon :</label>
                                    <input type="number" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan nomer telepon">
                                </div>
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Link WhatsApp :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Link WhatsApp">
                                </div>
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Link Instagram :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Link Instagram">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer pe-4 border-top ">
                            <button class="btn d-flex" type="button" style="background-color: #03C988; color:white;"><i
                                    class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card" style="width: 100%; height: 280px;border:1px solid rgb(229, 234, 239);">
                <div class="card-body d-flex">
                    <div class="col-4">
                        <div class="col d-flex justify-content-center gap-3">
                            <div class="col-2 text-center d-flex justify-content-center mt-1">
                                <div class="lingkaran p-2">
                                    <a href="">
                                        <i class="ti ti-brand-whatsapp text-light" style="font-size: 36px; "></i>
                                        <!-- <p class="text-center text-dark-emphasis">WhatsApp</p> -->
                                    </a>
                                </div>
                            </div>
                            <div class="col-2 text-center d-flex justify-content-center mt-1">
                                <div class="lingkaran p-2">
                                    <a href="">
                                        <i class="ti ti-brand-instagram text-light" style="font-size: 36px; "></i>
                                        <!-- <p class="text-center text-dark-emphasis">Instagram</p> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center mt-4">
                            <p class="txt m-0 p-0">PT.GoldStep Teknologi Indonesia.</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col-12 text-center">
                            <p class="txt p-0 m-0 fs-5 fw-bold">Informasi</p>
                            <div class="col-12 p-2">
                                <a href="">
                                    <p class="txt p-0 m-0 fs-3 pb-2 text-decoration-underline">Pusat Bantuan</p>
                                </a>
                                <a href="">
                                    <p class="txt p-0 m-0 fs-3 pb-2 text-decoration-underline">Privacy Policy</p>
                                </a>
                                <a href="">
                                    <p class="txt p-0 m-0 fs-3 text-decoration-underline">Terms & Conditions</p>
                                </a>


                            </div>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                        <div class="col-7 text-center justify-content-center ">
                            <p class="txt p-0 m-0 fs-5 fw-bold">Contact</p>
                            <div class="col-12 p-2 text-start">
                                <p class="txt p-0 m-0 fs-3 pb-2">goldstep@gmail.com</p>
                                <p class="txt p-0 m-0 fs-3 pb-2">+6281222188524</p>
                                <p class="txt p-0 m-0 fs-3">Taman Kopo Indah 3, Ruko D35 Bandung, Indonesia, 40128</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer col-12 d-flex justify-content-center pt-3">
                    <p class="txt p-0 m-0 text-light fw-bold fs-4">Goldstep</p>
                    <p class="txt ps-5 p-0 m-0 text-light fs-4">Copyright 2024 PT.Goldstep Teknologi Indonesia</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/banner.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/ajax.js"></script>
<?php $this->endsection() ?>