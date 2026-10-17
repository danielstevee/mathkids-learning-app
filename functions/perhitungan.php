
<?php
// Menyimpan daftar bangun, kategori, rumus, dan satuan yang didukung aplikasi.
$daftarBangun = [
    "persegi" => [
        "nama" => "Persegi",
        "kategori" => "datar",
        "rumus" => "sisi × sisi",
        "satuan" => "cm²"
    ],
    "segitiga" => [
        "nama" => "Segitiga",
        "kategori" => "datar",
        "rumus" => "1/2 × alas × tinggi",
        "satuan" => "cm²"
    ],
    "lingkaran" => [
        "nama" => "Lingkaran",
        "kategori" => "datar",
        "rumus" => "π × jari-jari × jari-jari",
        "satuan" => "cm²"
    ],
    "kubus" => [
        "nama" => "Kubus",
        "kategori" => "ruang",
        "rumus" => "sisi × sisi × sisi",
        "satuan" => "cm³"
    ],
    "limas" => [
        "nama" => "Limas Segiempat",
        "kategori" => "ruang",
        "rumus" => "1/3 × sisi alas × sisi alas × tinggi",
        "satuan" => "cm³"
    ],
    "tabung" => [
        "nama" => "Tabung",
        "kategori" => "ruang",
        "rumus" => "π × jari-jari × jari-jari × tinggi",
        "satuan" => "cm³"
    ]
];

// Menghitung luas bangun datar atau volume bangun ruang berdasarkan input.
function hitungBangun($jenis, $ukuran)
{
    switch ($jenis) {
        case "persegi":
            return $ukuran["sisi"] * $ukuran["sisi"];

        case "segitiga":
            return 0.5 * $ukuran["alas"] * $ukuran["tinggi"];

        case "lingkaran":
            return pi() * $ukuran["jari_jari"] * $ukuran["jari_jari"];

        case "kubus":
            return $ukuran["sisi"] ** 3;

        case "limas":
            return (1 / 3) * $ukuran["sisi_alas"] * $ukuran["sisi_alas"] * $ukuran["tinggi"];

        case "tabung":
            return pi() * $ukuran["jari_jari"] * $ukuran["jari_jari"] * $ukuran["tinggi"];

        default:
            return null;
    }
}
