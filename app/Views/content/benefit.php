<?php $this->extend('layout/main') ?>
<?php $this->section('content') ?>
<link rel="stylesheet" href="css/style-konten.css">
<link rel="stylesheet" href="../assets/css/styles.min.css" />
<link href="assets/bootsrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php base_url('DataTables/datatables.min.css') ?>" rel="stylesheet">
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.6/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/poppins/font.css')  ?>">
<style>
    * {
        font-family: 'poppins', sans-serif;
    }
</style>

<div class="bungkus">
    <div class="konten-banner">
        <!-- <div class="area-banner">
    </div> -->
        <div class="col-12 d-flex justify-content-between">
            <div class="col-8 d-flex align-center">
                <a href="/paketharga" class="text-dark">
                    <i class="ti ti-chevron-left pe-4 align-middle p-1" style="font-size: 34px;"></i>
                </a>
                <h3 class="pt-1">Benefit / <?= $namaP ?></h3>
            </div>
            <div class="col-4 d-flex gap-2 justify-content-end">
                <button class="btn d-flex" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaltambahfitur" style="background-color: #03C988; color:white;"><i class="ti ti-plus pe-2 fs-6 align-middle p-1 "></i>
                    <p class="m-0 p-1 align-middle">Tambah benefit</p>
                </button>
            </div>


            <!-- Modal Tambah fitur -->
            <div class="modal fade" id="exampleModaltambahfitur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <form action="/tambahbenefit" method="post">
                        <div class="modal-content">
                            <div class="modal-header border-bottom">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah benefit</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlInput1" class="form-label">Nama Paket
                                        :</label>
                                    <input type="text" name="id_paket_harga" id="id_paket_harga" class="form-control" value="<?= $id ?>" hidden>
                                    <input type="text" name="namaP" id="namaP" class="form-control" value="<?= $namaP ?>" readonly>
                                </div>
                                <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                                    <label for="exampleFormControlTextarea1" class="form-label">Benefit :</label>
                                    <textarea class="form-control" id="nama_benefit" rows="8.5" name="nama_benefit"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer border-top pe-4">
                                <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
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
            <table id="tabelbenefit" class="table col-12 " style="height: auto; background-color: white; border-radius: 10px;">
                <thead class="">
                    <tr class="p-2">
                        <!-- <th scope="col" class="d-none">Id Paket</th> -->
                        <th scope="col">Nama Paket</th>
                        <th scope="col">Benefit</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalubahbenefit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <form action="/ubahbenefit" method="post">
            <div class="modal-content">
                <div class="modal-header border-bottom">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah benefit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 p-2 pt-0" style="text-align: left;">
                        <input type="text" name="id" id="id" hidden>
                        <label for="exampleFormControlInput1" class="form-label">Nama Paket
                            :</label>
                        <input type="text" name="id_paket_harga" id="id_paket_harga_ubah" class="form-control" value="<?= $id ?>" hidden>
                        <input type="text" name="namaP" id="namaP" class="form-control" value="<?= $namaP ?>" readonly>
                    </div>
                    <div class="col-12 mb-3 p-2 pt-0" style="text-align: left;">
                        <label for="exampleFormControlTextarea1" class="form-label">Benefit :</label>
                        <textarea class="form-control" id="nama_benefit_ubah" rows="8.5" name="nama_benefit"></textarea>
                    </div>
                </div>
                <div class="modal-footer border-top pe-4">
                    <button class="btn d-flex" type="submit" style="background-color: #03C988; color:white;"><i class="ti ti-download pe-2 fs-6 align-middle p-1 "></i>
                        <p class="m-0 p-1 align-middle">Simpan</p>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalhapusbenefit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 250px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus benefit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/hapusbenefit" method="post" id="form-data-hapus">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-center">Yakin ingin hapus benefit ini?</p>
                    <input type="text" value="" name="id" id="id_benefit_hapus" hidden>
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
<!-- Skrip jQuery -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- Skrip DataTables -->
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>
<!-- <script src="../node_modules/datatables.net-jqui/js/dataTables.jqueryui.min.js"></script>
<script src="../node_modules/datatables.net/js/dataTables.min.js"></script> -->
<!-- <script src="js/detail-fitur.js"></script> -->
<script src="../assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
<?= session()->getFlashdata('sweetalert'); ?>
<script>
    $(document).ready(function() {
        $('#tabelbenefit').DataTable({
            "order": [
                [0, "desc"]
            ],
            "pageLength": 5,
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= site_url('/benefit/getdatabenefit/' . $idB) ?>'

            },
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia di tabel",
                "sInfo": "Menampilkan START hingga END dari TOTAL entri",
                "sInfoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari MAX total entri)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Tampilkan MENU",
                "sLoadingRecords": "Memuat...",
                "sProcessing": "Memproses...",
                "sSearch": "Cari:",
                "sZeroRecords": "Tidak ada data yang cocok ditemukan",
                "oAria": {
                    "sSortAscending": ": aktifkan untuk mengurutkan kolom secara meningkat",
                    "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
                }
            },
            columns: [{
                    data: 'nama_paket',
                },
                {
                    data: 'nama_benefit',
                },
                {
                    data: 'idP',
                    render: function(data, type, row) {
                        return '<div class="d-flex gap-2 justify-content-end"><button type="button" class="btn d-flex btn-sm btn-edit-benefit" style="background-color: #03C988; color:white;" data-id="' + data + '" data-id_paket_harga="' + row.id_paket_harga + '" data-nama_benefit="' + row.nama_benefit + '" > <i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i> <p class="m-0 p-1 align-middle">Ubah</p></button><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus-benefit" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
                    },
                    orderable: false
                }
            ]
        });
        //$('#tabelfitur').DataTable();
        $('#tabelbenefit').on("click", '.btn-edit-benefit', function() {
            let id = $(this).data('id');
            let idPaket = $(this).data('id_paket_harga');
            let benefit = $(this).data('nama_benefit');
            // alert(id);
            $('#id').val(id)
            $('#id_paket_harga').val(idPaket)
            $('#nama_benefit_ubah').val(benefit)
            $('#exampleModalubahbenefit').modal('show')
        });

        $('#tabelbenefit').on("click", '.btn-hapus-benefit', function() {
            let id = $(this).data('id');
            $('#id_benefit_hapus').val(id)
            // alert(id);
            $('#exampleModalhapusbenefit').modal('show')
        });
    });
    // });
</script>
<?php $this->endsection() ?>