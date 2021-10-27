<?php
    include('sambungan.php'); 

    $idguru = $_POST['idguru'];
    $sql = "select * from guru where idguru = '$idguru'";
    $result = mysqli_query($sambungan, $sql);
    $guru = mysqli_fetch_array($result);

    $namaguru = $guru['namaguru'];
    $password = $guru['passwordguru'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
<caption >MAKLUMAT GURU</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="keputusan">ID Guru</td>
    <td class="keputusan"><?php echo $idguru; ?></td>
</tr>     
<tr>
    <td class="keputusan">Nama</td>
    <td class="keputusan"><?php echo $namaguru; ?></td>
</tr>
<tr>
    <td class="keputusan">Password</td>
    <td class="keputusan"><?php echo $password; ?></td>
</tr>
</table>