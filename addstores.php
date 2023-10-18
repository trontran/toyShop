<?php
require_once('headerAdmin.php');
require_once('connect.php');

if (isset($_POST['store_name']) && isset($_POST['store_address']) && isset($_POST['store_contact'])) {
    $c = new Connect();
    $dblink = $c->ConnectToPDO();

    
    $storeName = $_POST['store_name'];
    $storeAddress = $_POST['store_address'];
    $storeContact = $_POST['store_contact'];
    $storeManager = $_POST['store_manager'];

    
    $sql = "INSERT INTO `Stores`(`store_name`, `store_address`, `store_contact`,`manager`) VALUES (?,?,?,?)";
    $re = $dblink->prepare($sql);
    
      
    $re->bindParam(1, $storeName);
    $re->bindParam(2, $storeAddress);
    $re->bindParam(3, $storeContact);
    $re->bindParam(4, $storeManager);

    if ($re->execute()) {
        echo "Store added successfully";
    } else {
        echo "Failed to add store";
    }
}
?>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #f2f2f2; 
    }

    .store-form {
        background-color: #fff;
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }

    h1 {
        text-align: center;
        color: #008000; 
    }

    form {
        text-align: left;
    }

    label, input {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%; /* Make input fields full width */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        background-color: #008000;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        width: 100%; 
    }
</style>

<div class="store-form">
    <h1>Add New Store</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="store_name">Store Name:</label>
            <input type="text" name="store_name" id="store_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="store_address">Store Address:</label>
            <input type="text" name="store_address" id="store_address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="store_contact">Store Contact:</label>
            <input type="text" name="store_contact" id="store_contact" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="store_manager">Store Manager:</label>
            <input type="text" name="store_manager" id="store_manager" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Add Store" class="btn btn-primary">
        </div>
    </form>
</div>

<?php
require_once('footer.php');
?>