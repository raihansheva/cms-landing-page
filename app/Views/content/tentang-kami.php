<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php base_url('../assets/sweetalert2/dist/sweetalert2.min.css') ?>">
<style>
    * {
        font-family: 'poppins', sans-serif;
    }

    .ck-editor__editable_inline {
        min-height: 250px !important;
        max-height: 250px !important;
        overflow-y: auto !important;
        border-top: 1px solid #000 !important;
    }
</style>
<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Tentang Kami.</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahbannerinformasi" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 120px;">Ubah banner</span>
                </button>
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahinformasi" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 140px;">Tambah Informasi</span>
                </button>
            </div>
            <div class="modal fade" id="exampleModaltambahbannerinformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/ubahbannerinformasi" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah banner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <input type="text" value="<?= $head[0]['id'] ?>" name="id" id="id" hidden>
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul : <p class="p-0 m-0" id="limitTK"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudulTK" placeholder="Masukan Judul" name="judul_banner" value="<?= $head[0]['judul_banner'] ?>">
                                    <span class="text-danger" id="limit2TK"></span>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="deskripsi" rows="8.5" name="deskripsi"><?= $head[0]['deskripsi'] ?></textarea>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Gambar :</label>
                                    <input type="file" class="form-control" id="gambar" placeholder="Masukan Nama Artikel" name="gambar" required>
                                    <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                                    <div class="col-6 mt-2 text-end">
                                        <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                        <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                    </div>
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
            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahinformasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahtentangkami" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Informasi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul : <p class="p-0 m-0" id="limitJ"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudulJ" placeholder="Masukan informasi" name="judul">
                                    <span class="text-danger" id="limit2J"></span>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Judul :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan informasi" name="judul"> -->
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="deskripsiI" rows="8.5" name="deskripsi"></textarea>
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
        </div>
        <br>
        <br>
        <div class="col-12 d-flex">
            <div class="col-6 d-block">
                <br>
                <br>
                <br>
                <div class="col-12 text-start mt-5">
                    <h2 class="fw-bolder"><?= $head[0]['judul_banner'] ?></h2>
                </div>
                <div class="col-12 text-start">
                    <p class="fs-5"><?= $head[0]['deskripsi'] ?></p>
                </div>
            </div>
            <div class="col-6">
                <div class="col-12 p-3">
                    <img src="<?= $head[0]['gambar'] ?>" alt="" class="img-thumbnail">
                </div>
            </div>

        </div>
        <br>
        <div class="col-12 d-flex flex-wrap gap-3" style="height: fit-content; display: flex; flex-wrap: wrap; ">
            <?php foreach ($tentang as $key => $value) { ?>
                <div class="card " style="padding: 24px; height: fit-content; width: 100%; flex: 1 0 500px;">
                    <div class="card-kanan-atas">
                        <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditartikel<?= $value['id'] ?>" onclick="limitText('inputjudulUJ<?= $key + 1 ?>' , 'limitUJ<?= $key + 1 ?>' , 'limit2UJ<?= $key + 1 ?>')"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaleditartikel<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <form action="/ubahtentangkami" method="post" id="form-data-ubah" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
                                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                    Judul : <p class="p-0 m-0" id="limitUJ<?= $key + 1 ?>"></p></label>
                                                <input type="text" class="form-control m-0" id="inputjudulUJ<?= $key + 1 ?>" placeholder="Masukan informasi" name="judul" value="<?= $value['judul'] ?>" oninput="limitText('inputjudulUJ<?= $key + 1 ?>' , 'limitUJ<?= $key + 1 ?>' , 'limit2UJ<?= $key + 1 ?>')">
                                                <span class="text-danger" id="limit2UJ<?= $key + 1 ?>"></span>
                                                <!-- <label for="exampleFormControlInput1" class="form-label">Judul
                                                    :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Solusi" value="<?= $value['judul'] ?>" name="judul" id="deskripsi"> -->
                                            </div>
                                            <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                                    :</label>
                                                <textarea class="form-control" id="deskripsiU" rows="8.5" name="deskripsi"><?= $value['deskripsi'] ?></textarea>
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
                        <!-- ikon hapus -->
                        <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusinformasi<?= $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalhapusinformasi<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 250px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus informasi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/hapustentangkami" method="post" id="form-data-hapus">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <p class="text-center">Yakin ingin hapus informasi ini?</p>
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
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
                    </div>
                    <div class="col text-right p-0 mt-3">
                        <h3 class="fw-bolder"><?= $value['judul'] ?></h3>
                    </div>
                    <div class="col text-right">
                        <p class="p-0 m-0 fs-5-vw"><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/ckeditor5/build/ckeditor.js') ?>"></script>
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
        // let editor2;
        ClassicEditor.create(document.querySelector('#deskripsiI')).catch(error => {
            console.error(error);
        })
        ClassicEditor.create(document.querySelector('#deskripsiU')).catch(error => {
            console.error(error);
        })
        // tambah gambar
        const inputGambar = document.getElementById('gambar');
        const pratinjauGambar = document.getElementById('preview');
        const tombolHapusGambar = document.getElementById('hapusGambar');

        inputGambar.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    pratinjauGambar.src = this.result;
                    pratinjauGambar.classList.remove('d-none');
                    tombolHapusGambar.classList.remove('d-none');
                });
                reader.readAsDataURL(file);
            } else {
                pratinjauGambar.src = "#";
                pratinjauGambar.classList.add('d-none');
                tombolHapusGambar.classList.add('d-none');
            }
        });

        tombolHapusGambar.addEventListener('click', function() {
            pratinjauGambar.src = "#";
            pratinjauGambar.classList.add('d-none');
            tombolHapusGambar.classList.add('d-none');
            inputGambar.value = ""; // Menghapus file dari input file
        });
    });
    const InputTextTK = document.getElementById("inputjudulTK");
    const LimitTK = document.getElementById("limitTK");
    const LimittTK = document.getElementById("limit2TK");
    const limitTK = 40;

    LimitTK.textContent = "0/" + limitTK;

    InputTextTK.addEventListener("input", function() {
        const textlengthTK = InputTextTK.value.length;
        LimitTK.textContent = textlengthTK + "/" + limitTK;

        // if (textlengthTK > limitTK) {
        //     LimitTK.classList.add("warning");
        //     // alert("Input tidak boleh lebih dari 45 karakter.");
        //     InputTextTK.value = InputTextTK.value.substring(0, limitTK);
        //     LimitTK.textContent = limitTK + "/" + limitTK;
        //     LimittTK.innerText = "Input tidak boleh lebih dari 40 karakter.";
        // } else {
        //     LimitTK.classList.remove("warning");
        //     LimittTK.innerText = "";
        // }
        
        if (textlengthTK > limitTK) {
                LimitTK.classList.add("warning");
                InputTextTK.style.border = "1px solid red";

                if (textlengthTK > limitTK) {
                    InputTextTK.value = InputTextTK.value.substring(0, limitTK);
                    LimitTK.textContent = limitTK + "/" + limitTK;
                }
            } else {
                LimitTK.classList.remove("warning");
                InputTextTK.style.border = '';
            }
    });


    const InputTextJ = document.getElementById("inputjudulJ");
    const LimitJ = document.getElementById("limitJ");
    const LimittJ = document.getElementById("limit2J");
    const limitJ = 40;

    LimitJ.textContent = "0/" + limitTK;

    InputTextJ.addEventListener("input", function() {
        const textlengthJ = InputTextJ.value.length;
        LimitJ.textContent = textlengthJ + "/" + limitJ;

        // if (textlengthJ > limitJ) {
        //     LimitJ.classList.add("warning");
        //     // alert("Input tidak boleh lebih dari 45 karakter.");
        //     InputTextJ.value = InputTextJ.value.substring(0, limitJ);
        //     LimitJ.textContent = limitJ + "/" + limitJ;
        //     LimittJ.innerText = "Input tidak boleh lebih dari 40 karakter.";
        // } else {
        //     LimitJ.classList.remove("warning");
        //     LimittJ.innerText = "";
        // }
        if (textlengthJ > limitJ) {
                LimitJ.classList.add("warning");
                InputTextJ.style.border = "1px solid red";

                if (textlengthJ > limitJ) {
                    InputTextJ.value = InputTextJ.value.substring(0, limitJ);
                    LimitJ.textContent = limitJ + "/" + limitJ;
                }
            } else {
                LimitJ.classList.remove("warning");
                InputTextJ.style.border = '';
            }
    });

    function limitText(input, limit1, limit2) {
        const InputTextUJ = document.getElementById(input);
        const LimitUJ = document.getElementById(limit1);
        const LimittUJ = document.getElementById(limit2);
        const limitUJ = 40;

        LimitUJ.textContent = "0/" + limitTK;

        InputTextUJ.addEventListener("input", function() {
            const textlengthUJ = InputTextUJ.value.length;
            LimitUJ.textContent = textlengthUJ + "/" + limitUJ;

            if (textlengthUJ > limitUJ) {
                LimitUJ.classList.add("warning");
                InputTextUJ.style.border = "1px solid red";

                if (textlengthUJ > limitUJ) {
                    InputTextUJ.value = InputTextUJ.value.substring(0, limitUJ);
                    LimitUJ.textContent = limitUJ + "/" + limitUJ;
                }
            } else {
                LimitUJ.classList.remove("warning");
                InputTextUJ.style.border = '';
            }
        });
    }
</script>
<?php $this->endsection() ?>