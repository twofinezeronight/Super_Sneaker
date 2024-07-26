<?php
// require_once 'pdo.php';


function bill_insert_id($madh, $id_user, $hoten_nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $hoten_nguoidat, $diachi_nguoidat, $dienthoai_nguoidat, $email_nguoidat, $total, $ship, $voucher, $pttt, $total_payment){
    $sql = "INSERT INTO bill(madh, id_user, hoten_nguoinhan, diachi_nguoinhan, dienthoai_nguoinhan, hoten_nguoidat, diachi_nguoidat, dienthoai_nguoidat, email_nguoidat, total, ship, voucher, pttt, total_payment) VALUES (?,?,?,?,?,?,?,?,?,?, ?,?, ?,?)";
    return pdo_execute_id($sql, $madh, $id_user, $hoten_nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $hoten_nguoidat, $diachi_nguoidat, $dienthoai_nguoidat, $email_nguoidat, $total, $ship, $voucher, $pttt, $total_payment);
}
?>
