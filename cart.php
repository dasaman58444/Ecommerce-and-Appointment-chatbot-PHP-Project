<?php
session_start();
require_once ('component.php');
if(isset($_POST['remove'])){
	if($_GET['action']=='remove'){
		foreach($_SESSION['cart'] as $key => $value){
			if($value["product_id"]==$_GET['id']){
				unset($_SESSION['cart'][$key]);
				echo "<script>alert('Product has been removed')</script>";
				echo "<script>window.location='cart.php'</script>";
			}
			
		}
	}
}

?>

<body class="bg-light">

<?php
    require_once ('headers.php');
?>
<body bg-light>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">My Cart</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<div class="container-fluid" style="margin-top:30px;">
    <div class="row px-5">
        <div class="col-md-7">
		<div class="shopping-cart">

                <?php

                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = mysqli_query($con,"select * from medicine");
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['medicineid'] == $id){
                                    cartElement($row['image'], $row['medicinebrand'],$row['medicinename'],$row['medicinecostad'], $row['medicineid']);
                                    $total = $total + (int)$row['medicinecostad'];
                                }
                            }
                        }
                    }else{
                        echo "<h1>Cart is Empty</h1>";
                    }

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$<?php
                            echo $total;
                            ?></h6>
                    </div>
                    
                    <div class="col-md-12">
                        <hr>
                        <a href="orders.php"><button type="submit" class="btn btn-warning ml-2 mb-3">Place Order</button></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</body>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
