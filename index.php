<?php include('connection.php');?>
<! DOCTYPE HTML>
<html>


    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel = "icon" href ="image/file.png" type="image/x-icon"> 
        <title>Examination Question Similarity Checker</title>
        <script src="main.js" type="text/javascript"></script>
        <style>
            .background {
                height: 100%;
                overflow: hidden;
            }
        </style>
    </head>
    

    <body <?php 
      if (!isset($_SESSION['username'])) {
        echo '
        class="background" onload="document.getElementById(\'login\').style.display=\'block\'; document.getElementById(\'myMsg\').style.display=\'block\';"
        ';
        if(empty($msg))
        { array_push($msg, "You Must Login First");}       
        }
      ?>>
        <div id="myMsg" class="w3-red w3-display-container" style="height: 100px; width:100%;animation: opac 2.0s; display:none;">
        <h2 class="w3-display-middle"><?php include('msg.php');?></h2>
        </div>
        
        <script type="text/javascript">timedMsg()</script>
        
<!-- NAVIGATION BAR -->
        <?php include('header.html'); ?>
<!-- NAVIGATION BAR END -->
        
<!-- CONTENT -->
        <div class="w3-display-container" style="min-height:910px">
            <div class="w3-display-container">
                <div class="w3-display-middle w3-margin w3-center" style="width:90%;">
                    <div style="animation: opac 2.0s;">
                        <h1 class="w3-text-white w3-xxxlarge"><b>Similarity Checker Page</b></h1>
                            <p class="w3-text-white w3-large">A responsive business oriented template <br />
                            designed by <a href="https://templated.co/">TEMPLATED</a> and released under the Creative Commons License.</p>
                    </div>
                </div>
                  <img class="mySlides" src="image/index(1).jpg" style="width:100%; height:100%;">
                  <img class="mySlides" src="image/index(2).jpg" style="width:100%; height:100%;">
                  <img class="mySlides" src="image/index(3).jpg" style="width:100%; height:100%;">
            </div>
            <script type="text/javascript">carousel()</script>
            
            <div class="w3-display-container w3-white" style="width:100%; height: 40%">
                <div class="w3-container w3-section w3-border w3-display-middle" style="width:50%; height:100%;">
                    <section class="w3-cell w3-padding" >
                        <header class="w3-center">
                            <a href="showExam.php" style="font-size:100px"><i class="glyphicon glyphicon-list-alt"></i></a>
                            <h3>Manage Examination Set</h3>
                        </header>
                        <p class="w3-justify">View all examination sets created by other user or create a new one and compare them with other examination sets to calculate the similarity percentage.</p>
                    </section>
                    <section class="w3-padding w3-cell">
                        <header class="w3-center" style="height:70%">
                            <a href="questionDisplay.php" style="font-size:100px"><i class="glyphicon glyphicon-open-file"></i></a>
                            <h3>Manage Question</h3>
                        </header>
                        <p class="w3-justify">View all the questions uploaded to the system or create a new one to be inserted into the examination set.</p>
                    </section>
                </div>
            </div>
        </div>
<!-- CONTENT END -->
        
<!-- FOOTER -->
       <?php include('footer.html'); ?>
<!-- FOOTER END-->
        
<!--LOGIN MODAL -->
        <div id="login" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large" style="max-width:600px">
                <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="w3-section">
                    <?php //include('msg.php');?>
                      <label><b>Username</b></label>
                      <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
                      <label><b>Password</b></label>
                      <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
                      <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="login_user">Login</button>
                     <button type="button" name="reg_user" class="w3-button w3-block w3-white w3-border w3-border-blue w3-round-large w3-hover-blue" onclick="document.getElementById('login').style.display='none'; document.getElementById('register').style.display='block'">Register</button>
                    <a href="#">Forgot Password?</a><br>
                    
                </div>
                </form>
            </div>
          </div>
<!-- MODAL END -->
        
<!--REGISTER MODAL -->
        <div id="register" class="w3-modal" style="padding-top:45px">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large w3-padding w3-light-grey" style="width:330px;">
                <div class="w3-panel w3-card w3-light-grey" style="height:50px; width:100%;">
                    <p class="w3-center w3-margin-top" ><b>Registration Form</b></p>
                </div>
                <form method="post" action="#" onsubmit="return validateForm()">
                    <div class="w3-panel w3-card w3-light-grey">
                        <label >Username</label><input type="text" name="username" placeholder="e.g. user123" class="w3-input" required/>
                    </div>
                    <div class="w3-panel w3-card w3-light-grey">
                        <label>Email</label><input type="email" name="email" placeholder="e.g. user@123.com" class="w3-input" required/>
                        </div>
                    <div class="w3-panel w3-card w3-light-grey">
                        <label>Password</label><input type="password" name="password1" class="w3-input" id="password" minlength="8" placeholder="min. 8-characters" autocomplete="off" required/>
                    </div>
                    <div class="textbox text-center">Password Must be alphanumeric with at least one uppercase and one symbol </div>
                    <label>Strength : </label><progress max="100" value="0" id="meter"></progress>
                    <div class="w3-panel w3-card w3-light-grey">
                        <label>Confirm Password</label><input type="password" id="pass2" name="password2" class="w3-input" minlength="8" placeholder="min. 8-characters" required/>
                    </div>
                    
                    <div class="w3-row">
                        <button type="submit" name="reg_user" class="w3-col l4 w3-button w3-white w3-margin w3-border w3-border-blue w3-round-large w3-hover-blue" onclick="validateForm()">Register</button>
                        <button type="button" name="reg_user" class="w3-col l4 w3-button w3-white w3-margin w3-border w3-border-red w3-round-large w3-hover-red" onclick="document.getElementById('register').style.display='none'; document.getElementById('login').style.display='block'; ">Cancel</button>
                    </div>
            </form>
            </div>
          </div>
<!-- MODAL END -->
        
<script>

var code = document.getElementById("password");
var strengthbar = document.getElementById("meter");
var display = document.getElementsByClassName("textbox")[0];

code.addEventListener("keyup", function() {
  checkpassword(code.value);
});


function checkpassword(password) {
var code = document.getElementById("password");
  var strength = 0;
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[!@#$%^*_<>]+/)) {
    strength += 1;

  }

  switch (strength) {
    case 0:
      strengthbar.value = 0;
      //display.innerHTML = "maximum number of characters is 12";
      break;

    case 1:
      strengthbar.value = 25;
      break;

    case 2:
      strengthbar.value = 50;
      break;

    case 3:
      strengthbar.value = 75;
      break;

    case 4:
      strengthbar.value = 100;
      break;
  }
}
    
function validateForm(){
    var flag = false;
    var strengthbar = document.getElementById("meter");
    var code = document.getElementById("password");
    var p2 = document.getElementById('pass2');
    //console.log(strengthbar.value);
    
    if(strengthbar.value == 100 && p2.value == code.value){return true;}
    else if(p2.value != code.value){alert('Different Passwords inserted!');password.value = "";p2.value="";strengthbar.value = 0;return false;}
    else
        {alert('Password not strong enough!');
         password.value = "";
         p2.value="";
         strengthbar.value = 0;
         return false;}
    
}
    
        
</script>
        
    </body>

</html>