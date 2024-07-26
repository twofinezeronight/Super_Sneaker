<?php
    session_start();
    include "../dao/pdo.php";
    include "../dao/binhluan.php";
    if(isset($_GET['id_product'])){
        // echo $_GET['id_product'];
        $id_product = $_GET['id_product'];
    }
    if(isset($_POST['guibinhluan'])){
        $id_product = $_POST['id_product'];
        $noidung = $_POST['noidung'];
        $ngaybl = date('H:i:s d/m/Y');
        $id_user= $_SESSION['s_user']['id'];
        $name= $_SESSION['s_user']['name'];
        binhluan_insert($id_user , $id_product , $ngaybl, $noidung);
    }

    $dsbl = binhluan_select_all();
    $html_bl="";
    foreach ($dsbl as $bl) {
        extract($bl);
        $html_bl.='<p>'.$noidung.'
                        <br>
                        '.$id_user.' - ('.$ngaybl.')
                    </p>';
    }
?>
<h1>Bình luận</h1>
<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
    <input type="hidden" name="id_product" value="<?=$id_product?>">
    <textarea name="noidung" id="" cols="60" rows="5"></textarea>
    <button type="submit" name="guibinhluan">Gửi bình luận</button>
</form>

<?php
    } else {
        $_SESSION['trang']="chitietsanpham";
        $_SESSION['id_product']= $_GET['id_product'];
        echo "<a href='../index.php?pg=dangnhap' target='_parent'>Bạn phải đăng nhập mới có thể bình luận!</a><br>";
    }
?>
<div class="dsbl">
    <?=$html_bl;?>
</div>