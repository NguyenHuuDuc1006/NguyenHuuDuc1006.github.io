<div class="container content-cart">
    <div class="container title-cart">
        Giỏ hàng
    </div>
    <div class="container hello">
        <span class="glyphicon glyphicon-info-sign" style="color:#7094db;margin-right: 10px;"></span>Chào mừng đến với D3T.vn!
    </div>
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_price = 0;
        ?>
        <div class="container table-cart">
            <table class="table table-bordered table-responsive table-condensed table-hover">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Số tiền/Sản phẩm</th>
                    <th>Thao tác</th>
                </tr>
                <?php
                foreach ($_SESSION["cart_item"] as $item) {
                    $imgArr = explode(";", $item["image"]);
                    ?>
                    <tr>                        
                        <td><?php echo $item["productCode"]; ?></td>
                        <td>
                            <a href="<?php echo URL_BASE; ?>detail?id=<?php echo $item["id"]; ?>">                                
                                <div class="product_base">
                                    <div class="price_current">
                                        <?php echo "     " . $item["name"]; ?>
                                    </div>
                                </div>
                                <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[0]; ?>" alt="" height="100px" width="100px;"/>
                            </a>
                        </td>
                        <td>

                            <input id="<?php echo $item["productCode"]; ?>" type="number" name="quantity" min="1" max="<?php echo $item["quantityMax"]; ?>" value="<?php echo $item["quantity"]; ?>" style="text-align: center;" onBlur="saveCart(this);"/> 
                        </td>
                        <td><span id="price<?php echo $item["productCode"] ?>"><?php echo number_format($item["price"]); ?>đ</span></td>
                        <td><a class="btn btn-danger" href="<?php echo URL_BASE ?>cart/deleteCart?id=<?php echo $item["productCode"]; ?>"><i class="fa fa-trash w3-xxlarge"></i><?php echo " Xóa"; ?></a></td>
                    </tr>
                    <?php
                    $total_price += ($item["price"] * $item["quantity"]);
                }
                ?>
                    <tr>
                        <td colspan="4"></td>
                        <td><a class="btn btn-danger" href="<?php echo URL_BASE ?>cart/deleteAllCart"><i class="fa fa-trash w3-xxlarge"></i><?php echo " Xóa Tất Cả"; ?></a></td>
                    </tr>
            </table>
        </div>
        <?php
    } else {
        echo "<br><div class='alert alert-danger'>Giỏ hàng trống</div>";
    }
    ?>

    <div class="container hello">
        <span class="glyphicon glyphicon-plane" style="color:#7094db;margin-right: 10px;"></span>Miễn Phí Vận Chuyển cho đơn hàng từ 200.000 (giảm tối đa 40.000)
    </div>
    <div class="container">
        <table class="table table-hover table-condensed table-responsive table-bordered info-cart">
            <tr>
                <td><h2>Tổng tiền hàng (<?php echo count($_SESSION["cart_item"]); ?> sản phẩm):</h2></td>
                <td style="color: blue;"><h2 id="total_price"><?php echo number_format($total_price); ?>đ</span></h2></td>
            </tr>
            <tr>
                
                <td colspan="2" style="text-align: center;"><a href="<?php echo URL_BASE; ?>order/index" class="btn btn-success">Mua ngay</a>
                    <a href="<?php echo URL_BASE; ?>" class="btn btn-info">Tiếp tục mua</a>
                </td>

            </tr>
        </table>
    </div>
</div>
<script>
    function getQuantity(val)
    {
        var qty = $(val).val();
        var price = $("#price").text();
        var price = qty * price;
        $("#price").html(price);
        return false;


    }

</script>
<div class="seen-product container">
    <h2>Có thể bạn cũng thích</h2>
    <div class="owl-carousel owl-theme owl-loaded owl-drag">
        <?php
        while ($newRow = $this->newData->fetch(PDO::FETCH_ASSOC)) {
            extract($newRow);
            $imgArr= explode(";", $image);
            ?>

            <div class="item">
                <h4> 
                    <a href="<?php echo URL_BASE . 'index/detail?id=' . $productID; ?>">
                        <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[0]; ?>" alt=""/>
                    </a>
                </h4>
            </div>
            <?php
        }
        ?>
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