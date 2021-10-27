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
    $pilihan = $_POST["pilihan"];
	$idkelas = $_POST["idkelas"];
	$peratus = $_POST["peratus"];
    $sql = "select * from kuiz 
           join pelajar on kuiz.idpelajar = pelajar.idpelajar
           join kelas on pelajar.idkelas = kelas.idkelas group by kuiz.tarikhmasa   ";
    
    $sql3 = "select namakelas from kelas where idkelas ='".$idkelas."' ";
    $kelas = mysqli_query($sambungan,$sql3);
    $namakelas = mysqli_fetch_array($kelas)['namakelas'];
    
    switch ($pilihan) {
        case 1 :  $syarat = ""; 
                  $tajuk = "PENCAPAIAN KESELURUHAN"; break;     
        case 2 :  $syarat = "having kelas.idkelas = '$idkelas' "; 
                  $tajuk = "PENCAPAIAN KELAS ".$namakelas ;break;
        case 3 :   
                  if ($peratus == 80) {
                       $syarat = "having peratus >= 80";
                       $tajuk = "PENCAPAIAN LEBIH DARI 80%";
                  }
                  else if ($peratus == 50){
                       $syarat = "having peratus >= 50";
                       $tajuk = "PENCAPAIAN LEBIH DARI 50%";
                  }
                  else if ($peratus == 0){
                       $syarat = "having peratus < 50";
                       $tajuk = "PENCAPAIAN KURANG DARI 50%";
                  }        
                  break;
        case 4 :   
                  if ($peratus == 80) {
                       $syarat = "having peratus >= 80 and kelas.idkelas = '".$idkelas."' ";
                       $tajuk = "PENCAPAIAN KELAS ".$namakelas." YANG LEBIH 80%";
                  }
                  else if ($peratus == 50){
                       $syarat = "having peratus >= 50 and kelas.idkelas = '".$idkelas."' ";
                       $tajuk = "PENCAPAIAN KELAS ".$namakelas." YANG LEBIH 50%";
                  }
                  else if ($peratus == 0){
                       $syarat = "having peratus < 50 and kelas.idkelas = '".$idkelas."' ";
                       $tajuk = "PENCAPAIAN KELAS ".$namakelas." YANG KURANG DARI 50%";
                  }        
                  break;    
    }
    $bil = 1;
    $sql = $sql.$syarat;  // cantum

    $sql2 = "select * from soalan";
    $jumlah = mysqli_query($sambungan, $sql2);   
    $jumlah = mysqli_num_rows($jumlah);        

    $data = mysqli_query($sambungan, $sql);        
	while ($kuiz = mysqli_fetch_array($data)) {	
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
     <caption><?php echo $tajuk; ?></caption>
    </table>
    <button class="cetak" onclick="window.print()">Cetak</button>
</body>

</html>
