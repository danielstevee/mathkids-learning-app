
<?php
// Memuat session, daftar bangun, dan fungsi perhitungan.
session_start();
require_once __DIR__ . '/../functions/perhitungan.php';

// Memastikan halaman diakses melalui formulir POST.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

// Memastikan biodata siswa sudah tersimpan di session.
if (!isset($_SESSION["biodata"])) {
    exit("Silakan isi biodata terlebih dahulu.");
}

// Mengambil biodata siswa dari session.
$biodata = $_SESSION["biodata"];

// Mengambil pilihan bangun dan kategori dari formulir.
$jenis = $_POST["jenis_bangun"] ?? "";
$kategori = $_POST["kategori"] ?? "";

// Memastikan jenis bangun tersedia dan kategorinya sesuai.
if (
    !isset($daftarBangun[$jenis]) ||
    $daftarBangun[$jenis]["kategori"] !== $kategori
) {
    exit("Pilihan bangun tidak valid.");
}

// Menentukan ukuran yang diperlukan oleh setiap bangun.
$kebutuhanUkuran = [
    "persegi" => ["sisi"],
    "segitiga" => ["alas", "tinggi"],
    "lingkaran" => ["jari_jari"],
    "kubus" => ["sisi"],
    "limas" => ["sisi_alas", "tinggi"],
    "tabung" => ["jari_jari", "tinggi"]
];

// Mengambil dan memvalidasi ukuran dari formulir.
$ukuran = [];

foreach ($kebutuhanUkuran[$jenis] as $namaUkuran) {
    $nilai = $_POST[$namaUkuran] ?? "";

    if (!is_numeric($nilai) || (float) $nilai <= 0) {
        exit("Ukuran belum lengkap atau tidak valid.");
    }

    $ukuran[$namaUkuran] = (float) $nilai;
}

// Menghitung luas atau volume menggunakan fungsi yang tersedia.
$hasil = hitungBangun($jenis, $ukuran);

// Memastikan hasil perhitungan valid.
if ($hasil === null || !is_finite($hasil)) {
    exit("Perhitungan gagal dilakukan.");
}

// Menyiapkan informasi hasil untuk ditampilkan.
$namaBangun = $daftarBangun[$jenis]["nama"];
$kategoriBangun = $daftarBangun[$jenis]["kategori"];
$rumus = $daftarBangun[$jenis]["rumus"];
$satuan = $daftarBangun[$jenis]["satuan"];

//================== di tampilkan di hadil-perhitungan.php =======
// Memformat hasil tanpa angka nol desimal yang tidak diperlukan.
$hasilFormat = number_format($hasil, 2, ",", ".");
$hasilFormat = rtrim(rtrim($hasilFormat, "0"), ",");

// Menyimpan waktu perhitungan.
$waktu = date("Y-m-d H:i:s");

// Menentukan lokasi file riwayat CSV.
$fileRiwayat = __DIR__ . '/../data/riwayat.csv';

// Memeriksa apakah file perlu diberi header.
$perluHeader = !file_exists($fileRiwayat)
    || filesize($fileRiwayat) === 0;

// Membuka file CSV dalam mode tambah data.
$file = fopen($fileRiwayat, "a");

if ($file === false) {
    exit("Riwayat tidak dapat disimpan. Periksa izin folder data.");
}

// Mengunci file selama proses penulisan riwayat.
if (!flock($file, LOCK_EX)) {
    fclose($file);
    exit("Riwayat gagal disimpan.");
}

// Menulis nama kolom jika file masih kosong.
if ($perluHeader) {
    fputcsv($file, [
        "waktu", "nama", "sekolah", "usia", "alamat",
        "telepon", "jenis_bangun", "kategori", "hasil", "satuan"
    ]);
}

// Menyimpan data siswa dan hasil perhitungannya.
$berhasilSimpan = fputcsv($file, [
    $waktu,
    $biodata["nama"],
    $biodata["sekolah"],
    $biodata["usia"],
    $biodata["alamat"],
    $biodata["telepon"],
    $jenis,
    $kategoriBangun,
    $hasil,
    $satuan
]);

// Melepaskan kunci dan menutup file CSV.
flock($file, LOCK_UN);
fclose($file);

// Memastikan data berhasil ditulis sebelum menampilkan hasil.
if ($berhasilSimpan === false) {
    exit("Riwayat gagal disimpan.");
}

// Memanggil komponen untuk menampilkan hasil perhitungan.
require __DIR__ . '/../components/hasil-perhitungan.php';
