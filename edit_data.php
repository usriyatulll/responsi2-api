<?php
require 'koneksi.php';
$input = file_get_contents('php://input');
$data = json_decode($input, true);
//terima data dari mobile
$id = trim($data['id']);
$mata_pelajaran = trim($data['mata_pelajaran']);
$nilai = trim($data['nilai']);
$id_siswa = trim($data['id_siswa']);


http_response_code(201);
if ($mata_pelajaran != '' and $nilai != '' and $id_siswa != '') {
    $query = mysqli_query($koneksi, "update nilai_siswa set mata_pelajaran='$mata_pelajaran',nilai='$nilai',id_siswa='$id_siswa' where 
id='$id'");
    $pesan = true;
} else {
    $pesan = false;
}
echo json_encode($pesan);
echo mysqli_error($koneksi);
