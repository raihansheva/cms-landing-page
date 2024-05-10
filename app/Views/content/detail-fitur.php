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
                    <div class="modal-content">
                        <div class="modal-header border-bottom">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah detail Fitur</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Judul Detail :</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Masukan Nama Solusi">
                            </div>
                            <div class="col-12 d-flex">
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                </div>
                                <div class="col-6 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Gambar :</label>
                                    <input type="file" class="form-control" id="gambar"
                                        placeholder="Pilih Gambar">
                                        <div class="col-12 mt-2">
                                            <img src="#" alt="Pratinjau Gambar" id="preview" class="preview-image d-none image-fluid col-12" width="100%">
                                        </div>
                                </div>
                            </div>
                            <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                <label for="exampleFormControlInput1" class="form-label">Nama Fitur :</label>
                                <select name="" id="" class="form-select">
                                    <option value="">nama fitur</option>
                                    <option value="">nama fitur</option>
                                    <option value="">nama fitur</option>
                                    <option value="">nama fitur</option>
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
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Skrip DataTables -->
<script src="../node_modules/datatables.net.jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script>

<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tabelfitur').DataTable();
    });
    // image preview
    const inputGambar = document.getElementById('gambar');
        const pratinjauGambar = document.getElementById('preview');

        inputGambar.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function () {
                    pratinjauGambar.src = this.result;
                    pratinjauGambar.classList.remove('d-none');
                });

                reader.readAsDataURL(file);
            } else {
                pratinjauGambar.src = "#";
                pratinjauGambar.classList.add('d-none');
            }
        });
</script>
<?php $this->endsection() ?>