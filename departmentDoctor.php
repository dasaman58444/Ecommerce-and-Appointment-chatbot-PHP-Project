<?php
session_start();
include("dbconnection.php");
$sql ="select * from doctor where departmentid='$_GET[deptid]'";
$qsql = mysqli_query($con,$sql);
echo "<select class=\"inputapp\" name='doct' id='doct'><option value=''>Select doctor</option>";
while($qsql1=mysqli_fetch_array($qsql))
{
    echo"<option style=\"font-size:20px;\" value='$qsql1[doctorid]'>$qsql1[doctorname]</option>";		
}
?>	          
</select>