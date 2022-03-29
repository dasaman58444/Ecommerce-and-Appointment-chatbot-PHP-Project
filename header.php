<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="Images/favicon.JPG">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1c2472b88b.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    
    <link rel="stylesheet" href="css/boot.css">
      <link rel="stylesheet" href="backup/main.css">

    <title>New Life</title>
	<script type="application/javascript">
(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
</script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg fixed-top navbar-light trn1" style="height:100px;">
      <a class="navbar-brand" href="index.php">
          <img style="margin-top:5px;" src="images/newlife2.JPG" alt="">
        </a>
        <button class="navbar-toggler custom-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center trn3" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "aboutus.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "contactus.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "medicinestore.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="medicinestore.php">Medicine</a>
                </li>
                <?php
                if(!isset($_SESSION[patientid]))
                {
                ?>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "patientappointment.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="patientappointment.php">Online Appointment</a>
                </li> 
                
                                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "Freeservice.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="Freeservice.php">Free Service</a>
                </li> 
                
                
            </ul>
            <div class="mrt ml-auto mr-3">
               
                <ul class="navbar-nav">
                    <li class="nav-item log <?php if(basename($_SERVER['PHP_SELF']) == "patientlogin.php"){ echo 'active'; } ?>">
                        <a class="nav-link" href="patientlogin.php"><i class="fas fa-shopping-cart"></i>Cart</a>
                    </li>
                    <li class="nav-item log <?php if(basename($_SERVER['PHP_SELF']) == "patientlogin.php"){ echo 'active'; } ?>">
                        <a class="nav-link" href="patientlogin.php"><i class="fa fa-user-tie" aria-hidden="true"></i>Login</a>
                    </li>
                </ul>
            </div>
            <?php
                }
                else
                {
            ?>
                <li class="nav-item <?php if(basename($_SERVER['PHP_SELF']) == "patientappointment.php"){ echo 'active'; } ?>">
                    <a class="nav-link" href="patientappointment.php" >Online Appointment</a>
            </li></div>
            <div class="mrt ml-auto mr-3">
                <ul class="navbar-nav">
                    <li class="nav-item log">
                        <a class="nav-link" href="patientaccount.php"><i class="far fa-arrow-alt-circle-left"></i>Go Back</a>
                    </li>
                </ul>
            </div>
            
            <?php
                }
            ?> 
      </nav>
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
    </body>
</html>
<style>
    .trn1{
        background-color: #ffffff !important;
        z-index: 111;
        box-shadow: 5px 5px 8px #000;
    }
    .trn1 a{
        margin-right: 30px;
        border-bottom: 2px solid transparent;
    }
    .trn1 a:hover{
        border-bottom: 2px solid #151515;
    }
    .active a{
        border-bottom: 2px solid #181174;
    }
    .navbar-brand img{
        width:85%;
        margin-top: -10px;
        height: 90px;
    }
    @media only screen and (max-width:990px){
        .navbar-brand{
            width: 180px;
            height: 90px;
            margin-top: -20px;
        }
        .trn3{
            background: white !important;
            box-shadow: 5px 5px 8px #000;
            z-index: 111;
            margin-top: 22px;
            padding-left: 20px
        }
    }
    @media only screen and (max-width:310px){
        .navbar-brand{
            width: 140px;
            height: 70px;
            margin-top: -40px;
        }
    }
        
</style>
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

input[type="submit"] {
  font-weight: 500;
  font-size: 17px;
  color: aliceblue;
  cursor: pointer;
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
    }
    .comment{
        position: fixed;
        right:8%;
        bottom: 10%;
        border: 2px solid white;
        outline: none;
        background: transparent;
        background-color: #181174;
        color: white;
        width: 50px;
        height: 45px;
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
        font-size: 20px;
        padding: 7px 12px !important;
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