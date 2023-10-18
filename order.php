<?php
require_once('connect.php');
require_once('headerCus.php');

// Kết nối cơ sở dữ liệu để lấy danh sách người dùng và sản phẩm
$c = new Connect();
$dblink = $c->ConnectToPDO();

// Truy vấn danh sách người dùng
$sqlUsers = "SELECT `user_id`, `full_name` FROM `Users`";
$users = $dblink->query($sqlUsers)->fetchAll(PDO::FETCH_ASSOC);

// Truy vấn danh sách sản phẩm
$sqlProducts = "SELECT `product_id`, `product_name`, `price` FROM `Products`";
$products = $dblink->query($sqlProducts)->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['add'])){
    // Lấy dữ liệu từ biểu mẫu
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    
    // Tính toán tổng giá sản phẩm dựa trên giá sản phẩm và số lượng
    $total_amount = 0;
    foreach ($products as $product) {
        if ($product['product_id'] == $product_id) {
            $total_amount = $product['price'] * $quantity;
            break;
        }
    }
    
    // Thực hiện INSERT vào bảng "Orders" với dữ liệu đã chọn
    $sql = "INSERT INTO `Orders`(`user_id`, `product_id`, `quantity`, `total_amount`) VALUES (?,?,?,?)";
    $re = $dblink->prepare($sql);
    $v = [$user_id, $product_id, $quantity, $total_amount];
    $stmt = $re->execute($v);
    
    if($stmt){
        $successMessage = "Congrats, order added successfully.";
    } else {
        $errorMessage = "Failed to add order.";
    }
    
}
?>


<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    select,
    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .btn {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }
</style>

</head>
<body>
    <h1>Create Order</h1>
    <?php
    if (isset($successMessage)) {
        echo '<div class="alert alert-success">' . $successMessage . '</div>';
    }

    if (isset($errorMessage)) {
        echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
    }
    ?>
    <form method="post">
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['user_id']; ?>"><?php echo $user['full_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id" required>
            <?php foreach ($products as $product): ?>
                <option value="<?php echo $product['product_id']; ?>" data-price="<?php echo $product['price']; ?>"><?php echo $product['product_name']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" id="quantity" required oninput="updateTotalAmount()">

        <label for="total_amount">Total Amount:</label>
        <input type="text" name="total_amount" id="total_amount" readonly>

        <input type="submit" name="add" value="Submit" class="btn">
    </form>

    <script>
        function updateTotalAmount() {
            var selectedProduct = document.getElementById("product_id").options[document.getElementById("product_id").selectedIndex];
            var price = selectedProduct.getAttribute("data-price");
            var quantity = document.getElementById("quantity").value;
            var totalAmount = price * quantity;
            document.getElementById("total_amount").value = totalAmount;
        }

        document.getElementById("quantity").addEventListener("input", updateTotalAmount);

        // Initialize total amount on page load
        var initialProduct = document.getElementById("product_id").options[0];
        var initialPrice = initialProduct.getAttribute("data-price");
        document.getElementById("total_amount").value = initialPrice;
    </script>
</body>

<?php
require_once('footer.php');
?>
