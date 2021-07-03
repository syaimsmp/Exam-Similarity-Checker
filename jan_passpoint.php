<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    
<body>
    
    <img class="mySlides" src="image/file.png" width="500" height="500" onClick="trigger(event, '1','satu')" />
               
    <input id="user1" type="text" name="user1" class="userIn" />
    
    <input type="button" class="btn btn-primary" onclick="check()" value="Submit" name="submit" />
    
    <!-- DB: 480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562 -->
    <!-- Us: 656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411 -->
<script src="passpoint04022021.js"></script>
<script type="text/javascript">

var db =   "480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562";
var user = "656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411";
    
var db1 =   "480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562";
var user1 = "529,586 746,562 857,507 821,417 925,355 732,470 588,551 655,512";
         
getPoints(db, user);

function getPoints(dbStr, userStr){
    var dbx = [];
    var dby = [];
    var x = [];
    var y = [];
    var tol =100;
    var ilist = [];
    var jlist = [];
    var finalAns = [];
    var isignal = false;
    var possibility = [];
    
    //Database Coordinate
    var rawdbCoord = dbStr;
    var dbCoord = rawdbCoord.trim();
    dbCoord = dbCoord.split(" ");   //Separate coordinate based on space

    //Input Coordinate
    var rawCoord = userStr;
    rawCoord = rawCoord.trim(rawCoord);
    var Coord = rawCoord.split(" ");    //Separate coordinate based on space
    
    var loop =0;
    while(loop != Coord.length){
        //console.log('NEW LOOP');
        var smallPair =[];
        for(var i=0;i<Coord.length;i++){
            
            var tempj =undefined;
            var isignal = false;
            
            for(var k=0;k<jlist.length;k++){
                if(i == ilist[k]){isignal=true;}
            }
            
            if(isignal){continue;}    
            var counter = 0;
            var shortest = undefined;
            var jcontainer = [];

            var point = Coord[i].split(",");
            //console.log(point);
            x[i] =  parseInt(point[0]);
            y[i] =  parseInt(point[1]);

            for(var j=0;j<dbCoord.length;j++){

                var jsignal = false;
                
                for(var k=0;k<jlist.length;k++){
                    if(j == jlist[k]){jsignal=true;}
                }
                if(jsignal){continue;}
                
                var sample = dbCoord[j].split(",");
                dbx[j] =  parseInt(sample[0]);
                dby[j] =  parseInt(sample[1]);

                if(!(x[i]<(dbx[j]-tol)||x[i]>(dbx[j]+tol)||y[i]<(dby[j]-tol)||y[i]>(dby[j]+tol))){
                    //Calculating Distance
                    var a = x[i] - dbx[j];
                    a = Math.abs(a);
                    var b = y[i] - dby[j];
                    b = Math.abs(b);
                    var dist = parseInt(Math.sqrt(a*a+b*b));

                    if(typeof shortest === 'undefined' || dist<shortest){
                        shortest = dist;
                        var temp = sample;
                        tempj = j;
                        //console.log("j"+j+": "+shortest);
                    }
                    //console.log("j"+j+": Coord:"+sample+" || distance:"+dist+" || shortest:"+shortest);
                    counter++;
                    jcontainer.push(j);
                }
            }
            //console.log("i"+i+": "+point+" has "+counter+" candidates with "+temp+" has the smallest distance: "+shortest+" at i"+i+",j"+tempj);
            smallPair.push([i,tempj,shortest, point, temp]);
            if(loop == 0){
            possibility.push(jcontainer);
            }
        }
    finalAns.push([smallPair[0][0],smallPair[0][1]]);   //send i and j
    ilist.push(smallPair[0][0]);                        //Insert i to be skipped
    jlist.push(smallPair[0][1]);                        //Insert j to be skipped
    smallPair.shift();
    loop++;
    }
    
    console.log(possibility.length);
    console.log(checkPairings(possibility));    //Function to check if the points can be paired
}

function checkPairings(params) {
    
    var items = params;
    for(var i=0;i<items.length;i++){
        if(items[i].length == 1){        //If the possibility is 1, remove it immediately
            remover(items, items[i][0]); 
            items.splice(i, 1);
            i=-1;   //Reset i 
        }
        else if(items[i].length == 2){ 
            var x = pairSearch(items);  //Find the pair and put it into array x
            if(x.length>0){             //Remove both from the content and the index
            remover(items, items[x[0]][0]); 
            remover(items, items[x[0]][0]);
            items.splice(x[0], 1);
            items.splice(x[1]-1, 1);
            i=-1;   
            }
        }
    }
    return items.length;        //Return the length of the final Array
}          
    

function sortIt(arr){
    arr.sort(function(a, b){
      // ASC  -> a.length - b.length
      // DESC -> b.length - a.length
      return a.length - b.length;
    });
}
    
function showArray(arr){
    for(var i=0;i<arr.length;i++){
        console.log(i+': '+arr[i]);
    }
}
    
function remover(arr, del){
    for(var i=0;i<arr.length;i++){
        for(var j=0;j<arr[i].length;j++){
            if(arr[i][j]==del){arr[i].splice(j,1);}
        }
    }
}
    
function pairSearch(arr){
    var counter=0;
    var temp = [];
    for(var i=0;i<arr.length;i++){
        if(i == skip){continue;}
        //console.log(container[i][1]);
        for(var j=0;j<arr.length;j++){
            if(i==j){continue;}
            if(arr[i][0] == arr[j][0] && arr[i][1] == arr[j][1]){
                //console.log(i+" and "+j);
                temp.push(i, j);
                counter++;
                var skip = j;
            }
        }
    }
    return temp;
}
    
    
//sort by distance
function sortFunction(a, b) {
    if (a[2] === b[2]) {
        return 0;
    }
    else {
        return (a[2] < b[2]) ? -1 : 1;
    }
}
//sort by number of j
function sortFunction2(a, b) {
    if (a[3] === b[3]) {
        return 0;
    }
    else {
        return (a[3] < b[3]) ? -1 : 1;
    }
}
    
//console.log(deleteElement("SYED MUHD IBRAHIM BIN SYED MIHD FUAD", "SYED"));
function deleteElement(txt, del) {
    var str = txt.trim();
    var arr = str.split(" ");   //Separate coordinate based on space

   for( var i = 0; i < arr.length; i++){ 
        if (arr[i] == del) { 
            arr.splice(i, 1); 
        }
   }
    return arr.join(' ');
}
    
//test();

function test(){
    //var container = [];
    var items = [
      [2, 3, 7],
      [1, 2, 3],
      [0, 1, 2],
      [3, 4, 6, 7],
      [3, 6, 7],
      [4, 6],
      [5],
      [4, 5, 6],
    ];
    
    //sortIt(items);
    //showArray(items);
    //for(var loop=0;loop<items.length;loop++){
    //var num = parseInt(prompt("Current length:"+items.length));
    console.log('it begins');
    for(var i=0;i<items.length;i++){
        //console.log("i: "+i+" len: "+items.length);
        
        //showArray(items);
        //container.push([]);
        /*Remove one element from all*/
        if(items[i].length == 1){
            //container.push(items[i][0]);
            remover(items, items[i][0]);
            items.splice(i, 1);
            //sortIt(items);
            //console.log('Remove one');
            i=-1;
            //break;
        }
        else if(items[i].length == 2){ 
            //container.push(items[i][0], items[i][1]);
            //console.log(pairSearch(items));
            //console.log('items here');
            //showArray(items);
            //console.log('items end');
            var x = pairSearch(items);
            if(x.length>0){
            //showArray(x);
            //console.log("i: "+i+" x[0]: "+x[0]);
            remover(items, items[x[0]][0]);
            remover(items, items[x[0]][0]);
            //console.log(items[x[1]]);
            items.splice(x[0], 1);
            items.splice(x[1]-1, 1);
            //remover(items, x[0]);
            i=-1;   
            //console.log('Remove two');
            }
        }
    }
    //console.log('it ends');
    //showArray(items);
    //return items;
}



/*
var a = x1 - x2;
var b = y1 - y2;
var c = Math.sqrt( a*a + b*b );
*/

</script>
        
</body>
</html>

<!-- STAGE 2
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    
<body>
    <!-- DB: 480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562 -->
    <!-- Us: 656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411 -->
    
<!--
<script src="passpoint.js"></script>
<script type="text/javascript">

var db =   "480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562";
var user = "656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411";
    
var db1 =   "480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562";
var user1 = "529,586 746,562 857,507 821,417 925,355 732,470 588,551 655,512";

getPoints(db, user);
    
//test();      
//var x = getPoints(db, user);
//call_me(x);

function call_me(params) {
  /*
    for (i=0; i<params.length; i++) {
    //console.log(params[i][0]+","+params[i][1]);
      //console.log(params);
  } 
  */
    console.log(params);
}

function test(){
    
    var array = [];
    
    for(var i=0; i<4;i++){
         array.push([]);
        for(var j=0;j<4;j++){
            array[i].push(j);
        }
    }
    
    console.log(array);
/*
var r = 3; //start from rows 3
var myArray = [];
var rows = 8;
var cols = 7;

// expand to have the correct amount or rows
for( var i=r; i<rows; i++ ) {
  myArray.push( [] );
}

// expand all rows to have the correct amount of cols
for (var i = 0; i < rows; i++)
{
    myArray.push( [] );
    for (var j =  myArray[i].length; j < cols; j++)
    {
        myArray[i].push(0);
    }
}
*/
}

function getPoints(dbStr, userStr){
    var dbx = [];
    var dby = [];
    var x = [];
    var y = [];
    var tol =100;
    var ilist = [];
    var jlist = [];
    var finalAns = [];
    var isignal = false;
    var possibility = [];
    
    //Database Coordinate
    var rawdbCoord = dbStr;
    var dbCoord = rawdbCoord.trim();
    dbCoord = dbCoord.split(" ");   //Separate coordinate based on space

    //Input Coordinate
    var rawCoord = userStr;
    rawCoord = rawCoord.trim(rawCoord);
    var Coord = rawCoord.split(" ");    //Separate coordinate based on space

    //console.log(ilist);
    //console.log(jlist);
    
    var loop =0;
    while(loop != Coord.length){
        //console.log('NEW LOOP');
        var smallPair =[];
        possibility.push([]);
        
        for(var i=0;i<Coord.length;i++){
            
            var tempj =undefined;
            var isignal = false;
            for(var k=0;k<jlist.length;k++){
                if(i == ilist[k]){
                    //console.log('ENTER HERE');
                    isignal=true;   
                }
            }
            if(isignal){
                //console.log("i:"+i+" skipped");
                continue;
            }    
        var counter = 0;
        var shortest = undefined;
        var jcontainer = [];
            
        var point = Coord[i].split(",");
        //console.log(point);
        x[i] =  parseInt(point[0]);
        y[i] =  parseInt(point[1]);
            

        //console.log("i"+i+": "+point);
        for(var j=0;j<dbCoord.length;j++){
            
            var jsignal = false;
            //var tempj;
            
            for(var k=0;k<jlist.length;k++){
                if(j == jlist[k]){
                    //console.log('ENTER HERE');
                    jsignal=true;   
                }
            }
            if(jsignal){
                //console.log("j:"+j+" skipped");
                continue;
            }
            //console.log("j:"+j);
            //for database point
            var sample = dbCoord[j].split(",");
            //console.log('db,j'+j);
            //console.log(sample);
            dbx[j] =  parseInt(sample[0]);
            dby[j] =  parseInt(sample[1]);

            if(!(x[i]<(dbx[j]-tol)||x[i]>(dbx[j]+tol)||y[i]<(dby[j]-tol)||y[i]>(dby[j]+tol))){
                //console.log(sample+' - IN');
                
                //Calculating Distance
                var a = x[i] - dbx[j];
                a = Math.abs(a);
                var b = y[i] - dby[j];
                b = Math.abs(b);
                var dist = parseInt(Math.sqrt(a*a+b*b));

                if(typeof shortest === 'undefined' || dist<shortest){
                    shortest = dist;
                    var temp = sample;
                    tempj = j;
                    //console.log("j"+j+": "+shortest);
                }
                //console.log("j"+j+": Coord:"+sample+" || distance:"+dist+" || shortest:"+shortest);
                //skip.push(shortest);    //put the distances in array
                counter++;
                jcontainer.push(j);
                //console.log("possibility["+i+"]:"+possibility[i]);
            }
         }
        //find the smallest distance before insert to array
        //var min = Math.min.apply(Math, skip);
        //console.log(min);    
        //console.log(filteredJ[i]);
        //console.log("i"+i+": "+point+" has "+counter+" candidates with "+temp+" has the smallest distance: "+shortest+" at i"+i+",j"+tempj);
        smallPair.push([i,tempj,shortest, point, temp]);
        possibility[loop].push(jcontainer);
        //console.log("smallPairlen: "+smallPair.length);
        
    }
    
    smallPair.sort(sortFunction);
    finalAns.push([smallPair[0][0],smallPair[0][1]]);
    ilist.push(smallPair[0][0]);
    jlist.push(smallPair[0][1]);
    smallPair.shift();

    //i2skip.push(smallPair[0][0]);
    //j2skip.push(smallPair[0][1]);

    //console.log("To be removed: "+smallPair[0][0]+","+smallPair[0][1]);
   /*
    dbString = deleteElement(rawdbCoord, smallPair[0][4]);
    userString = deleteElement(rawCoord,smallPair[0][3]);
    console.log(rawdbCoord);
    console.log(rawCoord);
    */
    //console.log("ilist: "+ilist);
    //console.log("jlist: "+jlist);
    loop++;
    }
    
    //console.log(possibility[0]);
    
    for(var l=0;l<finalAns.length;l++){
        finalAns[l].push(possibility[0][finalAns[l][0]]);
        //console.log(finalAns[l][0]+","+finalAns[l][1]);
    }

    //finalAns[0].push(possibility[0][2]);
    //return possibility[0];
    
    console.log(finalAns);
     
}

function sortFunction(a, b) {
    if (a[2] === b[2]) {
        return 0;
    }
    else {
        return (a[2] < b[2]) ? -1 : 1;
    }
}
    
//console.log(deleteElement("SYED MUHD IBRAHIM BIN SYED MIHD FUAD", "SYED"));
    
function deleteElement(txt, del) {
    var str = txt.trim();
    var arr = str.split(" ");   //Separate coordinate based on space

   for( var i = 0; i < arr.length; i++){ 
       
        if (arr[i] == del) { 
            arr.splice(i, 1); 
        }
   }
    return arr.join(' ');
}

/*
var a = x1 - x2;
var b = y1 - y2;
var c = Math.sqrt( a*a + b*b );
*/

</script>
        
</body>
</html>
STAGE 2 ENDS-->

<!-- STAGE 1
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
        div.clickEffect{
        position:fixed;
        box-sizing:border-box;
        border-style:solid;
        border-color:#000000;
        border-radius:50%;
        animation:clickEffect 0.4s ease-out;
        z-index:99999;
        }
        @keyframes clickEffect{
            0%{
                opacity:1;
                width:0.5em; height:0.5em;
                margin:-0.25em;
                border-width:0.5rem;
            }
            100%{
                opacity:0.2;
                width:15em; height:15em;
                margin:-7.5em;
                border-width:0.03rem;
            }
        }

    </style>
</head>
    
<body>
    <!-- DB: 480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562 -->
    <!-- Us: 656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411 -->
<!--    
    <form name="myForm" method="post">
        <div id="pointerr" style="height: 100%">
            <div>
            <img class="mySlides" src="image/file.png" width="500" height="500" onClick="trigger(event, 1)" />
            <input class="w3-input" id="user1" type="text" name="user1" class="userIn" />
            <input type="button" class="btn btn-primary" value="Submit" name="submit" onclick="check()" />
            </div>
        </div>
        </form>

-->
<!-- 
    <div class="w3-display-container w3-red" style="width:100%; height:200px">
    <table class="w3-table w3-display-middle" border="1">
    <thead></thead>   
    <tbody>
    <tr class="w3-yellow">
        <th>DB:</th>
        <td>480,588</td>
        <td>542,550</td>
        <td>608,509</td>
        <td>685,464</td>
        <td>774,412</td>
        <td>879,351</td>
        <td>10,503</td>
        <td>699,562</td>
    </tr>    
    <tr class="w3-light-gray">
        <th>USER:</th>
        <td>656,510</td>
        <td>588,550</td>
        <td>527,583</td>
        <td>733,463</td>
        <td>748,560</td>
        <td>858,500</td>
        <td>925,349</td>
        <td>822,411</td>
    </tr>    
    </tbody>
        
    </table>
    <div class="w3-display-bottommiddle">
        <button type="button" onclick="check('480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562','656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411')">CLICK ME!!!</button>
    <button onclick="calculateDistance()" type="button">CLICK ME 2!!!</button>

    </div>
    
    </div>
    
-->
  <!--  
<script src="passpoint.js"></script>
<script type="text/javascript">
function calculateDistance(){
    var dbx = [];
    var dby = [];
    var x = [];
    var y = [];
    var tol =100;
    var lowestDist = undefined;
    var iList = [];
    var jList = [];
    var container = [];
    var smallPair =[];
    

    //Database Coordinate
    var rawdbCoord = "480,588 542,550 608,509 685,464 774,412 879,351 810,503 699,562";
    var dbCoord = rawdbCoord.trim();
    dbCoord = dbCoord.split(" ");   //Separate coordinate based on space

    //Input Coordinate
    var rawCoord = "656,510 588,550 527,583 733,463 748,560 858,500 925,349 822,411";
    rawCoord = rawCoord.trim(rawCoord);
    var Coord = rawCoord.split(" ");    //Separate coordinate based on space

    for(var i=0;i<Coord.length;i++){
        var skip = [];
        var counter = 0;
        var shortest = undefined;
        
        var point = Coord[i].split(",");
        //console.log(point);
        x[i] =  parseInt(point[0]);
        y[i] =  parseInt(point[1]);

        //console.log("i"+i+": "+point);
        for(var j=0;j<dbCoord.length;j++){
            //console.log("j:"+j);
            //for database point
            var sample = dbCoord[j].split(",");
            //console.log('db,j'+j);
            //console.log(sample);
            dbx[j] =  parseInt(sample[0]);
            dby[j] =  parseInt(sample[1]);

            if(!(x[i]<(dbx[j]-tol)||x[i]>(dbx[j]+tol)||y[i]<(dby[j]-tol)||y[i]>(dby[j]+tol))){
                //console.log(sample+' - IN');

                //Calculating Distance
                var a = x[i] - dbx[j];
                a = Math.abs(a);
                var b = y[i] - dby[j];
                b = Math.abs(b);
                var dist = parseInt(Math.sqrt(a*a+b*b));
                
                if(typeof shortest === 'undefined' || dist<shortest){
                    shortest = dist;
                    var temp = sample;
                    var tempj = j;
                    //console.log("j"+j+": "+shortest);
                }
                //console.log("j"+j+": Coord:"+sample+" || distance:"+dist+" || shortest:"+shortest);
                //skip.push(shortest);    //put the distances in array
                counter++;                
            }
        }
        //find the smallest distance before insert to array
        //var min = Math.min.apply(Math, skip);
        //console.log(min);    
        //console.log(filteredJ[i]);
        console.log("i"+i+": "+point+" has "+counter+" candidates with "+temp+" has the smallest distance: "+shortest+" at i"+i+",j"+tempj);
        smallPair.push([i,tempj,shortest]);
        
        if(typeof lowestDist === 'undefined' || shortest<lowestDist){
        lowestDist = shortest;
        //iList =;
        }
    }
    
    console.log("shortest : "+lowestDist);
    
    for(var l=0;l<smallPair.length;l++){
        console.log(smallPair[l][0]+","+smallPair[l][1]+","+smallPair[l][2]);
    }
    
    smallPair.sort(sortFunction);
    
    console.log("The new One");
    for(var l=0;l<smallPair.length;l++){
        console.log(smallPair[l][0]+","+smallPair[l][1]+","+smallPair[l][2]);
    }
}

function sortFunction(a, b) {
    if (a[2] === b[2]) {
        return 0;
    }
    else {
        return (a[2] < b[2]) ? -1 : 1;
    }
}

/*
var a = x1 - x2;
var b = y1 - y2;
var c = Math.sqrt( a*a + b*b );
*/

</script>
        
</body>
</html>

STAGE 1 ENDS-->