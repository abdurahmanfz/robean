<?php 

require_once("../database/config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ".$base_url."/index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Masuk | <?php echo $main_title; ?></title>

        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body class="bg-light" style="background-image: url(../img/jumbotron-bg.jpg); background-size: cover;">
        <?php 
            include("navbar.php");
        ?>
        
        <div class="container" style="margin-top: 150px">
            <div class="card p-4 text-left" style="width: 25rem; margin: 10px;">
                <!-- <p>&larr; <a href="<?php echo $base_url.'/index.php'; ?>">Home</a></p> -->
                <h4 class="mb-4">Masuk ke Sistem</h4>
                <!-- <p>Belum punya akun? <a href="<?php echo $base_url.'/view/register.php'; ?>">Daftar di sini</a></p> -->

                <form action="" method="POST">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input 
                        required class="form-control" 
                        type="text" name="username" autofocus
                        placeholder="Username atau email"
                        />
                    </div>


                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input 
                        required class="form-control" 
                        type="password" name="password" 
                        placeholder="Password"
                        />
                    </div> <br>
                    <input type="submit" class="btn btn-success btn-block mt-4" name="login" value="Masuk" />

                </form>
            </div>
        </div>
    </body>
</html>