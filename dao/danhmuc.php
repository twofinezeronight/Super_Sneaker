<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_category là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function category_insert($name){
    $sql = "INSERT INTO category(name) VALUES(?)";
    pdo_execute($sql, $name);
}
// /**
//  * Cập nhật tên loại
//  * @param int $ma_category là mã loại cần cập nhật
//  * @param String $ten_category là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
// function category_update($ma_category, $ten_category){
//     $sql = "UPDATE category SET ten_category=? WHERE ma_category=?";
//     pdo_execute($sql, $ten_category, $ma_category);
// }
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_category là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function category_delete($id){
    $sql = "DELETE FROM category WHERE id=?";
        pdo_execute($sql, $id);
    }
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM category ORDER BY id ASC";
    return pdo_query($sql);
}

function showdm($dsdm){
    $html_dm='';
	foreach ($dsdm as $dm) {
		extract($dm);
		$link='index.php?pg=sanpham&id_category='.$id;
		$html_dm.='<li class="main-nav-list"><a href="'.$link.'">'.$name.'<span class="number"></span></a>
		</li>';
	}
    return $html_dm;
}



// /**
//  * Truy vấn một loại theo mã
//  * @param int $ma_category là mã loại cần truy vấn
//  * @return array mảng chứa thông tin của một loại
//  * @throws PDOException lỗi truy vấn
//  */
// function category_select_by_id($ma_category){
//     $sql = "SELECT * FROM category WHERE ma_category=?";
//     return pdo_query_one($sql, $ma_category);
// }
// /**
//  * Kiểm tra sự tồn tại của một loại
//  * @param int $ma_category là mã loại cần kiểm tra
//  * @return boolean có tồn tại hay không
//  * @throws PDOException lỗi truy vấn
//  */
// function category_exist($ma_category){
//     $sql = "SELECT count(*) FROM category WHERE ma_category=?";
//     return pdo_query_value($sql, $ma_category) > 0;
// }