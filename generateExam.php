<?php include('connection.php');?>

<! DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <script src="main.js" type="text/javascript"></script>
</head>

<body>
    
<!-- NAVIGATION BAR -->
        <?php include('header.html'); ?>
<!-- NAVIGATION BAR END -->

  
<!-- CONTENT -->
 
    <div class="w3-display-container w3-margin" style="width:100%; min-height:700px;">
        <div class="w3-display-middle" style="width:75%; height:80%;">
            <div class="w3-container">
               <h1 class="w3-center">
                   <button onclick="window.location.href='showExam.php';" class="w3-content w3-btn w3-blue w3-padding-large w3-left w3-large">View All Set</button>
                   <strong><?php echo $etitle; ?></strong>
                </h1>
                <h3>Subject: <?php echo $_GET['subject']; ?></h3>
           </div>
            <div class="" style="max-height:80%;overflow-y:auto">
                 <?php 
                     if (!empty($edata)){
                        foreach($edata as $field){
                        echo $field;
                        }
                     }
                 ?>
            </div>
            <div class="w3-bar w3-gray" style="height:10%">

        <!-- Comparing Part -->
                <div class="w3-bar-item">
                  <button class=" w3-center w3-btn w3-text-white w3-cyan w3-content" onclick="document.getElementById('set').style.display='block'">Compare with...</button>
                </div> 
                <form method="get" action="similarResult.php">
                    <div class="w3-bar-item" id="set" style="display:none;">
                        <input type="hidden" value="<?php echo $eID;?>" name="id1"/>
                        <input type="hidden" value="<?php echo $_GET['subject'];?>" name="subject"/>
                        <select class="w3-select w3-border" name="id2" onchange='this.form.submit()' required />
                            <option selected disabled>Select Exam</option>
                            <option value="all">All Set</option>
                            <?php 
                            $query = "SELECT * FROM `exam` WHERE subject='$subject' AND title !='".$etitle."'";
                            $result1 = mysqli_query($db, $query);
                            while($row1 = mysqli_fetch_array($result1)):;?>
                            <option value="<?php echo $row1["e_id"];?>"><?php echo $row1["title"];?></option>
                            <?php endwhile;?>
                         </select>
                      </div>

                    <div class="w3-bar-item">    
                        <noscript><input type="submit" value="Submit"></noscript>
                    </div>
                </form>
               </div>
           
            
        </div>
           
    </div>

<!-- CONTENT END-->
    
            
<!-- FOOTER -->
       <?php include('footer.html'); ?>
<!-- FOOTER END-->
       
</body>
</html>



 <?php 
    
    
    
    /*
        // USED TO RETRIVE QUESTION ID FOR EXAM SET
            $sql = "SELECT questions FROM exam";
            $set = mysqli_query($db,$sql);

            while($row1=mysqli_fetch_array($set))
            {
                //echo $row['questions'];
                $q_list = explode(' ', $row1['questions']);
                //var_dump($q_list);
                for($i=0; $i<count($q_list); $i++)
                {
                    $sql = "SELECT question FROM q_list where q_id='".$q_list[$i]."'";
                    $result = mysqli_query($db, $sql);
                    while($row2=mysqli_fetch_row($result))
                    {
                        echo ' <div class="w3-margin-top" style="overflow-y:auto;">
                                        <div class="w3-panel w3-card w3-padding" style="height:40px">'.($i+1).'. '.$row2[0].'</div>
                                         <div class="w3-light-gray"></div>
                                     </div>';
                    }
                    echo '<br>';
                }
            } 
    */ 
    ?>