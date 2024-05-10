const InputText = document.getElementById('inputjudul');
const Limit = document.getElementById('limit');
const limit = 255;

Limit.textContent = 0 + "/" + limit;

InputText.addEventListener('input', function () {
    const textlength = InputText.value.length;
    Limit.textContent = textlength + "/" + limit;
})

const InputText2 = document.getElementById('inputjudul2');
const Limit2 = document.getElementById('limit2');
const limit2 = 255;

Limit2.textContent = 0 + "/" + limit2;

InputText2.addEventListener('input', function () {
    const textlength2 = InputText2.value.length;
    Limit2.textContent = textlength2 + "/" + limit2;
})


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

        // multiple input
        //     pratinjauGambar.innerHTML = ""; // Membersihkan pratinjau sebelum menambahkan yang baru

        // const files = this.files;
        // if (files) {
        //     for (let i = 0; i < files.length; i++) {
        //         const file = files[i];
        //         const reader = new FileReader();

        //         reader.addEventListener('load', function () {
        //             const imgElement = document.createElement('img');
        //             imgElement.src = this.result;
        //             imgElement.classList.add('preview-image');
        //             imgElement.classList.add('col-12');
        //             imgElement.classList.add('mt-2');
        //             pratinjauGambar.appendChild(imgElement);
        //             // tombolHapusGambar.classList.remove('d-none');
        //         });

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