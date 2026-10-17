
<?php
// Menampilkan formulir biodata dengan mengisi kembali data dari session.
$biodata = $_SESSION["biodata"] ?? [];
?>

<section class="form-section" id="biodata">
    <div class="section-heading">
        <h2>Isi Biodatamu</h2>
        <p>
            Isi data diri terlebih dahulu sebelum mulai belajar matematika.
        </p>
    </div>

    <form action="actions/simpan-biodata.php" method="POST" class="biodata-form">
        <div class="biodata-grid">
            <!-- Kolom kiri: identitas siswa -->
            <div class="biodata-column">
                <div class="form-group">
                    <label for="nama">Nama lengkap</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        placeholder="Masukkan nama lengkap"
                        value="<?= htmlspecialchars($biodata["nama"] ?? "", ENT_QUOTES, "UTF-8") ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="sekolah">Nama sekolah</label>
                    <input
                        type="text"
                        id="sekolah"
                        name="sekolah"
                        placeholder="Masukkan nama sekolah"
                        value="<?= htmlspecialchars($biodata["sekolah"] ?? "", ENT_QUOTES, "UTF-8") ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="usia">Usia</label>
                    <input
                        type="number"
                        id="usia"
                        name="usia"
                        placeholder="Masukkan usia"
                        min="1"
                        max="100"
                        value="<?= htmlspecialchars((string) ($biodata["usia"] ?? ""), ENT_QUOTES, "UTF-8") ?>"
                        required
                    >
                </div>
            </div>

            <!-- Kolom kanan: kontak dan alamat -->
            <div class="biodata-column">
                <div class="form-group">
                    <label for="alamat">Alamat rumah</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        placeholder="Masukkan alamat rumah"
                        rows="5"
                        required
                    ><?= htmlspecialchars($biodata["alamat"] ?? "", ENT_QUOTES, "UTF-8") ?></textarea>
                </div>

                <div class="form-group">
                    <label for="telepon">Nomor telepon</label>
                    <input
                        type="tel"
                        id="telepon"
                        name="telepon"
                        placeholder="Masukkan nomor telepon"
                        value="<?= htmlspecialchars($biodata["telepon"] ?? "", ENT_QUOTES, "UTF-8") ?>"
                        required
                    >
                </div>
            </div>
        </div>

        <button type="submit" class="form-button">
            Lanjut ke Perhitungan
            <span>➜</span>
        </button>
    </form>
</section>
