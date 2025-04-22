<?php
// Daftar bandara asal dan pajaknya
$bandara_asal = [
    "Soekarno Hatta" => 65000,
    "Husein Sastranegara" => 50000,
    "Abdul Rachman Saleh" => 40000,
    "Juanda" => 30000
];

// Daftar bandara tujuan dan pajaknya
$bandara_tujuan = [
    "Ngurah Rai" => 85000,
    "Hasanuddin" => 70000,
    "Inanwatan" => 90000,
    "Sultan Iskandar Muda" => 60000
];

// Urutkan array bandara
ksort($bandara_asal);
ksort($bandara_tujuan);

$hasil = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maskapai = $_POST["maskapai"];
    $asal = $_POST["asal"];
    $tujuan = $_POST["tujuan"];
    $harga_tiket = (int) $_POST["harga"];

    $pajak_asal = $bandara_asal[$asal];
    $pajak_tujuan = $bandara_tujuan[$tujuan];
    $total_pajak = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga_tiket + $total_pajak;

    $hasil = [
        "tanggal" => date("d-m-Y"),
        "maskapai" => $maskapai,
        "asal" => $asal,
        "tujuan" => $tujuan,
        "harga" => $harga_tiket,
        "pajak" => $total_pajak,
        "total" => $total_harga
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Rute Penerbangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Form Pendaftaran Rute Penerbangan</h2>
    <form method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label>Nama Maskapai</label>
            <input type="text" name="maskapai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Bandara Asal</label>
            <select name="asal" class="form-select" required>
                <?php foreach ($bandara_asal as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Bandara Tujuan</label>
            <select name="tujuan" class="form-select" required>
                <?php foreach ($bandara_tujuan as $nama => $pajak): ?>
                    <option value="<?= $nama ?>"><?= $nama ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php if (!empty($hasil)): ?>
    <div class="mt-5 bg-white p-4 rounded shadow-sm">
        <h4>Data Penerbangan</h4>
        <p><strong>Nomor:</strong> <?= rand(1000, 9999) ?></p>
        <p><strong>Tanggal:</strong> <?= $hasil["tanggal"] ?></p>
        <p><strong>Nama Maskapai:</strong> <?= $hasil["maskapai"] ?></p>
        <p><strong>Asal Penerbangan:</strong> <?= $hasil["asal"] ?></p>
        <p><strong>Tujuan Penerbangan:</strong> <?= $hasil["tujuan"] ?></p>
        <p><strong>Harga Tiket:</strong> Rp<?= number_format($hasil["harga"], 0, ',', '.') ?></p>
        <p><strong>Pajak:</strong> Rp<?= number_format($hasil["pajak"], 0, ',', '.') ?></p>
        <p><strong>Total Harga Tiket:</strong> Rp<?= number_format($hasil["total"], 0, ',', '.') ?></p>
    </div>
    <?php endif; ?>
</div>

</body>
</html>
