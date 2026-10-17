<?php
// Membaca riwayat perhitungan dari file CSV dan mengurutkannya.
$fileRiwayat = __DIR__ . '/../data/riwayat.csv';
$riwayat = [];

// Membaca isi CSV jika file tersedia.
if (file_exists($fileRiwayat) && ($file = fopen($fileRiwayat, 'r')) !== false) {
    $header = fgetcsv($file);

    if ($header !== false) {
        while (($baris = fgetcsv($file)) !== false) {
            if (count($baris) === count($header)) {
                $riwayat[] = array_combine($header, $baris);
            }
        }
    }

    fclose($file);
}

// Menentukan kolom yang digunakan untuk mengurutkan riwayat.
$urutkan = $_GET['urutkan'] ?? 'waktu';
$arah = strtolower($_GET['arah'] ?? 'desc');

$kolomDiizinkan = ['nama', 'sekolah', 'usia', 'waktu'];

if (!in_array($urutkan, $kolomDiizinkan, true)) {
    $urutkan = 'waktu';
}

if (!in_array($arah, ['asc', 'desc'], true)) {
    $arah = 'desc';
}

// Mengurutkan riwayat berdasarkan kolom dan arah yang dipilih.
usort($riwayat, function ($a, $b) use ($urutkan, $arah) {
    // Membandingkan nilai kolom yang dipilih.
    if ($urutkan === 'usia') {
        $hasilBanding = (int) $a[$urutkan] <=> (int) $b[$urutkan];
    } else {
        $hasilBanding = strnatcasecmp($a[$urutkan], $b[$urutkan]);
    }

    return $arah === 'asc' ? $hasilBanding : -$hasilBanding;
});

// Menyiapkan arah pengurutan berikutnya untuk setiap tautan.
function tautanUrutan($kolom, $urutkan, $arah)
{
    // Membalik arah jika kolom yang dipilih sama.
    $arahBaru = ($kolom === $urutkan && $arah === 'asc')
        ? 'desc'
        : 'asc';

    return '?urutkan=' . urlencode($kolom) . '&arah=' . $arahBaru;
}
?>

<section class="form-section history-section" id="riwayat">
    <div class="section-heading">
        <h2>Riwayat Perhitungan</h2>
        <p>Lihat kembali hasil latihan matematika yang telah dikerjakan.</p>
    </div>

    <div class="history-card">
        <div class="history-summary">
            <div>
                <p class="history-summary-label">Total perhitungan</p>
                <h3><?= count($riwayat) ?></h3>
            </div>
            <span class="history-summary-icon">✎</span>
        </div>

        <div class="history-table-wrapper">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>
                            <a href="<?= htmlspecialchars(tautanUrutan('nama', $urutkan, $arah)) ?>">
                                Nama ↕
                            </a>
                        </th>
                        <th>
                            <a href="<?= htmlspecialchars(tautanUrutan('sekolah', $urutkan, $arah)) ?>">
                                Sekolah ↕
                            </a>
                        </th>
                        <th>
                            <a href="<?= htmlspecialchars(tautanUrutan('usia', $urutkan, $arah)) ?>">
                                Usia ↕
                            </a>
                        </th>
                        <th>Bangun</th>
                        <th>Hasil</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($riwayat)): ?>
                        <tr>
                            <td colspan="6" class="history-empty">
                                Belum ada riwayat perhitungan.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($riwayat as $data): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($data['waktu'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($data['nama'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($data['sekolah'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars($data['usia'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                                <td>
                                    <?= htmlspecialchars(ucfirst($data['jenis_bangun']), ENT_QUOTES, 'UTF-8') ?>
                                </td>
                                <td>
                                    <?php
                                    // Memformat hasil agar nol desimal yang tidak diperlukan dihilangkan.
                                    $hasilRiwayat = number_format((float) $data['hasil'], 2, ',', '.');
                                    $hasilRiwayat = rtrim(rtrim($hasilRiwayat, '0'), ',');
                                    ?>

                                    <?= htmlspecialchars($hasilRiwayat, ENT_QUOTES, 'UTF-8') ?>
                                    <?= htmlspecialchars($data['satuan'], ENT_QUOTES, 'UTF-8') ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>