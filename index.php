<?php
include("header.php");
?>



<section style="margin-top:100px;">
    <div id="carousel" class="carousel slide bd-example  carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item drk active" data-interval="6000">
                <img class="d-block w-100" src="images/health.jpg" alt="First slide">
                <div class="carousel-caption d-md-block text-left">
                    <h5>Make an Appointment</h5><br>
                    <p>We Are Here And Ready To Safely Care For You.</p>
                    <p>At New Life Medicine, your health and safety are our very highest priorities. 
                    <span class="hide1">We are ready to care for you and your family in our hospitals, imergency centers, and through online appointments and visits.</span> 
                        Learn how we are keeping you safe and protected so that you can get the care you need.</p>
                    <a class="btn btn-primary" href="#welcome" role="button">Learn More</a>
                    <a class="btn btn-success" href="patientlogin.php" role="button">Start Today</a>
                    <a class="btn btn-danger" href="contactus.php" role="button">Contact Us</a>
                </div>
            </div>
            <div class="carousel-item" data-interval="4000">
                <img class="d-block w-100" src="images/health3.jpg" alt="Second slide">
                <div class="carousel-caption ccd d-md-block text-left">
                    <h5>COVID-19 Testing and Care </h5>
                    <p>
                        New Life Hospital is continuously monitoring information about the coronavirus and COVID-19, the disease it causes. </p>
                    <p class="hide1">We are adapting our care practices to reflect the latest recommendations from the Centers for Disease Control and Prevention and the World Health Organization, and other evidence-based best practices. Thats Newlife everyday.
                    </p>
                    <p>
                        See how we are delivering world class Covid-19 care to our patients 
                    </p>
                    <a class="btn btn-primary frt" href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/question-and-answers-hub/q-a-detail/q-a-coronaviruses#:~:text=symptoms" target="_blank" role="button">Learn More</a>
                </div>
            </div>
            <div class="carousel-item drk" data-interval="4000">
                <img class="d-block w-100" src="images/health1.jpg" alt="Third slide">
                <div class="carousel-caption d-md-block text-left">
                    <div class="row">
                        <div class="col-md-8">
                            <h5>Newlife</h5>
                            <p>
                                Always Here And                       Always Will Be
                            </p>
                            <p>

                                Speak with an Newlife health expert to determine the bext and safest options for your care.
                            </p>
                            <p>
                                Get in Touch
                            </p>
                        </div>
                        <div class="col-md-4 sqr">
                            <a class="btn btn-primary" href="#welcome" role="button">Learn More</a>
                            <a class="btn btn-success" href="patientlogin.php" role="button">Start Today</a>
                            <a class="btn btn-danger" href="contactus.php" role="button">Contact Us</a>
                        </div>
                    </div>
                </div>
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

<section id="welcome">
    <div class="container d-flex justify-content-center gap100">
        <div class="col-md-10 text-center">
            <h2>Welcome To The Newlife Hospital Management System</h2>
            <p style="color:green;font-size:30px">Always Here And Always Will Be</p>
               <p>
                Speak with an Newlife health expert to determine the bext and safest options for your care.
            </p>
            <p>The main feature of E-Knowledge in Doctor appointment system is to provide the browser to get appointments from a doctor through internet instead of going there and fixing an appointment.Everyone needs to have Medical attention at any time. So we allow every user to register freely at any time.</p>
            <p>Doctor appointment System maintains patient's prescriptions so that their medical details are always available in Internet, which will be more convenient for the patients. This will be more comfortable for the patient.</p>
            <p><a href="patientlogin.php"><input type="button" class="btn btn-primary" value="Get in touch"></a></p>
        </div>
    </div>
</section>

<section id="sortcuts">
    <div class="container gap100">
        <div class="row text-light">
            <div class="col-md-6">
                <h2 class="h2w">Book your Appointment through online   </h2>
                <p class="imgholder"><a href="patientappointment.php"><img src="images/schedule-appointment.png" alt="" style="width:286px;height:150px;" /></a></p>
            </div>
            <div class="col-md-6">
                <h2 class="h2w">Login Panel for existing users</h2>          
                <p class="imgholder"><a href="patientlogin.php"><img src="images/avatar.png" alt="" style="width:170px;height:170px; "  /></a></p>
            </div>
        </div>
    </div>
</section>


<?php
include("footer.php");
?>


<style>
    #sortcuts{
        background-image: linear-gradient(#181174, #050505);
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
<style>
    @media only screen and (max-width:991px){
        .hide1{
            display: none;
        }
    }
</style>