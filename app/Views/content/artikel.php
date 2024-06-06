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
            <h2>Artikel</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhead<?php echo $head[0]['id'] ?>" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-layout-navbar pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 140px;">Ubah judul artikel</span>
                </button>
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white; height: 45px;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 125px;">Tambah artikel</span>
                </button>
            </div>
            <div class="modal fade" id="exampleModalhead<?php echo $head[0]['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/ubahheaderartikel" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah judul artikel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" value="<?php echo $head[0]['id'] ?>" name="id" id="id" hidden>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul artikel : <p class="p-0 m-0" id="limitA"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudulA" placeholder="Masukan Judul Artikel" name="judul_artikel" value="<?php echo $head[0]['judul_artikel'] ?>">
                                    <span class="text-danger" id="limit2A"></span>
                                    <!-- <label for="exampleFormControlInput1" class="form-label">Judul artikel :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan judul solusi" name="judul_artikel" value="<?php echo $head[0]['judul_artikel'] ?>"> -->
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="deskA" rows="8.5" name="deskripsi"><?php echo $head[0]['deskripsi'] ?></textarea>
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
                    <form action="/ubahartikel" method="post" id="form-data-solusi" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Artikel</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Nama Artikel : <p class="p-0 m-0" id="limitNA"></p></label>
                                    <input type="text" class="form-control m-0" id="inputnamaA" placeholder="Masukan Nama Artikel" name="nama_artikel">
                                    <span class="text-danger" id="limit2NA"></span>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="deskripsi" rows="8.5" name="deskripsi"></textarea>
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
        <div class="col-12">
            <div class="col-12 text-center">
                <h3><?php echo $head[0]['judul_artikel'] ?></h3>
            </div>
            <div class="col-12 text-center">
                <p><?php echo $head[0]['deskripsi'] ?></p>
            </div>
        </div>
        <br>
        <div class="col-12 d-flex flex-wrap gap-2 justify-content-center" style="border: 1px black; height: 100%; display: flex; flex-wrap: wrap;">
            <?php foreach ($artikel as $key => $value) { ?>
                <div class="card col" style="padding: 24px; height: fit-content; width: 100%; flex: 1 0 500px;">
                    <div class="card-kanan-atas">
                        <i class="ti ti-pencil" id="btn-ubah-art" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditartikel<?php echo $value['id'] ?>" onclick="limitTextUbah('inputUnamaA<?= $key + 1 ?>' , 'limitUNA<?= $key + 1 ?>' , 'limit2UNA<?= $key + 1 ?>')"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaleditartikel<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <form action="/ubahartikel" method="post" id="form-data-ubah" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah artikel</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" value="<?php echo $value['id'] ?>" name="id" id="id" hidden>
                                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                    Nama Artikel : <p class="p-0 m-0" id="limitUNA<?= $key + 1 ?>"></p></label>
                                                <input type="text" class="form-control m-0" id="inputUnamaA<?= $key + 1 ?>" placeholder="Masukan Nama Artikel" name="nama_artikel" value="<?php echo $value['nama_artikel'] ?>" oninput="limitTextUbah('inputUnamaA<?= $key + 1 ?>' , 'limitUNA<?= $key + 1 ?>' , 'limit2UNA<?= $key + 1 ?>')">
                                                <span class="text-danger" id="limit2UNA<?= $key + 1 ?>"></span>
                                            </div>
                                            <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                                    :</label>
                                                    <div class="edit">
                                                        <textarea class="form-control" id="deskripsiU<?= $key + 1 ?>" rows="8.5" name="deskripsi"><?php echo $value['deskripsi'] ?></textarea>
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
                        <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusartikel<?php echo $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalhapusartikel<?php echo $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 250px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus artikel</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/hapusartikel" method="post" id="form-data-hapus">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <p class="text-center">Yakin ingin hapus artikel ini?</p>
                                            <input type="text" value="<?php echo $value['id'] ?>" name="id" id="id_solusi" hidden>
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
                    <div class="col-12 text-right p-0 mt-3">
                        <h4><?php echo $value['nama_artikel'] ?></h4>
                    </div>
                    <div class="col-12 text-right">
                        <p><?php echo $value['deskripsi'] ?></p>
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
        // let editor;
        // ClassicEditor.create(document.querySelector('#deskripsi'))
        //     .then(newEditor => {
        //         editor = newEditor
        //     })
        //     .catch(error => {
        //         console.error(error);
        //     })
        // // let editor2;

        // // ClassicEditor.create(document.querySelector('#deskripsiU' . I)).catch(error => {
        // //     console.error(error);
        // // })
        // let counter = 0;
        // function createEditor() {
        //     counter++;
        //     const editorId = 'deskripsiU' + counter;
        //     const editorElement = document.createElement('div');
        //     editorElement.id = editorId;
        //     document.getElementById('edit').appendChild(editorElement);

        //     ClassicEditor.create(document.querySelector('#' + editorId))
        //         .catch(error => {
        //             console.error(error);
        //         });
        // }
        // document.getElementById('btn-ubah-art').addEventListener('click', createEditor);
        // ClassicEditor.create(document.querySelector('#deskA')).catch(error => {
        //     console.error(error);
        // })
    });
    const InputTextJudulA = document.getElementById("inputjudulA");
    const LimitJudulA = document.getElementById("limitA");
    const LimittJudulA = document.getElementById("limit2A");
    const limitJudulA = 100;

    LimitJudulA.textContent = "0/" + limitJudulA;

    InputTextJudulA.addEventListener("input", function() {
        const textlengthA = InputTextJudulA.value.length;
        LimitJudulA.textContent = textlengthA + "/" + limitJudulA;

        if (textlengthA > limitJudulA) {
            LimitJudulA.classList.add("warning");
            // alert("Input tidak boleh lebih dari 45 karakter.");
            InputTextJudulA.value = InputTextJudulA.value.substring(0, limitJudulA);
            LimitJudulA.textContent = limitJudulA + "/" + limitJudulA;
            LimittJudulA.innerText = "Input tidak boleh lebih dari 100 karakter.";
        } else {
            LimitJudulA.classList.remove("warning");
            LimittJudulA.innerText = "";
        }
    });
    const InputTextNA = document.getElementById("inputnamaA");
    const LimitNA = document.getElementById("limitNA");
    const LimittNA = document.getElementById("limit2NA");
    const limitNA = 100;

    LimitNA.textContent = "0/" + limitNA;

    InputTextNA.addEventListener("input", function() {
        const textlengthNA = InputTextNA.value.length;
        LimitNA.textContent = textlengthNA + "/" + limitNA;

        if (textlengthNA > limitNA) {
            LimitNA.classList.add("warning");
            // alert("Input tidak boleh lebih dari 45 karakter.");
            InputTextNA.value = InputTextNA.value.substring(0, limitNA);
            LimitNA.textContent = limitNA + "/" + limitNA;
            LimittNA.innerText = "Input tidak boleh lebih dari 100 karakter.";
        } else {
            LimitNA.classList.remove("warning");
            LimittNA.innerText = "";
        }
    });

    function limitTextUbah(input, limit1, limit2) {
        const InputTextUNA = document.getElementById(input);
        const LimitUNA = document.getElementById(limit1);
        const LimittUNA = document.getElementById(limit2);
        const limitUNA = 100;

        LimitUNA.textContent = "0/" + limitNA;

        InputTextUNA.addEventListener("input", function() {
            const textlengthUNA = InputTextUNA.value.length;
            LimitUNA.textContent = textlengthUNA + "/" + limitUNA;

            if (textlengthUNA > limitUNA) {
                LimitUNA.classList.add("warning");
                // alert("Input tidak boleh lebih dari 45 karakter.");
                InputTextUNA.value = InputTextUNA.value.substring(0, limitUNA);
                LimitUNA.textContent = limitUNA + "/" + limitUNA;
                LimittUNA.innerText = "Input tidak boleh lebih dari 100 karakter.";
            } else {
                setTimeout(function() {
                    LimitUNA.classList.remove("warning");
                    LimittUNA.innerText = "";
                }, 5000); //
            }
            // if (textlengthUNA >= limitUNA) {
            //     LimitUNA.classList.add("warning");
            //     InputTextUNA.style.border = "1px solid red";

            //     if (textlengthUNA > limitUNA) {
            //         InputTextUNA.value = InputTextUNA.value.substring(0, limitUNA);
            //         LimitUNA.textContent = limitUNA + "/" + limitUNA;
            //     }
            // } else {
            //     LimitUNA.classList.remove("warning");
            //     InputTextUNA.style.border = '';
            // }
        });
    }
</script>
<?php $this->endsection() ?>