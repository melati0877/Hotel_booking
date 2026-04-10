<?php
session_start();

if (!isset($_SESSION['booking_data'])) {
    header('Location: index.php');
    exit;
}

$data = $_SESSION['booking_data'];

function formatTanggal($tgl) {
    $namaBulan = [
        '01' => 'Januari',  '02' => 'Februari', '03' => 'Maret',
        '04' => 'April',    '05' => 'Mei',       '06' => 'Juni',
        '07' => 'Juli',     '08' => 'Agustus',   '09' => 'September',
        '10' => 'Oktober',  '11' => 'November',  '12' => 'Desember'
    ];
    $bagian = explode('-', $tgl);
    return $bagian[2] . ' ' . $namaBulan[$bagian[1]] . ' ' . $bagian[0];
}

$tgl_in  = new DateTime($data['tanggal_checkin']);
$tgl_out = new DateTime($data['tanggal_checkout']);
$durasi  = $tgl_in->diff($tgl_out)->days;

$harga = [
    'Standard'     => 800000,
    'Deluxe'       => 1500000,
    'Suite'        => 2800000,
    'Presidential' => 5000000,
];
$harga_per_malam = $harga[$data['tipe_kamar']] ?? 0;
$total_harga     = $harga_per_malam * $durasi;

unset($_SESSION['booking_data']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Berhasil — DigitalHeir Hotel</title>
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

<main class="confirm-page">
    <div class="confirm-card">

        <div class="confirm-icon-wrap">&#10003;</div>

        <h1 class="confirm-title">Pemesanan Berhasil!</h1>
        <p class="confirm-subtitle">
            Terima kasih, <strong><?= htmlspecialchars($data['nama_lengkap']) ?></strong>!<br>
            Pemesanan Anda telah kami terima dan sedang diproses.
        </p>

        <div class="confirm-highlight">
            &#9989; Data Anda telah berhasil kami simpan.
        </div>

        <div style="margin-bottom: 32px;">
            <p style="font-size:13px; color:var(--gray-text); margin-bottom:8px; font-weight:500;">
                Nomor Booking Anda
            </p>
            <span class="booking-id-badge"><?= htmlspecialchars($data['booking_id']) ?></span>
            <p style="font-size:12px; color:var(--gray-text); margin-top:8px;">
                Simpan nomor ini untuk keperluan check-in
            </p>
        </div>

        <div class="data-summary">
            <h4>&#128203; Ringkasan Pemesanan</h4>

            <div class="summary-section">
                <div class="summary-section-title">Data Pribadi</div>

                <div class="summary-row">
                    <span class="summary-key">Nama Lengkap</span>
                    <span class="summary-val"><?= htmlspecialchars($data['nama_lengkap']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Email</span>
                    <span class="summary-val"><?= htmlspecialchars($data['email']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Nomor Telepon</span>
                    <span class="summary-val"><?= htmlspecialchars($data['nomor_telepon']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Alamat</span>
                    <span class="summary-val"><?= htmlspecialchars($data['alamat']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">No. Identitas</span>
                    <span class="summary-val"><?= htmlspecialchars($data['nomor_identitas']) ?></span>
                </div>
            </div>

            <div class="summary-section">
                <div class="summary-section-title">Detail Pemesanan</div>

                <div class="summary-row">
                    <span class="summary-key">Tipe Kamar</span>
                    <span class="summary-val"><?= htmlspecialchars($data['tipe_kamar']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Jumlah Tamu</span>
                    <span class="summary-val"><?= htmlspecialchars($data['jumlah_tamu']) ?> Tamu</span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Tanggal Check-in</span>
                    <span class="summary-val"><?= formatTanggal($data['tanggal_checkin']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Tanggal Check-out</span>
                    <span class="summary-val"><?= formatTanggal($data['tanggal_checkout']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Durasi Menginap</span>
                    <span class="summary-val"><?= $durasi ?> Malam</span>
                </div>
            </div>

            <div class="summary-section">
                <div class="summary-section-title">Fasilitas &amp; Pembayaran</div>

                <div class="summary-row">
                    <span class="summary-key">Fasilitas Tambahan</span>
                    <span class="summary-val"><?= htmlspecialchars($data['fasilitas']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Metode Pembayaran</span>
                    <span class="summary-val"><?= htmlspecialchars($data['metode_pembayaran']) ?></span>
                </div>
                <div class="summary-row">
                    <span class="summary-key">Harga per Malam</span>
                    <span class="summary-val">Rp <?= number_format($harga_per_malam, 0, ',', '.') ?></span>
                </div>

                <div class="summary-row total-row">
                    <span class="summary-key">Estimasi Total</span>
                    <span class="summary-val total-val">
                        Rp <?= number_format($total_harga, 0, ',', '.') ?>
                    </span>
                </div>
            </div>

            <?php if (!empty($data['catatan']) && $data['catatan'] !== '-'): ?>
            <div class="summary-section">
                <div class="summary-section-title">Permintaan Khusus</div>
                <div class="summary-row">
                    <span class="summary-key">Catatan</span>
                    <span class="summary-val"><?= htmlspecialchars($data['catatan']) ?></span>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <div class="info-box">
            <p>
                &#128231; Konfirmasi dikirim ke <strong><?= htmlspecialchars($data['email']) ?></strong><br>
                &#128222; Tim kami akan menghubungi <strong><?= htmlspecialchars($data['nomor_telepon']) ?></strong> dalam 1x24 jam<br>
                &#8987; Waktu check-in: 14.00 WIB &nbsp;|&nbsp; Check-out: 12.00 WIB
            </p>
        </div>

        <div class="confirm-actions">
            <a href="index.php" class="btn-back">&#8592; Buat Pemesanan Baru</a>
            <button class="btn-print" onclick="window.print()">&#128424; Cetak Konfirmasi</button>
        </div>

    </div>
</main>

<footer class="footer">
    <div class="footer-inner">
        <div class="footer-logo">
            <img src="logo.png" alt="DigitalHeir Logo" class="logo-img-footer">
        </div>
        <p class="footer-text">&copy; 2026 DigitalHeir Hotel. Terima kasih telah mempercayai kami.</p>
    </div>
</footer>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const card = document.querySelector('.confirm-card');
    card.style.opacity  = '0';
    card.style.transform = 'translateY(24px)';
    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    setTimeout(function() {
        card.style.opacity  = '1';
        card.style.transform = 'translateY(0)';
    }, 100);
});
</script>

</body>
</html>
