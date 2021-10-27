<?php
    include('sambungan.php'); 

    $idsoalan = $_POST['idsoalan'];
    $sql = "select * from soalan where idsoalan = '$idsoalan'";
    $result = mysqli_query($sambungan, $sql);
    $soalan = mysqli_fetch_array($result);

    $tekssoalan = $soalan['soalan'];
    $pilihan_a = $soalan['pilihan_a'];
    $pilihan_b = $soalan['pilihan_b'];
    $pilihan_c = $soalan['pilihan_c'];
    $jawapan = $soalan['jawapan'];
    $idguru = $soalan['idguru'];
?>

<link rel="stylesheet" href="senarai.css">
<table>
<caption >MAKLUMAT SOALAN</caption>
<tr>
    <th>Perkara</th>
    <th>Maklumat</th>
</tr>
<tr>
    <td class="keputusan">ID Soalan</td>
    <td class="keputusan"><?php echo $idsoalan; ?></td>
</tr>     
<tr>
    <td class="keputusan">Soalan</td>
    <td class="keputusan"><?php echo $tekssoalan; ?></td>
</tr>
<tr>
    <td class="keputusan">Pilihan A</td>
    <td class="keputusan"><?php echo $pilihan_a; ?></td>
</tr>
<tr>
    <td class="keputusan">Pilihan B</td>
    <td class="keputusan"><?php echo $pilihan_b; ?></td>
</tr>
<tr>
    <td class="keputusan">Pilihan C</td>
    <td class="keputusan"><?php echo $pilihan_c; ?></td>
</tr>
<tr>
    <td class="keputusan">Jawapan</td>
    <td class="keputusan"><?php echo $jawapan; ?></td>
</tr>
<tr>
    <td class="keputusan">ID Guru</td>
    <td class="keputusan"><?php echo $idguru; ?></td>
</tr>
</table>