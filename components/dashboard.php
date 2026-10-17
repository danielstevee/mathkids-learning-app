
<?php
// Memuat fungsi daftar bangun dan statistik untuk dashboard.
require_once __DIR__ . '/../functions/perhitungan.php';
require_once __DIR__ . '/../functions/statistik.php';

// Membaca riwayat perhitungan dari file CSV.
$fileRiwayat = __DIR__ . '/../data/riwayat.csv';
$dataRiwayat = [];

if (file_exists($fileRiwayat) && ($file = fopen($fileRiwayat, 'r')) !== false) {
    $header = fgetcsv($file);

    if ($header !== false) {
        while (($baris = fgetcsv($file)) !== false) {
            if (count($baris) === count($header)) {
                $dataRiwayat[] = array_combine($header, $baris);
            }
        }
    }

    fclose($file);
}

// Menghitung jumlah perhitungan dan persentase setiap bangun.
$statistik = hitungStatistik($dataRiwayat);
$persentase = hitungPersentase($dataRiwayat, $daftarBangun);
?>

<section class="form-section dashboard-section" id="dashboard">
    <div class="section-heading">
        <h2>Dashboard Belajar</h2>
        <p>Yuk, lihat perkembangan aktivitas belajar matematika!</p>
    </div>

    <div class="dashboard-cards">
        <div class="dashboard-card">
            <div class="dashboard-card-icon icon-total">Σ</div>
            <p>Total Perhitungan</p>
            <h3><?= $statistik['total'] ?></h3>
            <span>Seluruh latihan siswa</span>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-icon icon-datar">◻</div>
            <p>Bangun Datar</p>
            <h3><?= $statistik['datar'] ?></h3>
            <span>Perhitungan luas</span>
        </div>

        <div class="dashboard-card">
            <div class="dashboard-card-icon icon-ruang">⬡</div>
            <p>Bangun Ruang</p>
            <h3><?= $statistik['ruang'] ?></h3>
            <span>Perhitungan volume</span>
        </div>
    </div>

    <div class="dashboard-detail">
        <div class="dashboard-detail-heading">
            <h3>Statistik Setiap Bangun</h3>
            <p>Persentase dihitung berdasarkan total perhitungan dalam kategorinya.</p>
        </div>

        <div class="statistic-list">
            <?php foreach ($daftarBangun as $jenis => $bangun): ?>
                <?php
                // Menentukan jumlah latihan dan persentase bangun saat ini.
                $jumlah = 0;

                foreach ($dataRiwayat as $data) {
                    if ($data['jenis_bangun'] === $jenis) {
                        $jumlah++;
                    }
                }

                $nilaiPersentase = $persentase[$jenis];
                ?>

                <div class="statistic-item">
                    <div class="statistic-info">
                        <div>
                            <strong>
                                <?= htmlspecialchars($bangun['nama'], ENT_QUOTES, 'UTF-8') ?>
                            </strong>
                            <span>
                                <?= $bangun['kategori'] === 'datar'
                                    ? 'Bangun Datar'
                                    : 'Bangun Ruang' ?>
                            </span>
                        </div>

                        <div class="statistic-number">
                            <?= $jumlah ?> latihan · <?= $nilaiPersentase ?>%
                        </div>
                    </div>

                    <div class="progress-track">
                        <div
                            class="progress-fill <?= $bangun['kategori'] === 'datar' ? 'progress-datar' : 'progress-ruang' ?>"
                            style="width: <?= $nilaiPersentase ?>%;"
                        ></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
