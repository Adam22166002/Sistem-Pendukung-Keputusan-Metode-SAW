# 🧾 Sistem Pendukung Keputusan Penilaian Kinerja Karyawan  
### Metode **SAW (Simple Additive Weighting)** • Laravel 12

Sistem ini dibangun untuk membantu perusahaan dalam melakukan penilaian kinerja karyawan secara objektif menggunakan metode **SAW (Simple Additive Weighting)**. Aplikasi memungkinkan admin mengelola data karyawan, kriteria, bobot, serta menghasilkan ranking otomatis berdasarkan hasil perhitungan SAW.

---

## 📌 Fitur Utama

### **1. Manajemen Karyawan**
- Tambah, edit, lihat detail, dan hapus data karyawan.

### **2. Manajemen Kriteria & Bobot**
- Menentukan kriteria penilaian.
- Menentukan bobot.
- Menentukan jenis kriteria (benefit/cost).

### **3. Perhitungan SAW Otomatis**
- Normalisasi matriks keputusan.
- Menghitung nilai preferensi karyawan.
- Menghasilkan ranking akhir karyawan.

### **4. Dashboard Interaktif**
- Menampilkan ringkasan periode aktif.
- Menampilkan grafik performa karyawan per periode.

### **5. Periode Penilaian**
- Mengatur periode aktif.
- Melihat riwayat penilaian sebelumnya.

### **6. Laporan Penilaian**
- Export hasil ke PDF.

### **7. Login Admin**
- Pengamanan akses ke sistem.

---

## 🧠 Tentang Metode SAW

Metode **SAW (Simple Additive Weighting)** menghitung nilai akhir berdasarkan:

1. Normalisasi nilai pada setiap kriteria.  
2. Mengalikan nilai normalisasi dengan bobot kriteria.  
3. Menjumlahkan nilai setiap kriteria untuk tiap karyawan.  
4. Menentukan ranking berdasarkan nilai preferensi tertinggi.

### Mengapa menggunakan SAW?
- Mudah diterapkan.  
- Akurat untuk multi-kriteria.  
- Cocok untuk penilaian performa karyawan.

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 12** – Framework backend.
- **MySQL** – Database utama.
- **Blade & Boostrap** – Interface pengguna.
- **Chart.js** – Grafik statistik.

---

## 📂 Struktur Folder Utama

```plaintext
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   ├── Services/SawService.php
├── resources/views/
│   ├── dashboard.blade.php
│   ├── karyawan.blade.php
│   ├── kriteria
│   ├── penilaian/
├── database/
│   ├── migrations/
│   ├── seeders/
└── routes/
    └── web.php
