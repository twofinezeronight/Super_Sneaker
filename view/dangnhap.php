<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Đăng nhập</h1>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>Bạn chưa có tài khoản?</h4>
							<a class="primary-btn" href="index.php?pg=dangky">Đăng ký ngay</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Đăng nhập</h3>
						<h5 style="color:red">
						<?php
							if(isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap']!="")){
								echo $_SESSION['tb_dangnhap'];
								unset($_SESSION['tb_dangnhap']);
							} 
						?>
						</h5>
						<form class="row login_form" action="index.php?pg=login" method="post" >
						<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Tài khoản">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Lưu đăng nhập</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<input type="submit" value="Đăng nhập" name="dangnhap" class="primary-btn"></input>
								<a href="#">Quên mật khẩu</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->