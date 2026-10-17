
<?php
// Memuat daftar bangun beserta kategori dan rumusnya.
require_once __DIR__ . '/../functions/perhitungan.php';

// Menampilkan formulir perhitungan sesuai kategori bangun yang dipilih.
?>

<section class="form-section calculation-section" id="perhitungan">
    <div class="section-heading">
        <h2>Yuk, Berhitung!</h2>
        <p>Pilih bangun dan masukkan ukuran yang diperlukan.</p>
    </div>

    <form action="actions/proses-perhitungan.php"
          method="POST"
          class="calculation-card">

        <div class="form-group">
            <label for="kategori">Kategori bangun</label>
            <select name="kategori" id="kategori" required>
                <option value="datar">Bangun Datar — Luas</option>
                <option value="ruang">Bangun Ruang — Volume</option>
            </select>
        </div>

        <div class="form-group">
            <label for="jenis_bangun">Pilih bangun</label>
            <select name="jenis_bangun" id="jenis_bangun" required>
                <?php foreach ($daftarBangun as $jenis => $bangun): ?>
                    <option
                        value="<?= htmlspecialchars($jenis) ?>"
                        data-kategori="<?= htmlspecialchars($bangun['kategori']) ?>"
                        data-rumus="<?= htmlspecialchars($bangun['rumus']) ?>"
                    >
                        <?= htmlspecialchars($bangun['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="measurement-grid">
            <div class="form-group measurement-field" data-field="sisi">
                <label for="sisi">Panjang sisi (cm)</label>
                <input type="number" name="sisi" id="sisi"
                       min="0.01" step="any" placeholder="Contoh: 8">
            </div>

            <div class="form-group measurement-field" data-field="alas">
                <label for="alas">Panjang alas (cm)</label>
                <input type="number" name="alas" id="alas"
                       min="0.01" step="any" placeholder="Contoh: 10">
            </div>

            <div class="form-group measurement-field" data-field="tinggi">
                <label for="tinggi">Tinggi (cm)</label>
                <input type="number" name="tinggi" id="tinggi"
                       min="0.01" step="any" placeholder="Contoh: 6">
            </div>

            <div class="form-group measurement-field" data-field="jari_jari">
                <label for="jari_jari">Jari-jari (cm)</label>
                <input type="number" name="jari_jari" id="jari_jari"
                       min="0.01" step="any" placeholder="Contoh: 7">
            </div>

            <div class="form-group measurement-field" data-field="sisi_alas">
                <label for="sisi_alas">Sisi alas limas (cm)</label>
                <input type="number" name="sisi_alas" id="sisi_alas"
                       min="0.01" step="any" placeholder="Contoh: 6">
            </div>
        </div>

        <div class="formula-box">
            <span class="formula-label">Rumus Perhitungan</span>
            <p id="rumus-bangun">Luas = sisi × sisi</p>
        </div>

        <button type="submit" class="form-button">
            Hitung Sekarang →
        </button>
    </form>
</section>

<script>
// Menampilkan bangun dan ukuran yang sesuai dengan pilihan siswa.
const kategori = document.getElementById('kategori');
const jenisBangun = document.getElementById('jenis_bangun');
const kolomUkuran = document.querySelectorAll('.measurement-field');
const rumusBangun = document.getElementById('rumus-bangun');

// Memperbarui pilihan bangun, input ukuran, dan rumus.
function perbaruiFormulir() {
    const kategoriDipilih = kategori.value;

    // Menyembunyikan pilihan bangun dari kategori lain.
    Array.from(jenisBangun.options).forEach(function (opsi) {
        opsi.hidden = opsi.dataset.kategori !== kategoriDipilih;
    });

    // Memilih bangun pertama yang cocok dengan kategori.
    if (jenisBangun.selectedOptions[0].dataset.kategori !== kategoriDipilih) {
        jenisBangun.value = Array.from(jenisBangun.options).find(
            function (opsi) {
                return opsi.dataset.kategori === kategoriDipilih;
            }
        ).value;
    }

    const jenis = jenisBangun.value;

    // Menentukan input yang dibutuhkan oleh setiap bangun.
    const kebutuhanUkuran = {
        persegi: ['sisi'],
        segitiga: ['alas', 'tinggi'],
        lingkaran: ['jari_jari'],
        kubus: ['sisi'],
        limas: ['sisi_alas', 'tinggi'],
        tabung: ['jari_jari', 'tinggi']
    };

    // Menampilkan hanya input yang dibutuhkan.
    kolomUkuran.forEach(function (kolom) {
        const input = kolom.querySelector('input');
        const tampil = kebutuhanUkuran[jenis].includes(kolom.dataset.field);

        kolom.hidden = !tampil;
        input.required = tampil;

        if (!tampil) {
            input.value = '';
        }
    });

    // Menampilkan rumus dari daftar bangun yang sudah ada.
    rumusBangun.textContent =
        jenisBangun.selectedOptions[0].dataset.rumus;
}

// Menjalankan pembaruan saat pilihan berubah.
kategori.addEventListener('change', perbaruiFormulir);
jenisBangun.addEventListener('change', perbaruiFormulir);

// Mengatur tampilan awal formulir.
perbaruiFormulir();
</script>
