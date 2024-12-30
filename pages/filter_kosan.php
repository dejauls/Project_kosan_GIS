<?php
$conn = new mysqli('localhost', 'root', '', 'universitas');

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$university = $_POST['university'] ?? '';
$min_price = $_POST['min_price'] ?? 0;
$max_price = $_POST['max_price'] ?? 1000000000;
$max_distance = $_POST['max_distance'] ?? 10;

if (empty($university)) {
    echo json_encode([]);
    exit;
}

$stmt = $conn->prepare("SELECT * FROM kosan WHERE universitas = ? AND harga BETWEEN ? AND ? AND jarak <= ?");
$stmt->bind_param("siii", $university, $min_price, $max_price, $max_distance);
$stmt->execute();
$result = $stmt->get_result();

$kosan_list = [];
while ($row = $result->fetch_assoc()) {
    $kosan_list[] = [
        'gambar_url' => $row['gambar_url'],
        'nama_kos' => $row['nama_kos'],
        'deskripsi' => $row['deskripsi'],
        'harga' => $row['harga'],
        'alamat' => $row['alamat'],
        'no_telepon' => $row['no_telepon'],
        'jarak' => $row['jarak']
    ];
}

echo json_encode($kosan_list);

$stmt->close();
$conn->close();
