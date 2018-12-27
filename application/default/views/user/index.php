<div class="container-fluid" id="menu1" onload="showInfo();" >
            <div class="container">
                
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo URL_BASE; ?>">Trang chủ</a></li>
                                                <li class="active">Thông tin tài khoản</li>
                                            </ol>
                    
                    </div>
                <div class="col col-md-3" id="left-home" >
                     <div class="menu-left">
                       
                        <div class="menu">  
                            <ul class="menu" role="menu" >
                                <li class="list-group-item ">
                                    <a href="#" onclick="showInfo();"><span class="glyphicon glyphicon-user"></span> <span>Thông tin tài khoản</span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="updateInfo();"><span class="glyphicon glyphicon-pencil"></span><span> Cập nhật thông tin</span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="notifications();"><span class="glyphicon glyphicon-bell"></span> <span>Thông báo của tôi</span> <span class="num-noti-nav"></span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="order();"> <span class="glyphicon glyphicon-list"></span> <span>Quản lý đơn hàng</span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="address();">  <span class="glyphicon glyphicon-map-marker"></span> <span>Sổ địa chỉ</span> </a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="gaurantee();"><span class="glyphicon glyphicon-wrench"></span> <span>Thông tin bảo hành </span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="gift();"><span class="glyphicon glyphicon-gift"></span><span>Khuyến mãi và quà tặng</span></a>
                                </li>
                                <li class="list-group-item ">
                                    <a href="#" onclick="updatePass();"><span class="glyphicon glyphicon-lock"></span><span> Đổi mật khẩu</span></a>
                                </li>
                                
                                <li class="list-group-item ">
                                    <a href="#" onclick="help();"><span class="glyphicon glyphicon-earphone"></span><span> Thông tin liên hệ</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

            </div>   
                
                
                <div class="col col-md-9" id="righthome" >
                    <div class="account-profile register-form" class="col-md-9">
                    
                    </div>
                </div>
            </div>
        </div><br>