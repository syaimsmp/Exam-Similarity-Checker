<?php include('connection.php');

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
	}
?>


<!DOCTYPE HTML>

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
    
<?php

//COMPARISON LOGIC START
 $ID1 = $_GET['id1'] ?? '';
 $ID2 = $_GET['id2'] ?? '';
            
// USED TO RETRIVE QUESTION ID FOR EXAM SET

//SET 1
$sql = "SELECT * FROM exam WHERE e_id='$ID1'";
//echo $sql;
$set = mysqli_query($db,$sql);
$set1 ="";
$paper1 ="";
$answer1 = "";
    
$set2 ="";
$paper2 ="";
$answer2 = "";
    
$comparedSet = "";

while($row1=mysqli_fetch_array($set))
{
    $title1 = $row1["title"];
    //echo '<h4 class="w3-center"><strong>'.$row1["title"].'</strong></h4>';
    $paper1 .= '<h1 class="w3-center"><strong>'.$row1["title"].'</strong></h1>';
    //echo $row['questions'];
    $q_list = explode(' ', $row1['questions']);
    //var_dump($q_list);
    for($i=0; $i<count($q_list); $i++)
    {
        $sql = "SELECT * FROM q_list where q_id='".$q_list[$i]."'";
        $result = mysqli_query($db, $sql);
        while($row2=mysqli_fetch_assoc($result))
        {
            //echo '<br>'.($i+1).'. '.$row2['question'].'<br>Ans: '.$row2['answer'].'<br>';
            $paper1.= '<br>'.($i+1).'. '.$row2['question'].'<br>';
            $answer1 .= '<br>'.($i+1).'. '.$row2['answer'].'<br>';
            $set1 .= $row2['question']." ";
        }
    }
    //echo $paper1."<BR>";
}

//ALL SET
if($_GET['id2'] == 'all'){
    
    $subj=$_GET['subject'];
    //echo "<BR>START HERE<BR>";
    $sql = "SELECT * FROM exam WHERE subject='".$subj."'";
    //clog($sql);
    $all = mysqli_query($db,$sql);

    while($row=mysqli_fetch_array($all)){
        $ID3 = $row['e_id'];
        //echo '<div class="w3-container w3-margin w3-border" style="height:20%;">';
        //echo $ID3."<BR>";
        //$paper2 .= "<h1 class='w3-center'><strong>".$row['title']."</strong></h1>";
        //echo "<h1 class='w3-center'><strong>".$row['title']."</strong></h1>";
        $sql = "SELECT * FROM exam WHERE e_id='$ID3'";
                //echo $sql;
        $set = mysqli_query($db,$sql);
        while($row1=mysqli_fetch_array($set)){
            //echo '<h1 class="w3-center><strong>'.$row1["title"].'</strong></h1><h3>Subject: '.$_GET['subject'].'</h3>';
            //echo $row['questions'];
            if($row1['title']==$title1){continue;}
            $paper2 .= "<h3 class='w3-center'><strong>".$row1['title']."</strong></h3>";
            $q_list = explode(' ', $row1['questions']);
            //var_dump($q_list);
            for($i=0; $i<count($q_list); $i++)
            {
                $sql = "SELECT * FROM q_list where q_id='".$q_list[$i]."'";
                $result = mysqli_query($db, $sql);
                while($row2=mysqli_fetch_assoc($result))
                {
                    //echo '<br>'.($i+1).'. '.$row2['question'].'<br>Ans: '.$row2['answer'].'<br>';
                    $paper2 .= '<br>'.($i+1).'. '.$row2['question'].'<br>';
                    $set2 .= $row2['question']." ";
                }
            }
        }
        //echo compareCount($db, $set1, $set2)."%";
        //echo $set2."<BR>";
        $comparedSet .= $set2."\n\r";
       // echo '</div>';
    }
    //echo $combinedSet;
    //echo compareCount($db, $set1, $combinedSet)."%";    
    
}

else{
    
    //SET 2
    $sql = "SELECT * FROM exam WHERE e_id='$ID2'";
    //echo $sql;
    $set = mysqli_query($db,$sql);
    //echo '<div class="w3-container w3-margin w3-border" style="height:20%;">';

    while($row1=mysqli_fetch_array($set)){
        
        $title2 = $row1["title"];
        $paper2 .= "<h1 class='w3-center'><strong>".$row1['title']."</strong></h1>";
        //echo "<h4 class='w3-center'><strong>".$row1['title'].":</strong></h4>";
        //echo '<h1 class="w3-center"><strong>'.$row1["title"].'</strong></h1><h3>Subject: '.$_GET['subject'].'</h3>';
        //echo $row['questions'];
        $q_list = explode(' ', $row1['questions']);
        //var_dump($q_list);
        for($i=0; $i<count($q_list); $i++)
        {
            $sql = "SELECT * FROM q_list where q_id='".$q_list[$i]."'";
            $result = mysqli_query($db, $sql);
            while($row2=mysqli_fetch_assoc($result))
            {
                //echo '<br>'.($i+1).'. '.$row2['question'].'<br>Ans: '.$row2['answer'].'<br>';
                $paper2 .= '<br>'.($i+1).'. '.$row2['question'].'<br>';
                $answer2 .= '<br>'.($i+1).'. '.$row2['answer'].'<br>';
                $set2 .= $row2['question']." ";
            }
        }
        //echo $paper2."<BR>";
    } 

//echo compareCount($db, $set1, $set2)."%";
//echo '</div>';
    $comparedSet = $set2;

} 
//COMPARISON LOGIC END 
    
?>       
    
<!-- CONTENT -->
    <div class="w3-container w3-center w3-margin w3-padding w3-border" style="width: 75%; position:relative; left: 12%; min-height:270px;">
        
        <div class='w3-gray w3-center w3-display-container w3-margin-bottom' style='height:120px;'>
        <div class="w3-display-middle w3-cell-row">    
            <div class="w3-cell w3-container"><label style='font-size:20px'><?php echo $title1 ?></label><br><button onclick="toggleLeft()">SHOW QUESTIONS</button></div>
            <div class='w3-cell w3-container'>
                <div ><a class="w3-text-black" href="showExam.php" title="Click to go to Exam List"><?php echo "<b id='similar' style='font-size:36px'>SIMILARITY: ".compareCount($db, $set1, $comparedSet)."%</b>";?></a></div>
            <input type="checkbox" id="include"/><label>Include Questions</label><br>
             <button onclick="printDiv()">PRINT REPORT</button>
            </div>
            <div class="w3-cell w3-container"><label style='font-size:20px'><?php echo $title2??'Compared with all set'; ?></label><br><button onclick="toggleRight();">SHOW QUESTIONS</button></div>
         </div>
         </div>
        
         <div>
             <div class="w3-display-container w3-border w3-left w3-left-align w3-padding" id="left" style="display:none; width:50%; height:90%; overflow-y:auto ">
                <?php 
                    //echo $paper1; 
                    echo highlight($paper1, removeCommonWords($comparedSet));
                    echo '<br><h5><b>Answer Section</b></h5>'.$answer1;
                 ?> 
            </div>

             <div class="w3-display-container w3-border w3-right w3-left-align w3-padding" id="right" style="display:none; width:47%; height:90%; overflow-y:auto">         
                 <?php 
                 echo highlight($paper2, removeCommonWords($set1));
                 echo '<br><h5><b>Answer Section</b></h5>'.$answer2 ??'No Answers';
                 //echo $paper2; ?> 
            </div>
        </div>
    </div>
    
   
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
    $date = date("l jS \of F Y h:i A");

$header= <<<HERE
<fieldset>
    <legend><h1>Similarity Result:</h1></legend>
      <label for="setA">Set A: </label><br><br>
      <label for="setB">Set B: </label><br><br>
      <label for="date">Processed on: $date</label><br><br>
      <label for="wordCount">Word Count: </label><br><br>
    </fieldset>
HERE;

?>

<script language="JavaScript"> 
    function printDiv() { 
            var divLeft = document.getElementById("left").innerHTML;
            var similarity = document.getElementById("similar").innerHTML; 
            var divRight = document.getElementById("right").innerHTML;

            //var a = window.open('', '', 'height=500, width=500'); 
            var a = window.open('', ''); 
            a.document.write('<html>'); 
            a.document.write('<body >');
            a.document.write('<fieldset><legend><h1>'+similarity+'</h1></legend>');
            a.document.write(' <label for="setA">Set A: <?php echo $title1; ?></label><br><br><label for="setB">Set B: <?php echo $title2??'Compared with all set'; ?></label><br><br>');
            //a.document.write('<BR><?php //echo "<h1><b>".$title1."</b> and <b>".$title2."</b></h1>"; ?>');
            a.document.write('<label for="date">Processed on: <?php echo $date; ?></label><br><br></fieldset>');
            a.document.write('<hr>');

            if(document.getElementById("include").checked == true)
            {
                a.document.write(divLeft);
                a.document.write('<p>- END OF QUESTION PAPER -</p><hr id="break" style="page-break-after: always;">');
                a.document.write(divRight); 
            }
            a.document.write('</body></html>'); 
            a.document.close(); //-->IE10 and above 
            a.print();
                //a.close();
            //a.focus();
        } 
    function toggleLeft() {
      var x = document.getElementById("left");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
   function toggleRight() {
      var x = document.getElementById("right");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
</script>
           
<!-- FOOTER -->
       <?php include('footer.html'); ?>
<!-- FOOTER END-->
    
    </body>
</html>
    
<?php
//function2

function highlight($text, $words) {
    preg_match_all('~\w+~', $words, $m);
    if(!$m)
        return $text;
    $re = '~\\b(' . implode('|', $m[0]) . ')\\b~i';
    return preg_replace($re, '<b>$0</b>', $text);
}

function compareCount($db, $set1, $set2){
    
    //LOGIC PROCESSING
    $query_raw = trim($set1, " ");
    //$query_raw = preg_replace("/[^a-zA-Z0-9.]/", " ", $query_raw);
    $query = mysqli_real_escape_string($db,$query_raw);
    $low_query =  strtolower($query);
    $low_query = removeCommonWords($low_query);
    //$querymain2 = explode(" ",$query_raw);
    //$query_ar = explode(" ", $low_query);
    $query_ar = array_values(array_unique(explode(" ", $low_query)));
    //$pat = $query;
    $pat_count = count($query_ar);
    
    $txt_raw = trim($set2," ");
    $txt = mysqli_real_escape_string($db,$txt_raw);
    $low_txt = strtolower($txt);
    $low_txt = removeCommonWords($low_txt);
    $txt_array = explode(" ", $low_txt);
    $txt_array = array_values(array_unique(explode(" ", $low_txt)));
    $txt_count = count($txt_array);
    
    //cLog(implode("||", $txt_array));
    //cLog($txt_count);

    //COunting Similarity
    
    $similarity = 0;
    $total_count = $txt_count + $pat_count;
    
    for($c=0; $c<count($query_ar); $c++)
    { 
        $counter = 0; 
        $pat = $query_ar[$c];
        //echo "<BR>".$pat.":<BR>";
        //$pat = stripslashes_deep($query_ar[$c]);

            for($txtno=0;$txtno<count($txt_array);$txtno++)
            {
                $t_txt = $txt_array[$txtno];
                //echo $t_txt." ";
                if(strlen($pat) == strlen($t_txt))
                {
                    $counter = $counter + KMPSearch($pat, $t_txt); 
                }
                 else
                {continue;}
            }
        //echo $counter;
        $similarity = $similarity + $counter;
        //cLog(($c+1).".".$pat);
    }
    //cLog($similarity."/((".$txt_count."+".$pat_count.")-".$similarity.")*100");
    
    $finalCount = ($similarity / $pat_count)*100;
  
     //$finalCount = ($similarity/ ($total_count-$similarity))*100;
    $finalCount = sprintf('%0.2f', $finalCount);
    cLog($similarity."/".$pat_count."*100 = ".$finalCount."%");
    
    //echo "Similarity Percentage: ".$finalCount."%</strong><br>";
    return $finalCount;
    //echo "Similarity(".$similarity.")/((txt".$txt_count."+pat".$pat_count.")-sim".$similarity.")=".$finalCount."%</strong><br>";
    
    //END OF LOGIC PROCESSING
}

function KMPSearch($pat, $txt) 
{ 
    $count = 0;
	$M = strlen($pat); 
	$N = strlen($txt); 
    $new = "";

	// create lps[] that will hold the Longest Prefix Suffix 
	// values for pattern 
	$lps=array_fill(0,$M,0); 

	// Preprocess the pattern (calculate lps[] array) 
	computeLPSArray($pat, $M, $lps); 

	$i = 0; // index for txt[] 
	$j = 0; // index for pat[] 
    
    
	while ($i < $N) { 
		if ($pat[$j] == $txt[$i]) { 
			$j++; 
			$i++;
		}

		if ($j == $M) { 
            
            for($w=($i-$j);$w<$i;$w++)
            {$new .= $txt[$w];}
            
            if(strlen($new) != $N)
            {break;}
            
            else
            {
			$j = $lps[$j - 1];
            cLog($pat.":".$txt);
             $count++;
            }
		} 
		// mismatch after j matches 
            if ($i < $N && $pat[$j] != $txt[$i]) { 
			// Do not match lps[0..lps[j-1]] characters, 
			// they will match anyway 
			if ($j != 0) 
            { $j = $lps[$j - 1];}
            	
			else 
            {  $i = $i + 1; }
        }
	} 
  return $count;
} 
  
// Fills lps[] for given patttern pat[0..M-1] 
function computeLPSArray($pat, $M, &$lps) 
{ 
    // length of the previous longest prefix suffix 
    $len = 0; 
  
    $lps[0] = 0; // lps[0] is always 0 
  
    // the loop calculates lps[i] for i = 1 to M-1 
    $i = 1; 
    while ($i < $M) { 
        if ($pat[$i] == $pat[$len]) { 
            $len++; 
            $lps[$i] = $len; 
            $i++; 
        } 
        else // (pat[i] != pat[len]) 
        { 
            // This is tricky. Consider the example. 
            // AAACAAAA and i = 7. The idea is similar 
            // to search step. 
            if ($len != 0) { 
                $len = $lps[$len - 1]; 
  
                // Also, note that we do not increment 
                // i here 
            } 
            else // if (len == 0) 
            { 
                $lps[$i] = 0; 
                $i++; 
            } 
        } 
    } 
} 

function cleanTEXT($text)
{
    
     $text =  trim(str_replace(array("\r\n", "\n", "\r",":",","), ' ', $text));
     $text = preg_replace('/\s+/', ' ', $text);
     $text = substr(json_encode((string)$text), 1, -1);
     $text = removeslashes($text);
     
    return $text;
}

function removeslashes($string)
{
    $string=implode("",explode("\\",$string));
    return stripslashes(trim($string));
}

function stripslashes_deep($value)
{
    $value = is_array($value) ?
                array_map('stripslashes_deep', $value) :
                stripslashes($value);

    return $value;
}


function removeCommonWords($input){
 
 	// EEEEEEK Stop words
	$stopwords = array("a", "about", "above", "above", "across", "after", "afterwards", "again", "against", "all", "almost", "alone", "along", "already", "also","although","always","am","among", "amongst", "amoungst", "amount",  "an", "and", "another", "any","anyhow","anyone","anything","anyway", "anywhere", "are", "around", "as",  "at", "back","be","became", "because","become","becomes", "becoming", "been", "before", "beforehand", "behind", "being", "below", "beside", "besides", "between", "beyond", "bill", "both", "bottom","but", "by", "call", "can", "cannot", "cant", "co", "con", "could", "couldnt", "cry", "de", "describe", "detail", "do", "done", "down", "due", "during", "each", "eg", "eight", "either", "eleven","else", "elsewhere", "empty", "enough", "etc", "even", "ever", "every", "everyone", "everything", "everywhere", "except", "few", "fifteen", "fify", "fill", "find", "fire", "first", "five", "for", "former", "formerly", "forty", "found", "four", "from", "front", "full", "further", "i", "get", "give", "go", "had", "has", "hasnt", "have", "he", "hence", "her", "here", "hereafter", "hereby", "herein", "hereupon", "hers", "herself", "him", "himself", "his", "how", "however", "hundred", "ie", "if", "in", "inc", "indeed", "interest", "into", "is", "it", "its", "itself", "keep", "last", "latter", "latterly", "least", "less", "ltd", "made", "many", "may", "me", "meanwhile", "might", "mill", "mine", "more", "moreover", "most", "mostly", "move", "much", "must", "my", "myself", "name", "namely", "neither", "never", "nevertheless", "next", "nine", "no", "nobody", "none", "noone", "nor", "not", "nothing", "now", "nowhere", "of", "off", "often", "on", "once", "one", "only", "onto", "or", "other", "others", "otherwise", "our", "ours", "ourselves", "out", "over", "own","part", "per", "perhaps", "please", "put", "rather", "re", "same", "see", "seem", "seemed", "seeming", "seems", "serious", "several", "she", "should", "show", "side", "since", "sincere", "six", "sixty", "so", "some", "somehow", "someone", "something", "sometime", "sometimes", "somewhere", "still", "such", "system", "take", "ten", "than", "that", "the", "their", "them", "themselves", "then", "thence", "there", "thereafter", "thereby", "therefore", "therein", "thereupon", "these", "they", "thick", "thin", "third", "this", "those", "though", "three", "through", "throughout", "thru", "thus", "to", "together", "too", "top", "toward", "towards", "twelve", "twenty", "two", "un", "under", "until", "up", "upon", "us", "very", "via", "was", "we", "well", "were", "what", "whatever", "when", "whence", "whenever", "where", "whereafter", "whereas", "whereby", "wherein", "whereupon", "wherever", "whether", "which", "while", "whither", "who", "whoever", "whole", "whom", "whose", "why", "will", "with", "within", "without", "would", "yet", "you", "your", "yours", "yourself", "yourselves", "the");
 
	
    $input = preg_replace('/\b('.implode('|',$stopwords).')\b/i','',$input);
   $input = trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $input)));
    //return preg_replace('/\b('.implode('|',$stopwords).')\b/i','',$input);
    return $input;
}
    ?>