<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Vaporlogy</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body id="bg-login" >
    <div class="box-login">
        <h2>Login</h2>
            <form action="" method="POST">
                <input type="text" name="user" placeholder="Username" class="input-control">
                <input type="password" name="pass" placeholder="Password" class="input-control">
                <input type="submit" name="submit" value="Login" class="btn">
            </form>
            <!-- username admin -->
            <!-- password admin123 -->
            <?php
                if(isset($_POST['submit'])){
                    session_start();
                    include 'server.php';

                    $user = mysqli_real_escape_string($conn, $_POST['user']) ;
                    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

                    $cek = mysqli_query($conn, "SELECT * FROM admin WHERE username = '".$user."' AND password = '".md5($pass)."'");
                    if(mysqli_num_rows($cek) > 0){
                        $d = mysqli_fetch_object($cek);
                        $_SESSION['status_login'] = true;
                        $_SESSION['a_global'] = $d;
                        $_SESSION['id'] = $d->admin_id;
                        echo '<script>window.location="home.php"</script>';
                    }else{
                        echo '<script>alert("Username atau password anda salah")</script>';
                    }
                }
            ?>
    </div>
    <script src="script.js"></script>
</body>
</html>