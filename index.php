<?php
// Memulai session untuk mengakses biodata yang telah disimpan.
session_start();
?>
<?php
// Memanggil komponen header yang berisi metadata HTML dan navigasi.
require_once __DIR__ . '/components/header.php';
?>

<main class="container">
    <section class="hero">
        <div class="hero-content hero-label">
            <h2>
                Exploring Shapes,<br>
                Discovering<br>
                <span>Bright Ideas.</span>
            </h2>

            <p class="hero-description">
                Belajar luas bangun datar dan volume bangun ruang
                dengan cara yang seru, mudah, dan menyenangkan!
            </p>

            <a href="#mulai-belajar" class="hero-button">
                Mulai Belajar
                <span class="button-icon">➜</span>
            </a>
        </div>

        <div class="hero-visual">
            <img
                src="assets/hero-mathkids.png"
                alt="Ilustrasi anak-anak belajar matematika dengan bangun datar"
                class="hero-image"
            >
        </div>
    </section>
    <?php
// Memanggil komponen formulir biodata siswa.
require_once __DIR__ . '/components/form-biodata.php';
?>
<?php
// Memanggil komponen formulir perhitungan bangun geometri.
require_once __DIR__ . '/components/form-perhitungan.php';
?>

<?php
// Memanggil dashboard statistik aktivitas belajar siswa.
require_once __DIR__ . '/components/dashboard.php';
?>

<?php
// Memanggil komponen riwayat perhitungan siswa.
require_once __DIR__ . '/components/riwayat.php';
?>

</main>


</body>
</html>
