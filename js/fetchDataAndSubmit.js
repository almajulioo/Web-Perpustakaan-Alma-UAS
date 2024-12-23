// Fetch data buku dan isi tabel
async function fetchBuku() {
  const tableBody = document.querySelector("#bukuTable tbody");
  tableBody.innerHTML = ""; // Bersihkan isi tabel

  try {
    const response = await fetch("RequestHandler.php", { method: "GET" });
    if (!response.ok) throw new Error("Gagal mengambil data");

    const data = await response.json();
    data.forEach((buku) => {
      const row = document.createElement("tr");
      row.innerHTML = `
              <td>${buku.id}</td>
              <td>${buku.namaBuku}</td>
              <td>${buku.penulis}</td>
              <td>${buku.tahunTerbit}</td>
              <td>${buku.kategori}</td>
              <td>${buku.status}</td>
            `;
      tableBody.appendChild(row);
    });
  } catch (error) {
    console.error("Error:", error);
  }
}

// Panggil fetchBuku saat halaman dimuat
document.addEventListener("DOMContentLoaded", fetchBuku);

// Validasi Form
document
  .getElementById("bukuForm")
  .addEventListener("submit", async (event) => {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const responseMessage = document.getElementById("responseMessage");

    try {
      const response = await fetch("RequestHandler.php", {
        method: "POST",
        body: formData,
      });

      if (!response.ok) {
        const errorData = await response.json();
        responseMessage.textContent = errorData.error || "Terjadi kesalahan.";
        responseMessage.style.color = "red";
        return;
      }

      const result = await response.json();
      if (result.message) {
        responseMessage.style.color = "green";
      } else {
        responseMessage.style.color = "red";
      }
      responseMessage.textContent = result.message || result.error;
      console.log(result);

      // Refresh tabel setelah data berhasil disimpan
      fetchBuku();
      form.reset();
    } catch (error) {
      responseMessage.textContent =
        "Kesalahan jaringan atau server: " + error.message;
      responseMessage.style.color = "red";
    }
  });
