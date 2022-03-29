<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
			$sql ="UPDATE orders SET patientid='$_POST[select2]', orderdate='$_POST[orderdate]', deliverydate='$_POST[deliverydate]', address='$_POST[address]', mobileno='$_POST[mobilenumber]', status ='$_POST[select]' WHERE orderid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('order records updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO orders( patientid, doctorid, orderdate, address, mobileno, note, status)  values('$_SESSION[patientid]','$_POST[docid]','$dt','$_POST[address]','$_POST[mobilenumber]','$_POST[note]','Pending')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Order placed successfully...');</script>";
		echo "<script>window.location='payment.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM orders WHERE orderid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
	$sql="SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Order</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:50px 25px;">
        <div class="card" style="margin:auto;width:60%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">
    <h1 class="h2w">Here you can order medicine's through online..</h1>
      <form method="post" action="" name="frmorders" onSubmit="return validateform()">
    <table width="100%" style="color:white;font-size:20px">
      <tbody>
        <tr>
          <td width="40%">Select Doctor</td>
          <td width="60%"><select name="docid" id="docid">
            <option value="">Select</option>
            <?php
          	$sqldoctor= "SELECT * FROM doctor WHERE status='Active'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			while($rsdoctor = mysqli_fetch_array($qsqldoctor))
			{
				if($rsdoctor[doctorid] == $rsedit[doctorid])
				{
				echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";
				}
				else
				{
				echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";				
				}
			}
		  ?>
          </select></td>
        </tr>
        <tr>
          <td width="34%">Address</td>
          <td width="66%"><textarea name="address" id="address" cols="45" rows="5"><?php echo $rsedit[address]; ?> </textarea></td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $rsedit[mobileno]; ?>" /></td>
        </tr>
        <tr>
          <td>Any note</td>
          <td><textarea name="note" id="note" cols="45" rows="5"><?php echo $rsedit[note]; ?> </textarea></td>
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
	if(document.frmorders.select2.value == "")
	{
		alert("Patient name should not be empty..");
		document.frmorders.select2.focus();
		return false;
	}
	
	else if(document.frmorders.orderdate.value == "")
	{
		alert("Order date should not be empty..");
		document.frmorders.orderdate.focus();
		return false;
	}
	else if(document.frmorders.deliverydate.value == "")
	{
		alert("Delivery date should not be empty..");
		document.frmorders.deliverydate.focus();
		return false;
	}
	else if(document.frmorders.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmorders.address.focus();
		return false;
	}
	else if(document.frmorders.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmorders.mobilenumber.focus();
		return false;
	}
	else if(!document.frmorders.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmorders.mobilenumber.focus();
		return false;
	}
	else if(document.frmorders.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmorders.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>