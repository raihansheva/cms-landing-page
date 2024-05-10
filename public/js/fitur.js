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