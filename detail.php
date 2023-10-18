<?php
include_once('headerCus.php');
?>
<div class="container px-4 py-5">
	<?php
	if(isset($_GET['id'])):
		$pid = $_GET['id'];
		require_once 'connect.php';
		$conn = new Connect();
		$db_link = $conn->connectToPDO();
		$sql =	"SELECT * FROM Products WHERE product_id =?";
		$stmt = $db_link->prepare($sql);
		$stmt ->execute(array($pid));
		$re = $stmt->fetch(PDO::FETCH_BOTH);	
	?>	
		<h2> <?=$re['product_name']?> </h2>
		<ul style="list-style-type:none ;" class="list-group">
			Price: <li class="list-group-item"> <?=$re['price']?> </li>
			Description: <li class="list-group-item"> <?=$re['description']?> </li>
			Image:<img src="./image/<?=$re['image_url']?>" alt="<?=$re['product_name']?>" width="250px">
	</ul>
	<form action="order.php" method="GET"> 
		<div class="col-lg-9">
		<input type="hidden" name="pid" value="<?=$pid?>">
		<input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Order Now"/>
		</div>
	</form>
	<?php 
		else:
		?>
		<h2>Nothing to show</h2>
	<?php 
	endif;
	?>
</div>

<?php 
include_once('footer.php');
?>