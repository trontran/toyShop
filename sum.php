<?php
require_once('connect.php');
require_once('headerAdmin.php');
$c = new Connect();
$dblink = $c->ConnectToPDO();

$sql = "SELECT 
            DATE_FORMAT(o.order_date, '%Y-%m') AS month, 
            p.store_id,
            s.store_name,
            s.manager,  
            COUNT(o.order_id) AS total_orders, 
            SUM(o.quantity) AS total_quantity, 
            SUM(o.total_amount) AS total_revenue
        FROM Orders o
        JOIN Products p ON o.product_id = p.product_id
        JOIN Stores s ON p.store_id = s.store_id
        GROUP BY month, p.store_id
        ORDER BY p.store_id, month";

$result = $dblink->query($sql);

$currentDate = date('d/m/Y');

$totalRevenueQuery = "SELECT 
            SUM(total_amount) AS total_revenue
        FROM Orders";

$totalRevenueResult = $dblink->query($totalRevenueQuery);
$totalRevenueRow = $totalRevenueResult->fetch(PDO::FETCH_ASSOC);
$totalRevenue = $totalRevenueRow['total_revenue'];
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
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px; 
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    h2 {
        font-size: 18px;
        margin-top: 10px;
    }

    p {
        font-size: 16px;
        margin-top: 10px;
    }
</style>

</head>
<body>
<h1>Summary of Revenue by Month</h1>
<div class="summary">
    <p>Total Revenue All Stores: $<?php echo number_format($totalRevenue, 2); ?></p>
    <?php
    $currentStore = null;
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        if ($currentStore !== $row['store_id']) {
            if ($currentStore !== null) {
                echo "</table></div>"; 
            }
            echo "<div class='summary'>";
            echo "<h2>Store: " . $row['store_name'] . "</h2>";
            echo "<p>Manager: " . $row['manager'] . "</p>";  
            echo "<table>";
            echo "<tr>";
            echo "<th>Month</th>";
            echo "<th>Store ID</th>";
            echo "<th>Store Name</th>";
            echo "<th>Manager</th>";  
            echo "<th>Total Orders</th>"; 
            echo "<th>Quantity sold</th>";
            echo "<th>Revenue ($)</th>";
            echo "</tr>";
            $currentStore = $row['store_id'];
        }
        echo "<tr>";
        echo "<td>" . $row['month'] . "</td>";
        echo "<td>" . $row['store_id'] . "</td>";
        echo "<td>" . $row['store_name'] . "</td>";
        echo "<td>" . $row['manager'] . "</td>";  
        echo "<td>" . $row['total_orders'] . "</td>"; 
        echo "<td>" . $row['total_quantity'] . "</td>";
        echo "<td>" . $row['total_revenue'] . "</td>";
        echo "</tr>";
    }
    if ($currentStore !== null) {
        echo "</table></div>"; 
    }
    ?>
</div>
</body>

<?php
require_once('footer.php');
?>
