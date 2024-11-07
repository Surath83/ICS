<?php

session_start();
if (isset($_SESSION['uid'])) {

    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Admin Login</title>
    <style>
        .hii{
            position:adsolute;
            margin-top:100px;
            margin-left: auto;
            margin-right: auto;
            height:500px;
            width:450px;
            padding:10px;
            border: 1px solid white;
            border-radius:20px;
            backdrop-filter: blur(6px);
        }
    </style>
</head>

<body style="height:100%;width:99%;background-image: url(back1.png)">
    <br>
    <h5><a href="../index.php" style="float: right; margin-right:50px; color:#9FE2BF">BackToHome</a></h5>
    <br><br>
    <div class="hii">
    <br><br>
    <h1 align='center' style="color: #9FE2BF;font-size:55px">Admin Login</h1>
    <br><br><br>
    <form action="adminlogin.php" method="POST" style="margin: auto;">
        <table align="center">
            <tr>
                <td>Email_ID:</td>
                <td><input type="email" name="uname" require></td>
            </tr>
            <tr><td><br></td></tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" require></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="login" value="Login" style="cursor: pointer;"></td>
            </tr>
        </table>
    </form>
    </div>
</body>

</html>

<?php

include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        ?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script><?php
    }
    else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>