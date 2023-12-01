<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
//terima data dari mobile
$mata_pelajaran = trim($data['mata_pelajaran']);
$nilai = trim($data['nilai']);
$id_siswa = trim($data['id_siswa']);
http_response_code(201);
if ($mata_pelajaran != '' and $nilai != '' and $id_siswa != '') {
    $query = mysqli_query($koneksi, "insert into nilai_siswa(mata_pelajaran, nilai, id_siswa) values('$mata_pelajaran','$nilai', '$id_siswa')");
    $pesan = true;
} else {
    $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
