<?php
require_once('headerCus.php');
include_once('connect.php');
$c = new connect();
$blink = $c->connectToMySQL();
$sql = 'SELECT * FROM Products ORDER BY product_id DESC LIMIT 6';
$re = $blink->query($sql);

if ($re->num_rows > 0) {
?>
    <div class="container">
        <h1 class="text-success">Hot Products</h1>
        <div class="row">
            <?php while ($row = $re->fetch_assoc()) : ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="./image/<?= $row['image_url'] ?>" class="card-img-top" alt="<?= $row['product_name'] ?>">
                        <div class="card-body">
                            <a href="detail.php?id=<?= $row['product_id'] ?>" class="text-decoration-none">
                                <h5 class="card-title text-success"><?= $row['product_name'] ?></h5>
                            </a>
                            <h6 class="card-subtitle mb-2 text-muted">$<?= $row['price'] ?></h6>
                            <a href="detail.php?id=<?= $row['product_id'] ?>" class="btn btn-success">More Details</a> <!-- Thêm nút More Details -->
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php } ?>
</body>
<style>
    .card {
        border: 2px solid green;
        text-align: center;
        background-color: whitesmoke;
        border-radius: 5px;
        box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
        margin: 0 10px;
        max-width: 250px;
    }

    .card-img-top {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .text-success {
        color: green;
        font-weight: bold;
    }

    .card-subtitle {
        font-size: 20px;
        color: black;
        font-weight: bold;
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
