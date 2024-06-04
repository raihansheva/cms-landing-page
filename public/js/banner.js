// function limit() {
const InputText = document.getElementById("inputjudul");
const Limit = document.getElementById("limit");
const Limitt = document.getElementById("limit2");
const limit = 45;

Limit.textContent = "0/" + limit;

InputText.addEventListener("input", function () {
  const textlength = InputText.value.length;
  Limit.textContent = textlength + "/" + limit;

  if (textlength > limit) {
    Limit.classList.add("warning");
    // alert("Input tidak boleh lebih dari 45 karakter.");
    InputText.value = InputText.value.substring(0, limit);
    Limit.textContent = limit + "/" + limit;
    Limitt.innerText = "Input tidak boleh lebih dari 45 karakter.";
  } else {
    Limit.classList.remove("warning");
    Limitt.innerText = "";
  }
});
// }

// function limitCharacter(inputElement, maxChars) {
//   const charCountDisplay = inputElement.nextElementSibling;
//   const currentLength = inputElement.value.length;

//   if (currentLength > maxChars) {
//     inputElement.value = inputElement.value.substring(0, maxChars);
//   }

//   const remainingChars = maxChars - inputElement.value.length;
//   charCountDisplay.textContent = `${remainingChars}/${maxChars}`;
// }
function limitText(input, limit1, limit2) {
  const InputTextEdit1 = document.getElementById(input);
  const LimitEdit1 = document.getElementById(limit1);
  const LimittEdit1 = document.getElementById(limit2);
  const limitEdit1 = 45;

  LimitEdit1.textContent = "0/" + limitEdit1;

  InputTextEdit1.addEventListener("input", function () {
    const textlengthEdit1 = InputTextEdit1.value.length;
    LimitEdit1.textContent = textlengthEdit1 + "/" + limitEdit1;

    if (textlengthEdit1 > limitEdit1) {
      LimitEdit1.classList.add("warning");
      // alert("Input tidak boleh lebih dari 45 karakter.");
      InputTextEdit1.value = InputTextEdit1.value.substring(0, limitEdit1);
      LimitEdit1.textContent = limitEdit1 + "/" + limitEdit1;
      LimittEdit1.innerText = "Input tidak boleh lebih dari 45 karakter.";
    } else {
      LimitEdit1.classList.remove("warning");
      LimittEdit1.innerText = "";
    }
  });
}

// image preview
const inputGambar = document.getElementById("gambar");
const pratinjauGambar = document.getElementById("preview");
const tombolHapusGambar = document.getElementById("hapusGambar");

inputGambar.addEventListener("change", function () {
  const file = this.files[0];

  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      pratinjauGambar.src = this.result;
      pratinjauGambar.classList.remove("d-none");
      tombolHapusGambar.classList.remove("d-none");
    });
    reader.readAsDataURL(file);
  } else {
    pratinjauGambar.src = "#";
    pratinjauGambar.classList.add("d-none");
    tombolHapusGambar.classList.add("d-none");
  }
});

tombolHapusGambar.addEventListener("click", function () {
  pratinjauGambar.src = "#";
  pratinjauGambar.classList.add("d-none");
  tombolHapusGambar.classList.add("d-none");
  inputGambar.value = ""; // Menghapus file dari input file
});

// const inputGambar2 = document.getElementById('gambar2');
// const pratinjauGambar2 = document.getElementById('preview2');
// const tombolHapusGambar2 = document.getElementById('hapusGambar2');

// inputGambar2.addEventListener('change', function () {
//     const file2 = this.files[0];

//     if (file2) {
//         const reader2 = new FileReader();
//         reader2.addEventListener('load', function () {
//             pratinjauGambar2.src = this.result;
//             pratinjauGambar2.classList.remove('d-none');
//             tombolHapusGambar2.classList.remove('d-none');
//         });
//         reader2.readAsDataURL(file);
//     } else {
//         pratinjauGambar2.src = "#";
//         pratinjauGambar2.classList.add('d-none');
//         tombolHapusGambar2.classList.add('d-none');
//     }
// });

// tombolHapusGambar2.addEventListener('click', function () {
//     pratinjauGambar2.src = "#";
//     pratinjauGambar2.classList.add('d-none');
//     tombolHapusGambar2.classList.add('d-none');
//     inputGambar2.value = ""; // Menghapus file dari input file
// });

// validasi foto
function validateFile() {
  const fileInput = document.getElementById("gambar");
  const filePath = fileInput.value;
  const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
  const errorMessage = document.getElementById("fileErrorTambah");

  if (!allowedExtensions.exec(filePath)) {
    errorMessage.innerText =
      "Tipe file tidak valid. Harap unggah file dengan tipe .jpeg, .jpg, atau .png.";
    fileInput.value = "";
    return false;
  }

  if (fileInput.files[0].size > maxSize) {
    errorMessage.innerText = "Ukuran file terlalu besar. Maksimum 2MB.";
    fileInput.value = "";
    return false;
  }

  errorMessage.innerText = "";
  return true;
}

function validateFileEditA() {
  const fileInput = document.getElementById("gambar2A");
  const filePath = fileInput.value;
  const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
  const errorMessage = document.getElementById("fileErrorEditA");

  if (!allowedExtensions.exec(filePath)) {
    errorMessage.innerText =
      "Harap unggah file dengan tipe .jpeg, .jpg, atau .png.";
    fileInput.value = "";
    return false;
  }

  if (fileInput.files[0].size > maxSize) {
    errorMessage.innerText = "Ukuran file terlalu besar. Maksimum 2MB.";
    fileInput.value = "";
    return false;
  }

  errorMessage.innerText = "";
  return true;
}
function validateFileEditB() {
  const fileInput = document.getElementById("gambar2B");
  const filePath = fileInput.value;
  const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
  const errorMessage = document.getElementById("fileErrorEditB");

  if (!allowedExtensions.exec(filePath)) {
    errorMessage.innerText =
      "Harap unggah file dengan tipe .jpeg, .jpg, atau .png.";
    fileInput.value = "";
    return false;
  }

  if (fileInput.files[0].size > maxSize) {
    errorMessage.innerText = "Ukuran file terlalu besar. Maksimum 2MB.";
    fileInput.value = "";
    return false;
  }

  errorMessage.innerText = "";
  return true;
}
function validateFileEditC() {
  const fileInput = document.getElementById("gambar2C");
  const filePath = fileInput.value;
  const allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
  const maxSize = 2 * 1024 * 1024; // Ukuran maksimum 2MB
  const errorMessage = document.getElementById("fileErrorEditC");

  if (!allowedExtensions.exec(filePath)) {
    errorMessage.innerText =
      "Harap unggah file dengan tipe .jpeg, .jpg, atau .png.";
    fileInput.value = "";
    return false;
  }

  if (fileInput.files[0].size > maxSize) {
    errorMessage.innerText = "Ukuran file terlalu besar. Maksimum 2MB.";
    fileInput.value = "";
    return false;
  }

  errorMessage.innerText = "";
  return true;
}
