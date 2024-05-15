<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="https://cdn.datatables.net/v/ju/dt-2.0.7/datatables.min.css" rel="stylesheet">
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link
    href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css"
    rel="stylesheet">


<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">

            <h2>Fitur</h2>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah fitur</p>
                </button>
            </div>


            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Fitur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Fitur :</label>
                                    <input type="text" class="form-control" id="nama_fitur"
                                        placeholder="Masukan Nama Solusi" name="nama_fitur">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" rows="7.5" id="deskripsi" cols="80"
                                            name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Icon :</label>
                                        <input type="file" class="form-control" placeholder="Pilih Gambar" id="icon"
                                            name="icon">
                                        <div class="col-12 mt-2 text-end">
                                            <i class="ti ti-x d-none" type="button" id="hapusGambar"
                                                style="font-size: 24px"></i>
                                            <img src="#" alt="Pratinjau Gambar" id="preview"
                                                class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>

                                    <select name="id_solusi" id="id_solusi" class="form-select">
                                        <option value="1">nama solusi</option>
                                        <option value="2">nama solusi</option>
                                        <option value="3">nama solusi</option>
                                        <option value="4">nama solusi</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit"
                                    style="background-color: #03C988; color:white;"><i
                                        class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
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
        <div class="col-12 " style="height: 100%;">
            <table id="tabelfitur" class="table col-12 " style="height: auto;">
                <thead class="">
                    <tr class="p-2">
                        <th scope="col">No</th>
                        <th scope="col">Nama Fitur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Nama Solusi</th>
                        <th scope="col">Icon</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($fitur as $key => $value) { ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value['nama_fitur'] ?></td>
                            <td><?php echo $value['deskripsi'] ?></td>
                            <td><?php echo $value['id_solusi'] ?></td>
                            <td class=""><img src="<?php echo $value['icon'] ?>" alt=""
                                    class="border" width="40px" height="40px"></td>
                            <td class="m-0 p-1 d-flex gap-2">
                                <a href="/detail-fitur">
                                    <!-- Button modal detail -->
                                    <button class="btn btn-primary d-flex" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaldetailfitur"><i
                                            class="ti ti-list-details pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Detail</p>
                                    </button>
                                </a>
                                <!-- Button modal ubah -->
                                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModaleditfitur<?php echo $value['id'] ?>"
                                    style="background-color: #03C988; color:white;"><i
                                        class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                    <p class="m-0 p-1 align-middle">Ubah</p>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModaleditfitur<?php echo $value['id'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                        <form action="/ubahfitur" method="post" id="form-data-fitur"
                                            class="modal-dialog-scrollable" enctype="multipart/form-data">
                                            <?= csrf_field(); ?>
                                            <div class="modal-content">
                                                <div class="modal-header border-bottom">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Fitur</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" value="<?php echo $value['id'] ?>" name="id" id="id" hidden>
                                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama Fitur
                                                            :</label>
                                                        <input type="text" class="form-control" id="nama_fitur"
                                                            placeholder="Masukan Nama Solusi" name="nama_fitur"
                                                            value="<?php echo $value['nama_fitur'] ?>">
                                                    </div>
                                                    <div class="col-12 d-flex">
                                                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                            <label for="exampleFormControlTextarea1"
                                                                class="form-label">Deskripsi:</label>
                                                            <textarea class="form-control" rows="7.5" id="deskripsi"
                                                                cols="80"
                                                                name="deskripsi"><?php echo $value['deskripsi'] ?></textarea>
                                                        </div>
                                                        <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                                            <label for="exampleFormControlInput1" class="form-label">Icon
                                                                :</label>
                                                            <input type="file" class="form-control"
                                                                placeholder="Pilih Gambar" id="icon" name="icon">
                                                            <div class="col-12 mt-2 text-end">
                                                                <i class="ti ti-x d-none" type="button" id="hapusGambar"
                                                                    style="font-size: 24px"></i>
                                                                <img src="#" alt="Pratinjau Gambar" id="preview"
                                                                    class="preview-image d-none image-fluid col-12"
                                                                    width="100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                                        <label for="exampleFormControlInput1" class="form-label">Nama Solusi
                                                            :</label>

                                                        <select name="id_solusi" id="id_solusi" class="form-select">
                                                            <option value="nama solusi 1">nama solusi 1</option>
                                                            <option value="nama solusi 2">nama solusi 2</option>
                                                            <option value="nama solusi 3">nama solusi 3</option>
                                                            <option value="nama solusi 4">nama solusi 4</option>
                                                        </select>
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
                                <!-- Button modal hapus -->
                                <button class="btn btn-danger d-flex" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalhapusfitur<?php echo $value['id'] ?>"><i
                                        class="ti ti-trash pe-2 fs-6 align-middle p-1 "></i>
                                    <!-- <p class="m-0 p-1 align-middle">Hapus</p> -->
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalhapusfitur<?php echo $value['id'] ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="width: 250px;">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="/hapusfitur" method="post" id="form-data-hapus">
                                                <?= csrf_field(); ?>
                                                <div class="modal-body">
                                                    <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                                    <input type="text" value="<?= $value['id'] ?>" name="id" id="id_solusi" hidden>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-danger d-flex btn-delete" type="submit"><i
                                                            class="ti ti-trash pe-2 fs-6 align-middle p-1"
                                                            id="btn-delete"></i>
                                                        <p class="m-0 p-1 align-middle">Hapus</p>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Skrip jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
<!-- Skrip DataTables -->
<!-- <script src="../node_modules/datatables.net-jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script> -->
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/ajax_fitur.js"></script> -->
<!-- <script src="js/fitur.js"></script> -->
<script>
    $(document).ready(function () {
        $('#tabelfitur').DataTable();
    });
</script>
<?php $this->endsection() ?>