<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <style>
        body {
    width: 100%;
    height: 100%;
    background-color:rgb(191, 191, 191);

}

header {
    height: 20%; 
    width: 100%;
    display: flex;
    background-color: white;
}

.header_left {  
    margin: 0px 100px 0px 20px;
    padding: 15px;
} 
.header_right {
    margin: 5px 20px 5px 900px;
    display: flex;
    gap: 20px;
    padding: 15px; 
    border: 1px solid red;
}
.image_user {
    margin-left: 30px;
    margin-right: 50px;
    
}

.phanthan {
    margin-top: 1px;
    height: 80%;
    width: 100%;
    border: 1px solid red;
}
.menu_left {
    width: 15%;
    height: 100%;
    border: 1px solid red;
    background-color: white;
}
    </style>
</head>

<body>
    <header>
        <div class="header_left">
            <img src="#">
        </div>
        <div class="header_right">
            <i class="fa fa-bell-o" aria-hidden="true"></i>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <div class="image_user">
                <img src="#" style="margin-right: 20px; border-radius: 50%;">
                <span>Name User</span>
            </div>
            <div>
                <a href="?page_layout=dangxuat" style="color:black; text-decoration:none;">Đăng xuất</a>
            </div>
        </div>
    </header>
    <div class="phanthan">
        <div class="menu_left">
            <ul>
                <li>
                    <ul>Nhân viên
                        <li>Phòng ban</li>
                        <li>Chức vụ</li>
                        <li>Trình độ</li>
                        <li>Chuyên môn</li>
                        <li>Bằng cấp</li>
                        <li>Danh sách nhân viên</li>
                    </ul>
                    <ul>Tổng quan
                        <li>Phòng ban</li>
                        <li>Chức vụ</li>
                        <li>Trình độ</li>
                        <li>Chuyên môn</li>
                        <li>Bằng cấp</li>
                        <li>Danh sách nhân viên</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="main_right">
        </div>

    </div>
</body>

</html>
<?php
    session_start();
        if(!isset($_SESSION["username"])){
        header('location: login.php');
        }

    if(isset($_GET['page_layout'])) {
        switch($_GET['page_layout']) {
            case 'themnv':
                include('themnv.php');
                break;
            case 'suanv':
                include('suanv.php');
                break;
            case 'xoanv':
                include('xoanv.php');
                break;
            case 'danhsachnv':
                include('danhsachnv.php');
                break;
            case 'thongtinnv':
                include('thongtinnv.php');
                break;
            case 'dangxuat':
                session_destroy();
                session_unset();
                header('location: login.php');
                break;
        }
    }
?>