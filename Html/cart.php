<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery('SELECT * FROM menu WHERE ID = '.$_GET['code'].'');
			$itemArray = array($productByCode[0]["ID"]=>array('MealName'=>$productByCode[0]["MealName"], 'ID'=>$productByCode[0]["ID"], 'quantity'=>$_POST["quantity"], 'Price'=>$productByCode[0]["Price"], 'mealimg'=>$productByCode[0]["mealimg"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["ID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["ID"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>shopping cart</TITLE>
<link href="../css/style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
   nav .navbar-nav li a {
    color: white !important;
}

.container section a {
    color: #d8d8d8;
    text-decoration: none;
}

.container section a:hover {
    color: rgb(255, 94, 0);
}

</style>
</HEAD>

<BODY>
	
<nav class="navbar navbar-expand-md navbar-light" style="background-color: rgb(255, 94, 0); color: white;">
        <div class="container">

            <?php
                                                if(isset($_GET['id'])) {

$customerId = $_GET['id'];
echo'<a href="Home.php?id='.$customerId.'"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>';
                                                }
                                                
                                                else{echo'<a href="Home.php"><img class="navbar-brand" style="padding: 2.5%;" src="../img/logo.svg"></a>';}
            
            
            
            ?>
            
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="container">
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Become a partner</a>
                        </li>
                        <li class="nav-item">
                            <?php
                                                if(isset($_GET['id'])) {

                              $customerId = $_GET['id'];

                              echo'<a class="nav-link" href="Resturants.php?id='.$customerId.'">All Resturants</a>';
                                                }
                                                else{
                            echo'<a class="nav-link" href="Resturants.php">All Resturants</a>';
                                                }
                            ?>
                          </li>
                    </ul>
                    <div class="nav-item">
                    <?php
                    if(isset($_GET['id'])) {
                        // id index exists
                    
                        $id = $_GET['id'];
                        include("conn.php");
                        $sql = "SELECT * FROM customers WHERE CustomerID  ='$id'";
                        if($res = $conn->query($sql)){
                        $count = $res->rowCount();
                        $row = $res->fetch(PDO::FETCH_ASSOC);

						if($count == 1 && !empty($row)){
                            echo'Welcome ,<a href="profile.php?id='.$id.'" style="
                            text-decoration: none;
                            color: white;
                        "> '.$row['fname'].' '.$row['lname'].'</a>';
                            }
                        
                        else{
                        echo'<a href="LogIn.php" style="text-decoration:none;">
                        <button type="button" class="btn btn-light btn-block" onclick="">
                        LogIn Or SignUp
                        </button>
                        </a>';
                        }
                    }
                }
                else{
                    echo'<a href="LogIn.php" style="text-decoration:none;">
                        <button type="button" class="btn btn-light btn-block" onclick="">
                        LogIn Or SignUp
                        </button>
                        </a>';
                }
                       ?>                
                    </div>
                </div>
            </div>
        </div>
        </div>
    </nav>


<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<?php
	$resName="";
	$user_id="";

	if(isset($_GET['name'])){
		$resName = $_GET['name'];
	}
	if(isset($_GET['id'])){
		$user_id=$_GET['id'];
	}
echo '<a id="btnEmpty" href="cart.php?action=empty&name='.$resName.'&id='.$user_id.'">Empty Cart</a>'
?>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
$resName="";
$user_id="";
if(isset($_GET['name'])){
	$resName=$_GET['name'];
}
if(isset($_GET['id'])){
	$user_id=$_GET['id'];
}

    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["Price"];
		?>
				<tr>
				<td><img src="../img/<?php echo $item["mealimg"];?>" class="cart-item-image" /><?php echo $item["MealName"];?></td>
				<td><?php echo $item["ID"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["Price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item['ID'];?>&name=<?php echo $resName;?>&id=<?php echo $user_id;?>" class="btnRemoveAction"><img width="50px" src="https://icons-for-free.com/iconfiles/png/512/delete+remove+trash+trash+bin+trash+can+icon-1320073117929397588.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["Price"]*$item["quantity"]);
		}
?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td>
<?php	
$resName="";
$user_id="";
if(isset($_GET['name'])){
	$resName=$_GET['name'];
}
if(isset($_GET['id'])){
	$user_id=$_GET['id'];
}

echo'<a href="OrderConfirmation.php?id='.$user_id.'&name='.$resName.'&price='.$total_price.'&quantity='.$total_quantity.'"><button type="button" class="btn btn-success">Checkout</button></a>';

?>

</td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$resName="";
	$user_id="";
	if(isset($_GET['id'])){
		$user_id=$_GET['id'];
	}
	
	if(isset($_GET['name'])){
		$resName=$_GET['name'];

	$product_array = $db_handle->runQuery("SELECT * FROM menu WHERE resturantName = '$resName'");
	}
	else{
		$product_array = $db_handle->runQuery("SELECT * FROM menu ");

	}
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action='cart.php?action=add&code=<?php echo $product_array[$key]["ID"];?>&name=<?php echo $resName?>&id=<?php echo $user_id;?>'>
			<div class="product-image"><img src="../img/<?php echo $product_array[$key]["mealimg"];?>" width="100px"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["MealName"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["Price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</BODY>
   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</HTML>