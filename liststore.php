<?php
require_once('connect.php');
require_once('headerAdmin.php');
$c = new Connect();
$dblink = $c->ConnectToPDO();


$sql = "SELECT s.store_id, s.store_name, s.store_address, s.store_contact, s.manager, p.product_name, COUNT(p.product_id) AS product_count, SUM(p.stock_quantity) AS total_stock
        FROM Stores s
        LEFT JOIN Products p ON s.store_id = p.store_id
        GROUP BY s.store_id, s.store_name, s.store_address, s.store_contact, s.manager, p.product_name";
$result = $dblink->query($sql);

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
        margin-top: 20px;
    }

    .summary {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px; /* Tăng khoảng cách giữa nội dung và viền */
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
    }

</style>
</head>
<body>
    <h1>Information of Stores</h1>
    <div class="summary">
        <table>
            <tr>
                <th>Store ID</th>
                <th>Store Name</th>
                <th>Store Address</th>
                <th>Store Contact</th>
                <th>Manager</th>
                <th>Product Name</th>
                <th>Product Count</th>
                <th>Total Stock</th>
            </tr>
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['store_id'] . "</td>";
                echo "<td>" . $row['store_name'] . "</td>";
                echo "<td>" . $row['store_address'] . "</td>";
                echo "<td>" . $row['store_contact'] . "</td>";
                echo "<td>" . $row['manager'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_count'] . "</td>";
                echo "<td>" . $row['total_stock'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

<?php
require_once('footer.php');
?>
