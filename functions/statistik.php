
<?php

// Menghitung jumlah seluruh transaksi serta jumlah bangun datar dan bangun ruang.
function hitungStatistik($riwayat)
{
    // Menyiapkan nilai awal statistik.
    $statistik = [
        "total" => count($riwayat),
        "datar" => 0,
        "ruang" => 0
    ];

    // Menghitung jumlah transaksi berdasarkan kategori bangun.
    foreach ($riwayat as $data) {
        if ($data["kategori"] === "datar") {
            $statistik["datar"]++;
        } elseif ($data["kategori"] === "ruang") {
            $statistik["ruang"]++;
        }
    }

    return $statistik;
}


// Menghitung jumlah dan persentase penggunaan setiap bangun dalam kategorinya.
function hitungPersentase($riwayat, $daftarBangun)
{
    // Menyiapkan penghitung untuk setiap bangun.
    $jumlahBangun = [];
/**$jumlahBangun = [
    "persegi" => 0, count
    "segitiga" => 0, count
    "lingkaran" => 0, count
    "kubus" => 0, count
    "limas" => 0, count
    "tabung" => 0 count
]; */
    foreach ($daftarBangun as $jenis => $bangun) {
        $jumlahBangun[$jenis] = 0;
    }


    // Menghitung berapa kali setiap bangun digunakan.
    //jadi data ini untuk ambil jenis/ kategori bagunan pada riwayat
    foreach ($riwayat as $data) {
        $jenis = $data["jenis_bangun"];
        //mencocokan dgn array $jumlahBangunan lalu dimasukan count nya
        if (isset($jumlahBangun[$jenis])) {
            $jumlahBangun[$jenis]++;
        }
    }

    // Menghitung total transaksi pada masing-masing kategori.
    $totalKategori = [
        "datar" => 0,
        "ruang" => 0
    ];

    foreach ($riwayat as $data) {
        if ($data["kategori"] === "datar") {
            $totalKategori["datar"]++;
        } elseif ($data["kategori"] === "ruang") {
            $totalKategori["ruang"]++;
        }
    }

    // Menghitung persentase setiap bangun terhadap kategorinya.
    $persentase = [];

    foreach ($daftarBangun as $jenis => $bangun) {
        $kategori = $bangun["kategori"];
        $total = $totalKategori[$kategori];
        //buat dapatin angka persen nya
        if ($total > 0) {
            $persentase[$jenis] = round(
                ($jumlahBangun[$jenis] / $total) * 100,
                2
            );
        } else {
            $persentase[$jenis] = 0;
        }
    }

    return $persentase;
}
