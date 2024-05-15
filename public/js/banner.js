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