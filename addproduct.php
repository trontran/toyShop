<?php
require_once('connect.php');
require_once('headerAdmin.php');
if(isset($_POST['add'])){
    $c = new Connect();
    $dblink = $c->ConnectToPDO();

    $img = str_replace(' ','-',$_FILES['Pro_image'] ['name']); //mot mang 2 chieu chieu dau tien la ten input ben con lai la lay truc tiep ben trong hinh.bien dau cach thanh dau gach nho.
	$imgdir= './image/';
	$flag = move_uploaded_file(
		$_FILES['Pro_image'] ['tmp_name'], 
		$imgdir.$img
	);

    $productID = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productDescription = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['stock_quantity'];
    $catID = $_POST['category_id'];
    $supplierID = $_POST['supplier_id'];
    $storeID = $_POST['store_id'];

    if($flag){
        $sql = "INSERT INTO `Products`(`product_id`, `product_name`, `description`, `price`, `stock_quantity`, `category_id`, `supplier_id`, `image_url`, `store_id`) VALUES (?,?,?,?,?,?,?,?,?)";
        $re = $dblink->prepare($sql);
        $v = [
            $productID, $productName, $productDescription, $price, $quantity, $catID, $supplierID, $img, $storeID
        ];
        $stmt = $re->execute($v);
        if($stmt){
            $successMessage = "Congrats, product added successfully.";
        } else {
            $errorMessage = "Failed to add product.";
        }
    } else {
        $errorMessage = "Copy image failed.";
    }
    
}
?>

<style>
    
    .container {
        max-width: 600px; 
        margin: 0 auto; 
        padding: 20px; 
        background-color: #f5f5f5; 
    }

   
    .form-control {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    label {
        font-weight: bold;
    }

    
    .btn {
        background-color: #ff8800;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #ff5500;
    }
</style>



<div class="container">
<?php if(isset($successMessage)): ?>
        <div class="alert alert-success"><?php echo $successMessage; ?></div>
    <?php endif; ?>

    <?php if(isset($errorMessage)): ?>
        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <form class="form form-vertical" method="POST" action="#" enctype="multipart/form-data">
        <div class="row mx-auto">
            <div>
                <label for="product_id">Product ID</label>
                <input id="product_id" type="text" name="product_id" class="form-control" required>
                
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="product_name">Product Name</label>
                <input id="product_name" type="text" name="product_name" class="form-control" required>
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="description">Product Description</label>
                <input id="description" type="text" name="description" class="form-control" required>
            </div>
        </div>
        <div class="row mx-auto">
            <div>
                <label for="price">Price</label>
                <input id="price" type="text" name="price" class="form-control" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="stock_quantity">Stock Quantity</label>
                <input id="stock_quantity" type="text" name="stock_quantity" class="form-control" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="category_id">Category ID</label>
                <input id="category_id" type="text" name="category_id" class="form-control" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="supplier_id">Supplier ID</label>
                <input id="supplier_id" type="text" name="supplier_id" class="form-control" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div class="col-12">
            <div class="form-group">
                <input class="form-control" type="file" name="Pro_image" value="" />
            </div>
            </div>
        </div>
        <div class="row ms-auto">
            <div>
                <label for="store_id">Store ID</label>
                <input id="store_id" type="text" name="store_id" class="form-control" required>
            </div>
        </div>
        <div class="row ms-auto">
            <div class="col-2 ms-auto">
                <input type="submit" name="add" value="Submit" class="btn btn-warning">
                <!-- <input type="reset" name="btn_reset" value="Reset" class="btn btn-warning"> -->
            </div>
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>
