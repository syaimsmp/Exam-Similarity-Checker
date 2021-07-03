<?php include('connection.php');

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
}

$sql = "SELECT subject FROM exam ORDER BY RAND() LIMIT 1";
$run = mysqli_query($db, $sql);
while($row=mysqli_fetch_array($run)){$defSubject=$row['subject'];}

//EXAM TABLE
//$subject=$_GET['subject']?? $defSubject;
$curr_subj = $_GET['subject'] ?? $defSubject;
$curr_query = $_GET['query'] ?? '';

    // find out how many rows are in the table 
if(!empty($curr_subj) || !empty($curr_query)){
    $sql = "SELECT COUNT(*) FROM exam,user WHERE exam.uID = user.uId AND subject='".$curr_subj."'";
}
else{
    $sql = "SELECT COUNT(*) FROM exam,user WHERE exam.uID = user.uId";
}
    
$result = mysqli_query($db, $sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
// number of rows to show per page
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

    // get the info from the db 
           
    if(!empty($curr_subj) || !empty($curr_query)){
     $sql = "SELECT * FROM exam,user WHERE exam.uID = user.uId AND subject='".$curr_subj."' ORDER BY title ASC LIMIT $offset, $rowsperpage";
    }
    else{
          $sql = "SELECT * FROM exam,user WHERE exam.uID = user.uId ORDER BY title ASC LIMIT $offset, $rowsperpage";
    }
    //alert($sql);
    $i=0;
    $result_set = mysqli_query($db,$sql);
    while($row=mysqli_fetch_array($result_set))
    {
         $eTable[$i] = '<tr>
            <td class="w3-center"><a href="generateExam.php?e_id='.$row['e_id'].'&subject='.$row['subject'].'">'.$row['title'].'</a></td>
            <td class="w3-center">'.$row['subject'].'</td>';
            
        if($row['username'] == $curr_user){
            $eTable[$i] .='<td class="w3-center">
            <button class="w3-button" onClick="deleteme2(\''.$row['e_id'].'\',\''.$_SERVER['REQUEST_URI'].'\')"><span class="glyphicon glyphicon-trash"></span></button>
            </td>';
        }
        else{
            $eTable[$i] .= '<td class="w3-center">'.$row['username'].'</td>';
        }
        
        $eTable[$i] .= '</tr>';
        $i++;
        }
//...


//PAGINATION LINKS
/******  build the pagination links ******/
// range of num links to show
$range = 3;
$paging = "";

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   $paging .= " <a href='{$_SERVER['PHP_SELF']}?currentpage=1' class='w3-button w3-small'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   $paging .= " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage' class='w3-button w3-small'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         $paging .= " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         $paging .= " <a href='{$_SERVER['PHP_SELF']}?currentpage=".$x."&subject=".$curr_subj."&query=".$curr_query."' class='w3-button w3-small'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
    $paging .= " <a href='{$_SERVER['PHP_SELF']}?currentpage=".$nextpage."&subject=".$curr_subj."&query=".$curr_query."' class='w3-button w3-small'>></a> ";
   // echo forward link for lastpage
   $paging .= " <a href='{$_SERVER['PHP_SELF']}?currentpage=".$totalpages."&subject=".$curr_subj."&query=".$curr_query."' class='w3-button w3-small'>>></a> ";
} // end if
/****** end build pagination links ******/


?>


<!DOCTYPE HTML>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"/>
    <script src="main.js" type="text/javascript"></script> 
    
    <style>
        .tdStyle{
        white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px; width:126px;}
    </style>
</head>
    
<body>
    
<!-- NAVIGATION BAR -->
        <?php include('header.html'); ?>
<!-- NAVIGATION BAR END -->
    
<!-- CONTENT -->
    <div class="w3-border w3-container w3-display-container" style="height:800px;">
        <div class="w3-display-middle w3-border" style="width:80%; height:80%;">
            <div class="w3-display-container w3-margin" style="height:30%">
                <div class="w3-container w3-center w3-gray  w3-padding-16">
                    <h2><strong>EXAM VIEW</strong></h2>
                </div>
                <div class="w3-display-bottommiddle w3-container" style="width:40%">
                    <button onclick="window.location.href='questionDisplay.php'" class="w3-content w3-btn w3-teal w3-margin w3-padding-large w3-left w3-large w3-opacity w3-hover-opacity-off">Question View</button>
                    <button onclick="document.getElementById('newExam').style.display='block'" class="w3-content w3-btn w3-green w3-margin w3-padding-large w3-left w3-large w3-opacity w3-hover-opacity-off">Create Exam</button>
                </div>
            </div>
        <div class="w3-container" style="height:65%">
                <h1 class="w3-center"><a title="Click to view all subjects" class="w3-text-black" href="showExam.php"><strong><?php echo $_GET['subject']?? $defSubject; ?></strong></a></h1>
                 <div class=" w3-bar w3-gray" id="sortHolder">
                     <form method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>">
                         <div class="w3-bar-item">
                            <select class="w3-select w3-border" name="subject" onchange='this.form.submit()' required>
                                <option selected disabled>Select Subject</option>
                                    <?php 
                                    $query = "SELECT DISTINCT subject FROM `q_list`";
                                    $result1 = mysqli_query($db, $query);
                                    while($row1 = mysqli_fetch_array($result1)):;?>
                                    <option value="<?php echo $row1["subject"];?>"><?php echo $row1["subject"];?></option>
                                    <?php endwhile;?>
                             </select>
                        </div>
                    <div class="w3-bar-item">    
                    <noscript><input type="submit" value="Submit"></noscript></div>
                    </form>
                 </div>
                 <table class="w3-table w3-bordered w3-hoverable">
                    <tr>
                        <th class="w3-center">Title</th>
                        <th class="w3-center">Subject</th>
                        <th class="w3-center">Uploader</th>
                    </tr>
                     <?php 
                     if (!empty($eTable)){
                        foreach($eTable as $field){
                        echo $field;
                        }
                     }
                     ?>
                 </table>
                 
                <div class="w3-bar w3-padding w3-gray w3-center" style="height:54px; w3-margin">
                    <?php echo $paging; ?>
                </div>
            </div>
        </div>
    </div>
<!-- CONTENT END-->
            	 
<!-- FOOTER -->
       <?php include('footer.html'); ?>
<!-- FOOTER END-->
    
<!--CREATE EXAM MODAL -->
    <div id="newExam" class="w3-modal" style="padding-top:40px;">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom w3-round-large w3-display-container" style="max-width:800px;height:570px;">
            <div class="w3-center"><br>
                <span onclick="document.getElementById('newExam').style.display='none';clearAll();" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            </div>
            <div class="w3-display-middle w3-padding w3-border" style="height:80%; width:90%">
                 <div class="w3-border w3-left" style="width:47%; height:100%; overflow-y:auto">
                     <h2 class="w3-center"><input id="in1" placeholder="Insert Title here" style="width:90%" onchange="sync()" required/></h2>
                     <table id="selected" class="w3-table w3-bordered w3-hoverable">
                        <tr>
                            <th>Questions</th>
                            <th>Answer</th>
                        </tr>
                    </table>
                  </div>
                  <div class="w3-container w3-border w3-right w3-left-align" style="width:50%; height:100%; overflow-y:auto ">
                       <h2 class="w3-center"><b><?php $subject=$_GET['subject']?? $defSubject;echo $subject; ?> Questions</b></h2>
                        <table class="w3-table w3-bordered w3-hoverable">
                            <tr>
                                <th></th>
                                <th>Questions</th>
                                <th>Answer</th>
                            </tr>  
                            <?php
                                $sql = "SELECT * FROM q_list WHERE subject = '$subject' ORDER BY question ASC ";      
                                $result_set = mysqli_query($db,$sql);
                                while($row=mysqli_fetch_array($result_set))
                                {
                                    echo '<tr>
                                        <td><input type="checkbox" name="check_list2[]" value="'.$row['q_id'].'" onClick="sendQuestion2('.$row['q_id'].')" class="foo" /></td>
                                        <td id="q'.$row['q_id'].'" class="tdStyle">'.$row['question'].'</td>
                                        <td id="a'.$row['q_id'].'" class="tdStyle">'.$row['answer'].'</td>
                                    </tr>';}
                            ?>
                        </table>
                    </div> 
             </div>
            <div class="w3-margin-top w3-row w3-display-bottommiddle" style="height:50px;width:90%;">
                 <div class="w3-col m4 w3-red w3-center" style="height:75%">
                    <p><button type="button" name="remove" class="w3-btn" title="Click to remove questions" onclick="clearAll();" style="width:100%"><i class="glyphicon glyphicon-minus-sign" style="font-size:large"></i></button></p>
                 </div>
                 <div class="w3-col m4 w3-center w3-display-container" style="height:75%">
                     <form name="myForm" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                         <input type="hidden" value="<?php echo $curr_id; ?>" name="uId" readonly />
                         <input type="hidden" id="in2" name="theTitle" readonly />
                         <input type="hidden" id="q_list" class="w3-text-black" name="qId" readonly placeholder="Question ID" />
                         <input type="hidden" value="<?php echo $subject;?>" name="subject" readonly />
                        <button type="submit" class="w3-display-middle w3-content w3-btn w3-teal w3-padding-large w3-left" title="Create new Examination Set" name="exam_create">Confirm</button>
                     </form>
                 </div>
                 <div class="w3-col m4 w3-green w3-center" style="height:75%">
                    <p><button onClick="moveLeft()" type="button" name="add" class="w3-btn" title="Click to add questions" style="width:100%"><i class="glyphicon glyphicon-plus-sign" style="font-size:large"></i></button></p>
                 </div>
            </div>
            </div>
          </div>
<!-- MODAL END-->

    </body>
</html>