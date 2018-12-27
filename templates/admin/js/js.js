function validateForm_addProduct() {
    var error = 0;
    var productName = document.getElementById("producName").value;
    var unitPrice = document.getElementById("unitPrice").value;
    var discount = document.getElementById("discount").value;
    var category = document.getElementById("category").value;
    var image = document.getElementById("image").value;
    var description = document.getElementById("descripton").value;

    if (productName === "") {
        document.getElementById("productName-alert").innerHTML = "Tên Sản phầm không được để trống!";
        error = 1;
    }
    if (unitPrice === "") {
        document.getElementById("unitPrice-alert").innerHTML = "Giá gốc Sản phầm không được để trống!";
        error = 1;
    }
    if (discount === "") {
        document.getElementById("discount-alert").innerHTML = "Giảm giá không được để trống!";
        error = 1;
    }
    if (category === "") {
        document.getElementById("category-alert").innerHTML = "Danh mục Sản phầm không được để trống!";
        error = 1;
    }
    if (image === "") {
        document.getElementById("image-alert").innerHTML = "Ảnh Sản phầm không được để trống!";
        error = 1;
    }
    if (description === "") {
        document.getElementById("description-alert").innerHTML = "Mô tả chi tiết không được để trống!";
        error = 1;
    }
    if (error === 1) {
        return false;
    }

}
function delete_product(id) {
    var response = confirm("Bạn có muốn xóa sản phẩm không?");
    if (response) {
        window.location = "delete.php?id=" + id;
    }
}
