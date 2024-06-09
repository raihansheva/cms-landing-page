<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php base_url('../assets/sweetalert2/dist/sweetalert2.min.css') ?>">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"> -->

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Solusi</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaljudulsolusi" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-layout-navbar pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 130px;">Ubah judul solusi</span>
                </button>
                <button class="btn d-flex me-3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 115px;">Tambah solusi</span>
                </button>
            </div>
            <div class="modal fade" id="exampleModaljudulsolusi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/ubahheadersolusi" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah judul solusi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" value="<?= $head[0]['id'] ?>" name="id" id="id" hidden>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul Solusi : <p class="p-0 m-0" id="limitS"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudulS" placeholder="Masukan Judul Solusi" name="judul_solusi" value="<?= $head[0]['judul_solusi'] ?>" required>
                                    <span class="text-danger" id="limit2S"></span>
                                    
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi" required><?= $head[0]['deskripsi'] ?></textarea>
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
            <div class="modal fade" id="exampleModaltambahsolusi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahsolusi" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Solusi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0 has-validation" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Nama Solusi : <p class="p-0 m-0" id="limit"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudul" placeholder="Masukan Nama Solusi" name="nama_solusi" required>
                                    <span class="text-danger" id="limit2"></span>
                                    <div class="invalid-feedback">
                                        Masukan nama
                                    </div>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan Nama Solusi" name="nama_solusi"> -->
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                            Solusi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi" required></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar / Icon
                                            :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar" onchange="validateFile()" required>
                                        <small id="fileErrorTambah" class="text-danger"></small>
                                        <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>
                                        <div class="col-12 mt-2 text-end">
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
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
        </div>
        <br>
        <!-- <div class="card col-4" style="height: 200px; border:1px solid rgb(229, 234, 239);"> -->

        <div class="col-12">
            <div class="col-12 text-center">
                <h3><?= $head[0]['judul_solusi'] ?></h3>
            </div>
            <div class="col-12 text-center">
                <p><?= $head[0]['deskripsi'] ?></p>
            </div>
        </div>

        <div class="col-12 d-flex flex-wrap gap-2" style="border: 1px black; height: 100%; display: flex; flex-wrap: wrap;">
            <?php foreach ($solusi as $key => $value) { ?>
                <div class="card" style="padding: 24px; height: 310px; width: 347px;">
                    <div class="card-kanan-atas">
                        <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditsolusi<?= $value['id'] ?>" onclick="limitText('inputjuduledit1<?= $key + 1 ?>' , 'limitedit1<?= $key + 1 ?>' , 'limitedit2<?= $key + 1 ?>' , 'gambar2<?= $key + 1 ?>' , 'previewUbah<?= $key + 1 ?>' , 'hapusGambarUbah<?= $key + 1 ?>')"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaleditsolusi<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <form action="/ubahsolusi" method="post" id="form-data-ubah" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Solusi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
                                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                    Nama Solusi : <p class="p-0 m-0" id="limitedit1<?= $key + 1 ?>"></p></label>
                                                <input type="text" class="form-control m-0" id="inputjuduledit1<?= $key + 1 ?>" placeholder="Masukan Judul" name="nama_solusi" value="<?= $value['nama_solusi'] ?>" oninput="limitText('inputjuduledit1<?= $key + 1 ?>' , 'limitedit1<?= $key + 1 ?>' , 'limitedit2<?= $key + 1 ?>')" required>
                                                <span class="text-danger" id="limitedit2<?= $key + 1 ?>"></span>
                                            </div>
                                            <div class="col-12 d-flex">
                                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                                        Solusi:</label>
                                                    <textarea class="form-control" id="deskripsi" rows="8.5" name="deskripsi" required><?= $value['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                    <label for="exampleFormControlInput1" class="form-label">Gambar / Icon
                                                        :</label>
                                                    <input type="file" class="form-control" id="gambar2<?= $key + 1 ?>" placeholder="Pilih Gambar" name="gambar" onchange="validateFileEdit('gambar2<?= $key + 1 ?>' , 'fileErrorEdit<?= $key + 1 ?>')" required>
                                                    <small id="fileErrorEdit<?= $key + 1 ?>" class="text-danger"></small>
                                                    <label class="fs-2" for="">* <span>Format file : .jpg |
                                                            .png</span></label>
                                                    <div class="col-12 mt-2 text-end">
                                                        <i class="ti ti-x d-none" type="button" id="hapusGambarUbah<?= $key + 1 ?>" style="font-size: 24px"></i>
                                                        <img src="#" alt="Pratinjau Gambar" id="previewUbah<?= $key + 1 ?>" class="preview-image d-none image-fluid col-12" width="100%">
                                                    </div>
                                                </div>
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
                        <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapussolusi<?php echo $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalhapussolusi<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 250px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/hapussolusi" method="post" id="form-data-hapus">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id_solusi" hidden>
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
                    <div class="col-12 d-flex justify-content-center">
                        <img src="<?= $value['gambar'] ?>" alt="" width="120px" height="120px">
                    </div>
                    <div class="col-12 text-center p-0 mt-3">
                        <h4><?= $value['nama_solusi'] ?></h4>
                    </div>
                    <div class="col-12 text-center">
                        <p><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script> -->
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?= session()->getFlashdata('sweetalert'); ?>
<script>
    $(document).ready(function() {

        var modalData = <?php echo json_encode(session()->getFlashdata('modaltambah')); ?>;
        if (modalData) {
            $('#' + modalData.name).modal('show');
        }
        var id = 0;
        id++;
        var modalData = <?php echo json_encode(session()->getFlashdata('modalubah')); ?>;
        if (modalData) {
            $('#' + modalData.name + id).modal('show');
        }
        var modalData = <?php echo json_encode(session()->getFlashdata('modalubahhead')); ?>;
        if (modalData) {
            $('#' + modalData.name).modal('show');
        }
    });
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

    function preview(gambar, Pubah, hapusgambar) {

    }


    // validasi foto
    function validateFile() {
        const fileInput = document.getElementById('gambar');
        const filePath = fileInput.value;
        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
        const errorMessage = document.getElementById('fileErrorTambah');

        if (!allowedExtensions.exec(filePath)) {
            errorMessage.innerText = 'Tipe file tidak valid. Harap unggah file dengan tipe .jpeg, .jpg, atau .png.';
            fileInput.value = '';
            return false;
        }

        if (fileInput.files[0].size > maxSize) {
            errorMessage.innerText = 'Ukuran file terlalu besar. Maksimum 2MB.';
            fileInput.value = '';
            return false;
        }

        errorMessage.innerText = '';
        return true;
    }

    function validateFileEdit(gambar, error) {
        const fileInput = document.getElementById(gambar);
        const filePath = fileInput.value;
        const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
        const errorMessage = document.getElementById(error);

        if (!allowedExtensions.exec(filePath)) {
            errorMessage.innerText = 'Harap unggah file dengan tipe .jpeg, .jpg, atau .png.';
            fileInput.value = '';
            return false;
        }

        if (fileInput.files[0].size > maxSize) {
            errorMessage.innerText = 'Ukuran file terlalu besar. Maksimum 2MB.';
            fileInput.value = '';
            return false;
        }

        errorMessage.innerText = '';
        return true;
    }
    // tambah solusi
    const InputText = document.getElementById("inputjudul");
    const Limit = document.getElementById("limit");
    const Limitt = document.getElementById("limit2");
    const limit = 30;

    Limit.textContent = "0/" + limit;

    InputText.addEventListener("input", function() {
        const textlength = InputText.value.length;
        Limit.textContent = textlength + "/" + limit;

        if (textlength > limit) {
            Limit.classList.add("warning");
            // alert("Input tidak boleh lebih dari 45 karakter.");
            // console.log(textlength);
            InputText.value = InputText.value.substring(0, limit);
            Limit.textContent = limit + "/" + limit;
            Limitt.innerText = "Input tidak boleh lebih dari 30 karakter.";
        } else {
            Limit.classList.remove("warning");
            Limitt.innerText = "";
        }
    });
    const InputTextS = document.getElementById("inputjudulS");
    const LimitS = document.getElementById("limitS");
    const LimittS = document.getElementById("limit2S");
    const limitS = 30;

    const textlengthS1 = InputTextS.value.length;
    LimitS.textContent = textlengthS1 + "/" + limitS;

    InputTextS.addEventListener("input", function() {
        const textlengthS = InputTextS.value.length;
        LimitS.textContent = textlengthS + "/" + limitS;

        if (textlengthS > limitS) {
            LimitS.classList.add("warning");
            // alert("Input tidak boleh lebih dari 45 karakter.");
            InputTextS.value = InputTextS.value.substring(0, limitS);
            LimitS.textContent = limitS + "/" + limitS;
            LimittS.innerText = "Input tidak boleh lebih dari 30 karakter.";

        } else {
            LimitS.classList.remove("warning");
            LimittS.innerText = "";
        }
    });
    // edit solusi
    function limitText(input, limit1, limit2, gambar, preview, btnhapus) {
        const InputTextEdit1 = document.getElementById(input);
        const LimitEdit1 = document.getElementById(limit1);
        const LimittEdit1 = document.getElementById(limit2);
        const maxlimit = 45;
        const textlengthEdit12 = InputTextEdit1.value.length;

        LimitEdit1.textContent = textlengthEdit12 + "/" + maxlimit;

        InputTextEdit1.addEventListener("input", function() {
            const textlengthEdit1 = InputTextEdit1.value.length;
            LimitEdit1.textContent = textlengthEdit1 + "/" + maxlimit;

            if (textlengthEdit1 > maxlimit) {
                // setTimeout(function() {
                LimitEdit1.classList.add("warning");
                // alert("Input tidak boleh lebih dari 45 karakter.");
                // console.log(textlengthEdit1);
                InputTextEdit1.value = InputTextEdit1.value.substring(0, maxlimit);
                LimitEdit1.textContent = maxlimit + "/" + maxlimit;
                LimittEdit1.textContent = "Input tidak boleh lebih dari 45 karakter.";
                // InputTextEdit1.style.border = "1px red solid";
                // }, 500); //
                // console.log(LimittEdit1);
            } else {
                setTimeout(function() {
                    LimitEdit1.classList.remove("warning");
                    LimittEdit1.textContent = "";
                    // InputTextEdit1.style.border = "";
                }, 5000); //
            }
        });

        const inputGambarubah = document.getElementById(gambar);
        const pratinjauGambarubah = document.getElementById(preview);
        const tombolHapusGambarubah = document.getElementById(btnhapus);

        inputGambarubah.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();
                reader.addEventListener('load', function() {
                    pratinjauGambarubah.src = this.result;
                    pratinjauGambarubah.classList.remove('d-none');
                    tombolHapusGambarubah.classList.remove('d-none');
                });
                reader.readAsDataURL(file);
            } else {
                pratinjauGambarubah.src = "#";
                pratinjauGambarubah.classList.add('d-none');
                tombolHapusGambarubah.classList.add('d-none');
            }
        });

        tombolHapusGambarubah.addEventListener('click', function() {
            pratinjauGambarubah.src = "#";
            pratinjauGambarubah.classList.add('d-none');
            tombolHapusGambarubah.classList.add('d-none');
            inputGambarubah.value = ""; // Menghapus file dari input file
        });
    }
</script>
<?php $this->endsection() ?>