<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $id_buku = $_POST['id_buku'];
        $id_anggota = $_POST['id_anggota'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $periode_pinjam = $_POST['periode_pinjam'];
        $status = $_POST['status'];

        $sql = "INSERT INTO `peminjaman`(`id_buku`, `id_anggota`, `tgl_pinjam`, `periode_pinjam`, `status`) VALUES ('$id_buku','$id_anggota','$tgl_pinjam','$periode_pinjam', '$status')";
        $conn->query($sql);

        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = array(
            'id_buku' => $id_buku,
            'id_anggota' => $id_anggota,
            'tgl_pinjam' => $tgl_pinjam,
            'periode_pinjam' => $periode_pinjam,
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