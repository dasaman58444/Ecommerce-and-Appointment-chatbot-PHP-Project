<?php
session_start();
?>
<style>
    .nab{
        box-shadow: 2px 2px 9px 3px #0D0E0A;
        
    }
    #main{
        padding: 35px 0;
        width:75%;
        float:right;
        height: 100px;
    }
#mmenu, #mmenu ul {
margin: 0;
padding: 0;
list-style: none;
}
#mmenu {
width: 100%;
/*margin: 60px auto;*/
background-color: #fff;

}
#mmenu:before,
#mmenu:after {
content: "";
display: table;
}
#mmenu:after {
clear: both;
}
#mmenu {
zoom:1;
}
#mmenu li {
float: left;
position: relative;
height:40px;
}
#mmenu a {
float: left;
margin: 0 25px;
color: #999;
text-decoration: none;
padding-bottom: 5px;
}
/*     #mmenu li a:hover{
        border-bottom: 2px solid #181174;}  */
#mmenu li:hover > a {
color: #111;
    border-bottom: 2px solid #181174;
}
*html #mmenu li a:hover { /* IE6 only */
color: #fafafa;
}
#mmenu ul {
margin: 20px 0 0 0;
_margin: 0; /*IE6 only*/
opacity: 0;
visibility: hidden;
position: absolute;
top: 40px;
left: 0;
z-index: 9999; 
background: #fff;
box-shadow: 2px 2px 9px 3px #0D0E0A;
border-radius: 3px;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out; 
} 
#mmenu li:hover > ul {
opacity: 1;
visibility: visible;
margin: 0;
}
#mmenu ul ul {
top: 0;
left: 150px;
margin: 0 0 0 20px;
}
#mmenu ul li {
float: none;
display: block;
border: 0;
_line-height: 0; /*IE6 only*/
-moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
-webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
box-shadow: 0 1px 0 #111, 0 2px 0 #666;
}
#mmenu ul li:last-child { 
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none; 
}
#mmenu ul a { 
padding: 10px;
width: 130px;
_height: 10px; /*IE6 only*/
display: block;
white-space: nowrap;
float: none;
text-transform: none;
}
#mmenu ul a:hover {
    border-bottom: none;
}
#mmenu ul li:first-child > a {
-moz-border-radius: 3px 3px 0 0;
-webkit-border-radius: 3px 3px 0 0;
border-radius: 3px 3px 0 0;
}
#mmenu ul li:first-child > a:after {
content: '';
position: absolute;
left: 40px;
top: -6px;
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-bottom: 6px solid #fff;
}
#mmenu ul ul li:first-child a:after {
left: -6px;
top: 50%;
margin-top: -6px;
border-left: 0; 
border-bottom: 6px solid transparent;
border-top: 6px solid transparent;
border-right: 6px solid #fff;
}
#mmenu ul ul li:first-child a:hover:after {
border-bottom-color: transparent; 
}
#mmenu ul li:last-child > a {
-moz-border-radius: 0 0 3px 3px;
-webkit-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
}

</style>
<?php
if(isset($_SESSION[adminid]))
{
?>
<div class="nab fixed-top">
    <div id="mmenu">
        <div class="ml-5" style="width:20%;">
            <a href="patientaccount.php">
                <img style="width:200px;margin-top:5px;height:90px;" src="images/newlife2.JPG" alt="">
            </a>
        </div>
        <div id="main">
            <li <?php if(basename($_SERVER['PHP_SELF']) == "adminaccount.php"){ echo 'class="active"'; } ?>><a href="adminaccount.php">Account</a></li>
<li>
<a href=" ######### ">Profile</a>
    <ul>
    <li><a href="adminprofile.php">Admin Profile</a></li>
    <li><a href="adminchangepassword.php">Change Password</a></li>
        <li><a href="admin.php" style="width:150px;">Add Admin</a></li>
    	<li><a href="viewadmin.php" style="width:150px;">View Admin</a></li>
    </ul>
</li>
<li><a href=" ######### ">Patient</a>
    <ul>
   <li><a href="addpatient.php">Add Patient</a></li>
        <li><a href="viewpatient.php">View Patient Records</a></li>
        
    </ul>
</li>
<li>
<a href=" ######### ">Appointment</a>
    <ul>
    <li><a href="appointment.php" style="width:200px;">New Appointment</a></li>
    <li><a href="viewappointment.php" style="width:200px;">View Appointments</a></li>
    <li><a href="viewappointmentpending.php" style="width:200px;">View Pending Appointments</a></li>
    <li><a href="viewappointmentapproved.php" style="width:200px;">View Approved Appointments</a></li>
    </ul>
</li>
<li><a href="viewtreatmentrecord.php">Treatment</a></li>
<li>
<a href=" ######### ">Doctor</a>
    <ul>
    <li><a href="doctor.php">Add Doctor</a></li>
    <li><a href="Viewdoctor.php">View Doctor</a></li>
     <li><a href="doctortimings.php">Add Doctor Timings</a></li>
    <li><a href="viewdoctortimings.php">View Doctor Timings</a></li>
 </ul>
</li>
    
<li>
<a href=" ######### ">Settings</a>
    <ul>
       	<li><a href="department.php" style="width:150px;">Add Department</a></li>
    	<li><a href="Viewdepartment.php" style="width:150px;">View Department</a></li>
        <li><a href="treatment.php" style="width:150px;">Add Treatment type</a></li>
        <li><a href="viewtreatment.php" style="width:150px;">View Treatment types</a></li>
       	<li><a href="medicine.php" style="width:150px;">Add Medicine</a></li>
    	<li><a href="Viewmedicine.php" style="width:150px;">View Medicine</a></li>
        <li><a href="room.php" style="width:150px;">Add Room</a></li>
        <li><a href="viewroom.php" style="width:150px;">View Room</a></li>
      </ul>
</li>
            <li class="mrt mr-3" style="float:right; margin-top:-8px; margin-right:70px !important;"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
</div>
    </div>
    </div>
<?php
}
?>
<?php
if(isset($_SESSION[doctorid]))
{
?>
<div class="nab fixed-top">
    <div id="mmenu">
        <div class="ml-5" style="width:20%;">
            <a href="patientaccount.php">
                <img style="width:200px;margin-top:5px;height:90px;" src="images/newlife2.JPG" alt="">
            </a>
        </div>
        <div id="main">
            <li <?php if(basename($_SERVER['PHP_SELF']) == "doctoraccount.php"){ echo 'class="active"'; } ?>><a href="doctoraccount.php">Account</a></li>
    <li>
    <a href=" ######### ">Settings</a>
        <ul>
       <li><a href="doctorprofile.php">Profile</a></li>
            <li><a href="doctorchangepassword.php">Change Password</a></li>
          </ul>
    </li>
    <li>
    <a href=" ######### ">Appointment</a>
        <ul>
    <li><a href="viewappointment.php" style="width:200px;">View Appointments</a></li>
    <li><a href="viewappointmentpending.php" style="width:250px;">View Pending Appointments</a></li>
    <li><a href="viewappointmentapproved.php" style="width:250px;">View Approved Appointments</a></li>
        </ul>
    </li>
    <li><a href=" ######### ">Patient</a>
        <ul>
       <li><a href="viewpatient.php">View Patient</a></li>
            <li><a href="viewprescriptionrecord.php">View Prescription</a></li>
        </ul>
    </li>
       <li><a href=" ######### ">Doctor Timings</a>
        <ul>
       <li><a href="doctortimings.php">Add Timings</a></li>
       <li><a href="viewdoctortimings.php">View Timings</a></li>
        </ul>
    </li>
    <li>
    <a href=" ######### ">Treatment</a>
        <ul>
           <li><a href="viewtreatmentrecord.php">Treatment Records</a></li>
            <li><a href="viewtreatment.php">View Treatment</a></li>
        </ul>
    </li>    
    <ul>
 
    <li><a href="viewdoctorconsultancycharge.php">Income Report</a></li>
		</ul>
  
            <li class="mrt mr-5" style="float:right; margin-top:-8px"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>       
 </div>
    </div>
</div>

<?php
}
?>
<?php
if(isset($_SESSION[patientid]))
{
?>

<div class="nab fixed-top">
<div id="mmenu">
   <div class="ml-5" style="width:20%;">
       <a href="patientaccount.php">
           <img style="width:200px;margin-top:5px;height:90px;" src="images/newlife2.JPG" alt="">
    </a>
    </div>
<div id="main">
    <li <?php if(basename($_SERVER['PHP_SELF']) == "patientaccount.php"){ echo 'class="active"'; } ?>><a href="patientaccount.php">Account</a></li>
<li <?php if(basename($_SERVER['PHP_SELF']) == "viewappointment.php"){ echo 'class="active"'; } ?>>
<a href=" ######### ">Appointment</a>
    <ul>
        <li><a href="patientappointment.php" style="width:200px;">Add Appointment</a></li>
    <li><a href="viewappointment.php" style="width:200px;">View Appointments</a></li>
    </ul>
</li>
<li <?php if(basename($_SERVER['PHP_SELF']) == "patientprofile.php"){ echo 'class="active"'; } ?>>
<a href=" ######### ">Profile</a>
    <ul>
    <li><a href="patientprofile.php">View Profile</a></li>
    <li><a href="patientchangepassword.php">Change Password</a></li>
    </ul>
</li>

<li <?php if(basename($_SERVER['PHP_SELF']) == "patviewprescription.php"){ echo 'class="active"'; } ?>>
<a href=" ######### ">Prescription</a>
    <ul>
       <li><a style="width:200px;" href="patviewprescription.php">View Prescription Records</a></li>
    </ul>
</li>
<li <?php if(basename($_SERVER['PHP_SELF']) == "viewtreatmentrecord.php"){ echo 'class="active"'; } ?>>
<a href=" ######### ">Treatment</a>
    <ul>
       <li><a href="viewtreatmentrecord.php">Treatment Records</a></li>
    </ul>
</li>
    <li <?php if(basename($_SERVER['PHP_SELF']) == "medicine1.php"){ echo 'class="active"'; } ?>>
        <a href="medicine1.php">Medicine</a>
    </li>


<li class="mrt ml-5" style=" margin-top:-8px; "><a href="cart.php"><i class="fas fa-shopping-cart"></i>Cart
    <?php

 if (isset($_SESSION['cart'])){
     $count = count($_SESSION['cart']);
     echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
 }else{
     echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
 }

    ?></a></li>&nbsp;
    <li class="mrt" style="margin-top:-8px"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
</div>
</div>
</div>
<div class="container1" id="container1">
        <div class="chatbox">
            <div class="header1">
                <h4>Chat with Alicia <span class="avail">Online </span>
                <span onclick="document.getElementById('container1').style.display='none';document.getElementById('comment').style.display='block';" style="float:right;cursor:pointer;" class="material-icons mt-2">remove</span></h4>
            </div>
            <div class="body" id="chatbody">
                <div class="scroller"></div>
            </div>
            <form class="chat" method="post" autocomplete="off">
                <div>
                    <input type="text" class="inp" name="chat" id="chat" placeholder="Chat Box">
                </div>
                <div>
                    <button class="send" id="btn"><span class="material-icons">
send
                        </span></button>
                </div>
            </form>
        </div>
    </div>
    <button class="comment" id="comment" onclick="document.getElementById('container1').style.display='block';document.getElementById('comment').style.display='none';"><span class="material-icons">
comment
        </span></button>
    <script>
    const btnSend = document.getElementById("btn");
const chat = document.getElementById("chat");

const getMessage = (msg) => {
  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      const response = xhr.responseText;
      const chatBody = document.querySelector(".scroller");
      const divCpu = document.createElement("div");
      divCpu.className = "alicia visible";
      divCpu.innerHTML = response;
      const divUser = document.createElement("div");
      divUser.className = "me visible";
      divUser.textContent = msg;
      chatBody.append(divUser);
      setTimeout(() => {
        chatBody.append(divCpu);
      }, 600);
      //   console.log(divCpu);
    }
  };
  xhr.open("GET", "chat.php?msg=" + msg, true);
  xhr.send();
};

btnSend.addEventListener("click", (e) => {
  e.preventDefault();
  if (chat.value == "") {
  } else {
    getMessage(chat.value);
    chat.value = "";
  }
});
    </script>
<?php
}
?>

<style>
.container1 {
  width: 100%;
  height: 70%;
    z-index: 111;
  position: relative;
    display: none;
}

.chatbox {
  width: 30%;
  height: 60%;
  position: fixed;
  bottom: 12%;
  right: 8%;
  margin-top: 20px;
  background: #e0e0d1 !important;
  border-radius: 10px;
}

.header1 {
  background: #181174;
  padding: 10px 20px;
  color: aliceblue;
  font-size: 20px;
}

.avail {
  font-size: 12px;
  padding: 0 20px;
}

.avail::after {
  content: "";
  display: inline-block;
  background: rgb(4, 180, 4);
  width: 10px;
  height: 10px;
  margin: 0 3px;
  vertical-align: middle;
  border-radius: 50%;
}

.body {
  background: #e0e0d1;
  height: 80%;
  width: 100%;
  overflow-y: auto;
}

.inp {
  height: 50px;
  width: 90%;
    float: left;
    font-size: 20px;
}

input[type="text"] {
  padding: 0 10px;
}

.visible {
  display: block;
}

.none {
  display: none;
}

.me {
  width: 55%;
  height: auto;
  padding: 10px;
  margin: 5px;
  background-color: whitesmoke;
  border-radius: 10px;
  float: right;
  text-align: right;
  display: block;
    font-size: 20px;
}

.alicia {
  width: 60%;
  height: auto;
  padding: 10px;
  margin: 5px;
    font-size: 20px;
  background-color: #181174;
    color: white;
  border-radius: 10px;
  float: left;
  text-align: left;
  display: block;
}
    .send{
        width: 10%;
        height: 50px;
        background-color: #181174;
        color: white;
        float: right;
        cursor: pointer;
        font-weight: 500;
        font-size: 17px;
        color: aliceblue;
        cursor: pointer;
    }
    .comment{
        position: fixed;
        right:8%;
        bottom: 10%;
        border: none;
        outline: none;
        background: #181174;
        color: white;
        width: 50px;
        height: 40px;
        border-radius: 10px;
        z-index: 111;
        cursor: pointer;
        opacity: 0.8;
        transition: opacity 0.3s;
        box-shadow: 0 5px 5px rgba(0,0,0,0.4);
    }
    .comment:hover{
        opacity:1;
    }
    .material-icons{
        font-size: 30px;
    }
    .mrt a{
        border: 2px solid #181174 !important;
        background-color: transparent !important;
        border-radius: 5px;
        box-shadow: none;
        color: #181174 !important;
        font-weight: 600;
        font-size: 18px;
        padding: 7px 15px !important;
    }
    .mrt a:hover{
        box-shadow: none;
        border: 2px solid rgb(40,167,69) !important;
        color: rgb(40,167,69) !important;
        transition: color 1s,border 1s;
    }
    .mrt i{
        padding-right: 10px;
        font-size: 20px;
    }
</style>