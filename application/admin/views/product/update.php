<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Cập nhật sản phẩm</h2>
    <?php $id = $this->proDetail['productID']; ?>
    <form action="<?php echo URL_BASE; ?>admin/index/update/?id=<?php echo $id; ?>" method="post" enctype="">
        <table class="table table-responsive table-bordered table-hover">
            <tr >
                <th>Mã ID</th>
                <td><input type="text" name="txtID" class="form-control" id="productName" value="<?php echo $this->proDetail['productID']; ?>" readonly><br></td>
            </tr>
            <tr>
                <th>Mã sản phẩm</th>
                <td><input type="text" name="txtCode" class="form-control" id="productName" value="<?php echo $this->proDetail['productCode']; ?>" required><br></td>
            </tr>
            <tr>
                <th>Tên</th>
                <td><input type="text" name="txtName" class="form-control" id="productName" value="<?php echo $this->proDetail['productName']; ?>" required><br></td>
            </tr>
            <tr>
                <th>Giá cũ</th>
                <td><input type="text" name="txtPrice" class="form-control" id="unitPrice" value="<?php echo $this->proDetail['unitPrice']; ?>đ" required></td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td> <input type="text" name="txtQuantity" class="form-control" id="discount" value="<?php echo $this->proDetail['quantity']; ?>" required><p id="idSub"></p></td>
            </tr>
            <tr>
                <th>Màu Sắc</th>
                <td> <input type="text" name="txtColor" class="form-control" id="discount" value="<?php echo $this->proDetail['color']; ?>" required><p id="idSub"></p></td>
            </tr>
            <tr>
                <th>Kích thước màn hình</th>
                <td> <input type="text" name="txtSize" class="form-control" id="discount" value="<?php echo $this->proDetail['size']; ?>" required><p id="idSub"></p></td>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <td> <input type="text" name="txtDiscount" class="form-control" id="discount" value="<?php echo $this->proDetail['discount']; ?>%" required><p id="idSub"></p></td>
            </tr>

            <tr>
                <th>Hình ảnh</th>
                <td>
                    <?php
                    $imgArr = explode(";", $this->proDetail['image']);

                    for ($i = 0; $i < count($imgArr); $i++) {
                        ?>
                        <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[$i]; ?> " width='100px' height='100'>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtDesc" id="description" class="form-control"  ><?php echo $this->proDetail['description']; ?>" </textarea>
                </td>
            </tr>
            <script>
                CKEDITOR.replace('txtDesc');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success"> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/index" class="btn btn-danger" > Quay về trang danh sách sản phẩm</a>
                </td>
            </tr>



        </table>

    </form>
</div>