<div  style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Thêm quảng cáo, tin tức mới</h2>
    <?php
    ?>

    <form action="<?php echo URL_BASE; ?>admin/advertise/add" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover table-responsive">
            <tr>
                <th> Tên quảng cáo </th>
                <td>
                    <input type="text" name="txtAdvertiseName" class="form-control" ><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Nguồn video</th>
                <td>
                    <input type="text" name="txtAdvertiseSource" class="form-control"><br>
                    <span id="productName-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
            <tr>
                <th>Phân loại</th>
                <td>
                    <input type="text" name="txtAdvertiseClassify" class="form-control" >
                    <span id="unitPrice-alert" class="alert" style="color:red;"></span>
                </td>
            </tr>
           
            <tr>
                <th>Hình ảnh</th>
                <td>
                    <input type="file" name="file[]" id="file" multiple>
                </td>
            </tr>
            <tr>
                <th>Mô tả chi tiết</th>
                <td>
                    <textarea name="txtAdvertiseDesc" id="description"> </textarea>
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
                    <a href="<?php echo URL_BASE ?>admin/index" class="btn btn-danger" > Quay về trang chủ</a>
                </td>
            </tr>

        </table>
    </form>
</div>