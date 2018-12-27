<div class="container text_center">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6 login_div">
            <form action="<?php echo URL_BASE?>customer/loginProccess" method="POST" onsubmit="return validateForm_login()">
                <div class="form-group">
                    <div>
                        <h3>THÔNG TIN TÀI KHOẢN</h3>
                        <div>
                            <label for="email" class="text-primary login_center ">Email đăng nhập</label>
                            <span id="email-alert" style="color: red"></span>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Tên tài khoản">
                        </div>
                        <br>
                        <div>
                            <label for="password" class="text-primary login_center ">Mật khẩu</label>
                            <span id="password-alert" style="color: red"></span>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu"> 
                        </div>
                    </div>                   
                </div>
                <br>
                <input type="submit" value="Đăng nhập" class="btn btn-primary btn-block"></input>   
                <a type="button" class="btn btn-success btn-block" href="<?php echo URL_BASE ?>customer/register">Đăng Ký</a>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

