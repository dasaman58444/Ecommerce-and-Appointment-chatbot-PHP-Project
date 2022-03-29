<?php
include("header.php");
include("dbconnection.php");
extract($_REQUEST);
if(isset($sub))
{  
    $name=$_REQUEST['t1'];
    $email=$_REQUEST['t2'];
	$message =$_REQUEST['t3'];
	
	$sq="insert into feedback values ('','$name','$email','$message')";
    mysqli_query($con,$sq);
    echo  "<script>'Feedback sent successfully'</script>";
	
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Contact</h2>
        </div>
        <div class="col-md-4 bread">
            <p><a href="index.php">Home</a> | Contact</p>
        </div>
    </div>
</section>

<section id="contact" style="background-image: url(images/contact.jpg);">
    <div class="container gap100">
        <div class="row">
            <div class="col-md-6">
                <h2>Reach Out To Us Today</h2>
                <p class="text-justify text-light">We provide you best quality products which you cannot find anywhere else. You can view your favourite brands with price options for different products in one place.<br>A user-friendly interface will guide you through your selection process. We provide you best quality products which you cannot find anywhere else.<br> <br>We at Family value your views and your concerns regarding our products and services. We would like to know how we can serve you better. If you have any queries please feel free to drop in your queries below and we will be happy to assist you.<br><br>
                <a class="btn btn-block btn-primary" href="#cont" >Reach Out</a>
            </div>

        </div>
    </div>
</section>

<section class="cont" id="cont">
    <div class="container gap100">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h2w text-center">How can we help you?</h2>
            </div>
            <div class="col-md-4 text-light cad">
                <div class="pft">
                    <p><i class="fas fa-phone-alt"></i>+977 9843004316</p>
                </div>
                <div class="pft">
                    <p><i class="fas fa-fax"></i>+91 959789028</p>
                </div>
                <div class="pft">
                    <p><i class="fas fa-envelope"></i>dasaman5844@gmail.com</p>
                </div>
                <div class="pft">
                    <p><i class="fas fa-map-marker-alt"></i>Vellore Institute of Technology<br>Katpadi, Vellore<br>Tamilnadu, India.
                </div>
            </div>
            <div class="col-md-8">
                <div id="contact-form-section cform">
                    <div class="statu alert alert-success" style="display: none"></div>
                    <form method="post" name="f1" onSubmit="return vali()">
                        <div class="form-group">
                            <input type="text" name="t1" id="t1" class="form-control" placeholder="Name" autocomplete="off">
                            <span id="name" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="t2" id="t2" class="form-control" placeholder="Your Email" autocomplete="off">
                            <span id="email" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <textarea id="t3" name="t3" class="form-control" placeholder="Message" rows="8"></textarea>
                            <span id="message" class="text-danger font-weight-bold"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="sub" id="sub" class="btn btn-success rbtn">Reach Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888.001696423075!2d79.15722781477058!3d12.971742990855802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bad479f0ccbe067%3A0xfef222e5f36ecdeb!2sVellore%20Institute%20of%20Technology!5e0!3m2!1sen!2snp!4v1602000244981!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        
    </div>
</section>


<script type="text/javascript">
    function vali(){
        var nam= document.getElementById('t1').value;
        var user= document.getElementById('t2').value;
        var mes= document.getElementById('t3').value;

        if(nam==''){
            document.getElementById('name').innerHTML =" ** Please fill the name feild";
            return false;
        }
        else if((nam.length<=2) || (nam.length>30)){
            document.getElementById('name').innerHTML =" ** Length of first must be between 3 and 30";
            return false;
        }
        else if(!isNaN(nam)){
            document.getElementById('name').innerHTML =" ** Only charecters are allowed";
            return false;
        }
        else if(user==''){
            document.getElementById('email').innerHTML =" ** Please fill the email id feild";
            return false;
        }
        else if(user.indexOf('@') <=0){
            document.getElementById('email').innerHTML =" ** Invalid position for @";
            return false;
        }
        else if((user.charAt(user.length-4) !='.') && (user.charAt(user.length-3) !='.')){
            document.getElementById('email').innerHTML =" ** Please enter a valid email id";
            return false;
        }
        else if(mes==''){
            document.getElementById('message').innerHTML =" ** Please fill the message feild";
            return false;
        }
        else if((mes.length<=9) || (mes.length>500)){
            document.getElementById('message').innerHTML =" ** Length of message must be between 10 and 500";
            return false;
        }

        else{
            return true;
        }
    }
</script>

<?php
include("footer.php");
/*function sendmail($toaddress,$subject,$message)
{
	require 'PHPMailer-master/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output
	
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'mail.dentaldiary.in';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'sendmail@dentaldiary.in';                 // SMTP username
	$mail->Password = 'q1w2e3r4/';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to
	
	$mail->From = 'sendmail@dentaldiary.in';
	$mail->FromName = 'Web Mall';
	$mail->addAddress($toaddress, 'Joe User');     // Add a recipient
	$mail->addAddress($toaddress);               // Name is optional
	$mail->addReplyTo('aravinda@technopulse.in', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');
	
	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	
	$mail->Subject = $subject;
	$mail->Body    = $message;
	$mail->AltBody = $subject;
	
	if(!$mail->send()) {
        echo "<script>alert('Message could not be sent'); </script>";
        echo "<script>alert('Mailer error'); </script>";
	} else {
		echo '<center><strong><font color=green>Mail sent.</font></strong></center>';
	}
}*/
?>