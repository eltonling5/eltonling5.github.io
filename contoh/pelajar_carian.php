<?php
    include('sambungan.php'); 

    $idpelajar = $_POST['idpelajar'];
    $sql = "select * from pelajar where idpelajar = '$idpelajar'";
    $result = mysqli_query($sambungan, $sql);
    $pelajar = mysqli_fetch_array($result);

    $namapelajar = $pelajar['namapelajar'];
    $idkelas = $pelajar['idkelas'];
    $password = $pelajar['passwordpelajar'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
<caption >MAKLUMAT PELAJAR</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="keputusan">ID Pelajar</td>
    <td class="keputusan"><?php echo $idpelajar; ?></td>
</tr>     
<tr>
    <td class="keputusan">Nama</td>
    <td class="keputusan"><?php echo $namapelajar; ?></td>
</tr>
<tr>
    <td class="keputusan">ID Kelas</td>
    <td class="keputusan"><?php echo $idkelas; ?></td>
</tr>
<tr>
    <td class="keputusan">Password</td>
    <td class="keputusan"><?php echo $password; ?></td>
</tr>
</table>