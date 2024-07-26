<?php
    include "../dao/global.php";
    include "../dao/pdo.php";
    include "../dao/danhmuc.php";
    include "../dao/user.php";
    include "../dao/sanpham.php";
    


    include "view/header.php";

    if(isset($_GET['pg'])){
        $pg = $_GET['pg'];
        switch ($pg) {
            case 'products':
                if(isset($_POST['timkiem'])){
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if(!isset($_GET['page'])){
                    $page = 1;
                } else {
                    $page = $_GET['page'];
                }
                $soluongsp = 6;
                $dssp = get_dssp_admin($kyw, $page, $soluongsp);
                $tongsosp = get_dssp_all();
                $hienthisotrang = hien_thi_so_trang($tongsosp, $soluongsp);
                include "view/products.php";
                break;
            case 'products_add':
                if(isset($_POST['btnadd'])){
                    $id_category = $_POST['id_category'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    // lấy tên file
                    $img = basename($_FILES['img']['name']);
                    // upload file
                    $target_file = IMG_PATH_ADMIN.$img;
                    move_uploaded_file($_FILES['img']['tmp_name'],$target_file);
                    // insert db
                    sanpham_insert($id_category,$name, $price, $img); 
                    $tb = "Bạn đã thêm thành công!";
                }
                $dsdm = danhmuc_all();
                include "view/products_add.php";
                break;
            case 'categories':
                $danhmuclist = danhmuc_all();
                include "view/categories.php";
                break;
            case 'categories_add':
                if(isset($_POST['btnadd'])){
                    $name = $_POST['name'];
                    category_insert($name);
                    $tb = "Bạn đã thêm thành công!";
                    $danhmuclist = danhmuc_all();
                    include "view/categories.php";
                }
                include "view/categories_add.php";
                break;
            case 'delcat':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    $id = $_GET['id'];
                    category_delete($id);
                }
                $danhmuclist = danhmuc_all();
                include "view/categories.php";
                break;
            case 'users':
                include "view/users.php";
                break; 
            case 'users_add':
                if(isset($_POST['btnadd'])){
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $name = $_POST['name'];
                    $diachi = $_POST['diachi'];
                    $dienthoai = $_POST['dienthoai'];
                    $email = $_POST['email'];
                    users_insert($username, $password);
                    $tb = "Bạn đã thêm thành công!";
                }
                include "view/users_add.php";
                break;  
            default:
                include "view/home.php";
                break;
        }
    } else {
        include "view/home.php";
    }

    include "view/footer.php";
?>