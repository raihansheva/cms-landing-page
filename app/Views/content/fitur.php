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
                <a href="/detail-fitur">
                    <button class="btn d-flex" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white;"><i
                            class="ti ti-list-details pe-2 fs-6 align-middle p-1 "></i>
                        <p class="m-0 p-1 align-middle">Detail fitur</p>
                    </button>
                </a>
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
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Fitur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Nama Fitur :</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama Solusi">
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                    <textarea class="form-control" rows="7.5" name="editor1" id="editor1"
                                        cols="80"></textarea>
                                </div>
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Icon :</label>
                                    <input type="file" class="form-control"
                                        placeholder="Pilih Gambar" id="gambar">
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

                                <select name="" id="" class="form-select">
                                    <option value="">nama solusi</option>
                                    <option value="">nama solusi</option>
                                    <option value="">nama solusi</option>
                                    <option value="">nama solusi</option>
                                </select>
                            </div>

                        </div>
                        <div class="modal-footer border-top pe-4">
                            <button class="btn d-flex" type="button" style="background-color: #03C988; color:white;"><i
                                    class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                                <p class="m-0 p-1 align-middle">Simpan</p>
                            </button>
                        </div>
                    </div>
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
                        <th scope="col">Judul</th>
                        <th scope="col">Nama Fitur</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Icon</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>Yaho</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>Yaho</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                        <td>Yaho</td>
                        <td></td>
                        <td></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Skrip jQuery -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Skrip DataTables -->
<script src="../node_modules/datatables.net.jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/fitur.js"></script>
<script>
    $(document).ready(function () {
        $('#tabelfitur').DataTable();
        // CKEDITOR.replace('editor1');
    });
</script>
<?php $this->endsection() ?>