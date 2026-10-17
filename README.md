# MathKids 📐📚

**MathKids** adalah aplikasi web pembelajaran matematika sederhana berbasis PHP yang dirancang untuk membantu siswa sekolah dasar memahami perhitungan luas bangun datar dan volume bangun ruang dengan cara yang mudah dan interaktif.

Aplikasi ini menyediakan fitur perhitungan matematika, penyimpanan biodata siswa, riwayat latihan, serta dashboard statistik untuk melihat penggunaan setiap bangun berdasarkan seluruh latihan yang tercatat.

## 📸 Preview Aplikasi
### Halaman Utama
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/b67438bf-a180-4dc4-96b0-f86ab109114b" />

### Form Biodata Siswa
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/0b84f4f5-ef0f-4cce-8af9-38ae90e52880" />


### Form Perhitungan
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/4c02f1aa-0e61-47c6-bbe5-cc0365540ad1" />


### Hasil Perhitungan
<img width="959" height="508" alt="image" src="https://github.com/user-attachments/assets/a9a8de52-a9dd-4dab-a406-ad5afba1c51f" />


### Dashboard Statistik
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/adc53719-5707-408a-a38a-6a4c0b7fc35d" />


### Riwayat Perhitungan
<img width="959" height="509" alt="image" src="https://github.com/user-attachments/assets/d0e2811d-3394-4dfb-9773-9a338f001460" />

## ✨ Fitur Utama

- **Perhitungan Bangun Datar** — menghitung luas persegi, segitiga, dan lingkaran.
- **Perhitungan Bangun Ruang** — menghitung volume kubus, limas segiempat, dan tabung.
- **Biodata Siswa** — menyimpan informasi nama, sekolah, usia, alamat, dan nomor telepon siswa.
- **Hasil Perhitungan** — menampilkan jenis bangun, rumus, hasil, dan satuan perhitungan.
- **Riwayat Perhitungan** — menyimpan waktu latihan, biodata siswa, dan hasil perhitungan dalam file CSV.
- **Pengurutan Riwayat** — mengurutkan data berdasarkan nama, sekolah, usia, dan waktu.
- **Dashboard Statistik** — menampilkan total latihan serta jumlah dan persentase penggunaan setiap bangun.

## 🧮 Bangun yang Didukung

| Kategori | Bangun | Perhitungan |
|---|---|---|
| Bangun Datar | Persegi | Luas = sisi × sisi |
| Bangun Datar | Segitiga | Luas = ½ × alas × tinggi |
| Bangun Datar | Lingkaran | Luas = π × jari-jari² |
| Bangun Ruang | Kubus | Volume = sisi³ |
| Bangun Ruang | Limas Segiempat | Volume = ⅓ × sisi alas² × tinggi |
| Bangun Ruang | Tabung | Volume = π × jari-jari² × tinggi |

## 🛠️ Teknologi yang Digunakan

- **PHP** — logika aplikasi dan pemrosesan perhitungan.
- **HTML5** — struktur halaman web.
- **CSS3** — tampilan dan tata letak antarmuka.
- **JavaScript** — interaksi antarmuka jika digunakan pada fitur terkait.
- **CSV** — penyimpanan data riwayat perhitungan.
- **XAMPP** — lingkungan server lokal untuk menjalankan aplikasi.
- **Git & GitHub** — pengelolaan versi dan penyimpanan source code.

## 🚀 Cara Menjalankan Project

### 1. Persiapan

Pastikan perangkat telah memiliki:
- XAMPP dengan Apache dan PHP.
- Browser web.
- Git (opsional, jika ingin mengelola source code).

### 2. Clone Repository

Buka terminal dan jalankan:

```bash
git clone https://github.com/danielstevee/mathkids-learning-app.git
```

### 3. Pindahkan ke Folder XAMPP

Letakkan folder project di:

```text
C:\xampp\htdocs\mathkids-learning-app
```

Jika project sudah berada di folder tersebut, langkah ini dapat dilewati.

### 4. Jalankan Apache

Buka XAMPP Control Panel, kemudian aktifkan **Apache**.

### 5. Buka Aplikasi

Akses alamat berikut melalui browser:

```text
http://localhost/mathkids-learning-app/
```

> Jika nama folder project berbeda, sesuaikan alamat URL dengan nama folder yang digunakan di `htdocs`.

## 📁 Struktur Project

```text
mathkids-learning-app/
├── actions/
│   ├── proses-perhitungan.php
│   └── simpan-biodata.php
├── assets/
│   └── style.css
├── components/
│   ├── header.php
│   ├── form-biodata.php
│   ├── form-perhitungan.php
│   ├── hasil-perhitungan.php
│   ├── dashboard.php
│   └── riwayat.php
├── data/
│   └── riwayat.csv
├── functions/
│   ├── perhitungan.php
│   └── statistik.php
├── index.php
└── README.md
```

## 📊 Penyimpanan Data

MathKids menggunakan file CSV untuk menyimpan riwayat latihan. Data yang dicatat meliputi waktu perhitungan, biodata siswa, jenis bangun, kategori, hasil, dan satuan.

Riwayat tersebut digunakan untuk menampilkan data latihan dan menghasilkan statistik pada dashboard.

## 🎯 Tujuan Pengembangan

Project ini dikembangkan sebagai sarana pembelajaran matematika untuk siswa sekolah dasar sekaligus sebagai penerapan dasar pengembangan aplikasi web menggunakan PHP, pengolahan formulir, pengelolaan file CSV, serta penyajian data dalam bentuk tabel dan statistik.

## 👨‍💻 Developer

**Daniel Steven Setyawan**

- GitHub: [@danielstevee](https://github.com/danielstevee)
- Repository: [mathkids-learning-app](https://github.com/danielstevee/mathkids-learning-app)

---

*MathKids — Belajar Matematika Jadi Lebih Mudah!* 🎓
