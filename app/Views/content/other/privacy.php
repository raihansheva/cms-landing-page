<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<!-- <link rel="stylesheet" href="css/style-konten.css"> -->
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php base_url('../assets/sweetalert2/dist/sweetalert2.min.css') ?>">
<style>
    .ck-editor__editable_inline {
        min-height: 250px !important;
        max-height: 250px !important;
        overflow-y: auto !important;
        border-top: 1px solid #000 !important;
    }

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
    <div class="col-12 text-center mt-3">
        <!-- <h2> <i class="ti ti-spy fs-6"></i></h2> -->
    </div>
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="card col-10 p-3 shadow " >
            <div class="col-12 text-end">
                <i class="ti ti-pencil" id="btn-edit" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditcanvas"></i>
                <div class="modal fade" id="exampleModaleditcanvas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <form action="/ubahprivacyPolc" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header border-bottom">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <input type="text" value="<?= $pp[0]['id'] ?>" name="id" id="id" hidden>
                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                            Deskripsi : </label>
                                        <textarea type="text" class="form-control" id="deskripsi" value="" name="deskripsi"><?= $pp[0]['deskripsi'] ?></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer pe-4 border-top">
                                    <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center text-center">
                <div class="col-10">
                    <p><?= $pp[0]['deskripsi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url('assets/ckeditor5/build/ckeditor.js') ?>"></script>
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?= session()->getFlashdata('sweetalert'); ?>
<script>
    $(document).ready(function() {
        let editor;
        ClassicEditor.create(document.querySelector('#deskripsi'))
            .then(newEditor => {
                editor = newEditor
            })
            .catch(error => {
                console.error(error);
            })
    });
    // });
</script>
<?php $this->endsection() ?>