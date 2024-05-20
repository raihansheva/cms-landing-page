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
            <div class="col-8 d-flex align-center">
                <a href="/fitur" class="text-dark">
                    <i class="ti ti-chevron-left pe-4 align-middle p-1" style="font-size: 34px;"></i>
                </a>
                <h2>Detail Fitur</h2>
            </div>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah detail fitur</p>
                </button>
            </div>


            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <form action="/tambahdetailfitur" method="post" id="form-data-fitur" class="modal-dialog-scrollable"
                        enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah detail Fitur</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-12 ">
                                    <div class="ps-2" style="text-align: left;">
                                        <label for="exampleFormControlInput1"
                                            class="form-label d-flex justify-content-between">
                                            Layout : </label>
                                    </div>
                                    <div class="col-12 d-flex gap-2">
                                        <div class="mb-3 p-2 col" style="text-align: left;">
                                            <div class="col-12 border border-2 d-flex p-2" style="height: 150px;">
                                                <div class="col-6 border" style="height: 100%;"></div>
                                                <div class="col-6 p-2 d-block justify-content-end"
                                                    style="height: 100%;">
                                                    <div class="col-12 border mt-4"></div>
                                                    <div class="col-12 border mt-1" style="width: 60%;"></div>
                                                    <div class="col-12 border mt-1" style="width: 50%;"></div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-check  col-12 d-flex justify-content-center gap-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label d-flex justify-content-between">
                                                    A </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 p-2 col " style="text-align: left;">
                                            <div class="col-12 border border-2 d-flex p-2" style="height: 150px;">
                                                <div class="col-6 p-2 d-block justify-content-end"
                                                    style="height: 100%;">
                                                    <div class="col-12 border mt-4"></div>
                                                    <div class="col-12 border mt-1" style="width: 60%;"></div>
                                                    <div class="col-12 border mt-1" style="width: 50%;"></div>
                                                </div>
                                                <div class="col-6 border" style="height: 100%;"></div>
                                            </div>
                                            <br>
                                            <div class="form-check col-12 d-flex justify-content-center gap-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label d-flex justify-content-between">
                                                    B </label>
                                            </div>
                                        </div>
                                        <div class="mb-3 p-2 col" style="text-align: left;">
                                            <div class="col-12 border border-2 p-2" style="height: 150px;">
                                                <div class="col-12 border" style="height: 50%;"></div>
                                                <div class="col-12 p-2 d-block justify-content-end"
                                                    style="height: 100%;">
                                                    <div class="col-12 border mt-3"></div>
                                                    <div class="col-12 border mt-1" style="width: 60%;"></div>
                                                    <div class="col-12 border mt-1" style="width: 50%;"></div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-check col-12 d-flex justify-content-center gap-1">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1">
                                                <label for="exampleFormControlInput1"
                                                    class="form-label d-flex justify-content-between">
                                                    C </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Judul Detail :</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="Masukan judul detail" name="judul_detail">
                                </div>
                                <div class="col-12 d-flex">
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="7.5"
                                            name="deskripsi"></textarea>
                                    </div>
                                    <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                        <input type="file" class="form-control" id="gambar" placeholder="Pilih Gambar"
                                            name="gambar">
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
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <input type="text" value="<?= $idF ?>" name="id_fitur" id="id_fitur" hidden>
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
                        <th scope="col">Judul Detail</th>
                        <th scope="col">Nama Fitur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Layout</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Skrip jQuery -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Skrip DataTables -->
<script src="../node_modules/datatables.net.jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>

<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="js/detail-fitur.js"></script> -->
<script>
    $(document).ready(function () {
        const idF = document.getElementById('#id_fitur');
        const iff = idF.value;
        console.log(iff);
        $('#tabelfitur').DataTable();
    });
</script>
<?php $this->endsection() ?>