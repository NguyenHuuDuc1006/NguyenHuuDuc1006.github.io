<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Cập nhật danh mục sản phẩm</h2>
    <?php $id = $this->catDetail['categoryID']; ?>
    <form action="<?php echo URL_BASE; ?>admin/category/update/?id=<?php echo $id; ?>" method="post" enctype="">
        <table class="table table-responsive table-bordered table-hover">
            <tr>
                <th>Mã danh mục sản phẩm cha</th>
                <td><input type="text" name="txtSubCat" class="form-control" id="subCategoryID" value="<?php echo $this->catDetail['subCategoryID']; ?>"><br></td>
            </tr>
            <tr>
                <th>Tên</th>
                <td><input type="text" name="txtName" class="form-control" id="categoryName" value="<?php echo $this->catDetail['categoryName']; ?>" required><br></td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtDes" id="description" class="form-control" value="<?php echo $this->catDetail['description']; ?>"> </textarea>
                </td>
            </tr>
            <script>
                CKEDITOR.replace('txtDes');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success"> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/category" class="btn btn-danger" > Quay về trang danh sách sản phẩm</a>
                </td>
            </tr>



        </table>

    </form>
</div>