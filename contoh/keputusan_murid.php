<html>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">
<body>

    <table>
        <tr>
            <th>Bil</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tarikh</th>
            <th>Markah</th>
            <th>Peratus</th>
        </tr>

<?php
    include('sambungan.php');    
    
    session_start();
    $idpelajar = $_SESSION['username'];
    $sql = "select * from kuiz 
           join pelajar on kuiz.idpelajar = pelajar.idpelajar
           join kelas on pelajar.idkelas = kelas.idkelas 
           where kuiz.idpelajar = '".$idpelajar."'  group by kuiz.tarikhmasa limit 10 ";
    
    $sql2 = "select * from soalan";
    $jumlah = mysqli_query($sambungan, $sql2);   
    $jumlah = mysqli_num_rows($jumlah);
    
    $bil = 1;
    $data = mysqli_query($sambungan, $sql);        
	while ($kuiz = mysqli_fetch_array($data)) {	
        
    if ($data == false){
        echo mysqli_error($sambungan);
    }
    ?>
       
        <tr>
            <td><?php echo $bil; ?></td>
            <td><?php echo $kuiz['namapelajar']; ?></td>
            <td><?php echo $kuiz['namakelas']; ?></td>
            <td><?php echo $kuiz['tarikhmasa']; ?></td>
            <td><?php echo $kuiz['jumlahmarkah']."/".$jumlah; ?></td>
            <td><?php echo $kuiz['peratus']."%"; ?></td>
        </tr>
        
    <?php
         $bil = $bil + 1;    
         }   // tamat while
     ?>
     <caption><?php echo "PENCAPAIAN KESELURUHAN"; ?></caption>
    </table>
    <button class="cetak" onclick="window.print()">Cetak</button>
</body>

</html>
