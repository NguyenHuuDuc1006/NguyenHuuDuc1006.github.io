<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
<div class="breadcrumbs container cls">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo URL_BASE; ?>">Home</a></li>
            
            <li class="breadcrumb-item"><a href="<?php echo URL_BASE ; ?>getPageCategory?id=<?php echo $this->detailProduct['categoryID'];?>"><?php echo $this->objCategory['categoryName']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $this->detailProduct['productName']; ?></li>
        </ol>
    </nav>

</div>

<div class="container">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-5" id="left_product">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">

                        
                        <?php
                        $imgArr = explode(";", $this->detailProduct['image']);
                        $num =1;
                        for ($i = 0; $i < count($imgArr); $i++) {
                            if($num == 1){
                            ?>
                            <div class="item active">
                                <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[$i]; ?>" alt="" style="width:100%;">
                            </div>
                            <?php
                            }else{
                                ?>
                            <div class="item">
                                <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[$i]; ?>" alt="" style="width:100%;">
                            </div>
                            <?php
                            }
                            $num =2;
                        }
                        ?>

                    </div>

                </div>
                <br>
                <div class="anhnho" style=" ">
                    <div class="row">
                        <?php
                        for ($i = 0; $i < count($imgArr); $i++) {
                            ?>
                            <div class="item">
                                <div class="col-xs-3"><img data-target="#myCarousel" data-slide-to="<?php echo $i;?>" src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[$i]; ?>" alt="" style="width:90%;"></div>
                            </div>
                            <?php
                        }
                        ?>
                        
                    </div>

                </div>

                <br><br>
                <span style="vertical-align: bottom; width: 61px; height: 20px; "><iframe name="f6b72246f391f8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/like.php?action=like&amp;app_id=387062634759025&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FtrnHszv6jVd.js%3Fversion%3D42%23cb%3Df934d8b4f1ec88%26domain%3Dwww.sendo.vn%26origin%3Dhttps%253A%252F%252Fwww.sendo.vn%252Ff3b08f638fe574c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.sendo.vn%2Fdien-thoai-samsung-galaxy-a8-ram-4gb-32gb-chinh-hang-11472802.html%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey" style="border: none; visibility: visible; width: 61px; height: 20px;" class=""></iframe></span>
                <span style="vertical-align: bottom; width: 69px; height: 20px; "><iframe name="f3f0452f73ddef" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:share_button Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/share_button.php?app_id=387062634759025&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FtrnHszv6jVd.js%3Fversion%3D42%23cb%3Df3afc66044100c%26domain%3Dwww.sendo.vn%26origin%3Dhttps%253A%252F%252Fwww.sendo.vn%252Ff3b08f638fe574c%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.sendo.vn%2Fdien-thoai-samsung-galaxy-a8-ram-4gb-32gb-chinh-hang-11472802.html%2F&amp;layout=button_count&amp;locale=en_US&amp;sdk=joey" style="border: none; visibility: visible; width: 69px; height: 20px;" class=""></iframe></span>
            </div>
            <div class="col-md-7 container-fluid" id="right_product">
                <form action="<?php echo URL_BASE; ?>cart/addToCartFromDetail?id=<?php echo $this->detailProduct['productID']; ?>" method="post">
                <div class="product_name">
                    <span><h2 style="  display: inline;"><?php echo $this->detailProduct['productName']; ?></h2></span>
                    <span class="rate rate_head" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
                        <span class="star-on star">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>
                        </span>
                        <span class="star-on star">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>
                        </span>
                        <span class="star-on star">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>
                        </span>
                        <span class="star-on star">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>
                        </span>
                        <span class="star-on star">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="svg-inline--fa fa-star fa-w-18"><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" class=""></path></svg>
                        </span>
                        <span itemprop="ratingValue" class="hide">5</span>
                        <span itemprop="bestRating" class="hide">5</span>
                        <a href="javascript:void(0)" title="Đánh giá sản phẩm này" class="rate_count" onclick="$('html, body').animate({scrollTop: $('#prodetails_tab3').offset().top}, 500);">  (<span itemprop="ratingCount">2</span> đánh giá)</a>
                    </span>
                </div>
                <div class="product_base">
                    <div class="price_current"><?php echo number_format(($this->detailProduct['unitPrice'])*(100-$this->detailProduct['discount'])/100); ?>₫</div>
                </div>
                <div class="_color">
                    <label style="display: inline;">Màu sắc: <?php echo $this->detailProduct['color']; ?> </label>

                </div>
                <br>
                <div class="ProductOptions">
                    <label style="display: inline;">Kích thước màn hình : </label>
                    <span><?php echo $this->detailProduct['size']; ?></span>
                </div>
                <br>
               
                <div class="quantity">
                    <label style="display: inline;flex: 0 0 12rem;max-width: 12rem;padding-right: 1.2rem;">Số lượng :</label>
                    
                    <span> <input class="input_297o" type="number" value="1" min="1" max="<?php echo $this->detailProduct['quantity']; ?>" name="quantity">
                    </span>
                </div><br>
                <div class="dropdown" style="left: 10px;">
                    <select style="border: 1px #00A7F4 solid; width: 210px;" >
                        <option value="0" data-type="warranty">Chế độ bảo hành</option>
                        <option value="603" data-type="warranty">Bảo hành Vàng (BHV)</option>
                        <option value="604"  data-type="warranty">Bảo hành Platinum (BHP)</option>
                    </select><br><br>
                </div>
                <div class="frame_dt promotion">

                    <label style="width: 200px;color: red;top: -14px;"><span class="glyphicon glyphicon-gift"></span> Quà khuyến mãi</label>


                    <p>• Giảm <strong>100.000đ</strong>&nbsp;<strong>+</strong>&nbsp;<strong>dán cường lực + ốp Silicon&nbsp;</strong>tại<strong>&nbsp;store của hệ thống</strong></p>

                    <p>• Giảm <strong>100.000đ</strong>&nbsp;<strong>+</strong>&nbsp;<strong>dán cường lực </strong>tại<strong>&nbsp;BKHN</strong></p>

                    <p>•&nbsp;<strong>15 ngày</strong>&nbsp;dùng thử <strong>Miễn phí</strong>,&nbsp;<strong>1 đổi&nbsp;1</strong>&nbsp;trong vòng <strong>30 ngày</strong></p>

                    <p>• Tặng&nbsp;<strong>Sạc &amp; Cáp</strong>&nbsp;iPhone&nbsp;cao cấp trị giá <strong>150.000đ</strong></p>

                    <p>• Tặng <strong>dán lưng Carbon</strong> cao cấp trị giá <strong>50.000đ</strong></p>

                    <p>• Tặng <strong>phiếu giảm giá</strong>&nbsp;lên tới&nbsp;<strong>100.000đ</strong></p>

                    <p>•&nbsp;Hỗ trợ mua <strong>dán cường lực 5D</strong> chỉ&nbsp;<strong>90.000đ</strong></p>

                    <p>• Hỗ trợ mua <strong>Tai nghe iPhone xịn chính hãng</strong> với giá <strong>350.000đ</strong></p>

                    <p>•&nbsp;Hỗ trợ mua sạc <strong>Pin dự phòng Xiaomi 10.000mAh</strong> chính hãng&nbsp;chỉ&nbsp;<strong>290.000đ</strong></p>


                </div>
                <div class="box_2eEA groupBtnCheckout_1bld">
                    <div class="groupBtnInStock_3Pac">
                        <div class="container_3Xwt">
                            <button class="btn_2vuC"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" color="#E5101D" class="icon_3fDg"><g fill="none" fill-rule="evenodd"><path d="M2 3h16v16.707H2z"></path><path fill="#E5101D" d="M4 14.879v-9.88h12v8H6.5a1.5 1.5 0 0 0-1.061.44L4 14.88zm12.5-11.88h-13A1.503 1.503 0 0 0 2 4.5v15.208L6.707 15H16.5a1.503 1.503 0 0 0 1.5-1.5v-9A1.503 1.503 0 0 0 16.5 3z"></path><path fill="#E5101D" d="M6.5 10.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M9.5 10.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M12.5 10.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2M20.5 6.5h-1v10h-11v1c0 .55.45 1 1 1h8l4 3v-14c0-.55-.45-1-1-1"></path></g></svg>
                                <span>Chat ngay</span></button>
                        </div>
                        <input type="submit" value="Thêm vào giỏ hàng" class="btn_2Hnx addtocart_2srL btn" /><a style="color:white;" href="#" onclick="livesale2(<?php echo $this->detailProduct['productID']; ?>)">Thêm vào giỏ hàng</a>
                        <!--<button class="btn_2Hnx addtocart_2srL"><a style="color:white;" href="#" onclick="livesale2(<?php echo $this->detailProduct['productID']; ?>)">Thêm vào giỏ hàng</a></button>-->
                        <button class="btn_2Hnx buynow_2lc7"><a style="color:white;" href="<?php echo URL_BASE; ?>cart" onclick="livesale1(<?php echo $this->detailProduct['productID']; ?>)">Mua ngay</a></button>
                    </div>
                </div>
                <br>
                <div class="ShippingMessage_QVDB" style="background-color: rgb(255, 244, 226);">
                    <img src="//media3.scdn.vn/img2/2018/3_30/4B6MEO.png" class="icon_3cR2" alt="hỗ trợ phí vận chuyển">
                    <p class="info">Miễn phí vận chuyển cho đơn hàng có giá trị từ <strong class="value"><font color="#e5101d">149.000</font></strong>, giảm tối đa <strong class="order"><font color="#7ed321">50.000 VNĐ</font></strong> (<a class="freshipping-detail" href="#" target="_blank">chi tiết xem tại đây</a>).</p>
                </div>
                </form>
            </div>
        </div>
    </div>

</div><br>
<div class="container">
    <div style="border-bottom: 1px gainsboro solid;">
        <div>
            <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
            <span style="color: #1b6d85; font-size: 23px;">Mô tả sản phẩm</span>
        </div>
    </div><br>
    <div class="container-fluid">
        <div style="border-bottom: 1px gainsboro solid;">
            <div>
                <i  style="padding-right: 5px;"></i>
                <span style="color: #1b6d85; font-size: 18px;">Thuộc tính sản phẩm </span>
            </div>
        </div><br>
        <ul style="font-size: 13px; list-style: none; padding: 0; margin: 0 0 10px; line-height: 1.4;">
            <li style="padding: 5px 12px;background-color: #ebebeb" ;=""> <strong>Phụ kiện kèm theo:</strong> <span>Củ sạc,Cáp sạc,Tai nghe.</span> </li>
            <li style="padding: 5px 12px;" ;=""> <strong>Tình trạng máy:</strong> <span>Không còn hộp,Không trầy xước,Chưa bung máy,Đầy đủ phụ kiện.</span> </li>
            <li style="padding: 5px 12px;background-color: #ebebeb" ;=""> <strong>Bảo hành:</strong> <span>3 tháng.</span> </li>
            <li style="padding: 5px 12px;" ;=""> <strong>Hãng sản xuất:</strong> <span>Apple.</span> </li>
            <li style="padding: 5px 12px;background-color: #ebebeb" ;=""> <strong>Model iPhone:</strong> <span>iPhone X.</span> </li>
        </ul>
        <br>
        <div style="border-bottom: 1px gainsboro solid;">
            <div>
                <i  style="padding-right: 5px;"></i>
                <span style="color: #1b6d85; font-size: 18px;">Chi tiết sản phẩm </span>
            </div>
        </div> <br>
        <?php echo $this->detailProduct['description']; ?>
    </div>

</div>
<br>
<div class="container">
    <div style="border-bottom: 1px gainsboro solid;">
        <div>
            <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
            <span style="color: #1b6d85; font-size: 23px;">Tags</span>
        </div>
    </div>
    <div class="panel-content">

        <a href="#">
            <span class="text-overflow">điện thoại iphone X .</span></a>


        <a href="#">
            <span class="text-overflow">điện thoại iphone X mới .</span>
        </a>

        <a  href="#">
            <span class="text-overflow">móc điện thoại iphone X .</span>
        </a>

        <a  href="#">
            <span class="text-overflow">điện thoại iphone X lock .</span>
        </a>


        <a  href="#">
            <span class="text-overflow">điện thoại iphone X cũ .</span>
        </a>

    </div>
</div>
<div class="container">
    <div style="border-bottom: 1px gainsboro solid;">
        <div>
            <i class="fa fa-list-alt" style="padding-right: 5px;"></i>
            <span style="color: #1b6d85; font-size: 23px;">Sản phẩm liên quan</span>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="owl-carousel owl-theme owl-loaded owl-drag">
                <?php
                while ($newRow = $this->newData->fetch(PDO::FETCH_ASSOC)) {
                    extract($newRow);
                    ?>

                    <div class="item">
                        <h4> 
                            <a href="<?php echo URL_BASE . 'index/detail?id=' . $productID; ?>">
                                <?php
                                $imgArr = explode(";", $image);
                                ?>
                                <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[0]; ?> " alt=""/>
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
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div style="border-bottom: 1px gainsboro solid;">
                <div>
                    <i class="glyphicon glyphicon-comment" style="padding-right: 5px; color: #F29901;"></i>
                    <span style="color: #1b6d85; font-size: 23px;">Đánh giá</span>
                </div>


            </div>
            <br>
            <p>Đánh giá đi ????</p>

        </div>
        <div class="col-md-5">
            <div  style="border-bottom: 1px gainsboro solid;">
                <div>
                    <i class="glyphicon glyphicon-comment" style="padding-right: 5px;  color: #F29901;"></i>
                    <span style="color: #1b6d85; font-size: 23px;"> Hỏi đáp</span>
                </div>


            </div>
            <br>
            <p>Hỏi đi chứ</p>
        </div>
    </div>
</div>
