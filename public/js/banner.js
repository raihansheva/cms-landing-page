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

const InputTextEdit1 = document.getElementById("inputjuduledit1");
const LimitEdit1 = document.getElementById("limitedit1");
const LimittEdit1 = document.getElementById("limit2edit1");
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
// const InputTextEdit2 = document.getElementById("inputjuduledit2");
// const LimitEdit2 = document.getElementById("limitedit2");
// const LimittEdit2 = document.getElementById("limit2edit2");
// const limitEdit2 = 45;

// LimitEdit2.textContent = "0/" + limitEdit2;

// InputTextEdit2.addEventListener("input", function () {
//   const textlengthEdit2 = InputTextEdit2.value.length;
//   LimitEdit2.textContent = textlengthEdit2 + "/" + limitEdit2;

//   if (textlengthEdit2 > limitEdit2) {
//     LimitEdit2.classList.add("warning");
//     // alert("Input tidak boleh lebih dari 45 karakter.");
//     InputTextEdit2.value = InputTextEdit2.value.substring(0, limitEdit2);
//     LimitEdit2.textContent = limitEdit2 + "/" + limitEdit2;
//     LimittEdit2.innerText ="Input tidak boleh lebih dari 45 karakter.";
// } else {
//     LimitEdit3.classList.remove("warning");
//     LimittEdit3.innerText ="";
//   }
// });
const InputTextEdit3 = document.getElementById("inputjuduledit3");
const LimitEdit3 = document.getElementById("limitedit3");
const LimittEdit3 = document.getElementById("limit2edit3");
const limitEdit3 = 45;

LimitEdit3.textContent = "0/" + limit;

InputTextEdit3.addEventListener("input", function () {
  const textlengthEdit3 = InputTextEdit3.value.length;
  LimitEdit3.textContent = textlengthEdit3 + "/" + limitEdit3;

  if (textlengthEdit3 > limitEdit3) {
    LimitEdit3.classList.add("warning");
    // alert("Input tidak boleh lebih dari 45 karakter.");
    InputTextEdit3.value = InputTextEdit3.value.substring(0, limitEdit3);
    LimitEdit3.textContent = limitEdit3 + "/" + limitEdit3;
    LimittEdit3.innerText = "Input tidak boleh lebih dari 45 karakter.";
  } else {
    LimitEdit3.classList.remove("warning");
    LimittEdit3.innerText = "";
  }
});

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
