
<?php
// Memvalidasi dan menyimpan biodata terbaru siswa ke dalam session.
session_start();

// Memastikan data dikirim melalui formulir.
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.php");
    exit;
}

// Mengambil data biodata dari formulir.
$nama = trim($_POST["nama"] ?? "");
$sekolah = trim($_POST["sekolah"] ?? "");
$usia = filter_input(INPUT_POST, "usia", FILTER_VALIDATE_INT);
$alamat = trim($_POST["alamat"] ?? "");
$telepon = trim($_POST["telepon"] ?? "");

// Memastikan seluruh biodata telah diisi dengan benar.
if (
    $nama === "" ||
    $sekolah === "" ||
    $usia === false ||
    $usia === null ||
    $usia < 1 ||
    $usia > 100 ||
    $alamat === "" ||
    $telepon === ""
) {
    exit("Biodata belum lengkap atau tidak valid.");
}

// Mengganti biodata lama dengan biodata terbaru.
$_SESSION["biodata"] = [
    "nama" => $nama,
    "sekolah" => $sekolah,
    "usia" => $usia,
    "alamat" => $alamat,
    "telepon" => $telepon
];

// Memastikan perubahan session tersimpan sebelum redirect.
session_write_close();

// Mengarahkan kembali ke halaman utama pada bagian perhitungan.
header("Location: ../index.php#perhitungan");
exit;
