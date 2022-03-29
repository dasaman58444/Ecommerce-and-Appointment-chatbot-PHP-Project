<?php
include("header.php");
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Exclusive Medicine Store</h2>
        </div>
        <div class="col-md-4 bread">
            <p><a href="?page=home">Home</a> | Medicine</p>
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
            <div class="row row1">
                <div class="col-md-6 col-sm-4 col-lg-4">
                    <div class="info-box">
                        <div class="row">
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
<br><br>

<div class="container">
    <div class="controls-top"><div class="more-info-tab clearfix">
        <h3 class="new-product-title pull-left">Featured Products</h3>

        </div>
        <hr>
        <div class="row text-center py-2">
            <?php
            $result = mysqli_query($con,"select * from medicine");
            while ($row = mysqli_fetch_assoc($result)){
                $product=$row['description'];
                $productname=$row['medicinebrand'];
                $productpricebd=$row['medicinecostbd'];
                $productprice=$row['medicinecostad'];
                $productimg=$row['image'];
                $productid=$row['medicineid'];
                $element = "
                <div class=\"col-md-3 col-sm-12 my-3 my-md-0\">
                <form action=\"patientlogin.php\" method=\"post\">
                    <div class=\"card shadow\" style=\"margin-bottom:30px;\">
                        <div>
                            <img src='productimages/$productimg' alt=\"Image1\" class=\"img-fluid card-img-top imag\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$productname</h5>
                            <h6>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"fas fa-star\"></i>
                                <i class=\"far fa-star\"></i>
                            </h6>
                            <p class=\"card-text\">
                                <h6>$productdesc</h6>
                            </p>
                            <h5>
                                <small><s class=\"text-secondary\">$productpricebd</s></small>
                                <span class=\"price\">Rs.$productprice</span>
                            </h5>
                            <button class=\"btn btn-warning my-3 addbtn\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
            </div>
            
    ";
                echo $element;
            }
            ?>
        </div>
    </div>
</div>


<?php
include("footer.php");
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
        margin-top: 1px !important;
        
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
    .imag{
        max-width: 100%;
        height: 250px !important;
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
        padding: 0 0.9rem 0.1rem 0.9rem;
        border-radius: 3rem;
    }

    .shopping-cart{
        padding: 3% 0;
    }

    .cart-items + .cart-items{
        padding: 2% 0;
    }
    .price{
        color: white;
    }

    .price-details h6{
        padding: 3% 2%;
    }
    .card-title{
        font-size:25px !important;
        color:white;
    }
    .text-secondary{
        color:antiquewhite !important;
        text-decoration-line: line-through;
    }
    @media (max-width: 991px){
        .addbtn{
            margin: 0px auto;
        }
        h5{
            font-size:20px !important;
        }
        .imag{
            height: 350px !important;
        }
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

