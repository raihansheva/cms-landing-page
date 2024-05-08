<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <h2>Solusi</h2>
            <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahsolusi"
                style="background-color: #03C988; color:white;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                <p class="m-0 p-1 align-middle">Tambah solusi</p>
            </button>

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
        <div class="col-12 d-flex gap-2 flex-wrap-wrap" style="border: 1px black;">
            <div class="card col" style="padding: 24px; height: 310px;">
                <div class="card-kanan-atas">
                    <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModaleditbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaleditbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukan Nama Solusi">
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Solusi
                                            :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar / Icon :</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Pilih Gambar">
                                    </div>
                                </div>
                                <div class="modal-footer border-top pe-4">
                                    <button class="btn d-flex" type="button"
                                        style="background-color: #03C988; color:white;"><i
                                            class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ikon hapus -->
                    <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalhapusbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalhapusbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 250px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-danger d-flex" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaltambahsolusi"><i
                                            class="ti ti-trash pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Hapus</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="" alt="" width="120px" height="120px">
                </div>
                <div class="col-12 text-center p-0 mt-3">
                    <h4>nama solusi</h4>
                </div>
                <div class="col-12 text-center">
                    <p>deskripsi solusi.....</p>
                </div>
            </div>
            <div class="card col" style="padding: 24px; height: 310px;">
                <div class="card-kanan-atas">
                    <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModaleditbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaleditbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukan Nama Solusi">
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Solusi
                                            :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar / Icon :</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Pilih Gambar">
                                    </div>
                                </div>
                                <div class="modal-footer border-top pe-4">
                                    <button class="btn d-flex" type="button"
                                        style="background-color: #03C988; color:white;"><i
                                            class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ikon hapus -->
                    <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalhapusbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalhapusbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 250px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-danger d-flex" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaltambahsolusi"><i
                                            class="ti ti-trash pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Hapus</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="" alt="" width="120px" height="120px">
                </div>
                <div class="col-12 text-center p-0 mt-3">
                    <h4>nama solusi</h4>
                </div>
                <div class="col-12 text-center">
                    <p>deskripsi solusi.....</p>
                </div>
            </div>
            <div class="card col" style="padding: 24px; height: 310px;">
                <div class="card-kanan-atas">
                    <i class="ti ti-pencil" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModaleditbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModaleditbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Solusi :</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Masukan Nama Solusi">
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Solusi
                                            :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1"
                                            rows="4"></textarea>
                                    </div>
                                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                        <label for="exampleFormControlInput1" class="form-label">Gambar / Icon :</label>
                                        <input type="file" class="form-control" id="exampleFormControlInput1"
                                            placeholder="Pilih Gambar">
                                    </div>
                                </div>
                                <div class="modal-footer border-top pe-4">
                                    <button class="btn d-flex" type="button"
                                        style="background-color: #03C988; color:white;"><i
                                            class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Simpan perubahan</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ikon hapus -->
                    <i class="ti ti-x" style="font-size: 30px;" type="button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalhapusbanner"></i>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalhapusbanner" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="width: 250px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Solusi</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center">Yakin ingin hapus solusi ini?</p>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button class="btn btn-danger d-flex" type="button" data-bs-toggle="modal"
                                        data-bs-target="#exampleModaltambahsolusi"><i
                                            class="ti ti-trash pe-2 fs-6 align-middle p-1 "></i>
                                        <p class="m-0 p-1 align-middle">Hapus</p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <img src="" alt="" width="120px" height="120px">
                </div>
                <div class="col-12 text-center p-0 mt-3">
                    <h4>nama solusi</h4>
                </div>
                <div class="col-12 text-center">
                    <p>deskripsi solusi.....</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endsection() ?>