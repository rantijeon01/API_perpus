<?php 
    header("Content.Type:application/json");
    include "../koneksi.php";
    mysqli_set_charset($conn, 'utf8');
    $method = $_SERVER['REQUEST_METHOD'];
    $result = array();

    if ($method == 'POST') {
        $id = $_GET['id'];
        $judul = $_POST['jdl_buku'];
        $genre = $_POST['genre'];
        $deskripsi = $_POST['deskripsi'];
        $penerbit = $_POST['penerbit'];
        $thn_terbit = $_POST['tahun_terbit'];
        $status = $_POST['status'];

        $sql = "UPDATE buku SET jdl_buku='$judul',genre='$genre',deskripsi='$deskripsi',penerbit='$penerbit',tahun_terbit='$thn_terbit',status='$status' WHERE id_buku = '$id'";
        $conn->query($sql);

        $result['status']['success'] = true;
        $result['status']['code'] = 200;
        $result['status']['description'] = 'Request Valid'; 
        $result['hasil'] = array(
           'jdl_buku' => $judul,
            'genre' => $genre,
            'deskripsi' => $deskripsi,
            'penerbit' => $penerbit,
            'tahun_terbit' => $thn_terbit,
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