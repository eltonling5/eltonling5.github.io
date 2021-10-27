<?php
    include('sambungan.php');
    session_start();
    $idpelajar = $_SESSION['username'];
        
    $sql = "select * from soalan order by idsoalan ASC";
    $data = mysqli_query($sambungan, $sql);
    
    $sql2 = "select idkuiz from kuiz where idpelajar = '".$idpelajar."' order by idkuiz desc limit 1";
    $id = mysqli_query($sambungan, $sql2);
    $idkuiz = mysqli_fetch_array($id)['idkuiz']; 

    while ($soalan = mysqli_fetch_array($data)) {
        $idsoalan = $soalan['idsoalan'];
        $jawapanpelajar = $_POST["$idsoalan"];
        $sql = "insert into pilih (idkuiz, idpelajar, idsoalan, jawapanpelajar, markah) values('$idkuiz', '$idpelajar', '$idsoalan', '$jawapanpelajar', 0)";
        $datakuiz = mysqli_query($sambungan, $sql);

    }
    include('jawab_ulangkaji.php');
?>       