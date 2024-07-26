<?php
    $html_cart=viewcart();
?>

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Giỏ hàng</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?=$html_cart?>
                            <a href="index.php?pg=viewcart&del=1">Xóa toàn bộ đơn hàng</a>
                            <tr class="bottom_button">
                               
                                <td>

                                </td>
                                <td> 
                                    <div class="cupon_text d-flex align-items-center">
                                        <form action="index.php?pg=viewcart&voucher=1" method="post">
                                            <input type="hidden" name="tongdonhang" value="<?=$tongdonhang?>">
                                            <input type="text" name="mavoucher" placeholder="Mã giảm giá">
                                            <button type="submit" class="primary-btn" href="#">Áp dụng</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Thành tiền</h5>
                                </td>
                                <td>
                                    <h5><?=number_format($thanhtoan,0,",",".")?> VNĐ</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li class="active"><a href="#">Giao hàng tận nơi: 20,000đ</a></li>
                                        </ul>
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="primary-btn" href="index.php?pg=donhang">Tiếp tục</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->