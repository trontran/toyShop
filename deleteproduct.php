<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    
    $sql = "DELETE FROM Products WHERE product_id = $product_id";

    if ($blink->query($sql) === true) {
        echo "Delete product successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$product_id = $_GET['id'];
$sql = "SELECT * FROM Products WHERE product_id = $product_id";
$result = $blink->query($sql);
$row = $result->fetch_assoc();

?>

<div class="container">
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <div class="row mx-auto">
            <div>
                <label for="product_id">Product ID</label>
                <input id="product_id" type="text" name="product_id" class="form-control" value="<?= $row['product_id'] ?>" required>
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="product_name">Product Name</label>
                <input id="product_name" type="text" name="product_name" class="form-control" value="<?= $row['product_name'] ?>" required>
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="description">Product Description</label>
                <input id="description" type="text" name = "description" class="form-control" value="<?= $row['description'] ?>" required>
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="price">Price</label>
                <input id="price" type="text" name="price" class="form-control" value="<?= $row['price'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="stock_quantity">Stock Quantity</label>
                <input id="stock_quantity" type="text" name="stock_quantity" class="form-control" value="<?= $row['stock_quantity'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="category_id">Category ID</label>
                <input id="category_id" type="text" name="category_id" class="form-control" value="<?= $row['category_id'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="supplier_id">Supplier ID</label>
                <input id="supplier_id" type="text" name="supplier_id" class="form-control" value="<?= $row['supplier_id'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="image_url">Image URL</label>
                <input id="image_url" type="text" name="image_url" class="form-control" value="<?= $row['image_url'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="store_id">Store ID</label> <!--Thêm cột store_id-->
                <input id="store_id" type="text" name="store_id" class="form-control" value="<?= $row['store_id'] ?>" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div class="col-2 ms-auto">
                <input type="submit" name="add" value="Submit" class="btn btn-warning">
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>