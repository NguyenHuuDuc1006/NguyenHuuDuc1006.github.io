<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Chi tiết sản phẩm</h2>

    <?php
    ?>
    <table class="table table-responsive table-bordered table-hover">
        <tr>
            <th>Mã sản phẩm </th>
            <td><?php echo $this->proDetail['productCode']; ?></td>
        </tr>

        <tr>
            <th>Tên</th>
            <td><?php echo $this->proDetail['productName']; ?></td>
        </tr>
        <tr>
            <th>Giá cũ</th>
            <td><?php echo number_format($this->proDetail['unitPrice']); ?>đ</td>
        </tr>
        <tr>
            <th>Giảm giá</th>
            <td><?php echo $this->proDetail['discount']; ?>%</td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td><?php echo $this->proDetail['quantity']; ?></td>
        </tr>
        <tr>
            <th>Màu sắc</th>
            <td><?php echo $this->proDetail['color']; ?></td>
        </tr>
        <tr>
            <th>Kích thước màn hình</th>
            <td><?php echo $this->proDetail['size']; ?></td>
        </tr>
        <?php
            if($this->catDetail['subCategoryID'] == null){
                ?>
                    <tr>
                        <th>Danh mục</th>
                        <td><?php echo $this->catDetail['categoryName']; ?></td>
                    </tr>
            <?php
            }else{
        ?>
        <tr>
            <th>Danh mục</th>
            <td><?php echo $this->catParent['categoryName']; ?></td>
        </tr>
         <tr>
            <th>Hãng sản phẩm</th>
            <td><?php echo $this->catDetail['categoryName']; ?></td>
        </tr>
            <?php
            
            }
            ?>
        <tr>
            <th>Hình ảnh</th>
            <td>
                <?php
                $imgArr = explode(";", $this->proDetail['image']);

                for ($i = 0; $i < count($imgArr); $i++) {
                    ?>
                    <img src="<?php echo URL_BASE;?>templates/default/image/<?php echo $imgArr[$i]; ?> " width='100px' height='100'>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><?php echo $this->proDetail['description']; ?></td>
        </tr>
        <tr>
            <th>Ngày tạo</th>
            <td><?php echo $this->proDetail['created']; ?></td>
        </tr>
        <tr>
            <td></td>                
            <td><a href="<?php echo URL_BASE; ?>admin" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
</div>