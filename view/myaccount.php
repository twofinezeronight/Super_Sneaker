<?php
    if(isset($_SESSION['s_user'])&&(count($_SESSION['s_user'])>0)){
        extract($_SESSION['s_user']);
    }
?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Thông tin tài khoản</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Dành cho bạn</h4>
							<a href="" class="primary-btn">Lịch sử mua hàng</a>
							<a href="index.php?pg=logout" class="primary-btn">Đăng xuất</a>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="login_form_inner">
						<h3>Thông tin tài khoản</h3>
						<form class="row login_form" action="index.php?pg=updateuser" method="post">
                            <div class="col-md-4 form-group">
                                <label for="username">Tài khoản: </label>
                            </div>
							<div class="col-md-8 form-group">
								<input type="text" class="form-control" id="username" name="username" value="<?=$username?>">
							</div>
                            <div class="col-md-4 form-group">
                                <label for="username">Mật khẩu: </label>
                            </div>
							<div class="col-md-8 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" value="<?=$password?>">
							</div>
                            <div class="col-md-4 form-group">
                                <label for="username">Email: </label>
                            </div>
							<div class="col-md-8 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?=$email?>">
							</div>
                            <div class="col-md-4 form-group">
                                <label for="username">Địa chỉ: </label>
                            </div>
                            <div class="col-md-8 form-group">
								<input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ" value="<?=$diachi?>">
							</div>
                            <div class="col-md-4 form-group">
                                <label for="username">Số điện thoại: </label>
                            </div>
                            <div class="col-md-8 form-group">
								<input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="Điện thoại" value="<?=$dienthoai?>">
							</div>
                            <div class="col-md-12 form-group">
                                <input type="hidden" name="id" value="<?=$id?>">
								<input type="submit" name="capnhat" class="primary-btn" value="Cập nhật">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->