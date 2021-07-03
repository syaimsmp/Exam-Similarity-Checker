<!-- METHOD ONE 
<html>
    <script type="text/javascript">
    var canvas, ctx, flag = false,
        prevX = 0,
        currX = 0,
        prevY = 0,
        currY = 0,
        dot_flag = false;

    var x = "black",
        y = 2;
    
    function init() {
        canvas = document.getElementById('can');
        ctx = canvas.getContext("2d");
        w = canvas.width;
        h = canvas.height;
    
        canvas.addEventListener("mousemove", function (e) {
            findxy('move', e)
        }, false);
        canvas.addEventListener("mousedown", function (e) {
            findxy('down', e)
        }, false);
        canvas.addEventListener("mouseup", function (e) {
            findxy('up', e)
        }, false);
        canvas.addEventListener("mouseout", function (e) {
            findxy('out', e)
        }, false);
    }
    
    function color(obj) {
        switch (obj.id) {
            case "green":
                x = "green";
                break;
            case "blue":
                x = "blue";
                break;
            case "red":
                x = "red";
                break;
            case "yellow":
                x = "yellow";
                break;
            case "orange":
                x = "orange";
                break;
            case "black":
                x = "black";
                break;
            case "white":
                x = "white";
                break;
        }
        if (x == "white") y = 14;
        else y = 2;
    
    }
    
    function draw() {
        ctx.beginPath();
        ctx.moveTo(prevX, prevY);
        ctx.lineTo(currX, currY);
        ctx.strokeStyle = x;
        ctx.lineWidth = y;
        ctx.stroke();
        ctx.closePath();
    }
    
    function erase() {
        var m = confirm("Want to clear");
        if (m) {
            ctx.clearRect(0, 0, w, h);
            document.getElementById("canvasimg").style.display = "none";
        }
    }
    
    function save() {
        document.getElementById("canvasimg").style.border = "2px solid";
        var dataURL = canvas.toDataURL();
        document.getElementById("canvasimg").src = dataURL;
        document.getElementById("canvasimg").style.display = "inline";
    }
    
    function findxy(res, e) {
        if (res == 'down') {
            prevX = currX;
            prevY = currY;
            currX = e.clientX - canvas.offsetLeft;
            currY = e.clientY - canvas.offsetTop;
    
            flag = true;
            dot_flag = true;
            if (dot_flag) {
                ctx.beginPath();
                ctx.fillStyle = x;
                ctx.fillRect(currX, currY, 2, 2);
                ctx.closePath();
                dot_flag = false;
            }
        }
        if (res == 'up' || res == "out") {
            flag = false;
        }
        if (res == 'move') {
            if (flag) {
                prevX = currX;
                prevY = currY;
                currX = e.clientX - canvas.offsetLeft;
                currY = e.clientY - canvas.offsetTop;
                draw();
            }
        }
    }
    </script>
    <body onload="init()">
        <canvas id="can" width="400" height="400" style="position:absolute;top:10%;left:10%;border:2px solid;"></canvas>
        <div style="position:absolute;top:12%;left:43%;">Choose Color</div>
        <div style="position:absolute;top:15%;left:45%;width:10px;height:10px;background:green;" id="green" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:46%;width:10px;height:10px;background:blue;" id="blue" onclick="color(this)"></div>
        <div style="position:absolute;top:15%;left:47%;width:10px;height:10px;background:red;" id="red" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:45%;width:10px;height:10px;background:yellow;" id="yellow" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:46%;width:10px;height:10px;background:orange;" id="orange" onclick="color(this)"></div>
        <div style="position:absolute;top:17%;left:47%;width:10px;height:10px;background:black;" id="black" onclick="color(this)"></div>
        <div style="position:absolute;top:20%;left:43%;">Eraser</div>
        <div style="position:absolute;top:22%;left:45%;width:15px;height:15px;background:white;border:2px solid;" id="white" onclick="color(this)"></div>
        <img id="canvasimg" style="position:absolute;top:10%;left:52%;" style="display:none;">
        <input type="button" value="save" id="btn" size="30" onclick="save()" style="position:absolute;top:55%;left:10%;">
        <input type="button" value="clear" id="clr" size="23" onclick="erase()" style="position:absolute;top:55%;left:15%;">
    </body>
    </html>

-->

<!-- METHOD TWO -->

<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="UTF-8"> 
	<meta name="viewport" content= 
			"width=device-width, initial-scale=1.0"> 
	
	<title> 
		Draw with the mouse in a HTML5 canvas 
	</title> 
	
	<style> 
		* { 
			overflow: hidden; 
		} 
		body { 
			text-align: center; 
		} 
		h1 { 
			color: green; 
		} 
	</style> 
</head> 

<body> 
	<h1>GeeksforGeeks</h1> 
	<b>Draw anything you want</b> 
	<hr> 
	<canvas id="canvas"></canvas> 
	<script type="text/javascript">
    // wait for the content of the window element 
// to load, then performs the operations. 
// This is considered best practice. 
window.addEventListener('load', ()=>{ 
		
	resize(); // Resizes the canvas once the window loads 
	document.addEventListener('mousedown', startPainting); 
	document.addEventListener('mouseup', stopPainting); 
	document.addEventListener('mousemove', sketch); 
	window.addEventListener('resize', resize); 
}); 
	
const canvas = document.querySelector('#canvas'); 

// Context for the canvas for 2 dimensional operations 
const ctx = canvas.getContext('2d'); 
	
// Resizes the canvas to the available size of the window. 
function resize(){ 
ctx.canvas.width = window.innerWidth; 
ctx.canvas.height = window.innerHeight; 
} 
	
// Stores the initial position of the cursor 
let coord = {x:0 , y:0}; 

// This is the flag that we are going to use to 
// trigger drawing 
let paint = false; 
	
// Updates the coordianates of the cursor when 
// an event e is triggered to the coordinates where 
// the said event is triggered. 
function getPosition(event){ 
coord.x = event.clientX - canvas.offsetLeft; 
coord.y = event.clientY - canvas.offsetTop; 
} 

// The following functions toggle the flag to start 
// and stop drawing 
function startPainting(event){ 
paint = true; 
getPosition(event); 
} 
function stopPainting(){ 
paint = false; 
} 
	
function sketch(event){ 
if (!paint) return; 
ctx.beginPath(); 
	
ctx.lineWidth = 5; 

// Sets the end of the lines drawn 
// to a round shape. 
ctx.lineCap = 'round'; 
	
ctx.strokeStyle = 'green'; 
	
// The cursor to start drawing 
// moves to this coordinate 
ctx.moveTo(coord.x, coord.y); 

// The position of the cursor 
// gets updated as we move the 
// mouse around. 
getPosition(event); 

// A line is traced from start 
// coordinate to this coordinate 
ctx.lineTo(coord.x , coord.y); 
	
// Draws the line. 
ctx.stroke(); 
} 

    
    </script> 
</body> 

</html> 
