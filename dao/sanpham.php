<?php
require_once 'pdo.php';

function sanpham_insert($id_category, $name, $price, $img){
    $sql = "INSERT INTO product(id_category, name, price , img) VALUES (?,?,?,?)";
    pdo_execute($sql, $id_category, $name, $price,$img);
}

function hien_thi_so_trang($dssp, $soluongsp){
	$tongsanpham = count($dssp);
	$sotrang = ceil($tongsanpham/$soluongsp) ;
	$html_sotrang = "";
	for ($i=1; $i <=$sotrang ; $i++) { 
		$html_sotrang.='<a href="index.php?pg=products&page='.$i.'" class="page">'.$i.'</a>';
	}
	return $html_sotrang;
}

function get_dssp_all(){
    $sql = "SELECT * FROM product ORDER BY id DESC";
	return pdo_query($sql);
}

function get_dssp_admin($kyw, $page, $soluongsp){
	// // kiểm tra  đang ở trang nào? tạo limit
	// if(($page = "")||($page = 0)) $page = 1;
	$batdau = ($page - 1)*$soluongsp;

    $sql = "SELECT * FROM product WHERE 1";
	if($kyw!=""){
		$sql.= " AND name like ?";
		$sql.= " ORDER BY id DESC";
		$sql.= " Limit ".$batdau.",".$soluongsp;
		return pdo_query($sql, "%".$kyw."%");
	} else {
		$sql.= " ORDER BY id DESC";
		$sql.= " Limit ".$batdau.",".$soluongsp;
		return pdo_query($sql);
	}
}

function sanpham_delete($id){
    $sql = "DELETE FROM product WHERE  id=?";
	pdo_execute($sql, $id);
}

function get_dssp_new($limit){
    $sql = "SELECT * FROM product ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
}

function get_dssp_best($limit){
    $sql = "SELECT * FROM product WHERE bestseller=1 ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
}

function get_dssp_view($limit){
    $sql = "SELECT * FROM product WHERE view=1 ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
}

function get_dssp_hot($limit){
    $sql = "SELECT * FROM product WHERE hot=1 ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
}

function get_dssp_lienquan($id_category, $id, $limit){
    $sql = "SELECT * FROM product WHERE id_category=? AND id<>? ORDER BY id DESC limit ".$limit;
    return pdo_query($sql, $id_category, $id);
}

function get_dssp($id_category, $limit){
    $sql = "SELECT * FROM product WHERE 1";
    if($id_category > 0){
        $sql .= " AND id_category=".$id_category;
    }
    $sql .= " ORDER BY id DESC limit ".$limit;
    return pdo_query($sql);
}

function get_sp_by_id($id){
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query_one($sql, $id);
}

function showsp($dssp){
    $html_dssp='';
	foreach ($dssp as $sp) {
		extract($sp);
		$link ="index.php?pg=chitietsanpham&id=".$id;
		$html_dssp.='<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<a href="'.$link.'"><img class="img-fluid" src="img/product/'.$img.'" alt=""></a>
								<div class="product-details">
									<a href="i'.$link.'">
										<h6>'.$name.'</h6>
									</a>
									<div class="price">
										<h6>'.number_format($price,0,",",".").' VNĐ</h6>
										<h6 class="l-through">$210.00</h6>
									</div>
									<div class="prd-bottom">
										<form action="index.php?pg=addcart" method="post">
											<input type="hidden" name="id_product" value="'.$id.'">
											<input type="hidden" name="name" value="'.$name.'">
											<input type="hidden" name="img" value="'.$img.'">
											<input type="hidden" name="price" value="'.$price.'">
											<input type="hidden" name="soluong" value="1">
											<a href="" class="social-info">
												<span class="ti-bag"></span>
												<p class="hover-text">
													<button type="submit" name="addcart" >+ Giỏ hàng</button>
												</p>
											</a>
										</form>
										<a href="'.$link.'" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">
											xem thêm</p>
										</a>
									</div>
								</div>
							</div>
						</div>';
	}
    return $html_dssp;
}

//admin
// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }