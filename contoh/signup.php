<?php
include('sambungan.php'); 
if(isset($_POST['idpelajar'])) {    
    $idpelajar = $_POST["idpelajar"];
    $namapelajar = $_POST["namapelajar"];
    $idkelas = $_POST["idkelas"];
    $password = $_POST["password"];
    
    $sql = "insert into pelajar values('$idpelajar', '$namapelajar', '$idkelas', '$password')";
    $result = mysqli_query($sambungan, $sql);
    if ($result){
        echo "<script>alert('Berjaya signup')</script>";
        echo "<script>window.location='login.php'</script>";
    }
    else 
        echo "<script>alert('Tidak berjaya signup')</script>";
        echo "<script>window.location='signup.php'</script>";
}
?> 

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<body background=''>
    <center>
    <img src='tajuk.png'><br>
    </center>

    <h3 class="panjang">SIGN UP</h3>
    <form class="panjang" action="signup.php" method="post">
    <table>
        <tr>
            <td>ID Pelajar</td>
            <td><input required type="text" id="idpelajar" name="idpelajar" placeholder="nokp" onblur="semak()" onkeypress="javascript:return isNumber(event)" minlength="12"></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input required type="text" name="namapelajar"></td>        
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
            <select name="idkelas">
                <?php
                $sql = "select * from kelas";
                $data = mysqli_query($sambungan, $sql);
                while ($kelas = mysqli_fetch_array($data)) {
                    echo "<option value='$kelas[idkelas]'>$kelas[namakelas]</option>";		
                }
                ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input required type="password" name="password" placeholder="max 8 char"></td>
        </tr>
    </table>
    <button class="tambah" type="submit">Daftar</button>
    <button class="padam" type="button" onclick="window.location='login.php'">Batal</button>
</form>
</body>

<script>
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
    function semak(){
        var idpelajar = document.getElementById("idpelajar").value;
        if (idpelajar.length != 12)
            alert("NoKP mesti dalam 12 digit.")
    }
</script>
