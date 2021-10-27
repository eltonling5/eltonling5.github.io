<?php
include ('sambungan.php');
session_start();

if (isset($_POST['userid'])) {
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM pelajar";
    $result = mysqli_query($sambungan, $sql);
    $jumpa = FALSE;
    while($pelajar = mysqli_fetch_array($result))   {
        if ($pelajar['idpelajar'] == $userid && $pelajar["passwordpelajar"] == $password) {
            $jumpa = TRUE;
            $_SESSION['username'] = $pelajar['idpelajar'];
            $_SESSION['nama'] = $pelajar['namapelajar'];
            $_SESSION['status'] = 'pelajar';
            break;
        }
    }   
    
    //jika pelajar tak jumpa, cari pula pada jadual guru
    if ($jumpa == FALSE) {
        $sql = "SELECT * FROM guru";
        $result = mysqli_query($sambungan, $sql);
        while($guru = mysqli_fetch_array($result))   {
            if ($guru['idguru'] == $userid && $guru["passwordguru"] == $password) {
                $jumpa = TRUE;
                $_SESSION['username'] = $guru['idguru'];
                $_SESSION['nama'] = $guru['namaguru'];
                $_SESSION['status'] = 'guru';
                break;
            }
        }
    }
    
    if ($jumpa == TRUE) {     
        echo "<script> alert('Berjaya login'); 
            window.location='utama.html'</script>";
    }
    else 
        echo " <script> alert('Kesalahan pada username atau password'); 
            window.location='login.php'</script>"; 
}      
?>

<html>
<link rel="stylesheet" href="button.css">
<link rel="stylesheet" href="borang.css">
<body background='wood.jpg'>
    <center>
    <img src='tajuk.png'><br>
    </center>
    
    <h3 class="pendek">SIGN IN</h3>
    <form class="pendek" action=login.php method=post class="login">
        <table>
            <tr>
                <td><img src="user.png"></td>
                <td>
                    <input required type="text" name="userid" placeholder="nokp" minlength="12" maxlength="12" onkeypress="javascript:return isNumber(event)">
                </td>
            <tr>
            <tr>
                <td><img src="lock.png"></td>
                <td>
                    <input required type="password" name="password" placeholder="password">
                </td>
            </tr>
        </table>
        <button class="ulang" type="submit">Login</button>
        <button class="signup" type="button" onclick="window.location='signup.php'">Sign Up</button>
    </form>
</body>
</html>

<script>
    // WRITE THE VALIDATION SCRIPT.
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }    
</script>
