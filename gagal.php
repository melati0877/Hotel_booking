<?php
session_start();
if (!isset($_SESSION['error'])) {
    header('Location: index.php');
    exit;
}
$pesan_error = $_SESSION['error'];
$alasan = $_SESSION['alasan'] ?? '';
unset($_SESSION['error']);
unset($_SESSION['alasan']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Gagal — DigitalHeir Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
      
        .confirm-icon-wrap {
            background: linear-gradient(135deg, #e53935, #c62828) !important;
        }
        .confirm-highlight {
            background: #fff0f0 !important;
            border-color: #e53935 !important;
            color: #c62828 !important;
        }
        .booking-id-badge {
            background: #e53935 !important;
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


<main class="confirm-page">
    <div class="confirm-card">

       
        <div class="confirm-icon-wrap">&#10007;</div>

        <h1 class="confirm-title" style="color:#c62828;">Pemesanan Gagal!</h1>
        <p class="confirm-subtitle">
            Mohon maaf, pemesanan Anda tidak dapat diproses.<br>
            Silakan coba kembali beberapa saat lagi.
        </p>

        <div class="confirm-highlight">
            &#10060; Terjadi kesalahan, data gagal disimpan.
        </div>

        <?php if (!empty($alasan)): ?>
        <div style="background:#fff3f3; border:1px solid #e53935; border-radius:10px; padding:14px 20px; margin-top:16px; font-size:14px; color:#c62828;">
            &#9888;&#65039; <strong>Alasan:</strong> <?= htmlspecialchars($alasan) ?>
        </div>
        <?php endif; ?>

        <div class="info-box" style="margin-top: 24px;">
            <p>
                &#9888;&#65039; Kemungkinan penyebab kegagalan:<br>
                &bull; Koneksi ke server database terputus<br>
                &bull; Server sedang dalam proses maintenance<br>
                &bull; Kapasitas server penuh
            </p>
        </div>

        <div class="confirm-actions" style="margin-top: 32px;">
            <a href="index.php" class="btn-back">&#8592; Coba Pesan Lagi</a>
            <a href="kontak.php" class="btn-print" style="text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
                &#128222; Hubungi Kami
            </a>
        </div>

    </div>
</main>


<footer class="footer">
    <div class="footer-inner">
        <div class="footer-logo">
            <img src="logo.png" alt="DigitalHeir Logo" class="logo-img-footer">
        </div>
        <p class="footer-text">&copy; 2026 DigitalHeir Hotel. Sistem Pemesanan Online.</p>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const card = document.querySelector('.confirm-card');
    card.style.opacity   = '0';
    card.style.transform = 'translateY(24px)';
    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    setTimeout(function() {
        card.style.opacity   = '1';
        card.style.transform = 'translateY(0)';
    }, 100);
});
</script>

</body>
</html>
