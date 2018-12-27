<?php

class Default_Controllers_User extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function register() {

        $this->view->render('user/register');
    }
    
    public function  login(){
        $this->view->render('user/login');
    }
    public function index(){
    
        $this->view->render('user/index');
    }
    public function show(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //khoi tao doi tuong product
        $customer = new Default_Models_Customer($db);
        $email = $_SESSION['email'];
        $data = $customer->showProfile($email);
         if($data == null){
             echo "Không tìm thấy dữ liệu";
         }else{
        $row = $data->fetch(PDO::FETCH_ASSOC);
        
        ?>
        
                    <div class="account-profile register-form" class="col-md-9">
                        <div class="col-md-9">
                            <form class="content" method="post" action="" >
                                <div class="form-group">
                                    <label class="control-label" style="width: 250px; margin:0px;">Họ tên </label>
                                    <div class="input-wrap">
                                        <input type="text" name="txtName" class="form-control" id="full_name" value="<?php echo $row['fullName']?>" placeholder="Họ tên" readonly >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Số điện thoại</label>
                                        <input type="text"  value="<?php echo $row['phone']?>" class="form-control" name="txtPhone" id="phone_number" placeholder="Số điện thoại" readonly> 
                                </div>

                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Email</label>
                                        <div class="input-wrap">
                                            <input type="text"  value="<?php echo $row['email']?>" class="form-control" name="txtEmail" id="form_email" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Địa chỉ</label>
                                        <div class="input-wrap">
                                            <input type="text"  value="<?php echo $row['address']?>" class="form-control" name="txtAddress" id="form_email" placeholder="Địa chỉ" readonly>
                                        </div>
                                    </div>
                                <?php 
                                    $gioitinh = $row['gender'];
                                    
                                    if($gioitinh == Male){
                                        
                                        ?>
                                        <div class="form-group gender-select-wrap" id="register_name">
                                            <label class="control-label"style="width: 250px; margin:0px;">Giới tính</label>
                                            <div class="input-wrap">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>
                                                            <input  type="radio" name="gender" value="Male" id="gender_male" class="gender" checked="">
                                                            <span><i class="ico"></i></span> Nam
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>
                                                            <input type="radio" name="gender" value="Female" id="gender_female" class="gender" disabled>
                                                            <span><i class="ico"></i></span> Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        ?>
                                            <div class="form-group gender-select-wrap" id="register_name">
                                                <label class="control-label">Giới tính</label>
                                                <div class="input-wrap">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <label>
                                                                <input type="radio" name="gender" value="Male" id="gender_male" class="gender" disabled >
                                                                <span><i class="ico"></i></span> Nam
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <label>
                                                                <input type="radio" name="gender" value="Female" id="gender_female" class="gender"checked="">
                                                                <span><i class="ico"></i></span> Nữ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                    
                                <div class="form-group ">
                                    <label class="control-label "style="width: 250px; margin:0px;">
                                        Ngày sinh
                                        <input type="date" name="bday" min="1900-01-02" value="<?php echo $row['birthDate']?>" readonly><br><br>
                                    </label> 

                                </div>
                                
                            </form>
                        </div>
                         <div class="col-md-3" id="avatar">
                            <img src="image/avatar.png" class="img-circle" alt=""/>
                        
                        </div>
                    </div>               
            <?php
         }
    }
    public function update(){
        $database = new Libs_Model();
        $db = $database->getConnection();
         $customer = new Default_Models_Customer($db);

        //khoi tao doi tuong product
        $email = $_SESSION['email'];
        $data = $customer->showProfile($email);
         if($data == null){
             echo "Không tìm thấy dữ liệu";
         }else{
        $row = $data->fetch(PDO::FETCH_ASSOC);
        
        ?>
            
                    <div class="account-profile register-form" class="col-md-9">
                        <div class="col-md-9">
                        
                            <form class="content" method="post" action="<?php echo URL_BASE;?>user/update1" >
                                <div class="form-group">
                                    <label class="control-label" style="width: 250px; margin:0px;">Họ tên </label>
                                    <div class="input-wrap">
                                        <input type="text" name="txtName" class="form-control" id="full_name" value="<?php echo $row['fullName']?>" placeholder="Họ tên" required>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Số điện thoại</label>
                                        <input type="text"  value="<?php echo $row['phone']?>" class="form-control" name="txtPhone" id="phone_number" placeholder="Số điện thoại"required> 
                                </div>

                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Email</label>
                                        <div class="input-wrap">
                                            <input type="text"  value="<?php echo $row['email']?>" class="form-control" name="txtEmail" id="form_email" placeholder="Email" readonly>
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="control-label" style="width: 250px; margin:0px;">Địa chỉ</label>
                                        <div class="input-wrap">
                                            <input type="text"  value="<?php echo $row['address']?>" class="form-control" name="txtAddress" id="form_email" placeholder="Địa chỉ" required>
                                        </div>
                                    </div>
                                <?php 
                                     $gioitinh = $row['gender'];
                                    
                                    if($gioitinh == Male){
                                        
                                        ?>
                                        <div class="form-group gender-select-wrap" id="register_name">
                                            <label class="control-label"style="width: 250px; margin:0px;">Giới tính</label>
                                            <div class="input-wrap">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>
                                                            <input  type="radio" name="gender" value="Male" id="gender_male" class="gender" checked="">
                                                            <span><i class="ico"></i></span> Nam
                                                        </label>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>
                                                            <input type="radio" name="gender" value="Female" id="gender_female" class="gender">
                                                            <span><i class="ico"></i></span> Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }else{
                                        ?>
                                            <div class="form-group gender-select-wrap" id="register_name">
                                                <label class="control-label">Giới tính</label>
                                                <div class="input-wrap">
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <label>
                                                                <input type="radio" name="gender" value="Male" id="gender_male" class="gender" >
                                                                <span><i class="ico"></i></span> Nam
                                                            </label>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <label>
                                                                <input type="radio" name="gender" value="Female" id="gender_female" class="gender"checked="">
                                                                <span><i class="ico"></i></span> Nữ
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    }
                                ?>
                                    
                                <div class="form-group ">
                                    <label class="control-label "style="width: 250px; margin:0px;">
                                        Ngày sinh
                                        <input type="date" name="bday" min="1900-01-02" value="<?php echo $row['birthDate']?>"><br><br>
                                    </label> 

                                </div>
                                <div class="form-group">
                                    <div class="input-wrap margin">
                                        <input type="submit" name="updateInfo" class="btn btn-info btn-block btn-update"value="Cập nhật"/>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                        <div class="col-md-3" id="avatar">
                            <img src="image/avatar.png" class="img-circle" alt=""/>
                            <button class="btn btn-light btn-m btn-inline">Chọn ảnh</button>
                        </div>
                    </div>
                    
                
            <?php
         }
    }
   
    public function notification(){
        echo "<div class='alert alert-danger'>Bạn chưa có thông báo nào cả!!!</div>";
    }
    public function order(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //khoi tao doi tuong order
        $order = new Default_Models_Order($db);
        $data = $order->getOrderByUsername($_SESSION['email']);
        if($data == null){
            echo "Không có đơn hàng.";
        }else{
            while($row = $data->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                ?>
                    <div class="col col-md-12" style="background:#ccccff;padding:10px;margin: 10px;border-left: 6px solid #00004d;"  > 
                        <div class="col col-md-10" style =" ">
                            <div>
                                <span style="font-size:24px;">Mã đơn hàng :&nbsp;&nbsp;&nbsp;<?php echo $orderID;?></span>
                            </div>
                            <div> 
                                <span>Ngày lập đơn :<?php echo $orderDate;?>&nbsp;&nbsp;&nbsp;</span> 
                                <span>Tổng giá: &nbsp;&nbsp;&nbsp;</span>
                                <span>Trạng thái :<?php 
                                if($status== 0){
                                    echo "<span style='color:#e65c00;'>Đang giao hàng</span>";
                                }
                                if($status== 1){
                                    echo "<span style='color:green;'>Đã thanh toán</span>";
                                }
                                ?></span> 
                                
                            </div>
                        </div>
                        <div class="col col-md-2">
                            <button type="button" class="btn btn-primary btn-md"  onclick="orderDetail1(<?php echo $orderID;?>);">Xem chi tiết</button>

                        </div>
                    </div>
                            </br>
                <?php
            }
        }
    }
    public function orderDetail(){
        $orderID = isset($_REQUEST['orderID'])? $_REQUEST ['orderID']:"";
        if($orderID != ""){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //khoi tao doi tuong order
        $order = new Default_Models_Order($db);
        $orderData = $order->getOrderByOrderID($orderID);
        
        
        if($orderData == null){
            echo "<div class='alert alert-danger'>Không có đơn hàng!!!</div>";

        }else{
            $rowOrder= $orderData->fetch(PDO::FETCH_ASSOC);
            ?>
                <div class ="" style="background:#e6e6ff; padding:5px;">
                    <span style="font-size:24px;">ID Đơn hàng :&nbsp;&nbsp;&nbsp;<?php echo $rowOrder['orderID']?></span><br>
                    <span>ID khách hàng :&nbsp;&nbsp;<?php echo $rowOrder['customerID']?></span><br>
                </div>
                <br>
                <div>
                    <span> Người nhận: <?php echo $rowOrder['receiver'];?></span><br>
                    <span> Địa chỉ giao hàng: <?php echo $rowOrder['addressReceiver'];?></span><br>
                    <span> Số điện thoại người nhận: <?php echo $rowOrder['phone'];?></span><br/>
                    <span> Người giao hàng: <?php echo $rowOrder['shipperID'];?></span><br>
                    <span> Ngày lập đơn hàng: <?php echo $rowOrder['orderDate'];?></span><br>
                    <span>Trạng thái đơn hàng :<?php 
                                if($status== 0){
                                    echo "<span style='color:#e65c00;'>Đang giao hàng</span>";
                                }
                                if($status== 1){
                                    echo "<span style='color:green;'>Đã thanh toán</span>";
                                }
                    ?></span> <br>
                    <span> Ngày giao hàng: <?php echo $rowOrder['orderDate']?></span><br>
                    <?php
                            $orderdetail = new Default_Models_OrderDetail($db);
                            $orderdetailData = $orderdetail->getOrderdetailByOrderID($orderID);
                            
                            if($orderdetailData == null){
                                echo "<div class='alert alert-danger'>Không có sản phẩm!!!</div>";

                            }else{
                                ?>
                                <div class=" table-cart">
                                    <table class="table table-bordered table-responsive table-condensed table-hover">
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Số tiền</th>
                                        </tr>
                                <?php
                                $sum = 0;
                            while($rowOrderDetail = $orderdetailData->fetch(PDO::FETCH_ASSOC)){
                            $product = new Default_Models_Product($db);
                            $proData = $product->getDetailProductInOrder($rowOrderDetail['productID']);
                            
                            if($proData == null){
                                echo "<div class='alert alert-danger'>Không có sản phẩm!!!</div>";

                            }else{
                            $rowPro = $proData->fetch(PDO::FETCH_ASSOC);
                                ?>
                                    <tr>
                                        <td><?php echo $rowPro['productName']?></td>
                                        <td><?php echo $rowOrderDetail['quantity']?></td>
                                        <td><?php echo number_format($rowOrderDetail['price']);?>đ</td>
                                    </tr>
                                <?php
                                    $sum = $sum + $rowOrderDetail['price'];                                        }
                                    }
                                ?>
                        <tr>
                            <th colspan="2">Tổng tiền hàng</th>
                            <th ><?php echo number_format($sum);?>đ</th>
                        </tr>
                        <tr>
                            <th colspan="2">Chi phí vận chuyển</th>
                            <th >200,000đ</th>                          
                        </tr>
                        <tr>
                            <th colspan="2">Giảm giá phí vận chuyển</th>
                            <th >-200,000đ</th>
                        </tr>
                        <tr>
                            <th colspan="2">Tổng số tiền thanh toán</th>
                            <th style="color:red;"><?php echo number_format($sum);?>đ</th>
                        </tr>
                    </table>
                </div>

                </div>
            <?php
                
            }
        }
       
        
        ?>
        

        <?php
        }else{
            echo "Vui lòng chọn đơn hàng";
        }
    }
    public function address(){
        echo "<div class='alert alert-danger'>Không có ảnh!!!</div>";
    }
    public function gaurantee(){
        echo "<div class='alert alert-danger'>Không có ảnh!!!</div>";
        
    }
    public function gift(){
        echo "<div class='alert alert-danger'>Không có ảnh!!!</div>";
    }
    public function updatepass(){
        ?>
        <div class="form-group">
            <div class="input-wrap margin">
            <!--  Thay đổi mật khẩu. -->
                <form id="updatepass" class="content" method="post" action=""  >
                    <div class="form-group">
                        <label class="control-label" for="old_password" style="width: 250px; margin:0px;">Mật khẩu cũ</label>
                        <span class="msg" id="msgOldPass"></span>
                        <div class="input-wrap">
                            <input type="password" name="old_password" class="form-control" id="old_password" value="" autocomplete="off" placeholder="Nhập mật khẩu cũ" required>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="new-password" style="width: 250px; margin:0px;">Mật khẩu mới</label>
                        <span class="msg" id="msgNewPass"></span>
                        <div class="input-wrap">
                            <input type="password" name="new_password" class="form-control" id="new_password" value="" autocomplete="off" placeholder="Mật khẩu từ 6 đến 32 ký tự" required>
                            <span class="help-block"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="re_new_password" style="width: 250px; margin:0px;">Nhập lại</label>
                        <span class="msg" id="msgRePass"></span>
                        <div class="input-wrap">
                            <input type="password" name="re_new_password" class="form-control" id="re_new_password" value="" autocomplete="off" placeholder="Nhập lại mật khẩu mới" required>
                            <span class="help-block"></span>
                        </div>
                    </div>  

                    
                    <div class="form-group">
                        <input type="submit" onclick="checkValidPass()" class="btn btn-info btn-block btn-update" value ="Cập nhật" />
                    </div>
                </form>
            </div>

<?php
        
    }
    
    public function help(){
        echo "Day la phan tro giup";
    }
    public function update1(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //khoi tao doi tuong product
        $customer = new Default_Models_Customer($db);
        

        
        
        $fullName = $_POST['txtName'];
        $phone = $_POST['txtPhone'];
        
        $address = $_POST['txtAddress'];
        $gender = $_POST['gender'];
        $birthDate = $_POST['bday'];
        $customer->fullName = $fullName;
        $customer->phone = $phone;
        $customer->address = $address;
        $customer->gender= $gender;
        $customer->birthDate = $birthDate;
        
        
    //var_dump($email);exit();
    

        //truyen gia tri cac thuoc tinh lay tu form update

        if($customer->updateInfo($_SESSION['email'])){
            echo "<script>window.location.href='" . URL_BASE . "user'; alert('Bạn đã cập nhật thành công !!!');</script>";
            
        }else{
            echo "<script>window.location.href='" . URL_BASE . "user'; alert('Bạn đã cập nhật thất bại!!!');</script>";
        }
    }
    public function updatepass1(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //khoi tao doi tuong product
        $customer = new Default_Models_Customer($db);
        $oldpass = $_POST['old_password'];
        $password = $customer->getPassByEmail($_SESSION['email']);
        $pass=$password->fetch(PDO::FETCH_ASSOC);
        
        if( $oldpass == $pass['password']  ){
            $newpassword = $_POST['new_password'];
            $customer->password = $newpassword;
       
        
    
    

        //truyen gia tri cac thuoc tinh lay tu form update

        if($customer->updatePass($_SESSION['email'])){
            echo "<script>window.location.href='" . URL_BASE . "user'; alert('Bạn đã cập nhật thành công!!!');</script>";
        }else{
            echo "<script>window.location.href='" . URL_BASE . "user'; alert('Bạn đã cập nhật thất bại!!!');</script>";
        }
            
        }else{
            echo "<script>window.location.href='" . URL_BASE . "user'; alert('Bạn nhập sai password hiện tại!!!');</script>";
        }
        
        
        
        
    }
}
?>

