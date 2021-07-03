
var myIndex = 0;

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}

function timedMsg(){var t=setTimeout("document.getElementById('myMsg').style.display='none';",2000);}

    
function check1(select) {
      otherInput = document.getElementById('otherSubject');
      if (select.options[select.selectedIndex].value == "Other") {
        otherInput.style.display = 'block';

      }
      else {
        otherInput.style.display = 'none';
      }
    }

function check2(select) {
      var otherInput2 = document.getElementById("lain2");
      if (select.options[select.selectedIndex].value == "Other") {
        otherInput2.style.display = 'block';

      }
      else {
        otherInput2.style.display = 'none';
      }
}
            
        
    /*
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    */
function deleteme(id, link){
    if(confirm("Do you want to delete"))
        {
        window.location.href='delete.php?q_id='+id+'&link='+link;
        return true;
        }
}

function deleteme2(id, link)
{
    if(confirm("Do you want to delete"))
    {
        window.location.href='examDelete.php?e_id='+id+'&link='+link;
        return true;
    }
}

function processForm(id, subj, ch){
    
    var string1 = "prob"+id;
    var string2 = "sol"+id;
    
    document.getElementById('newQuestion').style.display='block';
    document.getElementById('createBtn').style.display='none';
    document.getElementById('editBtn').style.display='block';
    //alert('id-'+id+' subject-'+subj+' chapter-'+ch);
    var inQuest = document.getElementById(string1).innerHTML;
    var question = document.getElementById("q");
    question.value =  inQuest;
    var inSol = document.getElementById(string2).innerHTML;
    var answer = document.getElementById("a");
    answer.value =  inSol;
    var outID = document.getElementById("hiddenId");
    outID.value = parseInt(id);
    var subject = document.getElementById("fluglehorn");
    subject.value = subj;
    var outch = document.getElementById("otherChapter");
    outch.value = parseInt(ch);
}

var examList = "";

function sendQuestion2(id){
        
        var ticked = document.getElementsByName('check_list2[]');
        var result = "";
        var divOutput = document.getElementById("q_list");
        
        for(var i=0; i<ticked.length; i++)
            {
                var currentoption = ticked[i];
                if(currentoption.checked == true)
                    {
                        result += ticked[i].value+" ";
                        //moveLeft(ticked[i].value);
                    }
            }
                divOutput.value = result;
}

function moveLeft(){
     clearTable();
    var questID = document.getElementById("q_list").value;
    var IDarray = questID.split(" ");
    var table = document.getElementById("selected");
   
    /*
    table.innerHTML = "";
    table.className +="w3-table w3-bordered w3-hoverable";
    var row = table.insertRow(-1);
    var headerCell1 = document.createElement("TH");
    headerCell1.innerHTML = "Questions";
    row.appendChild(headerCell1);
    var headerCell2 = document.createElement("TH");
    headerCell2.innerHTML = "Answer";
    row.appendChild(headerCell2);
    */
    var j;
    for(j=0;j<IDarray.length;j++){
        
        var str1 = "q"+IDarray[j];
        var str2 = "a"+IDarray[j];
        var q = document.getElementById(str1);
        var a = document.getElementById(str2);
        row = table.insertRow(-1);
        cell1 = row.insertCell(0);
        cell1.className += "tdStyle"; 
        cell2 = row.insertCell(1);
        cell2.className += "tdStyle";
        cell1.innerHTML = q.innerHTML;
        cell2.innerHTML = a.innerHTML;
    }
}

function sync(){
    var in1 = document.getElementById('in1').value;
    var in2 = document.getElementById('in2');
    in2.value = in1;
}

function validateForm() {
    var x = document.forms["myForm"]["theTitle"].value;
    var y = document.forms["myForm"]["qId"].value;
    
    if (x == "") {
        alert("Title must be filled out");
        return false;
    }
    else if(y == ""){
        alert("Choose the questions");
        return false;
        }
}

function clearAll() {
    clearTable();
    document.getElementById("q_list").value = "";
    var checkboxes = document.getElementsByClassName('foo');
    for(var i=0, n=checkboxes.length;i<n;i++) {
        checkboxes[i].checked = false;
      }
    }

function clearTable(){
    var table = document.getElementById("selected");
    var k;
    for(k=table.rows.length;k>1;k--){
        table.deleteRow(-1);
    } 
}