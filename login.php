<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link rel="stylesheet" href="lg.css">
</head>

<body>
    <div class="background-login">
        <form class="login" action="login.php" method="post">
            <h1 class="title">Đăng nhập</h1>
            <div class="box-input">
                <input name="username" class="input" style="background-color:rgb(43, 43, 43)" type="email, telephone" placeholder="Email hoặc số điện thoại di động" required>
                <input name="password" class="input" style="background-color:rgb(43, 43, 43)" type="password" placeholder="Mật khẩu" required>
            </div>
            <div class="button">
                <button type="submit" class="button" style="background-color:red;padding: 18px;">Đăng nhập</button>
            </div>
        </form>
        <?php
        include('connect.php');
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $userName = ($_POST['username']); 
            $password = ($_POST['password']);
            $sql = "SELECT * FROM `nguoi_dung` where ten_dang_nhap = '$userName' and mat_khau = '$password'";
            $result = mysqli_query($conn, $sql); 
            if(mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION["username"] = $userName;
                header('location: trangchu.php');
            }else {
                echo "Tên đăng nhập hoặc mật khẩu không chính xác";
            }
        }
        ?>
    </div>
</body>

</html>