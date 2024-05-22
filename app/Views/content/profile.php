<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<!-- <link rel="stylesheet" href="css/style-konten.css"> -->
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<div class="col-12">
    <div class="col-12 text-center mt-3">
        <h2>Profile</h2>
    </div>
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="card col-8 p-3 shadow " style="height: 280px;">
            <div class="col-12 d-flex mt-3 ">
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Name :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama"
                        name="email" value="">
                </div>
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Status :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Status"
                        name="email" value="">
                </div>
            </div>
            <div class="col-12 d-flex ">
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Email :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email"
                        name="email" value="">
                </div>
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Role :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Role"
                        name="email" value="">
                </div>
            </div>
            <div class="col-12 d-flex ">
                <div class="col-6 mb-1 p-2 pt-0" style="text-align: left;">
                    <button class="btn" style="background-color: #03C988; color:white;" type="button"
                        data-bs-toggle="modal" data-bs-target="#exampleModaleditprofile">Edit</button>
                    <div class="modal fade" id="exampleModaleditprofile" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <form action="/ubahprofile" method="post" class="modal-dialog-scrollable"
                                enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class="modal-content">
                                    <div class="modal-header border">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="col-12 d-flex mt-3 ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Name :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Nama" name="email" value="">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Status
                                                    :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Status" name="email" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Email" name="email" value="">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Role :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Role" name="email" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer pe-4 border-top ">
                                        <button class="btn d-flex" type="submit"
                                            style="background-color: #03C988; color:white;"><i
                                                class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                            <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                        </button>
                                        <button class="btn" style="background-color: #03C988; color:white; height: 45px;"
                                            type="button" data-bs-toggle="modal"
                                            data-bs-target="#exampleModaleditpassword"><i
                                                class="ti ti-password pe-2 fs-5 align-middle p-1 "></i>
                                                <span class="m-0 p-1 " style="width: 130px;">Ubah password</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="modal fade" id="exampleModaleditpassword" aria-hidden="true"
                            aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Ubah Password</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="col-12 d-flex ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Password lama :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="password lama" name="email" value="">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Password baru :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="password baru" name="email" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top ">
                                        <button class="btn btn-primary" data-bs-target="#exampleModaleditprofile"
                                            data-bs-toggle="modal">Kembali</button>
                                            <button class="btn" style="background-color: #03C988; color:white;" data-bs-target="#exampleModaleditprofile"
                                            data-bs-toggle="modal">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="js/banner.js"></script>
<script src="js/ajax.js"></script>
<!-- -->
<?php $this->endsection() ?>