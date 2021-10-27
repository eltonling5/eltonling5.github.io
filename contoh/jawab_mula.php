<?php
    include('sambungan.php');

    session_start();
    $idpelajar = $_SESSION['username'];

    //$sql = "select idpelajar from kuiz where idpelajar = '".$idpelajar."'";
    $sql = "insert into kuiz (idpelajar) values ('$idpelajar')";
    $data = mysqli_query($sambungan, $sql);

    //$sql2 = "insert into rekod (idpelajar) values('$idpelajar')";
    //$data2 = mysqli_query($sambungan, $sql2);
    
    //semak samada pelajar dah jawab atau belum
    /*if (mysqli_num_rows($data) > 0)
        header("Location: jawab_ulangkaji.php");
    else*/
        header("Location: jawab_soalan.php");
?>