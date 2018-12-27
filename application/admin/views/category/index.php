<div style="margin-left:0;padding-left: 0;">

    <h2 class="page-header">Danh sách danh mục sản phẩm</h2>
    <div class="row">
        <div class="col col-sm-4">
            <a href="<?php echo URL_BASE ?>admin/category/add" class="btn " style="background: #77b300;">Thêm mới danh mục</a>
            <hr>
        </div>
        <div class="col col-sm-8">
            <form  action="<?php echo URL_BASE; ?>admin/index/search" method="get">   
                <div class="col col-sm-9">
                    <input class="" type="text" name="adminSearch"  placeholder="Nhập mã hoặc tên danh mục"  >
                </div>
                <div class="col col-sm-3">
                    <select name="classify" style="display:none;"><option value="category"></option></select>
                    <input class="" type="submit" id="btnAdminSearch"value="Tìm kiếm" >
                </div>
            </form> 
        </div>
    </div>


    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th>Mã danh mục cha</th>
        <th>Ngày tạo</th> 
        <th>Chức năng</th>           
        </thead>
        <?php
        if ($this->catData == null) {
              echo "<div class='alert alert-danger'>Không tìm thấy danh mục!!!</div>";
        } else {
            echo "$this->value(<span style='color:red;'>" . $this->catData->rowCount() . "</span> danh mục)";
            while ($row = $this->catData->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <tr>
                    <td><?php echo $categoryID; ?></td>
                    <td><?php echo $categoryName; ?></td>
                    <td><?php echo $subCategoryID; ?></td>
                    <td><?php echo $created; ?></td>
                    <td>
                        <a href="<?php echo URL_BASE; ?>admin/category/detail?id=<?php echo $categoryID; ?>" class="btn btn-info" > <i class="fa fa-eye"></i>Xem</a> &nbsp;
                        <a href="<?php echo URL_BASE; ?>admin/category/update?id=<?php echo $categoryID; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Sửa</a> &nbsp;
                        <a href="#" onclick="delete_category(<?php echo $categoryID; ?>);" class="btn btn-danger"><i class="fa fa-trash w3-xxlarge"></i> Xóa</a> &nbsp;
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </table>

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    ?>

</div>
<script>
    function delete_category(id) {
        var response = confirm("Bạn có muốn xóa sản phẩm không?");
        if (response) {
            window.location = "<?php echo URL_BASE; ?>admin/category/deleteCategory?id=" + id;
        }
    }
</script>