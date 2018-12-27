<div class="container-fluit">
    <div class="header">
        <div class="row">
            <div class="col-sm-3 logo"><a href="<?php echo URL_BASE ?>admin" class="adminHeader">D3TAdmin</a></div>
            <div class="col-sm-5">
                <div class="row">
                    <form  action="<?php echo URL_BASE; ?>admin/index/search" method="get">   
                        <div class ="col col-sm-7"class="form-control">
                            <input style=" margin-top:10px;height:30px;" class="form-control" type="text"name="adminSearch" id="adminSearch" placeholder="Mời bạn nhập tìm kiếm"  >
                        </div>
                        <div class ="col col-sm-3"class="form-control"style=" margin:0px;">
                            <select  name ="classify"style=" margin-top:10px;height:30px;">
                                <option value="">--Chọn mục--</option>
                                <option value="product">Sản phẩm</option>
                                <option value="category">Danh mục</option>
                                <option value="order">Đơn hàng</option>
                                <option value="customer">Người dùng</option>
                                <option value="advertise">Tin tức, QC</option>
                            </select>
                        </div>
                        <div class ="col col-sm-2"class="form-control">
                            <input style=" margin-top:10px;height:30px;" class="form-control" type="submit" id="btnAdminSearch"value="Search" >
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4 user">
                <div class="row">
                    <div class="col-sm-3 dropdown">
                        <span class="glyphicon glyphicon-globe"></span>
                        <div class="dropdown-user">
                            <p>Bạn có thông báo</p>
                        </div>
                    </div>
                    <div class="col-sm-3 dropdown">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <div class="dropdown-user">
                            <p>Bạn có mail</p>
                        </div>
                    </div>
                    <div class="col-sm-6 dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        <div class="dropdown-user">
                            <a href="#">Admin</a>
                            <a href="#">Cài đặt</a>
                            <a href="<?php echo URL_BASE . 'admin/employee/logoutProcess' ?>">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>