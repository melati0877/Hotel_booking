<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami — DigitalHeir Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .page-hero {
            background: linear-gradient(135deg, #263058 0%, #1a2240 100%);
            padding: 100px 40px 60px;
            text-align: center;
            color: #fff;
        }
        .page-hero h1 { font-family: 'Playfair Display', serif; font-size: 42px; margin-bottom: 12px; }
        .page-hero p  { color: rgba(255,255,255,0.7); font-size: 16px; }

        .kontak-section { padding: 64px 40px; max-width: 1000px; margin: 0 auto; }

        .kontak-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

        .info-kontak h2 {
            font-family: 'Playfair Display', serif;
            font-size: 30px;
            color: #263058;
            margin-bottom: 8px;
        }
        .info-kontak .sub { color: #888; margin-bottom: 32px; font-size: 14px; }

        .kontak-item {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e8ecf4;
            margin-bottom: 16px;
            box-shadow: 0 2px 8px rgba(38,48,88,0.06);
        }
        .kontak-item-icon { font-size: 28px; flex-shrink: 0; }
        .kontak-item-label { font-weight: 700; color: #263058; font-size: 14px; margin-bottom: 4px; }
        .kontak-item-val   { color: #555; font-size: 14px; line-height: 1.5; }

        .form-kontak {
            background: #fff;
            border-radius: 16px;
            padding: 36px 32px;
            border: 1px solid #e8ecf4;
            box-shadow: 0 4px 24px rgba(38,48,88,0.08);
        }
        .form-kontak h3 {
            font-family: 'Playfair Display', serif;
            font-size: 22px;
            color: #263058;
            margin-bottom: 24px;
        }
        .fk-group { margin-bottom: 20px; }
        .fk-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #263058;
            margin-bottom: 6px;
        }
        .fk-group input,
        .fk-group textarea,
        .fk-group select {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #d0d8f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: #263058;
            background: #fafbff;
            box-sizing: border-box;
            transition: border-color 0.2s;
            outline: none;
        }
        .fk-group input:focus,
        .fk-group textarea:focus { border-color: #4a6cf7; background: #fff; }
        .fk-group textarea { resize: vertical; }

        .btn-kirim {
            width: 100%;
            background: #263058;
            color: #fff;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            transition: background 0.2s;
        }
        .btn-kirim:hover { background: #4a6cf7; }

        .sukses-msg {
            display: none;
            background: #e8f8ee;
            border: 1px solid #4caf50;
            color: #2e7d32;
            padding: 14px 20px;
            border-radius: 10px;
            margin-top: 16px;
            font-size: 14px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .kontak-wrap { grid-template-columns: 1fr; }
            .page-hero h1 { font-size: 28px; }
            .kontak-section { padding: 40px 16px; }
            .form-kontak { padding: 24px 20px; }
        }
    </style>
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

<div class="page-hero">
    <h1>Hubungi Kami</h1>
    <p>Tim kami siap membantu Anda 24 jam sehari, 7 hari seminggu</p>
</div>

<section class="kontak-section">
    <div class="kontak-wrap">

        <div class="info-kontak">
            <h2>Informasi Kontak</h2>
            <p class="sub">Jangan ragu untuk menghubungi kami kapan saja</p>

            <div class="kontak-item">
                <div class="kontak-item-icon">📍</div>
                <div>
                    <div class="kontak-item-label">Alamat Hotel</div>
                    <div class="kontak-item-val">Jl. Sudirman No. 1, Jakarta Pusat<br>DKI Jakarta 10220, Indonesia</div>
                </div>
            </div>

            <div class="kontak-item">
                <div class="kontak-item-icon">📞</div>
                <div>
                    <div class="kontak-item-label">Telepon</div>
                    <div class="kontak-item-val">+62 21 5000 1234<br>+62 812 9999 8888 (WhatsApp)</div>
                </div>
            </div>

            <div class="kontak-item">
                <div class="kontak-item-icon">📧</div>
                <div>
                    <div class="kontak-item-label">Email</div>
                    <div class="kontak-item-val">reservasi@digitalheir.co<br>info@digitalheir.co</div>
                </div>
            </div>

            <div class="kontak-item">
                <div class="kontak-item-icon">🕐</div>
                <div>
                    <div class="kontak-item-label">Jam Operasional Front Desk</div>
                    <div class="kontak-item-val">Senin – Minggu: 24 Jam<br>Check-in: 14.00 | Check-out: 12.00</div>
                </div>
            </div>
        </div>

        <div class="form-kontak">
            <h3>✉️ Kirim Pesan</h3>

            <div class="fk-group">
                <label>Nama Lengkap</label>
                <input type="text" id="fk-nama" placeholder="Nama Anda">
            </div>
            <div class="fk-group">
                <label>Email</label>
                <input type="email" id="fk-email" placeholder="email@contoh.com">
            </div>
            <div class="fk-group">
                <label>Subjek</label>
                <select id="fk-subjek">
                    <option value="">-- Pilih Subjek --</option>
                    <option>Informasi Pemesanan</option>
                    <option>Pertanyaan Fasilitas</option>
                    <option>Keluhan & Saran</option>
                    <option>Lainnya</option>
                </select>
            </div>
            <div class="fk-group">
                <label>Pesan</label>
                <textarea id="fk-pesan" rows="5" placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <button class="btn-kirim" onclick="kirimPesan()">Kirim Pesan →</button>

            <div class="sukses-msg" id="sukses-msg">
                ✅ Pesan Anda telah terkirim! Tim kami akan menghubungi Anda dalam 1x24 jam.
            </div>
        </div>

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
function kirimPesan() {
    const nama    = document.getElementById('fk-nama').value.trim();
    const email   = document.getElementById('fk-email').value.trim();
    const subjek  = document.getElementById('fk-subjek').value;
    const pesan   = document.getElementById('fk-pesan').value.trim();

    if (!nama || !email || !subjek || !pesan) {
        alert('Mohon lengkapi semua field sebelum mengirim.');
        return;
    }

    document.getElementById('sukses-msg').style.display = 'block';
    document.getElementById('fk-nama').value   = '';
    document.getElementById('fk-email').value  = '';
    document.getElementById('fk-subjek').value = '';
    document.getElementById('fk-pesan').value  = '';

    setTimeout(function() {
        document.getElementById('sukses-msg').style.display = 'none';
    }, 5000);
}
</script>

</body>
</html>
