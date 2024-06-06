<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<!-- <link rel="stylesheet" href="css/style-konten.css"> -->
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<style>
    .overlay {
        z-index: 999999999999;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0, 7);
        text-align: center;
        display: none;
    }

    .loader {
        width: 48px;
        height: 48px;
        border: 5px solid #FFF;
        border-bottom-color: #FF3D00;
        border-radius: 50%;
        display: inline-block;
        box-sizing: border-box;
        animation: rotation 1s linear infinite;
        margin-top: 250px;
    }

    @keyframes rotation {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="col-12">
    <div class="overlay">
        <span class="loader"></span>
    </div>
    <div class="col-12 text-center mt-3">
        <h2>Profile</h2>
    </div>
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="card col-8 p-3 shadow " style="height: 36   0px;">
            <div class="col-12 d-flex mt-3 ">
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Username :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" value="<?= session()->get('username') ?>" readonly>
                </div>
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Nama
                        :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" name="nama" value="<?= session()->get('nama') ?>" readonly>
                </div>
            </div>
            <div class="col-12 d-flex ">
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Email :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email" value="<?= session()->get('email') ?>" readonly>
                </div>
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Status :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Status" name="status" value="<?= session()->get('status') ?>" readonly>
                </div>
            </div>
            <div class="col-12 d-flex ">
                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                    <label for="exampleFormControlInput1" class="form-label">Role :</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Role" name="role" value="<?= session()->get('role') ?>" readonly>
                </div>
            </div>
            <div class="col-12 d-flex ">
                <div class="col-6 mb-1 p-2 pt-0" style="text-align: left;">
                    <button class="btn" style="background-color: #03C988; color:white;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditprofile">Edit</button>
                    <div class="modal fade" id="exampleModaleditprofile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <form action="/ubahprofile" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <input type="text" value="<?= session()->get('id') ?>" name="id" hidden>
                                <div class="modal-content">
                                    <div class="modal-header border">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Profile</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
                                        <div class="col-12 d-flex mt-3 ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Username :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Username" name="username" value="<?= session()->get('username') ?>">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Nama
                                                    :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" name="nama" value="<?= session()->get('nama') ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email" name="email" value="<?= session()->get('email') ?>">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Status :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Status" name="status" value="<?= session()->get('status') ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Role :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Role" name="role" value="<?= session()->get('role') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer pe-4 border-top ">
                                        <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                            <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                        </button>
                                        <button class="btn" style="background-color: #03C988; color:white; height: 45px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditpassword"><i class="ti ti-password pe-2 fs-5 align-middle p-1 "></i>
                                            <span class="m-0 p-1 " style="width: 130px;">Ubah password</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal fade" id="exampleModaleditpassword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Ubah Password</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/ubahpassword" method="post" id="form-ubah-password">
                                    <div class="modal-body">
                                        <?php
                                        $modal = session()->getFlashdata('modal');
                                        if ($modal && $modal['name'] === 'exampleModaleditpassword') : ?>
                                            <?php if ($modal['type'] === 'error') : ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <?php echo $modal['message']; ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php elseif ($modal['type'] === 'success') : ?>
                                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                                    <?php echo $modal['message']; ?>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <input type="text" value="<?= session()->get('id') ?>" name="id" hidden>
                                        <div class="col-12 d-flex ">
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Password lama :</label>
                                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password lama" name="password" value="">
                                            </div>
                                            <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Password baru :</label>
                                                <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="password baru" name="password-baru" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top ">
                                        <button class="btn btn-primary" type="button" data-bs-target="#exampleModaleditprofile" data-bs-toggle="modal">Kembali</button>
                                        <button class="btn" type="submit" style="background-color: #03C988; color:white;" id="btn-ubah">Ubah</button>
                                    </div>
                                </form>
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
<script>
    $(document).ready(function() {
        // Cek jika ada flashdata error atau success, lalu tampilkan modal
        // 
        // $('#btn-ubah').click(function() {
        //     const formdata = new FormData($("#form-ubah-password")[0]);
        //     const overlay = document.getElementsByClassName('.overlay');
        //     console.log(formdata);
        //     $.ajax({
        //         type: 'post',
        //         headers: {
        //             'X-Requested-With': 'XMLHttpRequest'
        //         },
        //         url: '/ubahpassword',
        //         data: formdata,
        //         dataType: "json",
        //         contentType: false,
        //         processData: false,
        //         success: function(res) {
        //             // if (res.status) {
        //             //     alert('anda berhasil menyimpan data');
        //             // }
        //         },
        //         beforeSend: function(res) {

        //         },
        //         complete: function(res) {
        //             
        //         },
        //         error: function(res) {

        //         },
        //         fail: function(res) {

        //         },
        //     })
        // });
        var modalData = <?php echo json_encode(session()->getFlashdata('modal')); ?>;
                    if (modalData) {
                        $('#' + modalData.name).modal('show');
                    }
    });
</script>
<!-- -->
<?php $this->endsection() ?>