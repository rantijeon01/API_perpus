<?php 
header("Content.Type:application/json");
include "../koneksi.php";
mysqli_set_charset($conn, 'utf8');
$method = $_SERVER['REQUEST_METHOD'];
$result = array();

if ($method == 'POST') {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    $sql = "UPDATE anggota SET nama='$nama',alamat='$alamat',no_telp='$no_telp',email='$email',status='$status' WHERE id_anggota = '$id'";
    $conn->query($sql);

    $result['status']['success'] = true;
    $result['status']['code'] = 200;
    $result['status']['description'] = 'Request Valid'; 
    $result['hasil'] = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'no_telp' => $no_telp,
        'email' => $email,
        'status' => $status,
    );

}
else {
    $result['status']['code'] = 400;
}

// menampilkan data json dari database
$json = json_encode($result);
print_r($json);
?>