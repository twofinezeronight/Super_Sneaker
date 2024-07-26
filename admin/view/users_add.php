<div class="main-content">
    <h3 class="title-page">
        Thêm thành viên
    </h3>
    <div class="box500">
        <form class="addPro" action="index.php?pg=users_add" method="POST">
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nhập username">
            </div>
            <div class="form-group">
                <label for="name">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập password">
            </div>
            <div class="form-group">
                <label for="name">Họ và tên:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập họ và tên">
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ:</label>
                <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="name">Điện thoại:</label>
                <input type="text" class="form-control" name="dienthoai" id="dienthoai" placeholder="Nhập điện thoại">
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
            </div>
            <div class="form-group">
                <button type="submit" name="btnadd" class="btn btn-primary">Thêm danh mục</button>
            </div>
            <?php
                if(isset($tb)&&($tb!="")){
                    echo $tb;
                }
            ?>
        </form>
    </div>
</div>

<script>
new DataTable('#example');
</script>