<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php base_url('../assets/sweetalert2/dist/sweetalert2.min.css')?>">
<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Banner</h2>
            <button class="btn d-flex  " type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahbanner" style="background-color: #03C988; color:white;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                <p class="m-0 p-1 align-middle fs-4">Tambah banner</p>
            </button>

            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahbanner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahbanner" method="post" id="form-data" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header  border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Banner</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 ">
                                    <div class="ps-2" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                            Layout : </label>
                                    </div>
                                    <div class="col-12 d-flex gap-2">
                                        <?php foreach ($layout as $key => $value) { ?>
                                            <div class="mb-3 p-2 col" style="text-align: left;">
                                                <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                                    <img class="img-thumbnail" src="/<?= $value['layout'] ?>" alt="" width="100%" height="100%">
                                                </div>
                                                <br>
                                                <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                    <input class="form-check-input" type="radio" name="layout" value="<?= $value['id'] ?>" id="layout">
                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between"><?= $value['nama_layout'] ?></label>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="mb-3 p-2" style="text-align: left;">
                                    <!-- <label for="exampleFormControlInput1"
                                        class="form-label d-flex justify-content-between">
                                        Judul : <p class="p-0 m-0" id="limit"></p></label>
                                    <input type="text" class="form-control m-0" id="inputjudul"
                                        placeholder="Masukan Judul" name="judul"> -->
                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                        Judul : </label>
                                    <input type="text" class="form-control" id="inputjudul2" placeholder="Masukan Judul" name="judul">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                                        <label class="fs-2" for="">* <span>Format file : .jpg | .png</span></label>

                                        <div class="col-12 mt-2 text-end">
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar" style="font-size: 24px"></i>
                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer m-2 border-top">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;" id="btn-simpan"><i class="ti ti-device-floppy pe-1 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div class="card col-12 p-4 pb-0 gap-2 bg-dark bg-opacity-10" style="height: 520px; border:1px solid rgb(229, 234, 239); overflow-y: auto;" id="style-3">
            <?php foreach ($banner as $key => $value) { ?>
                <?php if ($value['layout'] == '1') { ?>
                    <div class="card col-12 mb-3" style="padding: 24px;">
                        <div class="card-kanan-atas">
                            <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditbanner<?php echo $value['id']; ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModaleditbanner<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <form action="/ubahbanner" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>

                                        <div class="modal-content">
                                            <div class="modal-header border-bottom">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah banner</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 ">
                                                    <div class="ps-2" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                            Layout : </label>
                                                    </div>
                                                    <div class="col-12 d-flex gap-2">
                                                        <?php foreach ($layout as $key => $value2) { ?>
                                                            <div class="mb-3 p-2 col" style="text-align: left;">
                                                                <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                                                    <img class="img-thumbnail" src="/<?= $value2['layout'] ?>" alt="" width="100%" height="100%">
                                                                </div>
                                                                <br>
                                                                <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                                    <input class="form-check-input" type="radio" name="layout" value="<?= $value2['id'] ?>" id="layout">
                                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between"><?= $value2['nama_layout'] ?></label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                    <!-- <label for="exampleFormControlInput1"
                                                class="form-label d-flex justify-content-between">
                                                Judul : <p class="p-0 m-0" id="limit2"></p></label>
                                            <input type="text" class="form-control" id="inputjudul2"
                                                placeholder="Masukan Judul"> -->
                                                    <input type="text" value="<?php echo $value['id']; ?>" name="id" id="id" hidden>
                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                        Judul : </label>
                                                    <input type="text" class="form-control" id="inputjudul2" placeholder="Masukan Judul" value="<?php echo $value['judul']; ?>" name="judul">
                                                </div>
                                                <div class="col-12 d-flex">
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"><?php echo $value['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label">Gambar
                                                            :</label>
                                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                                                        <label class="fs-2" for="">* <span>Format file : .jpg |
                                                                .png</span></label>
                                                        <div class="col-12 mt-2">
                                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                                            <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                                Gambar</button>
                                                        </div>
                                                    </div>
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
                            <!-- ikon hapus -->
                            <i class="ti ti-x" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusbanner<?= $value['id'] ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalhapusbanner<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 250px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Banner</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/hapusbanner" method="post" id="form-data-hapus">
                                            <?= csrf_field(); ?>
                                            <div class="modal-body">
                                                <p class="text-center">Yakin ingin hapus solusi ini?</p>
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
                        <div class="d-flex">
                            <div class="col-6">
                                <img src="<?php echo $value['gambar'] ?>" alt="" width="100%" height="100%">
                            </div>
                            <div class="col-6 d-block">
                                <div class="col-12 mt-5"></div>
                                <div class="col-12 text-end mt-5">
                                    <h1><?php echo $value['judul']; ?></h1>
                                </div>
                                <div class="col-12 text-end ">
                                    <p><?php echo $value['deskripsi']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else if ($value['layout'] == '2') { ?>
                    <div class="card col-12 mb-3" style="padding: 24px;">
                        <div class="card-kanan-atas">
                            <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditbanner<?php echo $value['id']; ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModaleditbanner<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <form action="/ubahbanner" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>

                                        <div class="modal-content">
                                            <div class="modal-header border-bottom">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah banner</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 ">
                                                    <div class="ps-2" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                            Layout : </label>
                                                    </div>
                                                    <div class="col-12 d-flex gap-2">
                                                        <?php foreach ($layout as $key => $value2) { ?>
                                                            <div class="mb-3 p-2 col" style="text-align: left;">
                                                                <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                                                    <img class="img-thumbnail" src="/<?= $value2['layout'] ?>" alt="" width="100%" height="100%">
                                                                </div>
                                                                <br>
                                                                <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                                    <input class="form-check-input" type="radio" name="layout" value="<?= $value2['id'] ?>" id="layout">
                                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between"><?= $value2['nama_layout'] ?></label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                    <!-- <label for="exampleFormControlInput1"
                                                class="form-label d-flex justify-content-between">
                                                Judul : <p class="p-0 m-0" id="limit2"></p></label>
                                            <input type="text" class="form-control" id="inputjudul2"
                                                placeholder="Masukan Judul"> -->
                                                    <input type="text" value="<?php echo $value['id']; ?>" name="id" id="id" hidden>
                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                        Judul : </label>
                                                    <input type="text" class="form-control" id="inputjudul2" placeholder="Masukan Judul" value="<?php echo $value['judul']; ?>" name="judul">
                                                </div>
                                                <div class="col-12 d-flex">
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"><?php echo $value['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label">Gambar
                                                            :</label>
                                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                                                        <label class="fs-2" for="">* <span>Format file : .jpg |
                                                                .png</span></label>
                                                        <div class="col-12 mt-2">
                                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                                            <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                                Gambar</button>
                                                        </div>
                                                    </div>
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
                            <!-- ikon hapus -->
                            <i class="ti ti-x" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusbanner<?= $value['id'] ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalhapusbanner<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 250px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Banner</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/hapusbanner" method="post" id="form-data-hapus">
                                            <?= csrf_field(); ?>
                                            <div class="modal-body">
                                                <p class="text-center">Yakin ingin hapus solusi ini?</p>
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
                        <div class="d-flex p-2">
                            <div class="col-6 d-block">
                                <div class="col-12 mt-5"></div>
                                <div class="col-12 text-start mt-5">
                                    <h1><?php echo $value['judul']; ?></h1>
                                </div>
                                <div class="col-10 text-start ">
                                    <p><?php echo $value['deskripsi']; ?></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="<?php echo $value['gambar'] ?>" alt="" width="100%" height="100%">
                            </div>
                        </div>
                    </div>
                <?php } else if ($value['layout'] == '3') { ?>
                    <div class="card col-12 mb-3" style="padding: 24px;">
                        <div class="card-kanan-atas">
                            <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditbanner<?php echo $value['id']; ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModaleditbanner<?php echo $value['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <form action="/ubahbanner" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah banner</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-12 ">
                                                    <div class="ps-2" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                            Layout : </label>
                                                    </div>
                                                    <div class="col-12 d-flex gap-2">
                                                        <?php foreach ($layout as $key => $value2) { ?>
                                                            <div class="mb-3 p-2 col" style="text-align: left;">
                                                                <div class=" d-flex p-2" style="height: 150px; width: 228px;">
                                                                    <img class="img-thumbnail" src="/<?= $value2['layout'] ?>" alt="" width="100%" height="100%">
                                                                </div>
                                                                <br>
                                                                <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                                    <input class="form-check-input" type="radio" name="layout" value="<?= $value2['id'] ?>" id="layout">
                                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between"><?= $value2['nama_layout'] ?></label>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                    <!-- <label for="exampleFormControlInput1"
                                                class="form-label d-flex justify-content-between">
                                                Judul : <p class="p-0 m-0" id="limit2"></p></label>
                                            <input type="text" class="form-control" id="inputjudul2"
                                                placeholder="Masukan Judul"> -->
                                                    <input type="text" value="<?php echo $value['id']; ?>" name="id" id="id" hidden>
                                                    <label for="exampleFormControlInput1" class="form-label d-flex justify-content-between">
                                                        Judul : </label>
                                                    <input type="text" class="form-control" id="inputjudul2" placeholder="Masukan Judul" value="<?php echo $value['judul']; ?>" name="judul">
                                                </div>
                                                <div class="col-12 d-flex">
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5" name="deskripsi"><?php echo $value['deskripsi']; ?></textarea>
                                                    </div>
                                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label">Gambar
                                                            :</label>
                                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar" name="gambar">
                                                        <label class="fs-2" for="">* <span>Format file : .jpg |
                                                                .png</span></label>
                                                        <div class="col-12 mt-2">
                                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                                            <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                                Gambar</button>
                                                        </div>
                                                    </div>
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
                            <!-- ikon hapus -->
                            <i class="ti ti-x" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalhapusbanner<?= $value['id'] ?>"></i>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalhapusbanner<?= $value['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" style="width: 250px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Banner</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="/hapusbanner" method="post" id="form-data-hapus">
                                            <?= csrf_field(); ?>
                                            <div class="modal-body">
                                                <p class="text-center">Yakin ingin hapus solusi ini?</p>
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
                        <div class="p-2">
                            <div class="col-12">
                                <img src="<?php echo $value['gambar'] ?>" alt="" width="100%" height="350px">
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-12 mt-1">
                                    <div class="col-12 text-start mt-3 d-flex justify-content-center ">
                                        <h1><?php echo $value['judul']; ?></h1>
                                    </div>
                                    <div class="col-12 text-center d-flex justify-content-center ">
                                        <p class="col-6"><?php echo $value['deskripsi']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <!-- kalo nama_layoutnya ga ada kasih div untuk default -->
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <div class="col-12 mt-3">
        <div class="col-12 d-flex justify-content-between mb-1">
            <h2>Footer</h2>
            <i class="ti ti-pencil" style="font-size: 36px;" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaleditfooter"></i>
            <!-- Modal Edit Footer-->
            <div class="modal fade" id="exampleModaleditfooter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <form action="/ubahfooter" method="post" class="modal-dialog-scrollable" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Footer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <div class="col-12 d-flex ">
                                    <input type="text" name="id" id="id" value="<?= $footer[0]['id'] ?>" hidden>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama lengkap company" name="nama_lengkap" value="<?= $footer[0]['nama_lengkap'] ?>">
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nama" name="nama" value="<?= $footer[0]['nama'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex ">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Email :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com" name="email" value="<?= $footer[0]['email'] ?>">
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat :</label>
                                        <textarea type="text" class="form-control" name="alamat" id="exampleFormControlInput1" placeholder="Alamat" rows="4"><?= $footer[0]['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Copyright :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="copyright" name="hak_cipta" value="<?= $footer[0]['hak_cipta'] ?>">
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nomer Telepon :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Masukan nomer telepon" name="nomor_telepon" value="<?= $footer[0]['nomor_telepon'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Link WhatsApp :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Link WhatsApp" name="link_whatsapp" value="<?= $footer[0]['link_whatsapp'] ?>">
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Link Instagram
                                            :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Link Instagram" name="link_instagram" value="<?= $footer[0]['link_instagram'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer pe-4 border-top ">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                </button>
                            </div>
                        </div>
                    </form>
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
                                    <a href="<?= $footer[0]['link_whatsapp'] ?>">
                                        <i class="ti ti-brand-whatsapp text-light" style="font-size: 36px; "></i>
                                        <!-- <p class="text-center text-dark-emphasis">WhatsApp</p> -->
                                    </a>
                                </div>
                            </div>
                            <div class="col-2 text-center d-flex justify-content-center mt-1">
                                <div class="lingkaran p-2">
                                    <a href="<?= $footer[0]['link_instagram'] ?>">
                                        <i class="ti ti-brand-instagram text-light" style="font-size: 36px; "></i>
                                        <!-- <p class="text-center text-dark-emphasis">Instagram</p> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center mt-4">
                            <p class="txt m-0 p-0"><?= $footer[0]['nama_lengkap'] ?></p>
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
                                <p class="txt p-0 m-0 fs-3 pb-2"><?= $footer[0]['email'] ?></p>
                                <p class="txt p-0 m-0 fs-3 pb-2"><?= $footer[0]['nomor_telepon'] ?></p>
                                <p class="txt p-0 m-0 fs-3"><?= $footer[0]['alamat'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer col-12 d-flex justify-content-center pt-3">
                    <p class="txt p-0 m-0 text-light fw-bold fs-4"><?= $footer[0]['nama'] ?></p>
                    <p class="txt ps-5 p-0 m-0 text-light fs-4"><?= $footer[0]['hak_cipta'] ?></p>
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
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?= session()->getFlashdata('sweetalert'); ?>
<!-- -->
<?php $this->endsection() ?>