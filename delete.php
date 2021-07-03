<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "syed1998";
$dbname = "fyp";
$db = mysqli_connect($dbhost,$dbuser,$dbpass, $dbname) or die('cannot connect to the server'); 

 $folder="uploads/";
$link = $_GET['link'];

        // Set parameters
 //$name = trim($_GET["filename"]);

     $sql = "SELECT * FROM q_list WHERE q_id =".$_GET["q_id"];
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($query);
   
/*
    $name = $row['filename'];
    unlink($folder.$name);
*/
    
    
    // Prepare a delete statement
    $sql = "DELETE FROM q_list WHERE q_id =".$_GET["q_id"];
    $query = mysqli_query($db, $sql) or die("failed");
    //header($link);
    echo "
    <script>
    window.location.href='".$link."';
    </script>
    ";
        

?>
