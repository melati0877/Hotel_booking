<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipe Kamar — DigitalHeir Hotel</title>
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

        .kamar-section { padding: 64px 40px; max-width: 1100px; margin: 0 auto; }

        .kamar-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            margin-top: 40px;
        }

        .kamar-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(38,48,88,0.10);
            border: 1px solid #e8ecf4;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .kamar-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(38,48,88,0.16); }

        .kamar-thumb {
            background: linear-gradient(135deg, #263058, #3d5a99);
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
        }

        .kamar-body { padding: 28px; }
        .kamar-badge {
            display: inline-block;
            background: #eef1fb;
            color: #263058;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
            text-transform: uppercase;
        }
        .kamar-name { font-family: 'Playfair Display', serif; font-size: 26px; color: #263058; margin-bottom: 8px; }
        .kamar-price { font-size: 22px; font-weight: 700; color: #4a6cf7; margin-bottom: 16px; }
        .kamar-price span { font-size: 13px; font-weight: 400; color: #888; }

        .kamar-features { list-style: none; padding: 0; margin: 0 0 24px; }
        .kamar-features li {
            padding: 6px 0;
            font-size: 14px;
            color: #555;
            display: flex;
            align-items: center;
            gap: 8px;
            border-bottom: 1px solid #f0f2f8;
        }
        .kamar-features li:last-child { border-bottom: none; }
        .kamar-features li::before { content: "✓"; color: #4a6cf7; font-weight: 700; }

        .btn-pesan {
            display: block;
            text-align: center;
            background: #263058;
            color: #fff;
            padding: 13px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: background 0.2s;
        }
        .btn-pesan:hover { background: #4a6cf7; }

        @media (max-width: 768px) {
            .kamar-grid { grid-template-columns: 1fr; }
            .page-hero h1 { font-size: 28px; }
            .kamar-section { padding: 40px 16px; }
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
    <h1>Tipe Kamar</h1>
    <p>Temukan kamar yang paling sesuai dengan kebutuhan dan kenyamanan Anda</p>
</div>

<section class="kamar-section">
    <div class="kamar-grid">

        <div class="kamar-card">
            <div class="kamar-thumb">🛏️</div>
            <div class="kamar-body">
                <span class="kamar-badge">Standard</span>
                <div class="kamar-name">Standard Room</div>
                <div class="kamar-price">Rp 800.000 <span>/ malam</span></div>
                <ul class="kamar-features">
                    <li>Kamar tidur nyaman 25m²</li>
                    <li>Tempat tidur Queen Size</li>
                    <li>TV LED 40 inch</li>
                    <li>AC & Kamar Mandi Dalam</li>
                    <li>Kapasitas 2 tamu</li>
                </ul>
                <a href="index.php#form-section" class="btn-pesan">Pesan Sekarang</a>
            </div>
        </div>

        <div class="kamar-card">
            <div class="kamar-thumb" style="background: linear-gradient(135deg, #1a4a7a, #2d6ca8);">🌟</div>
            <div class="kamar-body">
                <span class="kamar-badge">Deluxe</span>
                <div class="kamar-name">Deluxe Room</div>
                <div class="kamar-price">Rp 1.500.000 <span>/ malam</span></div>
                <ul class="kamar-features">
                    <li>Kamar luas 35m² dengan view kota</li>
                    <li>Tempat tidur King Size</li>
                    <li>TV LED 50 inch + Bathtub</li>
                    <li>Mini bar & Sofa</li>
                    <li>Kapasitas 2–3 tamu</li>
                </ul>
                <a href="index.php#form-section" class="btn-pesan">Pesan Sekarang</a>
            </div>
        </div>

        <div class="kamar-card">
            <div class="kamar-thumb" style="background: linear-gradient(135deg, #5a2d82, #8b4fc0);">🏛️</div>
            <div class="kamar-body">
                <span class="kamar-badge">Suite</span>
                <div class="kamar-name">Suite Room</div>
                <div class="kamar-price">Rp 2.800.000 <span>/ malam</span></div>
                <ul class="kamar-features">
                    <li>Suite mewah 60m² pemandangan panorama</li>
                    <li>Ruang tamu terpisah</li>
                    <li>Jacuzzi & Walk-in closet</li>
                    <li>Butler service 24 jam</li>
                    <li>Kapasitas 3–4 tamu</li>
                </ul>
                <a href="index.php#form-section" class="btn-pesan">Pesan Sekarang</a>
            </div>
        </div>

        <div class="kamar-card">
            <div class="kamar-thumb" style="background: linear-gradient(135deg, #7a4a00, #c47a00);">👑</div>
            <div class="kamar-body">
                <span class="kamar-badge">Presidential</span>
                <div class="kamar-name">Presidential Suite</div>
                <div class="kamar-price">Rp 5.000.000 <span>/ malam</span></div>
                <ul class="kamar-features">
                    <li>Suite eksklusif 120m² lantai paling atas</li>
                    <li>2 kamar tidur + ruang makan</li>
                    <li>Private pool & terrace</li>
                    <li>Chef & butler pribadi</li>
                    <li>Kapasitas hingga 6 tamu</li>
                </ul>
                <a href="index.php#form-section" class="btn-pesan">Pesan Sekarang</a>
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

</body>
</html>
