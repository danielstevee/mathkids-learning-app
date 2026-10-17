
<?php
// Memastikan variabel hasil perhitungan tersedia sebelum ditampilkan.
if (
    !isset(
        $biodata,
        $namaBangun,
        $rumus,
        $hasilFormat,
        $satuan
    )
) {
    exit("Data hasil perhitungan tidak tersedia.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan - MathKids</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <main class="container">
        <section class="form-section">
            <div class="section-heading">
                <h2>
                    Hebat,
                    <?= htmlspecialchars($biodata["nama"], ENT_QUOTES, "UTF-8") ?>!
                </h2>
                <p>Berikut hasil perhitungan matematika kamu.</p>
            </div>

            <div class="calculation-card">
                <p>
                    <strong>Sekolah:</strong>
                    <?= htmlspecialchars($biodata["sekolah"], ENT_QUOTES, "UTF-8") ?>
                </p>

                <p>
                    <strong>Bangun:</strong>
                    <?= htmlspecialchars($namaBangun, ENT_QUOTES, "UTF-8") ?>
                </p>

                <p>
                    <strong>Rumus:</strong>
                    <?= htmlspecialchars($rumus, ENT_QUOTES, "UTF-8") ?>
                </p>

                <div class="formula-box">
                    <span class="formula-label">HASIL AKHIR</span>
                    <p>
                        <?= htmlspecialchars($hasilFormat, ENT_QUOTES, "UTF-8") ?>
                        <?= htmlspecialchars($satuan, ENT_QUOTES, "UTF-8") ?>
                    </p>
                </div>

                <a href="../index.php#perhitungan" class="form-button"
                   style="display:block; text-align:center; text-decoration:none;">
                    Hitung Bangun Lain →
                </a>
            </div>
        </section>
    </main>
</body>
</html>
