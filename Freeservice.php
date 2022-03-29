<?php
include("header.php");
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Free Services</h2>
        </div>
        <div class="col-md-4 bread">
            <p><a href="?page=home">Home</a> | Medicine</p>
        </div>
    </div>
</section>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>


 <link rel="stylesheet" href="./css/dietchart.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <script src="./js/dietchart.js"></script>
    



	<link rel="stylesheet" type="text/css" href="./css/freeservice.css">


<div class="sidenav">
	<h2>Services</h2>
	<a href="Freeservice.php">Weight Loss</a>
	<a href="covid.php">Covid</a>

	





</div>

<div class="main">


   
    <!-- <link rel="stylesheet" href="./css-1.css"> -->



    <div class="heading">
    <h1>Weight Loss Diet Chart</h1>
    <!-- <button id="get-unique-values" onclick="getUniqueValuesFromColumn()">Get unique column values</button> -->
</div>
    <div class="outer-wrapper">
    <div class="table-wrapper">
    <table id="emp-table">
        <thead>
            <th col-index = 1>Diet Chart</th>
            <th col-index = 2>Gender
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>

            <th col-index = 3>Age
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            <th col-index = 4>Weight
                <select class="table-filter" onchange="filter_rows()">
                    <option value="all"></option>
                </select>
            </th>
            
            
        </thead>
        <tbody>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1ZAWdszTbb0s0I1Ekh5VoSrkuwDDCO1QE/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                <td>Male</td>
                <td>10-18</td>
                <td>Over 55kg</td>
               
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1ZAWdszTbb0s0I1Ekh5VoSrkuwDDCO1QE/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                <td>Female</td>
                <td>10-18</td>
                <td>Over 55kg</td>
             
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1J6a72yhzbeG3z5cJiMQpW2klHAZAbMLy/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                <td>Male</td>
                <td>10-18</td>
                <td>Over 65kg</td>
                
            </tr>
            <tr>
              <td><a type="button" href="https://drive.google.com/file/d/1J6a72yhzbeG3z5cJiMQpW2klHAZAbMLy/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                <td>Female</td>
                <td>10-18</td>
                <td>Over 65kg</td>
               
            </tr>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1gubvOdE6VZ8B-frPF6S6PnshCBHTvSYp/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                <td>Male</td>
                <td>10-18</td>
                <td>Over 75kg</td>
              
            </tr>
             <tr>
                  <td><a type="button" href="https://drive.google.com/file/d/1gubvOdE6VZ8B-frPF6S6PnshCBHTvSYp/view?usp=sharing" target="_blank"  class="btn btn-primary">Teeager</a></td>
                 <td>Female</td>
                <td>10-18</td>
                <td>Over 75kg</td>
              
            </tr>
            <tr>
                 <td><a type="button" href="https://drive.google.com/file/d/1LQ-A0XhCtii_cjt8g2N7WQFYo75GFG1a/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Male</td>
                <td>19-30</td>
                <td>Over 75kg</td>
             
            </tr>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1LQ-A0XhCtii_cjt8g2N7WQFYo75GFG1a/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Female</td>
                <td>19-30</td>
                <td>Over 75kg</td>
              
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1QnPT6l2nXfLihQG5em747822x0Jc7O8d/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Male</td>
                <td>19-30</td>
                <td>Over 85kg</td>
             
            </tr>
              <tr>
                 <td><a type="button" href="https://drive.google.com/file/d/1QnPT6l2nXfLihQG5em747822x0Jc7O8d/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Female</td>
                <td>19-30</td>
                <td>Over 85kg</td>
           
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1Q-63b-zKz1fhW7VeHPe2wuwMpV4yGZ96/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Male</td>
                <td>19-30</td>
                <td>Over 95kg</td>
           
            </tr>
             <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1Q-63b-zKz1fhW7VeHPe2wuwMpV4yGZ96/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Female</td>
                <td>19-30</td>
                <td>Over 95kg</td>
               
            </tr>
            <tr>
                   <td><a type="button" href="https://drive.google.com/file/d/1X320iZF1RkmwAgLWaWBZDkYva2lfqnzp/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Male</td>
                <td>19-30</td>
                <td>Over 105kg</td>
           
            </tr>
             <tr>
                 <td><a type="button" href="https://drive.google.com/file/d/1X320iZF1RkmwAgLWaWBZDkYva2lfqnzp/view?usp=sharing" target="_blank"  class="btn btn-danger">Y - Adult</a></td>
                <td>Female</td>
                <td>19-30</td>
                <td>Over 105kg</td>
        
            </tr>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1W7aNEYovREXP-rRelCNjh0o7TMUF2zby/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Male</td>
                <td>31-50</td>
                <td>Over 85kg</td>
               
            </tr>
            <tr>
             <td><a type="button" href="https://drive.google.com/file/d/1W7aNEYovREXP-rRelCNjh0o7TMUF2zby/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Female</td>
                <td>31-50</td>
                <td>Over 85kg</td>
              
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1W9KFb3N4U2XhiLeYnE3mW9iiBwckpwgo/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Male</td>
                <td>31-50</td>
                <td>Over 95kg</td>
               
            </tr>
             <tr>
                 <td><a type="button" href="https://drive.google.com/file/d/1W9KFb3N4U2XhiLeYnE3mW9iiBwckpwgo/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Female</td>
                <td>31-50</td>
                <td>Over 95kg</td>
               
            </tr>
            <tr>
                  <td><a type="button" href="https://drive.google.com/file/d/1LL9OdTI0yNnv-Nen3_AFKXKVJ6SgIJ_9/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Male</td>
                <td>31-50</td>
                <td>Over 105kg</td>
              
            </tr>
               <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1LL9OdTI0yNnv-Nen3_AFKXKVJ6SgIJ_9/view?usp=sharing" target="_blank"  class="btn btn-success">    .  Adult    . </a></td>
                <td>Female</td>
                <td>31-50</td>
                <td>Over 105kg</td>
             
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1zIX1Qj6rU_8Rmtv0U3h9xeSvJ5duYgc8/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Male</td>
                <td>over 50</td>
                <td>Over 85kg</td>
                
            </tr>
            <tr>
               <td><a type="button" href="https://drive.google.com/file/d/1zIX1Qj6rU_8Rmtv0U3h9xeSvJ5duYgc8/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Female</td>
                <td>over 50</td>
                <td>Over 85kg</td>
                
            </tr>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1kHNmJeWySNH2YTzZ8sRDXdBDGHODro-B/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Male</td>
                <td>over 50</td>
                <td>Over 95kg</td>
            
            </tr>
             <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1kHNmJeWySNH2YTzZ8sRDXdBDGHODro-B/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Female</td>
                <td>over 50</td>
                <td>Over 95kg</td>
             
            </tr>
            <tr>
                <td><a type="button" href="https://drive.google.com/file/d/1ydNC8kTlu_8Cc3ByU1S4nbzcOf091ds4/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Male</td>
                <td>over 50</td>
                <td>Over 100kg</td>
             
            </tr>
            <tr>
                 <td><a type="button" href="https://drive.google.com/file/d/1ydNC8kTlu_8Cc3ByU1S4nbzcOf091ds4/view?usp=sharing" target="_blank"  class="btn btn-danger">S-Elder</a></td>
                <td>Female</td>
                <td>over 50</td>
                <td>Over 100kg</td>
             
            </tr>
            

        </tbody>
    </table>
    <!-- <script>getUniqueValuesFromColumn()
    </script> -->
    <script>
        window.onload = () => {
            console.log(document.querySelector("#emp-table > tbody > tr:nth-child(1) > td:nth-child(2) ").innerHTML);
        };

        getUniqueValuesFromColumn()
        
    </script>
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

