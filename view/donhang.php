<?php
        $html_donhang='';
        foreach ($_SESSION["giohang"] as $sp) {
            extract($sp); 
            $html_donhang.='<li><a href="#">'.$name.'<span class="middle">x '.$soluong.'</span></a></li>';
        }
        $html_tongdh='';
        foreach ($_SESSION["giohang"] as $sp) {
            extract($sp);
            $html_tongdh='<li><a href="#">Tổng đơn hàng <span>'.$total.'</span></a></li>';
        }
?>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Thông tin đơn hàng</h1>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <form action="index.php?pg=donhang" method="post">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Thông tin đặt hàng</h3>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="hoten" name="hoten" placeholder="Họ tên">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="Số điện thoại">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ">
                        </div>
                        <div class="ttdathang">
                            <a onclick="showttnhanhang()" style="cursor: pointer;">&rArr; Thay đổi thông tin nhận hàng
                            </a>
                        </div>
                        <br>
                        <div class="ttnhanhang" id="ttnhanhang">
                            <h3>Thông tin nhận hàng</h3>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="hoten_nguoinhan" name="hoten_nguoinhan" placeholder="Họ tên">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="dienthoai_nguoinhan" name="dienthoai_nguoinhan" placeholder="Số điện thoại">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="diachi_nguoinhan" name="diachi_nguoinhan" placeholder="Địa chỉ">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn hàng của bạn</h2>
                            <ul class="list">
                                <li><a href="#">Sản phẩm</li>
                                <?=$html_donhang;?>
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tổng đơn hàng <span></span></a></li>
                                <li><a href="#">Tổng thanh toán<span></span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="pttt" value="1">
                                    <label for="f-option5">Thanh toán khi nhận hàng</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="pttt" value="2">
                                    <label for="f-option6">Chuyển khoản</label>
                                    <div class="check"></div>
                                </div>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option7" name="pttt" value="3">
                                    <label for="f-option7">Thanh toán bằng thẻ</label>
                                    <div class="check"></div>
                                </div>
                                <p>Thanh toán qua PayPal; Bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài
                                    khoản
                                    PayPal.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                                <a href="#"> Điều kiện*</a>
                            </div>
                            <button type="submit" name="donhang" class="primary-btn" href="index.php?pg=donhang_configm">Thanh
                                Toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!--================End Checkout Area =================-->

<script>
var ttnhanhang = document.getElementById("ttnhanhang");
ttnhanhang.style.display = "none";

function showttnhanhang() {
    if (ttnhanhang.style.display = "none") {
        ttnhanhang.style.display = "block";
    } else {
        ttnhanhang.style.display = "none";
    }
}
</script>