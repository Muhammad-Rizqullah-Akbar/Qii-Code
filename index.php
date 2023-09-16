<?php 

$servername = "localhost";
$username   ="root";
$password   ="";
$database   ="users";

$conn = mysqli New ($servername, $username, $password, $database);


if (isset($_POST['btnLogin'])) {  
  //anti inject sql
  $username=mysqli_real_escape_string($koneksi,$_POST['username']);
  $password=mysqli_real_escape_string($koneksi,$_POST['password']);

  //query login
  $sql_login = "SELECT * FROM user WHERE BINARY username='$username' AND password='$password'";
  $query_login = mysqli_query($koneksi, $sql_login);
  $data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
  $jumlah_login = mysqli_num_rows($query_login);
$usern=$data_login['username'];

  if ($jumlah_login ==1 ){
    session_start();
    $_SESSION["ses_id"]=$data_login["id_user"];
    $_SESSION["ses_username"]=$data_login["username"];
    $_SESSION["ses_password"]=$data_login["password"];

    echo "<script>alert('Selamat Datang Admin');window.location = '../admin/dashboard.php';</script>";
  
    }else{
    echo "<script>
      Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'login.php';}
      })</script>";
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <header>
        <nav class="navigation">
        </nav>
    </header>

    <div class="wrapper active-popup">

        <div class="form-box login">
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-open-outline"></ion-icon></span>
                    <input type="text" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <a href="#">Forgot your password?</a>
                </div>
                <button type="submit" class="btn" name="login">Login</button>
                <div class="login-register">
                    <p>Sahabat Nutri Journal Belum Memiliki Akun? <br><br><a href="#" class="register-link">Ayo
                            Daftar!</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="#" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-circle-outline"></ion-icon></span>
                    <input type="text" name="username" required> <!-- Tambahkan name="username" -->
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-open-outline"></ion-icon></span>
                    <input type="text" name="email" pattern="[a-zA-Z0-9._%+-]+@gmail\.com$" required>
                    <!-- Tambahkan name="email" -->
                    <label>Email Aktif</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" name="pass" required> <!-- Tambahkan name="pass" -->
                    <label>Password</label>
                </div>

                <button type="submit" class="btn" name="register">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="login.php" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
    </div>


    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>

</html>