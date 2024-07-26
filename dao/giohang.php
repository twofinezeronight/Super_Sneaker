<?php
// insert vào table cart
function cart_insert($id_product, $id_bill, $name, $img, $quantity, $price, $thanhtien){
    if($id_product !== null){
        $sql = "INSERT INTO cart(id_product, id_bill, name, img, quantity, price, thanhtien) VALUES (?,?,?,?, ?,?, ?)";
        pdo_execute($sql, $id_product, $id_bill, $name, $img, $quantity, $price, $thanhtien);
    }
}

function viewcart(){
    $html_cart='';
    $i = 1;
    foreach ($_SESSION["giohang"] as $sp) {
        extract($sp);
        $thanhtien = (int)$price * (int)$soluong;
        $html_cart.='
        <tr>
            <td>
                <div class="media">
                    <div class="d-flex">
                        <img width="150px" height="150px" src="img/product/'.$img.'" alt="">
                    </div>
                    <div class="media-body">
                        <p>'.$name.'</p>
                    </div>
                </div>
            </td>
            <td>
                <h5>'.number_format($price,0,",",".").' VNĐ</h5>
            </td>
            <td>
                <div class="product_count">
                '.$soluong.'
                </div>
            </td>
            <td>
                <h5>'.number_format($thanhtien,0,",",".").' VNĐ</h5>
            </td>
        </tr>';
    }
    return $html_cart;
}
function get_tongdonhang(){
    $tong=0;
    foreach ($_SESSION["giohang"] as $sp) {
        extract($sp);
        $thanhtien = (Int)$price*(Int)$soluong;
        $tong += $thanhtien;
    }
    return $tong;
}
?>