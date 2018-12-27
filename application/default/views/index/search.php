<div class="container-fluid" id="product-list">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" id="right">
                <div class="container-fluid" id="menu-right">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="menu-right-header">
                                <i class="glyphicon glyphicon-list-alt" style="padding-right: 2%;"></i>
                                Bộ lọc sản phẩm 
                            </div><br>
                            <div style="font-size: 20px; color: red; font-weight: bold; margin-top: 20px; margin-bottom: 20px;">Lọc màu sắc </div>
                            <div class="dropdown" class="">
                                <select class="form-control" name="" id="cbCategory" onchange="searchColor(this.value);">
                                    <option value="">--- Chọn màu sắc --- </option>
                                    <?php
                                 
                                    while ($row = $this->dataColor->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row);
                                        ?>
                                        <option value="<?php echo $color; ?>"><?php echo $color; ?></option>
                                        <?php
                                        
                                    }
                                    ?>
                                </select>
                            </div>
                            <div style="font-size: 20px; color: red; font-weight: bold; margin-top: 20px; margin-bottom: 20px;">Lọc theo giá </div>
                            <div class="dropdown" class="">
                                <select class="form-control" name="price" id="cbCategory" onchange="searchPrice(this.value);">
                                    <option value="">--- Chọn khoảng giá --- </option>
                                    <option value="1">Dưới 5 triệu</option>
                                    <option value="2">Từ 5-10 triệu</option>
                                    <option value="3">Từ 10-20 triệu</option>
                                    <option value="4">Trên 20 triệu</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" >
                <div class="container-fluid"id="searchproduct">
                    <div class="row">
                        <?php
                        while ($row = $this->proData->fetch(PDO::FETCH_ASSOC)) {
                            extract($row);
                            ?>
                            <div class="col-sm-3 item-product">
                                <div class="grid" class="item-img">
                                    <figure class="effect-zoe">
                                        <a href="<?php echo URL_BASE . 'detail?id=' . $productID; ?>">
                                        <?php
                                            $imgArr = explode(";", $image);
                                            ?>
                                            <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[0]; ?> " alt=""/>
                                        </a>
                                        <figcaption>
                                            <p>
                                                <span><a href="#" onclick="livesale1(<?php echo $productID; ?>)">Thêm vào giỏ hàng <br><i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i></a></span>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="item-name">
                                    <a href="<?php echo URL_BASE . 'detail?id=' . $productID ?>"><?php echo $productName; ?></a>
                                </div>
                                <div class="item-price">
                                    <span class="new-price"><?php echo number_format($unitPrice * (100 - $discount) / 100) . " đ"; ?></span>
                                    <span class="old-price"><?php echo number_format($unitPrice) . " đ"; ?></span>
                                    <div  class="muangay btn"><a href="<?php echo URL_BASE; ?>cart" onclick="livesale1(<?php echo $productID; ?>)">Mua ngay</a></div>
                                </div>



                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>