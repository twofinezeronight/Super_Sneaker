<?php
    session_start();
    ob_start();
    if(!isset($_SESSION["giohang"])){
        $_SESSION["giohang"] = [];
    }
    //nhúng kết nối csdl
    include "dao/pdo.php";
    include "dao/danhmuc.php";
    include "dao/sanpham.php";
    include "dao/giohang.php";
    include "dao/donhang.php";
    include "dao/user.php";

    include "view/header.php";

    //data dành cho trang chủ
    $dssp_new=get_dssp_new(4);
    $dssp_best=get_dssp_best(4);
    $dssp_view=get_dssp_view(4);
    $dssp_hot=get_dssp_hot(4);



    if(!isset($_GET['pg'])){
        include "view/home.php";
    } else {
        switch ($_GET['pg']) {
            case 'sanpham':
                $dsdm=danhmuc_all();

                if(!isset($_GET['id_category'])){
                    $id_category = 0;
                } else {
                    $id_category = $_GET['id_category'];
                }
                $dssp=get_dssp($id_category, 12);
                include "view/sanpham.php";
                break;
            case 'chitietsanpham':
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $spchitiet = get_sp_by_id($id);
                    $id_category = $spchitiet['id_category'];
                    $splienquan = get_dssp_lienquan($id_category, $id, 4);
                    include "view/chitietsanpham.php";
                } else {
                    include "view/home.php";
                }
                break;
            case 'addcart':
                if(isset($_POST['addcart'])){
                    $id_product = $_POST['id_product'];
                    $name = $_POST['name'];
                    $img = $_POST['img'];
                    $price = $_POST['price'];
                    $soluong = $_POST['soluong'];
                    $thanhtien = (int)$soluong * (int)$price;
                    $sp = array("id_product"=>$id_product,"name"=>$name, "img"=>$img, "price"=>$price, "soluong"=>$soluong, "thanhtien"=>$thanhtien);
                    array_push($_SESSION["giohang"], $sp);
                    // echo var_dump($_SESSION["giohang"]);
                    header('location: index.php?pg=viewcart');
                }
                break;
            case 'viewcart':
                if(isset($_GET['del'])&&($_GET['del']==1)){
                    unset($_SESSION["giohang"]);
                    header('location: index.php?pg=viewcart');
                } else {
                    if(isset($_SESSION["giohang"])){
                        $tongdonhang = get_tongdonhang();
                    }
                        $giatrivoucher=0;
                    if(isset($_GET['voucher'])&&($_GET['voucher']==1)){
                        $tongdonhang=$_POST['tongdonhang'];
                        $mavoucher=$_POST['mavoucher'];
                        // so sánh với database để lấy giá trị
                        $giatrivoucher=10;
                        
                    }
                    
                    $thanhtoan = $tongdonhang - $giatrivoucher;
                    include "view/viewcart.php";
                }
                break;
            case 'dangnhap':
                include "view/dangnhap.php";
                break;
            
            case 'myaccount':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    
                    include "view/myaccount.php";
                }
                break;
            case 'updateuser':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $diachi = $_POST['diachi'];
                    $dienthoai = $_POST['dienthoai'];
                    $id = $_POST['id'];
                    $role= 0;

                    // xử lí dữ liệu
                    updateuser($username, $password, $email, $diachi, $dienthoai, $role, $id);
                    include "view/myaccount_confirm.php";
                }
                break;
            case 'logout':
                if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
                    unset($_SESSION['s_user']);
                }
                header('location: index.php');
                break;
            case 'login':
                // input
                if(isset($_POST['dangnhap'])&&($_POST['dangnhap'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $bill = $_POST["bill"];
                
                    // xử lí: kiểm tra
                    $kq = checkuser($username, $password);
                    if(is_array($kq)&&(count($kq))){
                        $_SESSION['s_user'] = $kq;
                        if($bill == 1){ // đăng nhập từ giỏ hàng
                            header('location: index.php?pg=donhang');
                        } else if($_SESSION['trang']=="chitietsanpham") { // đăng nhập từ bình luận
                            header('location: index.php?pg=chitietsanpham&id='.$_SESSION['id_product'].'#binhluan');
                        } else {
                            header('location: index.php');
                        }
                    } else {
                        $tb = 'Tài khoản không tồn tại hoặc thông tin đăng nhập sai!';
                        $_SESSION['tb_dangnhap'] = $tb;
                        header('location: index.php?pg=dangnhap');
                        
                    }

                    // out
                
                    
                }
                break;
            case 'dangky':
                include "view/dangky.php";
                break;
            case 'donhang':
                if(isset($_POST['donhang'])){
                    $hoten = $_POST['hoten'];
                    $dienthoai = $_POST['dienthoai'];
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $hoten_nguoinhan = $_POST['hoten_nguoinhan'];
                    $diachi_nguoinhan = $_POST['diachi_nguoinhan'];
                    $dienthoai_nguoinhan = $_POST['dienthoai_nguoinhan'];
                    $pttt = $_POST['pttt'];
                    // tạo user mới
                    $username="guest".rand(1,999);
                    $password="123456";
                    $id_user = user_insert_id($username, $password, $hoten, $diachi, $dienthoai, $email);
                    // tạo đơn hàng
                    $madh = "SS".$id_user."-".date("His-dmY");
                    $total = get_tongdonhang();
                    $ship = 0;
                    if(isset($_SESSION['giatrivoucher'])){
                        $voucher = $_SESSION['giatrivoucher'];
                    } else {
                        $voucher = 0;
                    }
                    $total_payment = ((int)$total - (int)$voucher) + (int)$ship;
                    $id_bill = bill_insert_id($madh, $id_user, $hoten_nguoinhan, $diachi_nguoinhan, $dienthoai_nguoinhan, $hoten, $diachi, $dienthoai, $email, $total, $ship, $voucher, $pttt, $total_payment);
                    // insert giỏ hàng từ session vào table cart
                    foreach ($_SESSION['giohang'] as $sp) {
                        extract($sp);
                        cart_insert($id_product, $id_bill, $name, $img, $soluong, $price, $thanhtien);
                    }
                    header("location: index.php?pg=donhang_configm&madh=".$madh);
                }
                include "view/donhang.php";
                break;
            case 'donhang_configm':
                include "view/donhang_configm.php";
                break;
            case 'adduser':
                if(isset($_POST['dangky'])&&($_POST['dangky'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    // xử lí dữ liệu
                    user_insert($username, $password, $email);
                }
                include "view/dangnhap.php";
                break;





            default:
                include "view/home.php";
                break;
        }
    }
    

    include "view/footer.php";

?>