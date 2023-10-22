<?php
require_once('headerAdmin.php');
include_once('connect.php');
?>

<style>
div.card {
    border: 2px solid green;
    background-color: whitesmoke;
    border-radius: 3px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 300px; 
    margin: 0 auto 20px; 
}

.card img {
    max-width: 100%; 
    height: auto; 
    object-fit: cover; 
}

.responsive {
    width: 25%;
    float: left;
    padding: 0 6px;
}

.card h5 {
    font-size: 20px;
    font-weight: bold;
    color: green;
}

.card h6 {
    font-size: 20px;
    font-weight: bold;
    color: black;
}

.search {
    text-align: center; 
    margin-bottom: 20px; 

}

.search .form-control {
    max-width: 300px; 
}
</style>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center p-3">
        <div class="col-md-8">
            <div class="search">
                <form class="example1" action="search.php" method="GET">     
                    <input type="text" class="form-control" placeholder="Search..."  name="search">
                    <button class="btn btn-success" name="btnSearch">Search</button>
                </form>  
            </div>
        </div>
    </div>
    <h2 style="color:green"></h2>    
    <div class="row">
        <?php
        $c = new Connect();
        $dblink = $c->connectToPDO();
        if (isset($_GET['search'])) {
            $nameP = $_GET['search'];
        } else {
            $nameP = "";
        }
        $sql = "SELECT * FROM Products WHERE product_name LIKE ?";
        $re = $dblink->prepare($sql);
        $valueArray = ["%$nameP%"];
        $re->execute($valueArray);
        $row = $re->fetchAll(PDO::FETCH_BOTH);
        foreach ($row as $r): 
        ?>
        <div class="col-4 pd-2 mx-auto">
            <div class="card">
                <img src="./image/<?=$r['image_url']?>" alt="<?=$r['product_name']?>">
                <div class="card-body">	
                    <a href="detail.php?id=<?=$r['product_id']?>" class="text-decoration-none"><h5 class="card-title"><?=$r['product_name']?></h5></a>
                    <h6 class="card-subtitle mb-2 text-muted"><span>&#36;</span><?=$r['price']?></h6>
                </div>	
            </div>
        </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
<?php
require_once('footer.php');
?>