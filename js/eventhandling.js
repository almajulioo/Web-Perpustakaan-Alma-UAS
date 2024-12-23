// Validasi Form
document.getElementById("bukuForm").addEventListener("keydown", function (e) {
  const namaBuku = document.getElementById("namaBuku").value;
  const penulis = document.getElementById("penulis").value;
  const tahunTerbit = document.getElementById("tahunTerbit").value;
  const bukuError = document.querySelector(".bukuError");
  const penulisError = document.querySelector(".penulisError");
  const tahunTerbitError = document.querySelector(".tahunTerbitError");

  if (!namaBuku) {
    bukuError.style.display = "block";
  } else {
    bukuError.style.display = "none";
  }
  if (!penulis) {
    penulisError.style.display = "block";
  } else {
    penulisError.style.display = "none";
  }
  if (!tahunTerbit) {
    tahunTerbitError.style.display = "block";
  } else {
    tahunTerbitError.style.display = "none";
  }
});

// Event untuk memberikan feedback saat input fokus
const inputs = document.querySelectorAll("input");
inputs.forEach((input) => {
  input.addEventListener("focus", function () {
    this.style.border = "2px solid #007BFF";
  });

  input.addEventListener("blur", function () {
    this.style.border = "1px solid #cccccc";
  });
});

// Event untuk memeriksa minimal satu checkbox dipilih
document.getElementById("bukuForm").addEventListener("submit", function () {
  const checkboxes = document.querySelectorAll(
    'input[name="category[]"]:checked'
  );
  if (checkboxes.length === 0) {
    alert("Minimal satu kategori harus dipilih.");
  }
});
