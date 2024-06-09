    // tambah gambar
    const inputGambar = document.getElementById('gambar');
    const pratinjauGambar = document.getElementById('preview');
    const tombolHapusGambar = document.getElementById('hapusGambar');

    inputGambar.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();
            reader.addEventListener('load', function() {
                pratinjauGambar.src = this.result;
                pratinjauGambar.classList.remove('d-none');
                tombolHapusGambar.classList.remove('d-none');
            });
            reader.readAsDataURL(file);
        } else {
            pratinjauGambar.src = "#";
            pratinjauGambar.classList.add('d-none');
            tombolHapusGambar.classList.add('d-none');
        }
    });

    tombolHapusGambar.addEventListener('click', function() {
        pratinjauGambar.src = "#";
        pratinjauGambar.classList.add('d-none');
        tombolHapusGambar.classList.add('d-none');
        inputGambar.value = ""; // Menghapus file dari input file
    });

    const inputGambarubah = document.getElementById('gambarUbah');
    const pratinjauGambarubah = document.getElementById('previewUbah');
    const tombolHapusGambarubah = document.getElementById('hapusGambarUbah');

    inputGambarubah.addEventListener('change', function() {
        const fileubah = this.files[0];

        if (fileubah) {
            const readerubah = new FileReader();
            readerubah.addEventListener('load', function() {
                pratinjauGambarubah.src = this.result;
                pratinjauGambarubah.classList.remove('d-none');
                tombolHapusGambarubah.classList.remove('d-none');
            });
            readerubah.readAsDataURL(fileubah);
        } else {
            pratinjauGambarubah.src = "#";
            pratinjauGambarubah.classList.add('d-none');
            tombolHapusGambarubah.classList.add('d-none');
        }
    });

    tombolHapusGambarubah.addEventListener('click', function() {
        pratinjauGambarubah.src = "#";
        pratinjauGambarubah.classList.add('d-none');
        tombolHapusGambarubah.classList.add('d-none');
        inputGambarubah.value = ""; // Menghapus file dari input file
    });
// validasi foto
function validateFile() {
    const fileInput = document.getElementById('gambar');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
    const errorMessage = document.getElementById('fileErrorTambah');

    if (!allowedExtensions.exec(filePath)) {
        errorMessage.innerText = 'Harap unggah file dengan tipe .jpeg, .jpg, atau .png.';
        fileInput.value = '';
        return false;
    }

    if (fileInput.files[0].size > maxSize) {
        errorMessage.innerText = 'Ukuran file terlalu besar. Maksimum 2MB.';
        fileInput.value = '';
        return false;
    }

    errorMessage.innerText = '';
    return true;
}

function validateFileEdit() {
    const fileInput = document.getElementById('gambarUbah');
    const filePath = fileInput.value;
    const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
    const errorMessage = document.getElementById('fileErrorEdit');

    if (!allowedExtensions.exec(filePath)) {
        errorMessage.innerText = 'Harap unggah file dengan tipe .jpeg, .jpg, atau .png.';
        fileInput.value = '';
        return false;
    }

    if (fileInput.files[0].size > maxSize) {
        errorMessage.innerText = 'Ukuran file terlalu besar. Maksimum 2MB.';
        fileInput.value = '';
        return false;
    }

    errorMessage.innerText = '';
    return true;
}
const InputText = document.getElementById("inputjudul");
const Limit = document.getElementById("limit");
const Limitt = document.getElementById("limit2");
const limit = 30;

Limit.textContent = "0/" + limit;

InputText.addEventListener("input", function () {
  const textlength = InputText.value.length;
  Limit.textContent = textlength + "/" + limit;

  if (textlength > limit) {
    Limit.classList.add("warning");
    // alert("Input tidak boleh lebih dari 45 karakter.");
    InputText.value = InputText.value.substring(0, limit);
    Limit.textContent = limit + "/" + limit;
    Limitt.innerText ="Input tidak boleh lebih dari 45 karakter.";
} else {
    Limit.classList.remove("warning");
    Limitt.innerText ="";
  }
});
const InputTextS = document.getElementById("inputjudulS");
const LimitS = document.getElementById("limitS");
const LimittS = document.getElementById("limit2S");
const limitS = 30;

const textlengthS1 = InputTextS.value.length;
LimitS.textContent = textlengthS1 + "/" + limitS;

InputTextS.addEventListener("input", function() {
    const textlengthS = InputTextS.value.length;
    LimitS.textContent = textlengthS + "/" + limitS;

    if (textlengthS > limitS) {
        LimitS.classList.add("warning");
        // alert("Input tidak boleh lebih dari 45 karakter.");
        InputTextS.value = InputTextS.value.substring(0, limitS);
        LimitS.textContent = limitS + "/" + limitS;
        LimittS.innerText = "Input tidak boleh lebih dari 30 karakter.";
    } else {
        LimitS.classList.remove("warning");
        LimittS.innerText = "";
    }
});

const InputTextEdit1 = document.getElementById("nama_fitur_ubah");
const LimitEdit1 = document.getElementById("limitedit1");
const LimittEdit1 = document.getElementById("limit2edit1");
const limitEdit1 = 30;


const textlengthEdit12 = InputTextEdit1.value.length;
// console.log(textlengthEdit12);
LimitEdit1.textContent = textlengthEdit12 + "/" + limitEdit1;

InputTextEdit1.addEventListener("input", function () {
  const textlengthEdit1 = InputTextEdit1.value.length;
  console.log(textlengthEdit1);
  LimitEdit1.textContent = textlengthEdit1 + "/" + limitEdit1;

  if (textlengthEdit1 > limitEdit1) {
    LimitEdit1.classList.add("warning");
    // alert("Input tidak boleh lebih dari 45 karakter.");
    InputTextEdit1.value = InputTextEdit1.value.substring(0, limitEdit1);
    LimitEdit1.textContent = limitEdit1 + "/" + limitEdit1;
    LimittEdit1.innerText ="Input tidak boleh lebih dari 30 karakter.";
} else {
    LimitEdit1.classList.remove("warning");
    LimittEdit1.innerText ="";
  }
});
$(document).ready(function () {
    $('#tabelfitur').DataTable({
        "order": [[5, "asc"]],
        "pageLength": 5,

        processing: true,
        serverSide: true,
        ajax: {
            url: '/fitur/getdatafitur',
        },
        language: {
            "sEmptyTable": "Tidak ada data yang tersedia di tabel",
            "sInfo": "",
            "sInfoEmpty": "",
            "sInfoFiltered": "(disaring dari MAX total entri)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "",
            "sLoadingRecords": "Memuat...",
            "sProcessing": "",
            "sSearch": "Cari:",
            "sZeroRecords": "Tidak ada data yang cocok ditemukan",
            "oAria": {
                "sSortAscending": ": aktifkan untuk mengurutkan kolom secara meningkat",
                "sSortDescending": ": aktifkan untuk mengurutkan kolom secara menurun"
            }
        },
        columns: [{
            data: 'nama_fitur',
        },
        {
            data: 'deskripsiF',
        },
        {
            data: 'nama_solusi',
        },
        {
            data: 'icon',
            render: function (data, type, row) {
                // console.log(row);
                return '<img src="'+ row.icon +'" alt="" width="40px" height="40px">'
            },
        },
        {
            data: 'idF',
            render: function (data, type, row) {
                // console.log(row);
                return '<div class="d-flex gap-2"><a class="btn btn-primary d-flex btn-sm" href="/detail-fitur/'+ data +'"><i class="ti ti-list-details pe-2 fs-6 align-middle p-1 "></i><p class="m-0 p-1 align-middle">Detail</p></a><button type="button" class="btn d-flex btn-sm btn-edit" style="background-color: #03C988; color:white;" data-id="' + data + '" data-nama_fitur="' + row.nama_fitur + '" data-deskripsi="'+ row.deskripsiF +'" data-idS="'+ row.id_solusi +'" data-icon="'+ row.icon +'"> <i class="ti ti-edit pe-2 fs-6 align-middle p-1 "></i> <p class="m-0 p-1 align-middle">Ubah</p></button><button type="button" class="btn btn-danger d-flex btn-sm btn-hapus" data-id="' + data + '"><i class="ti ti-trash pe-2 fs-6 align-middle p-1 "></button></div>'
            },
            orderable: false
        },
        ]
    });
    //$('#tabelfitur').DataTable();
    $('#tabelfitur').on("click", '.btn-edit', function () {
        let id = $(this).data('id');
        let nama = $(this).data('nama_fitur');
        let desk = $(this).data('deskripsi');
        let idS = $(this).data('idS');
        // alert(id);
        $('#id_fitur').val(id)
        $('#nama_fitur_ubah').val(nama)
        $('#deskripsi_ubah').val(desk)
        $('#id_solusi_ubah').val(idS)
        $('#exampleModaleditfitur').modal('show')
    });

    $('#tabelfitur').on("click", '.btn-hapus', function () {
        let id = $(this).data('id');
        $('#id_fitur_hapus').val(id)
        // alert(id);
        $('#exampleModalhapusfitur').modal('show')
    });

});