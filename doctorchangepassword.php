<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
    $old=md5($_POST[oldpassword]);
    $new=md5($_POST[newpassword]);
	$sql = "UPDATE doctor SET password='$new' WHERE password='$old' AND doctorid='$_SESSION[doctorid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Password has been updated successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to update password..');</script>";		
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Change Password</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:50px 25px;">
        <div class="card" style="margin:auto;width:60%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
   <form method="post" action="" name="frmdoctchangepass" onSubmit="return validateform()">
       <table style="width:100%;color:white;font-size:20px">
      <tbody>
        <tr>
          <td width="34%">Old Password</td>
          <td width="66%"><input type="password" name="oldpassword" id="oldpassword" /></td>
        </tr>
        <tr>
          <td>New Password</td>
          <td><input type="password" name="newpassword" id="newpassword" /></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="password" id="password" /></td>
        </tr>
        <tr>
         <td></td>
          <td><br><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
</section>
<?php
include("footers.php");
?>
<script type="application/javascript">
function validateform1()
{
	if(document.frmdoctchangepass.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmdoctchangepass.oldpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value.length < 8)
	{
		alert("New Password length should be more than 8 characters...");
		document.frmdoctchangepass.newpassword.focus();
		return false;
	}
	else if(document.frmdoctchangepass.newpassword.value != document.frmdoctchangepass.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmdoctchangepass.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
