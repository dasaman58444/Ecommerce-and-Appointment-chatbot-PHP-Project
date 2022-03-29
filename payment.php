<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
		$sql ="INSERT INTO payment(patientid,appointmentid,paiddate,paidtime,paidamount,status) values('$_GET[patientid]','$_GET[appointmentid]','$_POST[date]','$_POST[time]','$_POST[paidamount]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('payment record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		
		if($_POST[discountamount] != '0')
		{
			 $sql ="UPDATE billing SET discount=$_POST[discountamount]+ discount, discountreason=CONCAT('$_POST[discountreason] , ', discountreason) WHERE appointmentid='$_GET[appointmentid]'";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			
		}
}
if(isset($_SESSION[patientid]))
{
	$sql="SELECT * FROM payment WHERE paymentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
$billappointmentid = $_GET[appointmentid];
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">Payment Details</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>
<section id="login_page">
    <div class="container" style="padding:50px 25px;">
        <div class="card" style="margin:auto;width:80%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">	
                
     <form method="post" action="" name="frmpatprfl" onSubmit="return validateform()">     
    <table width="100%" style="color:white;font-size:20px">
     <thead>
        <tr>
          <th colspan="2">&nbsp;Add payment details.. </th>
          </tr>
          </thead>
           <tbody>
        <tr>
          <td width="34%">Paid Date</td>
          <td width="66%"><input type="date" value="<?php echo date("Y-m-d"); ?>" name="date" id="date"></td>
        </tr>
        <tr>
          <td>Paid Time</td>
          <td><input type="text" readonly="readonly" value="<?php echo date("H:i:s"); ?>" name="time" id="time"></td>
        </tr>
        <tr>
          <td>Paid Amount</td>
          <td><input name="paidamount" type="text" id="paidamount" value="0"></td>
        </tr>
        <tr>
         <td></td>
          <td><br><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    
    <p>&nbsp;</p>
    </form>
    
<?php
include("viewpaymentreport.php");
?>      
<table width="100%" style="color:white;font-size:20px">
<thead>
  <tr>
          <td colspan="2" align="center"><a href='patientreport.php?patientid=<?php echo $_GET[patientid]; ?>'><strong>View Patient Report>></strong></a></td>
        </tr>
      </thead>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
    </div>
</section>
<?php
include("footer.php");
?>
