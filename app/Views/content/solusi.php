<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Solusi</h2>
            <div class="col-5 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaljudulsolusi" style="background-color: #03C988; color:white; height: 45px;"><i
                        class="ti ti-layout-navbar pe-2 fs-6 align-middle p-1 "></i>
                        <span class="m-0 p-1 " style="width: 125px;">Ubah judul solusi</span>
                </button>
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white; height: 45px;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <span class="m-0 p-1 " style="width: 105px;">Tambah solusi</span>
                </button>
            </div>
            <div class="modal fade" id="exampleModaljudulsolusi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <form action="/ubahheadersolusi" method="post" id="form-data-solusi" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah judul solusi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" value="<?= $head[0]['id']?>" name="id" id="id" hidden>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Solusi :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Nama Solusi" name="judul_solusi" value="<?= $head[0]['judul_solusi']?>">
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi :</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5"
                                        name="deskripsi"><?= $head[0]['deskripsi']?></textarea>
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

            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahsolusi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahsolusi" method="post" id="form-data-solusi" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">
                        <!--  -->
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Solusi</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan Nama Solusi" name="nama_solusi">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                            Solusi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8.5"
                                            name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar / Icon
                                            :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar"
                                            name="gambar">

                                        <div class="col-12 mt-2">
                                            <img src="#" alt="Pratinjau Gambar" id="preview"
                                                class="preview-image d-none image-fluid col-12" width="100%">
                                            <button type="button" id="hapusGambar" class="btn btn-danger d-none">Hapus
                                                Gambar</button>
                                        </div>
                                    </div>
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
        <!-- <div class="card col-4" style="height: 200px; border:1px solid rgb(229, 234, 239);"> -->
        
        <div class="col-12">
            <div class="col-12 text-center">
                <h3><?= $head[0]['judul_solusi']?></h3>
            </div>
            <div class="col-12 text-center">
                <p><?= $head[0]['deskripsi']?></p>
            </div>
        </div>
       
        <div class="col-12 d-flex flex-wrap gap-2"
            style="border: 1px black; height: 100%; display: flex; flex-wrap: wrap;">
            <?php foreach ($solusi as $key => $value) { ?>
                <div class="card" style="padding: 24px; height: 310px; width: 354px;">
                    <div class="card-kanan-atas">
                        <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModaleditsolusi<?= $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModaleditsolusi<?= $value['id'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <form action="/ubahsolusi" method="post" id="form-data-ubah" class="modal-dialog-scrollable"
                                    enctype="multipart/form-data">
                                    <?= csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Solusi</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id" hidden>
                                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                <label for="exampleFormControlInput1" class="form-label">Nama Solusi
                                                    :</label>
                                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="Masukan Nama Solusi" value="<?= $value['nama_solusi'] ?>"
                                                    name="nama_solusi" id="deskripsi">
                                            </div>
                                            <div class="col-12 d-flex">
                                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi
                                                        Solusi:</label>
                                                    <textarea class="form-control" id="deskripsi" rows="8.5"
                                                        name="deskripsi"><?= $value['deskripsi'] ?></textarea>
                                                </div>
                                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                    <label for="exampleFormControlInput1" class="form-label">Gambar / Icon
                                                        :</label>
                                                    <input type="file" class="form-control" id="gambar"
                                                        placeholder="Pilih Gambar" name="gambar">

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
                                        <div class="modal-footer border-top pe-4">
                                            <button class="btn d-flex" type="submit"
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
                        <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModalhapussolusi<?php echo $value['id'] ?>"></i>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalhapussolusi<?php echo $value['id'] ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" style="width: 250px;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="/hapussolusi" method="post" id="form-data-hapus">
                                        <?= csrf_field(); ?>
                                        <div class="modal-body">
                                            <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                            <input type="text" value="<?= $value['id'] ?>" name="id" id="id_solusi" hidden>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-danger d-flex btn-delete" type="submit"><i
                                                    class="ti ti-trash pe-2 fs-6 align-middle p-1" id="btn-delete"></i>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<!-- <script src="js/ajax_solusi.php"></script> -->
<!-- <script>
    $(document).ready(function () {
        $('#btn-simpan').click(function () {
            // alert('haiii')
            const formdata = new FormData($("#form-data-solusi")[0]);
            $.ajax({
                type: 'post',
                headers:{'X-Requested-With': 'XMLHttpRequest'},
                url: '/tambahbanner' ,
                data: formdata,
                dataType: "json",
                success: function (res) {
                    if (res.status) {
                        alert('anda berhasil menyimpan data');
                    }
                }
            })
        });
    })
    
</script> -->
<?php $this->endsection() ?>