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
                    Similarity checking is used to ensure the submitted work have only specific percentage of copied content from other sources and the authenticity of the work is assured. The concept of similarity checking is applicable to examination papers as the set of questions cannot be similar to the previous set or set of questions produced in the same semester within certain percentage. Over the years, a lot of tools have been introduced to detect text similarity. Commercially available similarity detection tools have their own limitation and drawbacks to be used in higher educational institution while manual method of comparing the exam papers may produce an inconsistent result in the similarity percentage. <br>
                    The system implements exact String-Matching Algorithm to find similarity between existing examination papers. The system receives text input during question creation process and the questions must be in short essay format only. The system compares examination sets contained within the database only. The developed system is a web-based system. The system displays the percentage of similarity between examination papers. The user of this system is higher educational institution’s lecturers.
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