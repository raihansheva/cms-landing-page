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
function limitA(limit1) {
  const InputTextEdit1A = document.getElementById("inputjuduleditA");
  const LimitEdit1A = document.getElementById(limit1);
  const LimittEdit1A = document.getElementById("limit2editA");
  const limitEdit1A = 45;

  LimitEdit1A.textContent = "0/" + limitEdit1A;

  InputTextEdit1A.addEventListener("input", function () {
    const textlengthEdit1A = InputTextEdit1A.value.length;
    LimitEdit1A.textContent = textlengthEdit1A + "/" + limitEdit1A;

    if (textlengthEdit1A > limitEdit1A) {
      LimitEdit1A.classList.add("warning");
      // alert("Input tidak boleh lebih dari 45 karakter.");
      InputTextEdit1A.value = InputTextEdit1A.value.substring(0, limitEdit1A);
      LimitEdit1A.textContent = limitEdit1A + "/" + limitEdit1A;
      LimittEdit1A.innerText = "Input tidak boleh lebih dari 45 karakter.";
    } else {
      setTimeout(function () {
        LimitEdit1A.classList.remove("warning");
        LimittEdit1A.innerText = "";
      }, 5000); //
    }
  });
}

function limitB(limit1) {
  const InputTextEdit1B = document.getElementById("inputjuduleditB");
  const LimitEdit1B = document.getElementById(limit1);
  const LimittEdit1B = document.getElementById("limit2editB");
  const limitEdit1B = 45;

  LimitEdit1B.textContent = "0/" + limitEdit1B;

  InputTextEdit1B.addEventListener("input", function () {
    const textlengthEdit1B = InputTextEdit1B.value.length;
    LimitEdit1B.textContent = textlengthEdit1B + "/" + limitEdit1B;

    if (textlengthEdit1B >= limitEdit1B) {
      LimitEdit1B.classList.add("warning");
      // alert("Input tidak boleh lebih dari 45 karakter.");
      InputTextEdit1B.value = InputTextEdit1B.value.substring(0, limitEdit1B);
      LimitEdit1B.textContent = limitEdit1B + "/" + limitEdit1B;
      LimittEdit1B.innerText = "Input tidak boleh lebih dari 45 karakter.";
    } else {
      setTimeout(function () {
        LimitEdit1B.classList.remove("warning");
        LimittEdit1B.innerText = "";
      }, 5000); //
    }
  });
}

const InputTextEdit1C = document.getElementById("inputjuduleditC");
const LimitEdit1C = document.getElementById("limiteditC");
const LimittEdit1C = document.getElementById("limit2editC");
const limitEdit1C = 45;

LimitEdit1C.textContent = "0/" + limitEdit1C;

InputTextEdit1C.addEventListener("input", function () {
  const textlengthEdit1C = InputTextEdit1C.value.length;
  LimitEdit1C.textContent = textlengthEdit1C + "/" + limitEdit1C;

  if (textlengthEdit1C >= limitEdit1C) {
    LimitEdit1C.classList.add("warning");
    // alert("Input tidak boleh lebih dari 45 karakter.");
    InputTextEdit1C.value = InputTextEdit1C.value.substring(0, limitEdit1C);
    LimitEdit1C.textContent = limitEdit1C + "/" + limitEdit1C;
    LimittEdit1C.innerText = "Input tidak boleh lebih dari 45 karakter.";
  } else {
    setTimeout(function () {
      LimitEdit1C.classList.remove("warning");
      LimittEdit1C.innerText = "";
    }, 5000); //
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
  // const inputGambar = document.getElementById("gambar");
  const pratinjauGambar = document.getElementById("preview2A");
  const tombolHapusGambar = document.getElementById("hapusGambar2A");

  fileInput.addEventListener("change", function () {
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
