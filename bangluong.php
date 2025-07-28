<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bảng lương</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <caption><h1>Bảng Lương</h1></caption>
        <tr>
            <th>Số thứ tự</th>
            <th>Họ và tên</th>
            <th>Phòng ban - Chức vụ</th>
            <th>Số ngày công</th>
            <th>Lương cơ bản</th>
            <th>Phụ cấp</th>
            <th>Thưởng</th>
            <th>Phạt</th>
            <th>Tổng lương</th>
        </tr>
        <?php
            include('connect.php');
            $sql = "SELECT 
                l.id AS luong_id,
                nv.ho_ten,
                pb.ten_phong AS ten_phong_ban,
                cv.ten_chuc_vu,
                l.luong_co_ban,
                l.phu_cap,
                l.thuong,
                l.ky_luat,
                l.tong_luong,
                tinh_cong_thang(nv.id, l.thang, l.nam) AS so_ngay_cong
                FROM luong AS l
                JOIN nhan_vien AS nv ON l.nhan_vien_id = nv.id
                JOIN chuc_vu AS cv ON nv.chuc_vu_id = cv.id
                JOIN phong_ban AS pb ON nv.phong_ban_id = pb.id
                ORDER BY l.id";

            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['luong_id'] ?></td>
            <td><?php echo $row['ho_ten'] ?></td>
            <td><?php echo $row['ten_phong_ban'] . " - " . $row['ten_chuc_vu'] ?></td>
            <td><?php echo $row['so_ngay_cong'] ?></td>
            <td><?php echo number_format($row['luong_co_ban']) ?></td>
            <td><?php echo number_format($row['phu_cap']) ?></td>
            <td><?php echo number_format($row['thuong']) ?></td>
            <td><?php echo number_format($row['ky_luat']) ?></td>
            <td><?php echo number_format($row['tong_luong']) ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

