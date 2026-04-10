<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: gagal.php');
    exit;
}

function sanitasi($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

$nama_lengkap    = sanitasi($_POST['nama_lengkap']    ?? '');
$email           = sanitasi($_POST['email']           ?? '');
$nomor_telepon   = sanitasi($_POST['nomor_telepon']   ?? '');
$alamat          = sanitasi($_POST['alamat']          ?? '');
$nomor_identitas = sanitasi($_POST['nomor_identitas'] ?? '');

$tipe_kamar       = sanitasi($_POST['tipe_kamar']       ?? '');
$jumlah_tamu      = (int)($_POST['jumlah_tamu']         ?? 0);
$tanggal_checkin  = sanitasi($_POST['tanggal_checkin']  ?? '');
$tanggal_checkout = sanitasi($_POST['tanggal_checkout'] ?? '');

$fasilitas_pilihan = $_POST['fasilitas'] ?? [];
$fasilitas_valid   = ['Sarapan', 'WiFi', 'Antar Jemput', 'Kolam Renang', 'Gym', 'Spa'];
$fasilitas_bersih  = [];
foreach ($fasilitas_pilihan as $f) {
    if (in_array($f, $fasilitas_valid)) {
        $fasilitas_bersih[] = $f;
    }
}

$fasilitas_str = implode(', ', $fasilitas_bersih);

$metode_pembayaran = sanitasi($_POST['metode_pembayaran'] ?? '');
$catatan = sanitasi($_POST['catatan'] ?? '');

$errors = [];

if (empty($nama_lengkap))
    $errors[] = 'Nama lengkap wajib diisi.';

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
    $errors[] = 'Format email tidak valid.';

if (empty($nomor_telepon) || !preg_match('/^[0-9]{9,15}$/', $nomor_telepon))
    $errors[] = 'Nomor telepon tidak valid (9-15 digit angka).';

if (empty($alamat))
    $errors[] = 'Alamat lengkap wajib diisi.';

if (empty($nomor_identitas))
    $errors[] = 'Nomor identitas wajib diisi.';

$daftar_kamar = ['Standard', 'Deluxe', 'Suite', 'Presidential'];
if (!in_array($tipe_kamar, $daftar_kamar))
    $errors[] = 'Tipe kamar tidak valid.';

if ($jumlah_tamu < 1 || $jumlah_tamu > 10)
    $errors[] = 'Jumlah tamu tidak valid (1-10 tamu).';

if (empty($tanggal_checkin))
    $errors[] = 'Tanggal check-in wajib diisi.';

if (empty($tanggal_checkout))
    $errors[] = 'Tanggal check-out wajib diisi.';

if (!empty($tanggal_checkin) && !empty($tanggal_checkout)) {
    if ($tanggal_checkout <= $tanggal_checkin)
        $errors[] = 'Tanggal check-out harus setelah tanggal check-in.';
}

$daftar_pembayaran = ['Transfer Bank', 'Kartu Kredit', 'E-Wallet'];
if (!in_array($metode_pembayaran, $daftar_pembayaran))
    $errors[] = 'Metode pembayaran tidak valid.';

if (!empty($errors)) {
    $_SESSION['error'] = implode(' | ', $errors);
    header('Location: gagal.php');
    exit;
}

$host     = 'localhost';
$username = 'root';
$password = '';
$database = 'db_hotel';

mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    $_SESSION['error'] = 'Koneksi database gagal: ' . $conn->connect_error .
                         '. Pastikan XAMPP MySQL sudah berjalan dan database db_hotel sudah dibuat.';
    header('Location: gagal.php');
    exit;
}

// ---------------------------------------------------------------
// VALIDASI DUPLIKASI:
// - Orang SAMA (nomor_identitas sama) => BOLEH pesan berkali-kali
// - Data (email/HP/identitas) dipakai nomor_identitas BERBEDA => TOLAK
// ---------------------------------------------------------------
$cek_sql = "SELECT COUNT(*) AS total
             FROM tb_pemesanan
             WHERE (email = ? OR nomor_telepon = ? OR nomor_identitas = ?)
             AND nomor_identitas != ?";
$cek_stmt = $conn->prepare($cek_sql);
$cek_stmt->bind_param('ssss', $email, $nomor_telepon, $nomor_identitas, $nomor_identitas);
$cek_stmt->execute();
$cek_row = $cek_stmt->get_result()->fetch_assoc();
$cek_stmt->close();

if ((int)$cek_row['total'] > 0) {
    $conn->close();
    $_SESSION['error'] = 'Terjadi kesalahan, data gagal disimpan.';
    $_SESSION['alasan'] = 'Email, nomor telepon, atau nomor identitas sudah digunakan oleh orang lain. '
                        . 'Setiap tamu harus menggunakan data diri yang unik.';
    header('Location: gagal.php');
    exit;
}
// total = 0 => aman lanjut (termasuk orang yang sama pesan ulang berkali-kali)

$booking_id = 'DH-' . strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));

$sql = "INSERT INTO tb_pemesanan 
            (booking_id, nama_lengkap, email, nomor_telepon, alamat, nomor_identitas,
             tipe_kamar, jumlah_tamu, tanggal_checkin, tanggal_checkout,
             fasilitas, metode_pembayaran, catatan)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['error'] = 'Terjadi kesalahan sistem. Silakan coba lagi.';
    $conn->close();
    header('Location: gagal.php');
    exit;
}

$stmt->bind_param(
    'sssssssisssss',
    $booking_id,
    $nama_lengkap,
    $email,
    $nomor_telepon,
    $alamat,
    $nomor_identitas,
    $tipe_kamar,
    $jumlah_tamu,
    $tanggal_checkin,
    $tanggal_checkout,
    $fasilitas_str,
    $metode_pembayaran,
    $catatan
);

try {
    $berhasil = $stmt->execute();
} catch (Exception $e) {
    $berhasil = false;
}

$stmt->close();
$conn->close();

if ($berhasil) {
    $_SESSION['booking_data'] = [
        'booking_id'        => $booking_id,
        'nama_lengkap'      => $nama_lengkap,
        'email'             => $email,
        'nomor_telepon'     => $nomor_telepon,
        'alamat'            => $alamat,
        'nomor_identitas'   => $nomor_identitas,
        'tipe_kamar'        => $tipe_kamar,
        'jumlah_tamu'       => $jumlah_tamu,
        'tanggal_checkin'   => $tanggal_checkin,
        'tanggal_checkout'  => $tanggal_checkout,
        'fasilitas'         => $fasilitas_str ?: '-',
        'metode_pembayaran' => $metode_pembayaran,
        'catatan'           => $catatan ?: '-',
    ];

    header('Location: konfirmasi.php');
    exit;

} else {
    $_SESSION['error'] = 'Terjadi kesalahan, data gagal disimpan.';
    header('Location: gagal.php');
    exit;
}
?>
