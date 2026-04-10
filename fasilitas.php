<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fasilitas — DigitalHeir Hotel</title>
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

        .fas-section { padding: 64px 40px; max-width: 1100px; margin: 0 auto; }
        .fas-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            color: #263058;
            margin-bottom: 8px;
        }
        .fas-section .sub { color: #888; margin-bottom: 40px; font-size: 15px; }

        .fas-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-bottom: 64px;
        }

        .fas-card {
            background: #fff;
            border-radius: 16px;
            padding: 32px 24px;
            text-align: center;
            border: 1px solid #e8ecf4;
            box-shadow: 0 4px 16px rgba(38,48,88,0.07);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .fas-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(38,48,88,0.14); }

        .fas-icon { font-size: 48px; margin-bottom: 16px; }
        .fas-name { font-size: 18px; font-weight: 700; color: #263058; margin-bottom: 8px; }
        .fas-desc { font-size: 13px; color: #777; line-height: 1.6; }

        .fas-highlight {
            background: linear-gradient(135deg, #263058, #3d5a99);
            border-radius: 20px;
            padding: 48px 40px;
            color: #fff;
            text-align: center;
        }
        .fas-highlight h3 { font-family: 'Playfair Display', serif; font-size: 28px; margin-bottom: 12px; }
        .fas-highlight p  { color: rgba(255,255,255,0.8); margin-bottom: 28px; font-size: 15px; }
        .btn-reservasi {
            display: inline-block;
            background: #fff;
            color: #263058;
            padding: 14px 36px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 15px;
            transition: background 0.2s;
        }
        .btn-reservasi:hover { background: #eef1fb; }

        @media (max-width: 768px) {
            .fas-grid { grid-template-columns: repeat(2, 1fr); }
            .page-hero h1 { font-size: 28px; }
            .fas-section { padding: 40px 16px; }
            .fas-highlight { padding: 36px 20px; }
        }
        @media (max-width: 480px) {
            .fas-grid { grid-template-columns: 1fr; }
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
    <h1>Fasilitas Hotel</h1>
    <p>Nikmati berbagai fasilitas premium yang kami sediakan untuk kenyamanan Anda</p>
</div>

<section class="fas-section">
    <h2>Fasilitas Unggulan</h2>
    <p class="sub">Semua fasilitas tersedia 24 jam untuk kepuasan tamu kami</p>

    <div class="fas-grid">
        <div class="fas-card">
            <div class="fas-icon">🍳</div>
            <div class="fas-name">Sarapan</div>
            <div class="fas-desc">Sarapan prasmanan dengan pilihan menu internasional dan lokal setiap pagi mulai pukul 06.00–10.00 WIB.</div>
        </div>
        <div class="fas-card">
            <div class="fas-icon">📶</div>
            <div class="fas-name">WiFi Premium</div>
            <div class="fas-desc">Koneksi internet super cepat hingga 1 Gbps tersedia di seluruh area hotel tanpa batas kuota.</div>
        </div>
        <div class="fas-card">
            <div class="fas-icon">🚗</div>
            <div class="fas-name">Antar Jemput</div>
            <div class="fas-desc">Layanan antar jemput bandara dengan armada mewah. Reservasi minimal 6 jam sebelumnya.</div>
        </div>
        <div class="fas-card">
            <div class="fas-icon">🏊</div>
            <div class="fas-name">Kolam Renang</div>
            <div class="fas-desc">Kolam renang infinity rooftop dengan pemandangan kota yang spektakuler. Buka 07.00–21.00 WIB.</div>
        </div>
        <div class="fas-card">
            <div class="fas-icon">💪</div>
            <div class="fas-name">Pusat Kebugaran</div>
            <div class="fas-desc">Gym modern dilengkapi peralatan terkini dan personal trainer profesional. Buka 24 jam.</div>
        </div>
        <div class="fas-card">
            <div class="fas-icon">💆</div>
            <div class="fas-name">Spa & Relaksasi</div>
            <div class="fas-desc">Spa mewah dengan terapis berpengalaman menawarkan berbagai treatment relaksasi tubuh dan pikiran.</div>
        </div>
    </div>


    <div class="fas-highlight">
        <h3>Siap Menikmati Semua Fasilitas?</h3>
        <p>Pesan kamar Anda sekarang dan nikmati pengalaman menginap yang tak terlupakan</p>
        <a href="index.php#form-section" class="btn-reservasi">Reservasi Sekarang →</a>
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

</body>
</html>
