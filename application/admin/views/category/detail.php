<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Chi tiết danh mục sản phẩm</h2>

    <?php
    ?>
    <table class="table table-responsive table-bordered table-hover">
         <tr>
            <th>Mã danh mục </th>
            <td><?php echo $this->catDetail['categoryID']; ?></td>
        </tr>
        <tr>
            <th>Mã danh mục cha </th>
            <td><?php echo $this->catDetail['subCategoryID']; ?></td>
        </tr>

        <tr>
            <th>Tên danh mục</th>
            <td><?php echo $this->catDetail['categoryName']; ?></td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><?php echo $this->catDetail['description']; ?>đ</td>
        </tr>
        
        <tr>
            <td></td>                
            <td><a href="<?php echo URL_BASE; ?>admin/category" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
</div>


