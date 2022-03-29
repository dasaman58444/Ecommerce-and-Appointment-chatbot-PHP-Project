<?php
session_start();
include("headers.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM prescription WHERE prescriptionid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('prescription deleted successfully..');</script>";
	}
}
?>

<section id="page-header" style="margin-top:100px;">
    <div class="row text-center">
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <h2 class="h2w">View Prescription Record</h2>
        </div>
        <div class="col-md-4 bread">

        </div>
    </div>
</section>

<?php
$sql ="SELECT * FROM prescription where patientid='$_SESSION[patientid]'";
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	$sqlpatient = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
	$qsqlpatient = mysqli_query($con,$sqlpatient);
	$rspatient = mysqli_fetch_array($qsqlpatient);
	
	$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
	$qsqldoctor = mysqli_query($con,$sqldoctor);
	$rsdoctor = mysqli_fetch_array($qsqldoctor);
?>		
<section id="login_page">
    <div class="container" style="padding:20px 25px;">
        <div class="card" style="margin:auto;width:80%">
            <div class="card-body" style="margin:auto;margin-top:10px;width:90%">	
        <table width="100%" style="color:white;font-size:20px">
          <tbody>
            <tr style="border-bottom:1px solid white;">
              <td><strong>Doctor</strong></td>
              <td><strong>Patient</strong></td>
              <td><strong>Prescription Date</strong></td>
              <td><strong>Status</strong></td>
            </tr>
              <?php
            echo "<tr>
              <td>&nbsp;$rsdoctor[doctorname]</td>
              <td>&nbsp;$rspatient[patientname]</td>
               <td>&nbsp;$rs[prescriptiondate]</td>
            <td>&nbsp;$rs[status]</td>
            
            </tr>";
    
            ?>
          </tbody>
        </table>
                <br><br><br>
        
                <h1 style="color:white;text-decoration:underline;">View Prescription record</h1>
                <br>
        <table width="100%" style="color:white;font-size:20px">
          <tbody>
            <tr style="border-bottom:1px solid white;">
              <td>Medicine</td>
              <td>Cost</td>
              <td>Unit</td>
              <td>Dosage</td>
            </tr>
             <?php
             $sqlprescription_records ="SELECT * FROM prescription_records LEFT JOIN medicine ON prescription_records.medicine_name=medicine.medicinename WHERE prescription_records.prescription_id='$rs[0]'";
            $qsqlprescription_records = mysqli_query($con,$sqlprescription_records);
            while($rsprescription_records = mysqli_fetch_array($qsqlprescription_records))
            {
            echo "<tr>
              <td>&nbsp;$rsprescription_records[medicinebrand]</td>
              <td>&nbsp;$rsprescription_records[cost]</td>
               <td>&nbsp;$rsprescription_records[unit]</td>
                <td>&nbsp;$rsprescription_records[dosage]</td>
                  
            </tr>";
            }
            ?>
            <tr>
              <td colspan="6"><div align="center"><br>
                <input type="submit" name="print" id="print" value="Print" onclick="myFunction()"/>
              </div></td>
              </tr>
          </tbody>
        </table>              
            </div>
        </div>
    </div>
</section>
<?php
}
?>        <p>&nbsp;</p>

<?php
include("footers.php");
?>
<script>
function myFunction()
{
	window.print();
}
</script>