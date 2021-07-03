<?php
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$age = $_POST['age'];
	$status = $_POST['student'];
	$course = $_POST['course'];
	
	echo $name."<br>";
	echo $age."<br>";
	echo $status."<br>";
	
	foreach($course as $keys){
		echo $keys." ";
	}
	echo "<br>";
}

print <<<HERE

HERE;

?>

<!DOCTYPE HTML>
<html>
<head>
    <title> Attack Testing </title>
    <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>
<body>

<form method="post" action="#">
	<input type="text" name="name" />
	<input type="number" name="age" min="1" />
	<select name="student" required>
		<optgroup label="Choose Course">
			<option value="full">Full Time</option>
			<option value="part">Part Time</option>
		</optgroup>
	</select>
	
	<select name="course[]" required multiple>
		<optgroup label="Choose Course">
			<option value="english">English</option>
			<option value="math">Mathematics</option>
			<option value="physics">Physics</option>
			<option value="bio">Biology</option>
		</optgroup>
	</select>
	<Button type="submit" name="submit">Confirm</Button>
</form>

<script>
/*
Task #2:

Given the following data:

[
	{code: ‘10001’, amount: ‘’},
	{code: ‘10002’, amount: ’50.00’},
	{code: ‘10003’, amount: ’30.00’},
	{code: ‘10004’, amount: ’30.00’},
	{code: ‘10008’, amount: ’30.00’},
	{code: ‘10002’, amount: ’20.00’},
	{code: ‘’, amount: ’60.00’},
	{code: ‘10009’, amount: ’30.00’},
]

Using Javascript, write a program to validate the above data. Display all the errors found based on the following rules:

1.	‘code’ must not be empty if there is an amount
2.	Total amount must not be more than 100.00
3.	‘code’ must be unique
*/

var error = "";


var x = [
	{code: '10001', amount: ''},
	{code: '10002', amount: '50.00'},
	{code: '10003', amount: '30.00'},
	{code: '10004', amount: '30.00'},
	{code: '10008', amount: '30.00'},
	{code: '10002', amount: '20.00'},
	{code: '', amount: '60.00'},
	{code: '10009', amount: '30.00'},
];

var sum = 0;
sum= parseInt(sum);
//console.log(x[0].code);

	for(var i=0; i<x.length;i++){
		
		if(x[i].amount!= ''){
			var val = parseInt(x[i].amount);
			sum += val;
		}
		//console.log(val+" Sum: "+sum);
		
		if(x[i].code=='' && x[i].amount != ''){error += "Index "+i+" has empty value and amount not empty\n\r";}
		
		for(var j=0;j<x.length;j++){
			if(i==j){continue;}
			if(x[i].code == x[j].code){
				error += "Same code at index "+i+" and "+j+"\n\r";
			}
		}
	}
	
	if(sum >100){error += "Total amount exceed 100.00"};
	
	console.log(error);

</script>


</body>

</html>