<?php
require_once('headerCus.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();
$sql = 'SELECT * FROM Products ORDER BY price';
$re = $blink->query($sql);

if ($re->num_rows > 0) :
?>
    <div class="container">
        <h1 style="color: green;">All Products</h1>
        <div class="row">
            <?php while ($row = $re->fetch_assoc()) : ?>
                <div class="col-4 pd-2 mx-auto">
                    <div class="card">
                        <img src="./image/<?= $row['image_url'] ?>" width="250px">
                        <div class="card-body">
                            <a href="detail.php?id=<?= $row['product_id'] ?>" class="text-decoration-none">
                                <h5 class="card-title"><?= $row['product_name'] ?></h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted"><span>&#36;</span><?= $row['price'] ?></h6>
                            <h6 class="card-subtitle mb-2 text-muted"><span>Stock Quantity: </span><?= $row['stock_quantity'] ?></h6>
                            <a href="detail.php?id=<?= $row['product_id'] ?>" class="btn btn-success">More Details</a> <!-- Thêm nút More Details -->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>

</body>
<style>
.card {
    width: 100%;
    max-width: 300px;
    margin: 0 auto 20px;
    border: 2px solid #008000;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 128, 0, 0.3);
    text-align: center;
    background-color: #ffffff;
    padding: 10px;
}

.card img {
    width: 100%;
    max-width: 250px;
    border: 2px solid transparent;
    transition: transform 0.5s;
}

.card img:hover {
    transform: scale(1.05);
}

.card h5 {
    font-size: 18px;
    color: #008000;
    font-weight: bold;
    margin: 10px 0;
}

.card h6 {
    font-size: 16px;
    color: #000;
    font-weight: bold;
    margin: 5px 0;
}

.container {
    padding: 20px;
}

.container h1 {
    color: #008000;
    font-size: 24px;
    font-weight: bold;
    margin: 0;
    text-align: center;
}

.container .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.btn-success {
    background-color: green;
    color: white;
    font-weight: bold;
}
</style>
<?php
require_once('footer.php');
?>
