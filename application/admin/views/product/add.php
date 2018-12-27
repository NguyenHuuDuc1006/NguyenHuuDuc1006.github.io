<div  style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Thêm sản phẩm mới</h2>
    <?php
    ?>

    <form action="<?php echo URL_BASE; ?>admin/index/add" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Mã sản phẩm</th>
                <td>
                    <input type="text" name="txtCode" class="form-control" id="productCode" required><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Tên sản phẩm</th>
                <td>
                    <input type="text" name="txtName" class="form-control" id="productName" required><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Giá gốc</th>
                <td>
                    <input type="text" name="txtPrice" class="form-control" id="unitPrice" required>
                    <span id="unitPrice-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Giảm giá</th>
                <td>
                    <input type="text" name="txtDiscount" class="form-control" id="discount" required>
                    <span id="discount-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Số lượng</th>
                <td>
                    <input type="text" name="txtQuantity" class="form-control" id="quantity" required>
                    <span id="discount-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Màu sắc</th>
                <td>
                    <input type="text" name="txtColor" class="form-control" required>
                    <span id="discount-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Kích thước màn hình</th>
                <td>
                    <input type="text" name="txtSize" class="form-control" required>
                    <span id="discount-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Danh mục</th>
                <td>
                    <select name="txtCategory1" id="cbCategory" class="form-control" onchange="getbycategory(this.value);">
                        <?php
                        while ($rowCat = $this->addCate1->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <option value="<?php echo $rowCat['categoryID']; ?>"><?php echo $rowCat['categoryName']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr> 
            <tr id="result"></tr>

            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="file[]" id="file" multiple>
                </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtDesc" id="description"> </textarea>
                </td>
            <span id="description-alert" class="alert" style="color:red;"></span>
            </tr>
            <script>
                CKEDITOR.replace('txtDesc');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success" required> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/index" class="btn btn-danger" > Quay về trang chủ</a>
                </td>
            </tr>

        </table>
    </form>
</div>