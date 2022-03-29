<footer>
    <div class="row text-center">
        <div class="col-md-1 smed">
            <span>Facebook</span>
            <a href="https://www.facebook.com/aman.das1111" target="_blank"><i class="fab fa-facebook-square"></i></a>
        </div>
        <div class="col-md-1 smed">
            <span>Instagram</span>
            <a href="https://www.instagram.com/aman_das.7" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col-md-1 smed">
            <span>Twitter</span>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
        </div>
        <div class="col-md-6">
            <p class="text-light footer-txt">  </p>
        </div>
        <div class="col-md-3">
            <a class="footer-logo" href="index.php">
                <img src="images/newlife1.jpg" alt="">
            </a>
        </div>
    </div>
</footer>
<style>
    .footer-logo{
        line-height: 80px;
    }
    .smed span{
        display: block;
        width: 90px;
        background: #874B52;
        margin-top: -25px;
        margin-left:10px;
        padding:5px 0;
        color: white;
        position:absolute;
        font-size: 15px;
        opacity: 0;
        transition: .s opacity ease-in;
    }
    .smed span:before{
        content: '';
        position: absolute;
        height: 13px;
        width: 13px;
        background: #874B52;
        top:27px;
        left:45%;
        transform: translateX(-60%) rotate(45deg);
    }
    .smed:hover >span{
        opacity: 1;
    }
    .footer-logo img{
        width:200px;
        height:80px;
        margin: 10px 0px;
    }
</style>