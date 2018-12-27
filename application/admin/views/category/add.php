<div  style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Thêm danh mục sản phẩm mới</h2>
    <?php
    ?>

    <form action="<?php echo URL_BASE; ?>admin/category/add" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th>Mã danh mục cha</th>
                <td>
                    <input type="text" name="txtSubCat" class="form-control" id="productCode"><br>
                    
                </td>
            </tr>
            <tr>
                <th>Tên danh mục </th>
                <td>
                    <input type="text" name="txtName" class="form-control" id="productName" required><br>
                    
                </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtDes" id="description"> </textarea>
                </td>
          
            </tr>
            <script>
                CKEDITOR.replace('txtDes');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success"> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/category" class="btn btn-danger" > Quay về trang chủ</a>
                </td>
            </tr>

        </table>
    </form>
</div>

