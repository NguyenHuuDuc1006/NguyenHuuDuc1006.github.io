<div class="container content-cart">
    <div class="container title-cart">
        Đơn hàng
    </div>
    <div class="container hello">
        <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Chào mừng đến với D3T.vn!

    </div>
    <div class="container">
        <?php
        if(isset($_SESSION['email'])){
        ?>
        <h3>Thông tin khách hàng</h3>
            <form action="<?php echo URL_BASE ?>order/formOrder" method="post" enctype="multipart/form-data" onsubmit="return checkValid()">
                <div class="info-order">
                <label> Họ và tên </label><span class="msg" id="msgUser">(*)</span>
                <input type="text" name="txtReceiver" placeholder="Mời bạn nhập tên" id="txtUser" class="form-control" value="<?php echo $this->infoCustomer['fullName']; ?>"/><br>
                <label> Địa chỉ</label> <span class="msg" id="msgAddr">(*)</span>
                <input type="text" name="txtAddr" placeholder="  Mời bạn nhập địa chỉ" id="txtAddr" class="form-control" value="<?php echo $this->infoCustomer['address']; ?>"/><br>
                <label> Điện thoại</label> <span class="msg" id="msgMobile">(*)</span>
                <input type="text" name="txtPhone" placeholder="  Mời bạn nhập số điện thoại" id="txtMobile" class="form-control" value="<?php echo $this->infoCustomer['phone']; ?>"/><br>
                <label> Email</label><span class="msg" id="msgEmail">(*)</span>
                <input type="text" name="txtEmail" placeholder="  Mời bạn nhập email" id="txtEmail" class="form-control" value="<?php echo $this->infoCustomer['email']; ?>" disabled/> <br>                         
                </div>
                <div class="container hello">
                    <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Sản phẩm bạn đã chọn để mua

                </div>
                <?php
                if (isset($_SESSION["cart_item"])) {
                    $item_total = 0;
                    ?>
                    <div class="container table-cart">
                        <table class="table table-bordered table-responsive table-condensed table-hover">
                            <tr>
                                <th>Mã Sản Phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Số tiền</th>
                            </tr>
                            <?php
                            foreach ($_SESSION["cart_item"] as $item) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $item["productCode"]; ?>
                                    </td>
                                    <td>                                       
                                        <?php echo "     " . $item["name"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $item["quantity"]; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($item["price"]*$item["quantity"]); ?>đ
                                    </td>

                                </tr>
                                <?php
                                $item_total += ($item["price"] * $item["quantity"]);
                            }
                            ?>

                            <tr>
                                <th colspan="3">Tổng số tiền</th>
                                <th style="color:red;"><?php echo number_format($item_total); ?>đ</th>
                            </tr>

                        </table>
                    </div>
                    <?php
                } else {
                    echo "<div class='alert alert-danger'>Sản phẩm trống</div>";
                }
                ?>

                <div class="container hello">
                    <span class="glyphicon glyphicon-plane" style="color:#7094db;margin-right: 10px;"></span>Miễn Phí Vận Chuyển cho đơn hàng từ 200.000 (giảm tối đa 40.000)
                </div>
                <div class="container" style="margin-top:30px;">
                    <div style="font-size: 26px; margin-bottom: 30px;">Hình thức thanh toán <span style="color:red;font-size: 26px;">(*)</span></div>

                    <input type="radio" name ="thanhtoan" value="Thẻ tín dụng/Ghi nợ">Thẻ tín dụng/Ghi nợ
                    <input type="radio" name="thanhtoan" value="Thanh toán sau khi nhận hàng">Thanh toán sau khi nhận hàng

                </div>
                <div class="container order-information">
                    <table class="table table-hover table-condensed table-responsive table-bordered">
                        <tr>
                            <th>Tổng tiền hàng</th>
                            <td><?php echo number_format($item_total); ?>đ</td>
                        </tr>
                        <tr>
                            <th>Phí vận chuyển</th>
                            <td>200.000đ</td>
                        </tr>
                        <tr>
                            <th>Giảm giá phí vận chuyển</th>
                            <td>- 200.000đ</td>
                        </tr>
                        <tr>
                            <th>Tổng thanh toán</th>
                            <td><?php echo number_format($item_total); ?>đ</td>
                        </tr>
                    </table>
                </div>

                <button type="submit" id="btnReg" name="btnReg">Đặt hàng</button>
                <a href="<?php echo URL_BASE; ?>cart" class="btn" id="btnBack" style="margin-top: 0px;">Quay lại giỏ hàng</a>

            </form>
            <?php
        }else{
            echo "<script>alert('Bạn chưa đăng nhập nên không thể mua hàng');window.location.href='" . URL_BASE . "customer/login';</script></script>";
        }
            ?>
        </div>
        <div class="seen-product container">
            <h2>Có thể bạn cũng thích</h2>
            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                <div class="item"><h4> 
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr1.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr2.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr3.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr4.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr5.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr6.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr7.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr8.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr9.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr10.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr11.PNG" alt=""/>
                    </h4></div>
                <div class="item"><h4>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/cr12.PNG" alt=""/>
                    </h4></div>
            </div>
            <script>
                var owl = $('.owl-carousel');
                owl.owlCarousel({
                    loop: true,
                    nav: true,
                    margin: 10,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        960: {
                            items: 5
                        },
                        1200: {
                            items: 6
                        }
                    }
                });
                owl.on('mousewheel', '.owl-stage', function (e) {
                    if (e.deltaY > 0) {
                        owl.trigger('next.owl');
                    } else {
                        owl.trigger('prev.owl');
                    }
                    e.preventDefault();
                });
            </script>
        </div>
    </div>