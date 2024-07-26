<?php
    $html_dm = "";
    foreach ($dsdm as $item) {
        extract($item);
        $html_dm.='<option value="'.$id.'">'.$name.'</option>';
    }
?>
<div class="main-content">
                <h3 class="title-page">
                    Thêm sản phẩm
                </h3>
                
                <form class="addPro" action="index.php?pg=products_add" method="POST" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label for="name">Tên sản phẩm:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh sản phẩm:</label>
                        <div class="custom-file">
                            <input type="file" name="img" class="custom-file-input" id="img">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories">Danh mục:</label>
                        <select class="form-select" name="id_category" id="id_category">
                            <option value="0" selected>Chọn danh mục</option>
                            <?=$html_dm;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá gốc:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                            <input type="text" name="price" id="price" class="form-control" placeholder="Nhập giá">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" onclick="return kiemtraform()" name="btnadd" class="btn btn-primary">Thêm sản phẩm</button>
                        <button type="reset" class="btn btn-secondary">Nhập lại</button>
                    </div>
                    <?php
                        iF(isset($tb)&&($tb!="")){
                            echo $tb;
                        }
                    ?>
                </form>
            </div>

            <script>
                new DataTable('#example');
                function kiemtraform(){
                    var name = document.getElementById("name");
                    if(name.value==""){
                        alert("Bạn phải nhập tên cho sản phẩm!");
                        name.focus();
                        return false;
                    }
                    return true;

                    var img = document.getElementById("img");
                    if(img.value==""){
                        alert("Bạn phải chọn ảnh cho sản phẩm!");
                        img.focus();
                        return false;
                    }
                    return true;

                    var id_category = document.getElementById("id_category");
                    if(id_category.value==0){
                        alert("Bạn phải chọn danh mục cho sản phẩm!");
                        id_category.focus();
                        return false;
                    }
                    return true;
                    
                    var price = document.getElementById("price");
                    if((price.value<=0)||(price.value=="")){
                        alert("Bạn phải nhập giá là số nguyên dương cho sản phẩm!");
                        price.focus();
                        return false;
                    }
                    return true;
                    
                }
            </script>