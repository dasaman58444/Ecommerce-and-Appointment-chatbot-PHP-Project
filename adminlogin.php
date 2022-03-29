<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_SESSION[adminid]))
{
	echo "<script>window.location='adminaccount.php';</script>";
}
if(isset($_POST[submit]))
{
    $password=md5($_POST[password]);
	$sql = "SELECT * FROM admin WHERE loginid='$_POST[loginid]' AND password='$password' AND status='Active'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) == 1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION[adminid]= $rslogin[adminid] ;
		echo "<script>window.location='adminaccount.php';</script>";
	}
	else
	{
		echo "<script>alert('Invalid login id and password entered..'); </script>";
	}
}
?>
<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Admin Login</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:100px 25px 50px 25px;">
        <div class="card" style="margin:auto;width:60%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
                <center>
                    <center><img src="images/log.jpg" style="border-radius:50%;width:150px;margin-bottom:20px;margin-top:-100px;box-shadow:5px 5px 13px #000;" alt=""></center>
                    <br>
    <form method="post" action="" name="frmadminlogin" onSubmit="return validateform()">
        <table style="width:100%;color:white;font-size:25px;">
      <tbody>
        <tr>
          <td width="30%">Login ID</td>
          <td width="70%"><input type="text" name="loginid" id="loginid" /></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
         <td>
             
         </td>
          <td><br><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Login" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
                </center>
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
	if(document.frmadminlogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(!document.frmadminlogin.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmadminlogin.loginid.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadminlogin.password.focus();
		return false;
	}
	else if(document.frmadminlogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmadminlogin.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>