<?php 
include('sambungan.php'); 
$namajadual = $_POST['namatable'];
$namafail = $_FILES['namafail']['name'];

//ambil data dari mana pun boleh
$sementara = $_FILES['namafail']['tmp_name'];
move_uploaded_file($sementara, $namafail);

$fail = fopen($namafail, "r");
while (!feof($fail)) {
   
    $medan = explode(",", fgets($fail));
    
    if (strtolower($namajadual) === "pelajar") {
        $idpelajar = $medan[0];
        $namapelajar = $medan[1]; 
        $idkelas = $medan[2];
        $password = $medan[3];
        $sql = "insert into pelajar values('$idpelajar', '$namapelajar', '$idkelas', '$password')";
        if (mysqli_query($sambungan, $sql))
            $berjaya = true; 
        else
            echo "Ralat : $sql<br>".mysqli_error($sambungan);
    }
    
    if (strtolower($namajadual) === "soalan") {
        $idsoalan = trim($medan[0]);
        $soalan = trim($medan[1]);
        $pilihan_a = trim($medan[2]);
        $pilihan_b = trim($medan[3]);
        $pilihan_c = trim($medan[4]);
        $jawapan = trim($medan[5]);
        $idguru = trim($medan[6]);
        $sql = "insert into soalan values('$idsoalan', '$soalan','$pilihan_a', '$pilihan_b', '$pilihan_c', '$jawapan',  '$idguru')";
        if (mysqli_query($sambungan, $sql))
            $berjaya = true;
        else {
            $berjaya = false;
            echo "Ralat : $sql<br>".mysqli_error($sambungan);}
    }
}

if ($berjaya == true) {
    echo "<script>alert('Rekod berjaya diimport');</script>";
    echo "<script>window.location='import.html'</script>";
}
else
    echo "<script>alert('Rekod tidak berjaya diimport');</script>";
mysqli_close($sambungan);
?>
