<div  style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Cập nhật quảng cáo, tin tức mới</h2>
    <?php
        $row = $this->advDetail->fetch(PDO::FETCH_ASSOC);
    ?>

    <form action="<?php echo URL_BASE; ?>admin/advertise/update" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover table-responsive">
            <tr style="display:none;">
                <th > ID quảng cáo </th>
                <td>
                    <input type="text" name="txtID" class="form-control" value ="<?php echo $row['advertiseID']; ?>"readonly ><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th> Tên quảng cáo </th>
                <td>
                    <input type="text" name="txtAdvertiseName" class="form-control" value ="<?php echo $row['advertiseName']; ?>" ><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Nguồn video</th>
                <td>
                    <input type="text" name="txtAdvertiseSource" class="form-control" value ="<?php echo $row['source']; ?>"><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Phân loại</th>
                <td>
                    <input type="text" name="txtAdvertiseClassify" class="form-control"  value ="<?php echo $row['classify']; ?>" >
                    <span id="unitPrice-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
           
            <tr>
            <th>Hình ảnh</th>
            <td>
                <?php
                $imgArr = explode(";", $row['image']);

                for ($i = 0; $i < count($imgArr); $i++) {
                    ?>
                    <img src="<?php echo URL_BASE;?>templates/default/image/<?php echo $imgArr[$i]; ?> "alt="chưa có ảnh" width='100%' height='100%'>
                    <?php
                }
                ?>
            </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtAdvertiseDesc" id="description"  > <?php echo $row['description']; ?> </textarea>
                </td>
            <span id="description-alert" class="alert" style="color:red;"></span>
            </tr>
            <script>
                CKEDITOR.replace('txtAdvertiseDesc');
            </script>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnSave" value="Lưu" class="btn btn-success"> &nbsp;
                    <a href="<?php echo URL_BASE ?>admin/advertise" class="btn btn-danger" > Quay về trang quản lý quảng cáo</a>
                </td>
            </tr>

        </table>
    </form>
</div>