// const InputText = document.getElementById('inputjudul');
// const Limit = document.getElementById('limit');
// const limit = 255;

// Limit.textContent = 0 + "/" + limit;

// InputText.addEventListener('input', function () {
//     const textlength = InputText.value.length;
//     Limit.textContent = textlength + "/" + limit;
// })

// const InputText2 = document.getElementById('inputjudul2');
// const Limit2 = document.getElementById('limit2');
// const limit2 = 255;

// Limit2.textContent = 0 + "/" + limit2;

// InputText2.addEventListener('input', function () {
//     const textlength2 = InputText2.value.length;
//     Limit2.textContent = textlength2 + "/" + limit2;
// })


// image preview
const inputGambar = document.getElementById('gambar');
const pratinjauGambar = document.getElementById('preview');
const tombolHapusGambar = document.getElementById('hapusGambar');

inputGambar.addEventListener('change', function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
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

tombolHapusGambar.addEventListener('click', function () {
    pratinjauGambar.src = "#";
    pratinjauGambar.classList.add('d-none');
    tombolHapusGambar.classList.add('d-none');
    inputGambar.value = ""; // Menghapus file dari input file
});

const inputGambar2 = document.getElementById('gambar2');
const pratinjauGambar2 = document.getElementById('preview2');
const tombolHapusGambar2 = document.getElementById('hapusGambar2');

inputGambar2.addEventListener('change', function () {
    const file2 = this.files[0];

    if (file2) {
        const reader2 = new FileReader();
        reader2.addEventListener('load', function () {
            pratinjauGambar2.src = this.result;
            pratinjauGambar2.classList.remove('d-none');
            tombolHapusGambar2.classList.remove('d-none');
        });
        reader2.readAsDataURL(file);
    } else {
        pratinjauGambar2.src = "#";
        pratinjauGambar2.classList.add('d-none');
        tombolHapusGambar2.classList.add('d-none');
    }
});

tombolHapusGambar2.addEventListener('click', function () {
    pratinjauGambar2.src = "#";
    pratinjauGambar2.classList.add('d-none');
    tombolHapusGambar2.classList.add('d-none');
    inputGambar2.value = ""; // Menghapus file dari input file
});