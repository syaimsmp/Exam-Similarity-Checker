<?php 
/*
If you want to retain MySQL 5.5, you can:
- make a copy of your exported .sql file
- replace instances of utf8mb4unicode520_ci and utf8mb4_unicode_520_ci
...with utf8mb4_unicode_ci
- import your updated .sql file.
*/
session_start();
$db = mysqli_connect('localhost','root','', 'examsimilarity') or die('cannot connect to the server'); 
$msg = array();
$curr_user = $_SESSION['username']?? '';

//alert($curr_id);

if($curr_user != ''){
    $sql = "SELECT * FROM user WHERE username='$curr_user'";
    $run = mysqli_query($db, $sql);
    //cLog($sql);
    while($row = mysqli_fetch_array($run)){$ID = $row['uId'];}
    $_SESSION['ID'] = $ID;
    $curr_id = $_SESSION['ID'];
}

//CHECK USER SESSION
if (!isset($_SESSION['username'])) {
    //array_push($msg, "You must log in first");
    if($_SERVER['PHP_SELF'] != '/ExamSimilarityChecker/index.php'){
         header("location: index.php");
    }
}
//...

//LOGOUT
if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}
//...


//LOGIN USER
if(isset($_POST['login_user'])){
    //$username = $_POST['username'];
    //$username = htmlentities($username , ENT_QUOTES, 'UTF-8');
    $username = mysqli_real_escape_string($db, filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    //$username = preg_replace('/[^A-Za-z0-9_\-]/', '_', $username);
    $password = md5(mysqli_real_escape_string($db, filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING)));
    //$password = md5(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));
    
    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $run = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($run)){$ID = $row['uId'];}
    
    if (mysqli_num_rows($run) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['ID'] = $ID;
        $_SESSION['success'] = "You are now logged in";
        alert($_SESSION['success']);
        //header('location: insertQuestion.php');
    }
    else{
        alert("Login Failed");
        cLog($sql);
        array_push($msg, "Wrong Username/Password");
    }
}

//...

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
    $email = mysqli_real_escape_string($db, filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
    $password_1 = mysqli_real_escape_string($db, filter_input(INPUT_POST, "password1", FILTER_SANITIZE_STRING));
    $password_2 = mysqli_real_escape_string($db, filter_input(INPUT_POST, "password2", FILTER_SANITIZE_STRING));


    $sql="SELECT username FROM user WHERE username='$username'";
    $run = mysqli_query($db, $sql);

    if (mysqli_num_rows($run) > 0) {   //checks if there's a duplicate
        array_push($msg, "Username existed");
        alert("Username existed");
     }


    if ($password_1 != $password_2) {
        array_push($msg, "The two passwords do not match");
        alert("The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($msg) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        // $password = $password_1; //
        $query = "INSERT INTO user (username, email, password) VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Registration Successful";
        alert($_SESSION['success']);
    }
}
//...

//CREATE NEW QUESTION
if (isset($_POST['create']))
{
    //$rawquestion = $_POST['question'] ?? '';
    //$rawanswer = $_POST['answer'] ?? '';
    $question = mysqli_real_escape_string($db, filter_input(INPUT_POST, "question", FILTER_SANITIZE_STRING));
    $answer = mysqli_real_escape_string($db, filter_input(INPUT_POST, "answer", FILTER_SANITIZE_STRING));
    $subject = $_POST['subject'] ?? '';
    $chapter = $_POST['chapter'] ?? '';
    $creator = $_POST['creator'] ?? '';
    
    if($subject == 'Other')
       {$subject = $_POST['otherSubject'];}
    
   // echo $question."<br>".$subject."<br>".$chapter."<br>".$tag;
    
     $sql = "INSERT INTO q_list(u_id, question,subject,chapter,answer) VALUES('$creator','$question','$subject','$chapter','$answer')";
    $result = mysqli_query($db, $sql);
    
    if($result)
 {
        echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Question Inserted')
                    window.location.href='questionDisplay.php';
                   </SCRIPT>";  
    }
        
    else
    {
        cLog($sql);
        echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Fail to Insert the question')
                    window.location.href;
                   </SCRIPT>";
    }
}
//...    

//EDIT QUESTION
if (isset($_POST['edit']))
{
    $question = mysqli_real_escape_string($db, filter_input(INPUT_POST, "question", FILTER_SANITIZE_STRING));
    $subject = $_POST['subject'] ?? '';
    $chapter = $_POST['chapter'] ?? '';
    $answer = mysqli_real_escape_string($db, filter_input(INPUT_POST, "answer", FILTER_SANITIZE_STRING));
    $qId = $_POST['qId'] ?? '';
    
    if($subject == 'Other')
       {$subject = $_POST['otherSubject2'];}
  
            // Prepare an update statement
        $sql = "UPDATE q_list SET question='$question', subject='$subject', chapter='$chapter', answer='$answer' WHERE q_id='$qId'";
        $result = mysqli_query($db, $sql);
            // Attempt to execute the prepared statement
            if($result){
                // Records updated successfully. Redirect to landing page
                 echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Question Updated')
                    window.location.href='questionDisplay.php';
                   </SCRIPT>";    
            } 
            
            else{
                echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Something went wrong with sql. Please try again later.')
                    window.location.href='questionDisplay.php';
                   </SCRIPT>";
            }
}
//...


//CREATE EXAMINATION SET
if(isset($_POST['exam_create']))
{
    $ID = uniqid();
    $uID = $_POST['uId'];
    $questions = $_POST['qId'];
    //$title = $_POST['theTitle'];
    $title = filter_input(INPUT_POST, "theTitle", FILTER_SANITIZE_STRING);
    $subject = $_POST['subject'];
   
    
    //checks if there's a duplicate $id
    $sql="SELECT e_id FROM exam WHERE e_id='$ID'";
    $duplicateCheck = mysqli_query($db, $sql);
	if (mysqli_num_rows($duplicateCheck) > 0) {   
        $ID = uniqid();
	 }
    
    $sql="SELECT * FROM exam WHERE title='$title'";
    $duplicateCheck = mysqli_query($db, $sql);    
    if (mysqli_num_rows($duplicateCheck) > 0) { 
        echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Exam with similar title exist. Title must be unique')
                    window.location.href='questionDisplay.php';
                   </SCRIPT>";
    }
    else
    {
        $sql = "INSERT INTO exam(e_id, uID, title,questions, subject) VALUES('$ID', '$uID','$title','$questions','$subject')";
        $result = mysqli_query($db, $sql);
    
        if($result)
        {
            echo "<SCRIPT LANGUAGE='JavaScript'>
                        window.alert('Exam Created')
                        window.location.href='generateExam.php?e_id=".$ID."&subject=$subject';
                       </SCRIPT>";  
        }
        else
        {
            cLog($sql);
            echo "<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Fail to Insert the question')
                    window.location.href;
                </SCRIPT>";
        }
    } 
}
//...

//EXAM SET DISPLAY
$resultCounter = 0; 
$eID = $_GET['e_id'] ?? '';
$subject = $_GET['subject']?? '';

// USED TO RETRIEVE QUESTION ID FOR EXAM SET
$sql = "SELECT * FROM exam WHERE e_id='$eID'";
//echo $sql;
$set = mysqli_query($db,$sql);
while($row1=mysqli_fetch_array($set))
{
    $etitle = $row1["title"];
    //echo $row['questions'];
    $q_list = explode(' ', $row1['questions']);
    //var_dump($q_list);
    for($i=0; $i<count($q_list); $i++)
    {
        $sql = "SELECT * FROM q_list where q_id='".$q_list[$i]."'";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result)>0){$resultCounter++;}
        //$num=0;
        while($row2=mysqli_fetch_assoc($result))
        {
            $edata[$i] = ' <div class="w3-margin-top w3-light-gray" style="min-height:100px">
                            <div class="w3-panel w3-card w3-padding w3-white" >'.($i+1).'. '.$row2['question'].'</div>
                             <div class="w3-padding w3-margin w3-white">Ans: '.$row2['answer'].' </div>
                         </div>';
            //$num++;
            }
        }

    if($resultCounter == 0){
    $sql = "DELETE FROM exam WHERE e_id='$eID'";
    $run = mysqli_query($db, $sql);
     print <<<HERE
    <script>
    alert('Result: $resultCounter. There are no questions in this set. Examination set will be deleted.');
    window.location.href = 'showExam.php';
    </script>
    HERE;   
    //$sql = "DELETE FROM exam WHERE questions IS NULL OR questions=''";
    }
} 
            //http://localhost/finalProject/generateExam.php?e_id=5f8e6ab08cf0f
//...


//FUNCTIONS
function cLog($txt){
$txt = str_replace('"', '``', str_replace("'", "`", $txt));
print <<<HERE
<script type="text/javascript">
console.log('$txt');
</script>
HERE;
}

function alert($txt){
$txt = str_replace('"', '``', str_replace("'", "`", $txt));
print <<<HERE
<script type="text/javascript">
alert('$txt');
</script>
HERE;
}

function redirect($link){
print <<<HERE
<SCRIPT type="text/javascript>
window.location.href='$link';
</SCRIPT>
HERE;
}
?>