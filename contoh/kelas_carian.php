<?php
    include('sambungan.php'); 

    $idkelas = $_POST['idkelas'];
    $sql = "select * from kelas where idkelas = '$idkelas'";
    $result = mysqli_query($sambungan, $sql);
    $kelas = mysqli_fetch_array($result);
foreach($kelas as $s) {
    echo "'$s'\n";
}
    $namakelas = $kelas['namakelas'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
<caption >MAKLUMAT KELAS</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="keputusan">ID Kelas</td>
    <td class="keputusan"><?php echo $idkelas; ?></td>
</tr>     
<tr>
    <td class="keputusan">Nama Kelas</td>
    <td class="keputusan"><?php echo $namakelas; ?></td>
</tr>
</table>