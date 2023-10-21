<?php
require_once('headerAdmin.php');
include_once('connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $category_id = $_POST['category_id'];
    $supplier_id = $_POST['supplier_id'];
    $image_url = $_POST['image_url'];
    $store_id = $_POST['store_id']; 

    $sql = "UPDATE Products SET 
            product_name = '$product_name',
            description = '$description',
            price = '$price',
            stock_quantity = '$stock_quantity',
            category_id = '$category_id',
            supplier_id = '$supplier_id',
            image_url = '$image_url',
            store_id = '$store_id' 
            WHERE product_id = $product_id";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
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
                <input id="description" type="text" name= "description" class="form-control" value="<?= $row['description'] ?>" required>
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
                <label for="store_id">Store ID</label> 
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
