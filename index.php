<?php

session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalHeir Hotel — Reservasi Online</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="fixed-green-box"></div>

<header class="navbar">
    <div class="navbar-inner">
        <div class="logo-wrap">
            <img src="logo.png" alt="DigitalHeir Logo" class="logo-img">
        </div>
        <nav class="nav-links">
            <a href="index.php">Beranda</a>
            <a href="kamar.php">Kamar</a>
            <a href="fasilitas.php">Fasilitas</a>
            <a href="kontak.php" class="nav-cta">Hubungi Kami</a>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-content">
        <p class="hero-label">Reservasi Eksklusif</p>
        <h1 class="hero-title">Nikmati Pengalaman<br><span>Menginap Terbaik</span></h1>
        <p class="hero-sub">Pesan kamar impian Anda sekarang dan rasakan kemewahan sejati bersama DigitalHeir Hotel</p>
        <a href="#form-section" class="hero-btn">Pesan Sekarang &rarr;</a>
    </div>
    <div class="hero-stats">
        <div class="stat"><span class="stat-num">500+</span><span class="stat-label">Kamar Mewah</span></div>
        <div class="stat-divider"></div>
        <div class="stat"><span class="stat-num">4.9&#9733;</span><span class="stat-label">Rating Tamu</span></div>
        <div class="stat-divider"></div>
        <div class="stat"><span class="stat-num">24/7</span><span class="stat-label">Layanan Penuh</span></div>
    </div>
</section>

<section class="form-section" id="form-section">
    <div class="section-header">
        <p class="section-label">Formulir Pemesanan</p>
        <h2 class="section-title">Lengkapi Data Reservasi Anda</h2>
        <p class="section-sub">Isi formulir berikut dengan lengkap dan benar untuk memastikan proses pemesanan berjalan lancar</p>
    </div>

    <div class="form-container">

        <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-error">
            &#9888; <?= htmlspecialchars($_SESSION['error']); ?>
            <?php unset($_SESSION['error']); ?>
        </div>
        <?php endif; ?>

        <form action="process.php" method="POST" id="bookingForm" novalidate>

            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">01</div>
                    <div>
                        <h3 class="card-title">Data Pribadi</h3>
                        <p class="card-desc">Informasi identitas pemesan</p>
                    </div>
                </div>
                <div class="form-grid">

                    <div class="field-group full">
                        <label for="nama_lengkap">Nama Lengkap <span class="req">*</span></label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap"
                               placeholder="Masukkan nama lengkap sesuai KTP" required>
                        <span class="field-error" id="err-nama"></span>
                    </div>

                    <div class="field-group">
                        <label for="email">Email <span class="req">*</span></label>
                        <input type="email" id="email" name="email"
                               placeholder="contoh@email.com" required>
                        <span class="field-error" id="err-email"></span>
                    </div>

                    <div class="field-group">
                        <label for="nomor_telepon">Nomor Telepon <span class="req">*</span></label>
                        <input type="tel" id="nomor_telepon" name="nomor_telepon"
                               placeholder="08xxxxxxxxxx" required>
                        <span class="field-error" id="err-telepon"></span>
                    </div>

                    <div class="field-group full">
                        <label for="alamat">Alamat Lengkap <span class="req">*</span></label>
                        <textarea id="alamat" name="alamat"
                                  placeholder="Jalan, Kelurahan, Kecamatan, Kota, Provinsi"
                                  rows="3" required></textarea>
                        <span class="field-error" id="err-alamat"></span>
                    </div>

                    <div class="field-group full">
                        <label for="nomor_identitas">Nomor Identitas (KTP/Paspor) <span class="req">*</span></label>
                        <input type="text" id="nomor_identitas" name="nomor_identitas"
                               placeholder="Nomor KTP atau Paspor" required maxlength="20">
                        <span class="field-error" id="err-identitas"></span>
                    </div>

                </div>
            </div>

            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">02</div>
                    <div>
                        <h3 class="card-title">Detail Pemesanan</h3>
                        <p class="card-desc">Pilih tipe kamar dan jadwal menginap</p>
                    </div>
                </div>
                <div class="form-grid">

                    <div class="field-group full">
                        <label>Tipe Kamar <span class="req">*</span></label>
                        <div class="room-cards">
                            <label class="room-card">
                                <input type="radio" name="tipe_kamar" value="Standard" required>
                                <div class="room-card-inner">
                                    <div class="room-icon">&#128705;</div>
                                    <div class="room-name">Standard</div>
                                    <div class="room-price">Rp 800.000/malam</div>
                                </div>
                            </label>
                            <label class="room-card">
                                <input type="radio" name="tipe_kamar" value="Deluxe">
                                <div class="room-card-inner">
                                    <div class="room-icon">&#128715;</div>
                                    <div class="room-name">Deluxe</div>
                                    <div class="room-price">Rp 1.500.000/malam</div>
                                </div>
                            </label>
                            <label class="room-card">
                                <input type="radio" name="tipe_kamar" value="Suite">
                                <div class="room-card-inner">
                                    <div class="room-icon">&#127977;</div>
                                    <div class="room-name">Suite</div>
                                    <div class="room-price">Rp 2.800.000/malam</div>
                                </div>
                            </label>
                            <label class="room-card">
                                <input type="radio" name="tipe_kamar" value="Presidential">
                                <div class="room-card-inner">
                                    <div class="room-icon">&#128081;</div>
                                    <div class="room-name">Presidential</div>
                                    <div class="room-price">Rp 5.000.000/malam</div>
                                </div>
                            </label>
                        </div>
                        <span class="field-error" id="err-kamar"></span>
                    </div>

                    <div class="field-group">
                        <label for="jumlah_tamu">Jumlah Tamu <span class="req">*</span></label>
                        <select id="jumlah_tamu" name="jumlah_tamu" required>
                            <option value="">-- Pilih Jumlah Tamu --</option>
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                            <option value="<?= $i ?>"><?= $i ?> Tamu</option>
                            <?php endfor; ?>
                        </select>
                        <span class="field-error" id="err-tamu"></span>
                    </div>

                    <div class="field-group"></div>

                    <div class="field-group">
                        <label for="tanggal_checkin">Tanggal Check-in <span class="req">*</span></label>
                        <input type="date" id="tanggal_checkin" name="tanggal_checkin"
                               required min="<?= date('Y-m-d') ?>">
                        <span class="field-error" id="err-checkin"></span>
                    </div>

                    <div class="field-group">
                        <label for="tanggal_checkout">Tanggal Check-out <span class="req">*</span></label>
                        <input type="date" id="tanggal_checkout" name="tanggal_checkout"
                               required min="<?= date('Y-m-d', strtotime('+1 day')) ?>">
                        <span class="field-error" id="err-checkout"></span>
                    </div>

                </div>
            </div>

            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">03</div>
                    <div>
                        <h3 class="card-title">Fasilitas Tambahan</h3>
                        <p class="card-desc">Pilih fasilitas yang Anda inginkan (opsional)</p>
                    </div>
                </div>
                <div class="checkbox-grid">
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="Sarapan">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#127859;</span>
                            <span class="check-label">Sarapan</span>
                        </div>
                    </label>
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="WiFi">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#128246;</span>
                            <span class="check-label">WiFi Premium</span>
                        </div>
                    </label>
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="Antar Jemput">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#128663;</span>
                            <span class="check-label">Antar Jemput</span>
                        </div>
                    </label>
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="Kolam Renang">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#127944;</span>
                            <span class="check-label">Kolam Renang</span>
                        </div>
                    </label>
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="Gym">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#128170;</span>
                            <span class="check-label">Pusat Kebugaran</span>
                        </div>
                    </label>
                    <label class="check-item">
                        <input type="checkbox" name="fasilitas[]" value="Spa">
                        <div class="check-box"><span class="check-mark">&#10003;</span></div>
                        <div class="check-info">
                            <span class="check-icon">&#128134;</span>
                            <span class="check-label">Spa &amp; Relaksasi</span>
                        </div>
                    </label>
                </div>
            </div>


            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">04</div>
                    <div>
                        <h3 class="card-title">Metode Pembayaran</h3>
                        <p class="card-desc">Pilih metode pembayaran yang Anda inginkan</p>
                    </div>
                </div>
                <div class="payment-grid">
                    <label class="payment-card">
                        <input type="radio" name="metode_pembayaran" value="Transfer Bank" required>
                        <div class="payment-inner">
                            <div class="payment-icon">&#127974;</div>
                            <div class="payment-name">Transfer Bank</div>
                            <div class="payment-desc">BCA, Mandiri, BNI, BRI</div>
                        </div>
                    </label>
                    <label class="payment-card">
                        <input type="radio" name="metode_pembayaran" value="Kartu Kredit">
                        <div class="payment-inner">
                            <div class="payment-icon">&#128179;</div>
                            <div class="payment-name">Kartu Kredit</div>
                            <div class="payment-desc">Visa, Mastercard, AMEX</div>
                        </div>
                    </label>
                    <label class="payment-card">
                        <input type="radio" name="metode_pembayaran" value="E-Wallet">
                        <div class="payment-inner">
                            <div class="payment-icon">&#128241;</div>
                            <div class="payment-name">E-Wallet</div>
                            <div class="payment-desc">GoPay, OVO, DANA, ShopeePay</div>
                        </div>
                    </label>
                </div>
                <span class="field-error" id="err-payment"></span>
            </div>

            <div class="form-card">
                <div class="card-header">
                    <div class="card-icon">05</div>
                    <div>
                        <h3 class="card-title">Permintaan Khusus</h3>
                        <p class="card-desc">Sampaikan kebutuhan atau preferensi tambahan Anda</p>
                    </div>
                </div>
                <div class="field-group full">
                    <label for="catatan">Catatan / Permintaan Khusus</label>
                    <textarea id="catatan" name="catatan" rows="5"
                              placeholder="Contoh: Kamar di lantai atas, tempat tidur twin, alergi makanan, acara spesial, dll..."></textarea>
                </div>
            </div>

            <div class="submit-section">
                <p class="submit-note">
                    Dengan menekan tombol di bawah, Anda menyetujui
                    <a href="#">Syarat &amp; Ketentuan</a> dan
                    <a href="#">Kebijakan Privasi</a> DigitalHeir Hotel.
                </p>
                <button type="submit" class="btn-submit">
                    <span>Kirim Pemesanan</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2.5">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </div>

        </form>
    </div>
</section>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-logo">
            <img src="logo.png" alt="DigitalHeir Logo" class="logo-img-footer">
        </div>
        <p class="footer-text">&copy; 2026 DigitalHeir Hotel. Sistem Pemesanan Online.</p>
    </div>
</footer>

<script>

document.getElementById('bookingForm').addEventListener('submit', function(e) {
    let valid = true;

    function showErr(id, msg) {
        document.getElementById(id).textContent = msg;
        valid = false;
    }
    function clearErr(id) {
        document.getElementById(id).textContent = '';
    }

    const nama      = document.getElementById('nama_lengkap').value.trim();
    const email     = document.getElementById('email').value.trim();
    const telepon   = document.getElementById('nomor_telepon').value.trim();
    const alamat    = document.getElementById('alamat').value.trim();
    const identitas = document.getElementById('nomor_identitas').value.trim();
    const tamu      = document.getElementById('jumlah_tamu').value;
    const checkin   = document.getElementById('tanggal_checkin').value;
    const checkout  = document.getElementById('tanggal_checkout').value;
    const kamar     = document.querySelector('input[name="tipe_kamar"]:checked');
    const payment   = document.querySelector('input[name="metode_pembayaran"]:checked');

    if (!nama)     showErr('err-nama',      'Nama lengkap wajib diisi.');        else clearErr('err-nama');
    if (!email || !/\S+@\S+\.\S+/.test(email))
                   showErr('err-email',     'Format email tidak valid.');         else clearErr('err-email');
    if (!telepon || !/^[0-9]{9,15}$/.test(telepon))
                   showErr('err-telepon',   'Nomor telepon tidak valid (9–15 digit angka).'); else clearErr('err-telepon');
    if (!alamat)   showErr('err-alamat',    'Alamat lengkap wajib diisi.');       else clearErr('err-alamat');
    if (!identitas)showErr('err-identitas', 'Nomor identitas wajib diisi.');      else clearErr('err-identitas');
    if (!kamar)    showErr('err-kamar',     'Pilih tipe kamar terlebih dahulu.'); else clearErr('err-kamar');
    if (!tamu)     showErr('err-tamu',      'Jumlah tamu wajib dipilih.');        else clearErr('err-tamu');
    if (!checkin)  showErr('err-checkin',   'Tanggal check-in wajib diisi.');     else clearErr('err-checkin');
    if (!checkout) showErr('err-checkout',  'Tanggal check-out wajib diisi.');    else clearErr('err-checkout');
    if (checkin && checkout && checkout <= checkin)
                   showErr('err-checkout',  'Check-out harus setelah check-in.'); 
    if (!payment)  showErr('err-payment',   'Pilih metode pembayaran.');          else clearErr('err-payment');

    if (!valid) {
        e.preventDefault();
        const firstErr = document.querySelector('.field-error:not(:empty)');
        if (firstErr) firstErr.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
});

document.querySelectorAll('.room-card input').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.room-card').forEach(function(c) { c.classList.remove('selected'); });
        radio.closest('.room-card').classList.add('selected');
    });
});


document.querySelectorAll('.payment-card input').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.payment-card').forEach(function(c) { c.classList.remove('selected'); });
        radio.closest('.payment-card').classList.add('selected');
    });
});


document.getElementById('tanggal_checkin').addEventListener('change', function() {
    const d = new Date(this.value);
    d.setDate(d.getDate() + 1);
    const minOut = d.toISOString().split('T')[0];
    const coEl = document.getElementById('tanggal_checkout');
    coEl.min = minOut;
    if (coEl.value && coEl.value < minOut) coEl.value = minOut;
});
</script>

</body>
</html>
