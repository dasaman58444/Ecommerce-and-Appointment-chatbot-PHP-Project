<?php
session_start();
include("headers.php");
include("dbconnection.php");
require_once ('component.php');
if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){

        $item_array_id = array_column($_SESSION['cart'], "product_id");

        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'medicine1.php'</script>";
        }else{

            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id']
            );

            $_SESSION['cart'][$count] = $item_array;
        }

    }else{

        $item_array = array(
            'product_id' => $_POST['product_id']
        );

        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        print_r($_SESSION['cart']);
    }
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Exclusive Medicine Store</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

<div class="wrapper">
    <div class="sidebar">
        <h2>Categories</h2>
        <ul>
            <li><a href="#"><i class="fas fa-home"></i>All product</a></li>
            <li><a href="#"><i class="fas fa-user"></i>Tablet</a></li>
            <li><a href="#"><i class="fas fa-address-card"></i>Syrup</a></li>
            <li><a href="#"><i class="fas fa-project-diagram"></i>Capsule</a></li>
        </ul> 
    </div>



    <div class="main_content">    
        <section>
            <div id="carousel" class="carousel slide bd-example  carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item drk active" data-interval="6000">
                        <img class="d-block w-100" src="images/health.jpg" alt="First slide">

                    </div>
                    <div class="carousel-item" data-interval="4000">
                        <img class="d-block w-100" src="images/health3.jpg" alt="Second slide">

                    </div>
                    <div class="carousel-item drk" data-interval="4000">
                        <img class="d-block w-100" src="images/health1.jpg" alt="Third slide">

                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <div class="info-boxes wow fadeInUp">
            <div class="info-boxes-inner">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row row1">
                                <div class="col-xs-2">
                                    <i class="icon fa fa-dollar"></i>
                                </div>
                                <div class="col-xs-10">
                                    <h4 class="info-box-heading green">money back</h4>
                                </div>
                            </div>	
                            <h6 class="text t1">30 Day Money Back Guarantee.</h6>
                        </div>
                    </div>

                    <div class="hidden-md col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row row1">
                                <div class="col-xs-2">
                                    <i class="icon fa fa-truck"></i>
                                </div>
                                <div class="col-xs-10">
                                    <h4 class="info-box-heading orange">free shipping</h4>
                                </div>
                            </div>
                            <h6 class="text t1">free ship-on oder over Rs. 600.00</h6>	
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-4 col-lg-4">
                        <div class="info-box">
                            <div class="row row1">
                                <div class="col-xs-2">
                                    <i class="icon fa fa-gift"></i>
                                </div>
                                <div class="col-xs-10">
                                    <h4 class="info-box-heading red">Special Sale</h4>
                                </div>
                            </div>
                            <h6 class="text t1">All items-sale up to 20% off </h6>	
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>



<div class="container">
    <div class="controls-top"><div class="more-info-tab clearfix">
        <h3 class="new-product-title pull-left">Featured Products</h3>

        </div>
        <hr>
    <div class="row text-center py-2">
        <?php
        $result = mysqli_query($con,"select * from medicine");
        while ($row = mysqli_fetch_assoc($result)){
            component($row['medicinebrand'], $row['description'], $row['medicinecostbd'], $row['medicinecostad'], $row['image'], $row['medicineid']);
        }
        ?>
    </div>
</div>
</div>

<?php
include("footers.php");
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        text-decoration: none;
        font-family: 'Josefin Sans', sans-serif;
    }

    body{
        background-color: #f3f5f9;
    }
    .t1{
        margin-left: 30px !important;
    }
    
     .row1{
        margin-top: 10px;
         margin-left: 40px;
    }


    .wrapper{
        display: flex;
        position: relative;
    }

    .wrapper .sidebar{
        width:20%;
        height: 85%;
        background: #4b4276;
        padding: 30px 0px;
        position: absolute;
    }

    .wrapper .sidebar h2{
        color: #fff;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 30px;
    }

    .wrapper .sidebar ul li{
        border-bottom: 1px solid #bdb8d7;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-top: 1px solid rgba(255,255,255,0.05);
    }    

    .wrapper .sidebar ul li a{
        color: #bdb8d7;
        display: block;
        padding: 15px;
        padding-left: 20%;
    }

    .wrapper .sidebar ul li a .fas{
        width: 25px;
    }

    .wrapper .sidebar ul li:hover{
        background-color: #594f8d;
    }

    .wrapper .sidebar ul li:hover a{
        color: #fff;
    }

    .wrapper .sidebar .social_media{
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
    }

    .wrapper .sidebar .social_media a{
        display: block;
        width: 40px;
        background: #594f8d;
        height: 40px;
        line-height: 45px;
        text-align: center;
        margin: 0 5px;
        color: #bdb8d7;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .wrapper .main_content{
        width: 100%;
        margin-left: 22%;
        margin-top: 2%;
        margin-right: 2%;
    }

    .wrapper .main_content .header{
        padding: 20px;
        background: #fff;
        color: #717171;
        border-bottom: 1px solid #e0e4e8;
    }

    .wrapper .main_content .info{
        margin: 20px;
        color: #717171;
        line-height: 25px;
    }

    .wrapper .main_content .info div{
        margin-bottom: 20px;
    }

    @media (max-height: 500px){
        .social_media{
            display: none !important;
        }
    }
    .carousel-item{
        height: 450px !important;
    }
    .carousel-item img{
        height: 100%;
        margin: 0 auto !important;
    }
    .new-product-title {
        margin-bottom: 0px;
        margin-top: 5px;
        font-size: 20px;
        font-family: 'FjallaOneRegular';
        text-transform: uppercase;
        color:#444444;
    }
    .scroll-tabs .nav-tab-line {
        border-bottom: none;
        margin-top: 7px;
        margin-right: 55px;
    }
    .pull-left{
        float: left;

    }
    .pull-right{
        float: right;
    }
    .nav-tab-line li{
        padding:0 10px;
        font-size: 20px;

    }
    .nav-tab-line li a{
        color:#444444 !important;
    }
    .featured{
        border-bottom: 1px #888888;
    }
    img{
        max-width: 100%;
        height: 200px;
        background: lightblue;
        background: radial-gradient(white 30%, lightblue 70%);
    }

    .fa-star,
    .fa-star-half{
        color: yellowgreen;
        padding: 3% 0;
    }

    #cart_count{
        text-align: center;
        padding: 0px 0px 0px 5px;
        border-radius: 3rem;
    }

    .shopping-cart{
        padding: 3% 0;
    }

    .cart-items + .cart-items{
        padding: 2% 0;
    }

    .price-details h6{
        padding: 3% 2%;
    }
    h5{
        font-size:30px !important;
        color:white;
    }
   
    .text-secondary{
        color:antiquewhite !important;
        text-decoration-line: line-through;
    }
    
</style>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>

    var scroll = new SmoothScroll('a[href*="#"]');
</script>

