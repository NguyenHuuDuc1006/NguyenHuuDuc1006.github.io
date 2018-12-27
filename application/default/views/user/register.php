
<div class="container text_center">
    <form  action="<?php echo URL_BASE ?>customer/registerProcess" method="post" enctype="multipart/form-data" onsubmit="return validateForm_register()"> 
        <div class="form-group login_div">
            <div class="row">
                <div class="col-sm-6 ">
                    <h3>THÔNG TIN TÀI KHOẢN</h3>
                    <label for="email" class="text-primary login_center">Email đăng nhập</label>
                    <span id="email-alert"></span>
                    <input type="text" class="form-control" id="email" name="email" tabindex=1 ><br> <!--onfocusout="<?php echo URL_BASE ?>user/showHint"-->

                    <label for="password" class="text-primary login_center ">Mật khẩu</label>
                    <span id="password-alert"></span>
                    <input type="password" class="form-control" id="password" name="password" tabindex=2><br>

                    <label for="repassword" class="text-primary login_center ">Nhập lại mật khẩu</label>
                    <span id="repassword-alert"></span>
                    <input type="password" class="form-control" id="repassword" tabindex=3><br>


                </div>
                <div class="col-sm-6">
                    <h3>THÔNG TIN LIÊN HỆ</h3>
                    <label for="name" class="text-primary login_center">Họ tên của bạn</label>
                    <span id="name-alert"></span>
                    <input type="text" class="form-control" id="name" name="name" tabindex=4><br>

                    <label for="phone" class="text-primary login_center ">Số điện thoại</label>
                    <span id="phone-alert"></span>
                    <input type="text" class="form-control" id="phone" name="phone" tabindex=5><br>

                    <label for="date" class="text-primary login_center ">Ngày sinh</label>
                    <span id="date-alert"></span>
                    <input type="date" class="form-control" id="date" name="date" tabindex=6><br>

                    <label for="address" class="text-primary login_center ">Địa chỉ (số nhà, đường, tỉnh thành)</label>
                    <span id="address-alert"></span>
                    <input type="text" class="form-control" id="address" name="address" tabindex=7><br>
                    
                    <label for="gender" class="text-primary login_center ">Giới tính</label>
                    <span id="gender-alert"></span>
                    <select type="text" class="form-control" id="gender" name="gender" tabindex=8>
                        <option value="Other">Giới tính khác</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select><br>

                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-block" tabindex=9 name="submit" >Đăng ký</button>
                    <a type="button" class="btn btn-primary btn-block" href="<?php echo URL_BASE ?>customer/login">Đăng nhập</a>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>
    </form>
</div>

