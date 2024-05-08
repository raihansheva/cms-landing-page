<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/libs/bootstrap/dist/css/bootstrap.bundle.min.css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css"> -->
<link href="../assets/datatabel/datatables.min.css" rel="stylesheet">

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Fitur</h2>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Detail fitur</p>
                </button>
                <button class="btn d-flex" type="button" data-bs-toggle="modal"
                    data-bs-target="#exampleModaltambahsolusi" style="background-color: #03C988; color:white;"><i
                        class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah fitur</p>
                </button>
            </div>


            <!-- Modal Tambah Banner -->
            <div class="modal fade" id="exampleModaltambahsolusi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Solusi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama Solusi">
                            </div>
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Solusi :</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Gambar / Icon :</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Pilih Gambar">
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
            <table id="tabel-fitur" class="table col-12 " style="height: auto;">
                <thead class="">
                    <tr class="p-2">
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js
"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js
"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js"></script>
<script src="../assets/datatabel/datatables.min.js"></script>
<script src="../js/datatabel.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<?php $this->endsection() ?>