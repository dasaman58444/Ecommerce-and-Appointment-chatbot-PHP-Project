<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[patientid]))
	{
		$lastinsid =$_SESSION[patientid];
	}
	else
	{
		$dt = date("Y-m-d");
		$tim = date("H:i:s");
        $password=md5($_POST[password]);
		$sql ="INSERT INTO patient(patientname,admissiondate,admissiontime,address,city,mobileno,loginid,password,gender,dob,status) values('$_POST[patiente]','$dt','$tim','$_POST[textarea]','$_POST[city]','$_POST[mobileno]','$_POST[loginid]','$password','$_POST[select6]','$_POST[dob]','Pending')";
		if($qsql = mysqli_query($con,$sql))
		{
			/* echo "<script>alert('patient record inserted successfully...');</script>"; */
		}
		else
		{
			echo mysqli_error($con);
		}
		$lastinsid = mysqli_insert_id($con);
	}
	
	$sqlappointment="SELECT * FROM appointment WHERE appointmentdate='$_POST[appointmentdate]' AND appointmenttime='$_POST[appointmenttime]' AND doctorid='$_POST[doct]' AND status='Approved'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	if(mysqli_num_rows($qsqlappointment) >= 1)
	{
		echo "<script>alert('Appointment already scheduled for this time..');</script>";
	}
	else
	{
		$sql ="INSERT INTO appointment(appointmenttype,patientid,appointmentdate,appointmenttime,app_reason,status,departmentid,doctorid) values('ONLINE','$lastinsid','$_POST[appointmentdate]','$_POST[appointmenttime]','$_POST[app_reason]','Pending','$_POST[department]','$_POST[doct]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Appointment record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
if(isset($_SESSION[patientid]))
{
$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con,$sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);
$readonly = " readonly";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Add Appointment</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:50px 25px;">
        <div class="card" style="margin:auto;width:80%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
  
 <?php
if(isset($_POST[submit]))
{
	if(mysqli_num_rows($qsqlappointment) >= 1)
	{		
			echo "<h2>Appointment already scheduled for ". date("d-M-Y", strtotime($_POST[appointmentdate])) . " " . date("H:i A", strtotime($_POST[appointmenttime])) . " .. </h2>";
	}
	else
	{
		if(isset($_SESSION[patientid]))
		{
			echo "<h2>Appointment taken successfully.. </h2>";
			echo "<p style='color:white;'>Appointment record is in pending process. Kinldy check the appointment status. </p>";
			echo "<p> <a href='viewappointment.php' class='text-danger'>View Appointment record</a>. </p>";			
		}
		else
		{
			echo "<h2>Appointment taken successfully.. </h2>";
            echo "<p style='color:white;'>Appointment record is in pending process. Please wait for confirmation message.. </p>";
			echo "<p> <a href='patientlogin.php'>Click here to Login</a>. </p>";	
		}
	}
}
else
{
 ?>
                <form method="post" action="" name="frmpatapp" onSubmit="return validateform()">
                    <div style="color:white;font-size:25px;">
                        <div class="headercont">
                <div class="firsthead" style="width:170px;padding-left:5px;">Personal Details</div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Patient Name</label>
                            <input class="inputapp" type="text" name="patiente" id="patiente" value="<?php echo $rspatient[patientname];  ?>"  <?php echo $readonly; ?> >
                        </div>
                            
                            <div class="form-group">
                            <label class="inputval">Gender</label>
                            <?php 
    if(isset($_SESSION[patientid]))
    {
        echo $rspatient[gender];
    }
    else
    {
                            ?>
                            <select class="inputapp" name="select6" id="select6">
                                <option value="">Select</option>
                                <?php
        $arr = array("Male","Female");
        foreach($arr as $val)
        {
            echo "<option value='$val'>$val</option>";
        }
                                ?>
                            </select>
                            <?php
    }
                            ?>
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">DOB</label>
                            <input class="inputapp" type="date" name="dob" id="dob" value="<?php echo $rspatient[dob]; ?>" <?php echo $readonly; ?> >
                        </div>
                            <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Mobile Number</label>
                            <input class="inputapp" type="text" name="mobileno" id="mobileno" value="<?php echo $rspatient[mobileno];  ?>" <?php echo $readonly; ?> >
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputPassword1">Address</label>
                            <textarea class="inputapp" name="textarea" id="textarea" <?php echo $readonly; ?>><?php echo $rspatient[address];  ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">City</label>
                            <input class="inputapp" type="text" name="city" id="city" value="<?php echo $rspatient[city];  ?>" <?php echo $readonly; ?> >
                        </div>
                        </div>
                        <?php
    if(!isset($_SESSION[patientid]))
    {        
                        ?>
                        <div style="color:white;font-size:25px;">
                        <div class="headercont">
                <div class="firsthead" style="width:130px;padding-left:5px;">Login Details</div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Login Id</label>
                            <input class="inputapp" style="width:50%;" type="text" name="loginid" id="loginid" value="<?php echo $rspatient[loginid];  ?>" <?php echo $readonly; ?> >
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Password</label>
                            <input class="inputapp" style="width:50%;" type="password" name="password" id="password" value="<?php echo $rspatient[patientname];  ?>" <?php echo $readonly; ?> >
                        </div>
                            </div>
    <?php }?>
                        <div style="color:white;font-size:25px;">
                        <div class="headercont">
                <div class="firsthead" style="width:190px;padding-left:5px;">Appointment Details</div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Appointment Date</label>
                            <input class="inputvapp" type="date" min="<?php echo date("Y-m-d"); ?>" name="appointmentdate" id="appointmentdate">
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Appointment Time</label>
                            <input class="inputapp" type="time" name="appointmenttime" id="appointmenttime">
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Department</label>
                            <select  class="inputapp" name="department" id="department" onchange="loaddoctor(this.value)">
                                <option value=""  style="font-size:20px;">Select department</option>
                                <?php
    $sqldept = "SELECT * FROM department WHERE status='Active'";
    $qsqldept = mysqli_query($con,$sqldept);
    while($rsdept = mysqli_fetch_array($qsqldept))
    {
        echo "<option value='$rsdept[departmentid]'  style=\"font-size:20px;\">$rsdept[departmentname]</option>";
    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="inputval" for="exampleInputEmail1">Doctor</label>
                            <select id="divdoc" class="inputapp" name="doct" id="doct">
                                <option style="font-size:20px;" value="">Select doctor</option>          
                            </select>
                        </div><div class="form-group">
                        <label class="inputval" for="exampleInputEmail1">Appointment Reason</label>
                        <textarea class="inputapp" name="app_reason" id="app_reason"></textarea>
                        </div>
                            </div>
                        <label class="inputval" for="exampleInputEmail1"></label>
                        <input type="submit" class="btn btn-outline-success" name="submit" id="submit" value="Submit" />
                    </div>
                </form>
   
    <p>&nbsp;</p>
<?php
}
?>
  </div>
</div>
</div>
</section>
<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmpatapp.patiente.value == "")
	{
		alert("Patient name should not be empty..");
		document.frmpatapp.patiente.focus();
		return false;
	}
	else if(!document.frmpatapp.patiente.value.match(alphaspaceExp))
	{
		alert("Patient name not valid..");
		document.frmpatapp.patiente.focus();
		return false;
	}
	else if(document.frmpatapp.textarea.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatapp.textarea.focus();
		return false;
	}
	else if(document.frmpatapp.city.value == "")
	{
		alert("City should not be empty..");
		document.frmpatapp.city.focus();
		return false;
	}
	else if(!document.frmpatapp.city.value.match(alphaspaceExp))
	{
		alert("City name not valid..");
		document.frmpatapp.city.focus();
		return false;
	}
	else if(document.frmpatapp.mobileno.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmpatapp.mobileno.focus();
		return false;
	}
	else if(!document.frmpatapp.mobileno.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmpatapp.mobileno.focus();
		return false;
	}
    else if(document.frmpatapp.mobileno.value.length < 10)
    {
        alert("Mobile Numbeer length should be more than 10 characters...");
        document.frmpatapp.mobileno.focus();
        return false;
    }
	else if(document.frmpatapp.loginid.value == "")
	{
		alert("login ID should not be empty..");
		document.frmpatapp.loginid.focus();
		return false;
	}
	else if(!document.frmpatapp.loginid.value.match(alphanumericExp))
	{
		alert("login ID not valid..");
		document.frmpatapp.loginid.focus();
		return false;
	}
	else if(document.frmpatapp.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatapp.password.focus();
		return false;
	}
	else if(document.frmpatapp.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatapp.password.focus();
		return false;
	}
	else if(document.frmpatapp.select6.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatapp.select6.focus();
		return false;
	}
	else if(document.frmpatapp.dob.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatapp.dob.focus();
		return false;
	}
	else if(document.frmpatapp.appointmentdate.value == "")
	{
		alert("Appointment date should not be empty..");
		document.frmpatapp.appointmentdate.focus();
		return false;
	}
	else if(document.frmpatapp.appointmenttime.value == "")
	{
		alert("Appointment time should not be empty..");
		document.frmpatapp.appointmenttime.focus();
		return false;
	}
    else if(document.frmpatapp.app_reason.value == "")
    {
        alert("Appointment reason should not be empty..");
        document.frmpatapp.app_reason.focus();
        return false;
    }
	else
	{
		return true;
	}
}

function loaddoctor(deptid)
{
	    if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divdoc").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","departmentDoctor.php?deptid="+deptid,true);
        xmlhttp.send();
}
</script>
<style>
    .inputapp{
        width:50%;
    }
    .inputval{
        width:40%;
    }
    @media (max-width:991px){
        .inputapp{ 
        width:90%;
        }
        .inputval{
            width:90%;
        }
    }
    .headercont{
        border: 2px solid white;
        padding: 10px;
        margin-bottom: 20px;
    }
    .firsthead{
        margin-top: -3.5%;
        font-size: 20px;
        background-color: white;
        color: black;
    }
</style>