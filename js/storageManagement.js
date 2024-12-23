const catatanForm = document.getElementById("catatanForm");
const catatanInput = document.getElementById("catatanInput");
const catatanList = document.getElementById("catatanList");

// Load Catatan
function loadCatatan() {
  const catatan = JSON.parse(localStorage.getItem("catatan")) || [];
  catatanList.innerHTML = "";
  catatan.forEach((item, index) => {
    const li = document.createElement("li");
    li.textContent = item;
    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Hapus";
    deleteButton.addEventListener("click", () => deleteCatatan(index));
    li.appendChild(deleteButton);
    catatanList.appendChild(li);
  });
}

// Tambah catatan
function addCatatan(item) {
  const catatan = JSON.parse(localStorage.getItem("catatan")) || [];
  catatan.push(item);
  localStorage.setItem("catatan", JSON.stringify(catatan));
  loadCatatan();
}

// Hapus catatan
function deleteCatatan(index) {
  const catatan = JSON.parse(localStorage.getItem("catatan")) || [];
  catatan.splice(index, 1);
  localStorage.setItem("catatan", JSON.stringify(catatan));
  loadCatatan();
}

// Form handler
catatanForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const item = catatanInput.value.trim();
  if (item) {
    addCatatan(item);
    catatanInput.value = "";
  }
});

// Reload ketika refresh
loadCatatan();
