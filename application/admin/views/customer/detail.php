<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Thông tin chi tiết khách hàng</h2>

    <table class="table table-responsive table-bordered table-hover">
        <tr>
            <th>Mã khách hàng </th>
            <td><?php echo $this->cusDetail['customerID']; ?></td>
        </tr>
        <tr>
            <th>Họ và tên</th>
            <td><?php echo $this->cusDetail['fullName']; ?></td>
        </tr>
        <tr>
            <th>Địa chỉ email</th>
            <td><?php echo $this->cusDetail['email']; ?></td>
        </tr>
        <tr>
            <th>Mật khẩu</th>
            <td><?php echo $this->cusDetail['password']; ?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?php echo $this->cusDetail['phone']; ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?php echo $this->cusDetail['address']; ?></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td><?php echo $this->cusDetail['gender']; ?></td>
        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><?php echo $this->cusDetail['birthDate']; ?></td>
        </tr>
        <tr>
            <th>Ảnh cá nhân</th>
            <td><?php echo $this->cusDetail['avatar']; ?></td>
        </tr>
        <tr>
            <td></td>                
            <td><a href="<?php echo URL_BASE; ?>admin/customer" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
</div>
