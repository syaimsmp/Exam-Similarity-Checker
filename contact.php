<?php include('connection.php');?>
<!DOCTYPE HTML>
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
        
<!-- NAVIGATION BAR -->
         <?php include('header.html'); ?>
<!-- NAVIGATION BAR END -->
        
<!-- CONTENT -->
        <div class="w3-display-container w3-border" style="min-height:500px">
            <div class="w3-border w3-row w3-light-grey w3-display-middle" style="width:90%;height:80%">
                <!--
              <div class="w3-container w3-display-left" style="width:20%;height:80%">
                  <img src="image/syedputih.jpg" style="max-width:100%; height:100%;" />
                </div>
                <div class="w3-container w3-border w3-display-middle" style="width:60%;height:80%">
                  <p>Hello W3.CSS Layout.</p>
                </div>
                -->
             
   
                <div class="w3-col w3-display-container s3 w3-center" style="height:100%">
                    <img class="w3-display-middle" src="image/syedputih.jpg" style="max-width:100%; height:80%;" />
                </div>
  
                <div class="w3-col w3-display-container s9 w3-center" style="height:100%">
                    <p class="w3-display-left w3-margin">
                    A final year student from Universiti Sains Islam Malaysia currently pursuing a Bachelor's Degree in Computer Science specifying on Information Security and Assurance. Throughout my studies, I've learned the essential of programming which is perseverance and patience. When facing a problem, I often do my best to come up with the solutions and approach needed to solve it. I have been participating in a lot of non-academic events and competitions since my first year, which helped to increase my experience and communication skills and gave me a deeper understanding of the knowledge I gained in class. Apart from being a proactive learner, I have been participating in volunteering service under Non Government Organization since 2015.
                    </p>
                    <p class="w3-display-bottommiddle">
                        <strong>Contact: 011-5503 5198<br>Email: syaimsmp@gmail.com</strong>
                    </p>
                        
                </div>
                
            </div>
        </div>
<!-- CONTENT END -->
        
<!-- FOOTER -->
       <?php include('footer.html'); ?>
<!-- FOOTER END-->
        
    </body>
</html>