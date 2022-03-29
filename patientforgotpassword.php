<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_SESSION[patientid]))
{
	echo "<script>window.location='patientaccount.php';</script>";
}
if(isset($_POST[submit]))
{
    $password=md5($_POST[password]);
	$sql = "UPDATE patient SET password='$password' WHERE loginid='$_POST[loginid]' AND dob='$_POST[dob]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password has been updated successfully..');</script>";
		echo "<script>window.location='patientlogin.php';</script>";
	}
	else
	{
		echo "<script>alert('Login id and dob doesnot match to the original one..'); </script>";
	}
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Forget Password</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:100px 25px 50px 25px;">
        <div class="card" style="margin:auto;width:80%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
    <form method="post" action="" name="frmpatlogin" onSubmit="return validateform()">
        <div style="color:white;font-size:25px;">
            <div class="form-group">
                <label class="inputval">Login Id</label>
                <input class="inputapp" type="text" name="loginid" id="loginid" />
            </div>
            <div class="form-group">
                <label class="inputval">Date of Birth</label>
                <input class="inputapp" type="date" name="dob" id="dob" />
            </div>
            <div class="form-group">
                <label class="inputval">Password</label>
                <input class="inputapp" type="password" name="password" id="password" />
            </div>
            <div class="form-group">
                <label class="inputval">Confirm Password</label>
                <input class="inputapp" type="password" name="cpassword" id="cpassword" />
            </div>
            <div class="form-group">
                <label class="inputval"></label>
                <input type="submit" name="submit" class="btn btn-outline-success" id="submit" value="Reset Password"/>
            </div>
        </div>
    </form>
    <p>&nbsp;</p>
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
	if(document.frmpatlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatlogin.loginid.focus();
		return false;
	}
	else if(!document.frmpatlogin.loginid.value.match(alphanumericExp))
	{
		alert("loginid not valid..");
		document.frmpatlogin.loginid.focus();
		return false;
	}
	else if(document.frmpatlogin.dob.value == "")
	{
		alert("Date of Birth should not be empty..");
		document.frmpatlogin.dob.focus();
		return false;
	}
    else if(document.frmpatlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatlogin.password.focus();
		return false;
	}
	else if(document.frmpatlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatlogin.password.focus();
		return false;
	}
    else if(document.frmpatlogin.cpassword.value != document.frmpatlogin.password.value)
	{
		alert("Password and confirm password does not be empty..");
		document.frmpatlogin.password.focus();
		return false;
	}
    else{
        return true;
    }
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
</style>