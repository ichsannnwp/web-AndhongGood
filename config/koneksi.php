<?php

header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kommas";

$koneksi = new mysqli($servername,$username,$password,$dbname);

if($koneksi->connect_error){
    die(json_encode(array("error" => "koneksi database gagal: " . $koneksi->connect_error)));
}

$sql = "SELECT id, nama, lat, lng, descr, history FROM buildings";
$result = $koneksi->query($sql);

$buldings = array();

if ($result === FALSE) {
    // Kueri gagal! Cetak pesan error MySQL
    die("Error Kueri SQL: " . $koneksi->error);
}

if ($result->num_rows > 0) {
    // 3. AMBIL HASIL
    while($row = $result->fetch_assoc()) {
        // Simpan setiap baris ke dalam array
        $buildings[] = $row;
    }
}

$koneksi->close();

// 4. FORMAT KE JSON dan Cetak
echo json_encode($buildings);

?>