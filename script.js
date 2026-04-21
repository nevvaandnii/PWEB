document.addEventListener("DOMContentLoaded", () => {

  if (document.getElementById("myChart")) {

    window.flipCard = (card) => card.classList.toggle("flip");

    const data = JSON.parse(localStorage.getItem("transaksi")) || [];

    const setText = (id, val) => {
      const el = document.getElementById(id);
      if (el) el.textContent = val;
    };

    setText("totalTransaksi", data.length);

    const today = new Date().toISOString().split("T")[0];
    const hariIni = data.filter(item => item.tanggalMasuk === today).length;
    setText("transaksiHariIni", hariIni);

    const layananCount = {};
    data.forEach(item => {
      layananCount[item.layanan] = (layananCount[item.layanan] || 0) + 1;
    });

    let max = 0, layananTop = "-";
    for (let key in layananCount) {
      if (layananCount[key] > max) {
        max = layananCount[key];
        layananTop = key;
      }
    }
    setText("layananTerbanyak", layananTop);

    const kecil = data.filter(item => parseFloat(item.berat || 0) < 5).length;
    setText("orderKecil", kecil);

    const hariMap = {
      "Minggu": 0,
      "Senin": 0,
      "Selasa": 0,
      "Rabu": 0,
      "Kamis": 0,
      "Jumat": 0,
      "Sabtu": 0
    };

    data.forEach(item => {
      if (item.tanggalMasuk) {
        const hari = new Date(item.tanggalMasuk)
          .toLocaleDateString("id-ID", { weekday: "long" });

        if (hariMap[hari] !== undefined) {
          hariMap[hari]++;
        }
      }
    });

    const labels = Object.keys(hariMap);
    const values = Object.values(hariMap);

    const ctx = document.getElementById('myChart');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Jumlah Transaksi',
          data: values,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true
      }
    });
  }

  const form = document.getElementById("formTransaksi");
  if (form) {
    const nama = document.getElementById("nama");
    const layanan = document.getElementById("layanan");
    const berat = document.getElementById("berat");
    const total = document.getElementById("total");
    const tglMasuk = document.getElementById("tglMasuk");
    const tglAmbil = document.getElementById("tglAmbil");

    berat.addEventListener("input", function() {
      if (this.value < 0) this.value = 0;
    });

    const hitungTotal = () => {
      const harga = parseInt(layanan.value);
      const kg = parseFloat(berat.value);
      if (!isNaN(harga) && kg > 0) {
        total.value = "Rp " + (harga * kg).toLocaleString("id-ID");
      } else total.value = "";
    };

    layanan.addEventListener("change", hitungTotal);
    berat.addEventListener("input", hitungTotal);

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      if (nama.value.trim().length < 3) return alert("Nama minimal 3 karakter");
      if (!layanan.value) return alert("Pilih layanan terlebih dahulu");
      if (berat.value <= 0) return alert("Berat harus lebih dari 0");
      if (!tglMasuk.value || !tglAmbil.value) return alert("Tanggal wajib diisi");
      if (tglAmbil.value < tglMasuk.value) return alert("Tanggal tidak valid");

      const dataBaru = {
        nama: nama.value,
        layanan: layanan.options[layanan.selectedIndex].text,
        berat: berat.value,
        total: total.value,
        tanggalMasuk: tglMasuk.value,
        tanggalAmbil: tglAmbil.value,
        status: "Baru Masuk"
      };

      let data = JSON.parse(localStorage.getItem("transaksi")) || [];
      data.push(dataBaru);
      localStorage.setItem("transaksi", JSON.stringify(data));

      alert("Transaksi berhasil disimpan!");
      window.location.href = "./daftarTransaksi.html";
    });
  }

  const btnFilter = document.getElementById("btnFilter");
  const filterBox = document.getElementById("filterBox");

  if (btnFilter && filterBox) {
    btnFilter.addEventListener("click", () => {
      filterBox.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
      if (!filterBox.contains(e.target) && !btnFilter.contains(e.target)) {
        filterBox.classList.add("hidden");
      }
    });
  }

  const applyFilter = () => {
    let data = JSON.parse(localStorage.getItem("transaksi")) || [];

    const kategoriDipilih = [...document.querySelectorAll(".filter-kategori:checked")]
      .map(cb => cb.value);

    const hargaDipilih = [...document.querySelectorAll(".filter-harga:checked")]
      .map(cb => cb.value);

    const tglAwal = document.getElementById("tglAwal").value;
    const tglAkhir = document.getElementById("tglAkhir").value;

    const hasil = data.filter(item => {

      if (kategoriDipilih.length > 0 && !kategoriDipilih.includes(item.layanan)) {
        return false;
      }

      const angka = parseInt(item.total.replace(/[^\d]/g, ""));

      if (hargaDipilih.includes("above") && angka <= 10000) return false;
      if (hargaDipilih.includes("below") && angka >= 10000) return false;

      if (tglAwal && item.tanggalMasuk < tglAwal) return false;
      if (tglAkhir && item.tanggalMasuk > tglAkhir) return false;

      return true;
    });

    render(hasil);
  };

  const applyBtn = document.getElementById("applyFilter");
  if (applyBtn) applyBtn.addEventListener("click", applyFilter);

  const getStatusClass = (status) => {
    if (status === "Baru Masuk") return "baru";
    if (status === "Diproses") return "proses";
    if (status === "Selesai") return "selesai";
    return "baru";
  };

  let dataTransaksi = JSON.parse(localStorage.getItem("transaksi")) || [];
  const tbody = document.getElementById("tableBody");

  const formatTanggal = (tgl) => new Date(tgl).toLocaleDateString("id-ID");

  const render = (data = dataTransaksi) => {
    if (!tbody) return;

    tbody.innerHTML = "";

    if (data.length === 0) {
      tbody.innerHTML = `<tr><td colspan="9">Data tidak ditemukan</td></tr>`;
      return;
    }

    data.forEach(item => {
      const i = dataTransaksi.indexOf(item);

      const row = document.createElement("tr");
      row.innerHTML = `
        <td>${i + 1}</td>
        <td>${item.nama}</td>
        <td>${item.layanan}</td>
        <td>${item.berat} kg</td>
        <td>${formatTanggal(item.tanggalMasuk)}</td>
        <td>${formatTanggal(item.tanggalAmbil)}</td>
        <td>${item.total}</td>
        <td><span class="status ${getStatusClass(item.status)}" data-index="${i}">${item.status}</span></td>
        <td>
          <button class="edit" data-index="${i}">✏️</button>
          <button class="hapus" data-index="${i}">🗑️</button>
        </td>
      `;
      tbody.appendChild(row);
    });
  };

  render();

  const filterData = (keyword) => {
    return dataTransaksi.filter(item =>
      item.nama.toLowerCase().includes(keyword.toLowerCase())
    );
  };

  let editIndexGlobal = null;

  document.addEventListener("click", (e) => {
    const hapusBtn = e.target.closest(".hapus");
    const editBtn = e.target.closest(".edit");
    const statusSpan = e.target.closest(".status");

    if (hapusBtn) {
      const index = Number(hapusBtn.dataset.index);
      if (confirm("Yakin ingin menghapus data ini?")) {
        dataTransaksi.splice(index, 1);
        localStorage.setItem("transaksi", JSON.stringify(dataTransaksi));
        render();
      }
    }

    if (editBtn) {
      const index = Number(editBtn.dataset.index);
      editIndexGlobal = index;
      document.getElementById("editStatus").value = dataTransaksi[index].status;
      document.getElementById("popupEdit").classList.remove("hidden");
    }

    if (statusSpan) {
      const index = Number(statusSpan.dataset.index);
      const s = dataTransaksi[index].status;

      dataTransaksi[index].status =
        s === "Baru Masuk" ? "Diproses" :
        s === "Diproses" ? "Selesai" : "Baru Masuk";

      localStorage.setItem("transaksi", JSON.stringify(dataTransaksi));
      render();
    }
  });

  const searchInput = document.getElementById("searchInput");
  if (searchInput) {
    searchInput.addEventListener("input", (e) => {
      const keyword = e.target.value;

      if (keyword === "") {
        render(dataTransaksi);
      } else {
        const hasil = filterData(keyword);
        render(hasil);
      }
    });
  }

  const saveEdit = document.getElementById("saveEdit");
  if (saveEdit) {
    saveEdit.addEventListener("click", () => {
      let data = JSON.parse(localStorage.getItem("transaksi")) || [];

      data[editIndexGlobal].status = document.getElementById("editStatus").value;

      localStorage.setItem("transaksi", JSON.stringify(data));

      document.getElementById("popupEdit").classList.add("hidden");

      dataTransaksi = data;
      render();
    });
  }

  const cancelEdit = document.getElementById("cancelEdit");
  if (cancelEdit) {
    cancelEdit.addEventListener("click", () => {
      document.getElementById("popupEdit").classList.add("hidden");
    });
  }

});