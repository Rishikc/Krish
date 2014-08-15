<?php session_start();
if($_SESSION['username']){
 ?>
<html>
<head>
<script>
function logout()
{
window.location.href='logout.php';

}
</script>
<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
<style>
.dis
{
	position:fixed;
min-height:100%;
min-width:100%;
text-align:left;

top:0;
left:0;
z-index:10;

background:#000000;
opacity: 0.7;
filter:alpha(opacity=70);
display:none;
}
.abook
{
	position:fixed;
height:75%;
width:45%;
text-align:left;
z-index:12;
left:30%;
top:10%;
background:#0e91a1;
display:none;
}
body
{
	font-family: 'Ubuntu', sans-serif;
}
.wrapper
{
	position:absolute;
min-height:100%;
min-width:100%;
text-align:left;
margin-left:-1%;
margin-right:-1%;
margin-top:-1%;
top:0;
left:0;
}
.mbar
{
	z-index:2;
position:fixed;
background: #0e91a1;
border-bottom: 1px solid #fff;
color: #fff;
width:100%;
height:13%;
top:0;
left:0;
}
.nside
{
	position:fixed;
	float:left;
	width:18%;
	height:102%;
	z-index:1;
	background:#c9c9c9;
}
.bbtn
{
	z-index:3;
	position: relative;
	
	line-height: 300%;
cursor:pointer;

width:10%;
height:60%;
color:#fff;
background: #146c78;
border-radius: 5%;
}
.clbtn
{
	position: absolute;
	background:#000;
	width:11%;
	height:5%;
	
	
	z-index:4;
}
.abtn
{
	position: absolute;
	background:#ff7519;
	width:55%;
	height:7%;
	left:25%;
	border-radius: 5%;
	color:#fff;
	text-align:center;
	cursor:pointer;
	line-height: 260%;
	top:60%
}
.abtn:hover
{
	background:#e66916;
	
	
	
}
.tag
{
position:absolute;
z-index:20;
width:50%;
height:30%;
left:30%;
top:76%;
overflow:scroll;
overflow-x:hidden;
background:#fff;
}

</style>
<script>
function setSelectionRange(input, selectionStart, selectionEnd) {
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  }
  else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}

function setCaretToPos (input, pos) {
  setSelectionRange(input, pos, pos);
}
var flag=0;
var k=0;
var j=0;
var dtag='';
var tgs=new Array();
function tdisplay()
{
	document.getElementById('tags').innerHTML='';
	for(j=0;j<=k;j++)
	document.getElementById('tags').innerHTML= document.getElementById('tags').innerHTML + "<div id=\"td"+j+"\" contenteditable='false' style='z-index:35;position:relative;display:inline-block;width:"+(tgs[j].length*6)+"%+5;height:45%;background:#00cccc;'>"+tgs[j]+"<img style='cursor:pointer;' src='cls.png' id='"+j+"' onclick='tgs.splice(Number(this.id),1);k--;document.getElementById(\"td"+j+"\").style.display=\"none\";tdisplay();'></div>  ";
   
}
function atag(ev)
{
	
	var kc=ev.which||ev.keyCode;
	if(kc==32)
	{
		if(dtag!='')
		{
		tgs[k]=dtag;
		tdisplay();
	   k++;	
	   dtag='';
	}
   } 
   else {
   	if((kc>=65 && kc<=90) ||(kc>=97 && kc<=122)||(kc>=48 && kc<=57))
   	dtag+=String.fromCharCode(kc);
   	
   	
   	
   }
	
}
</script>
</head>
<body >
<div class="dis" id="dis"  onclick="document.getElementById('tags').innerHTML='';tgs=[];k=0;j=0;document.getElementById('dis').style.display='none';document.getElementById('abook').style.display='none';">
</div>
<div class="wrapper">
<div class="pbar" id="pbar"  style="z-index:9;visibility:hidden;height:20%;width:20%;left:81%;position:absolute;top:12.5%"><ul style="margin-left:-16%;list-style: none;"><li onmouseover="this.style.background='#e6e6e6';" onmouseout="this.style.background='#ffffff';" style="cursor:pointer;border-style: solid;    border-width: 1px;position:relative;padding-top:7%;left:0;width:100%;height:30%;background:#fff;font-size:90%;"><center>Account Settings</li><li onmouseover="this.style.background='#e6e6e6';" onclick="logout()" onmouseout="this.style.background='#ffffff';" style="cursor:pointer;border-style: solid;    border-width: 1px;position:relative;padding-top:7%;text-align-center;left:0;width:100%;height:30%;background:#fff;font-size:90%;"><center>Logout</li></ul></div>
<div class="mbar">
<div class="bbtn" id="bprof" style="width:20%;left:80%;height:100%;line-height: 500%;background:#0e91a1;" onclick="if(flag==1){document.getElementById('pbar').style.visibility='hidden';flag=0;}else{document.getElementById('pbar').style.visibility='visible';flag=1;}" onmouseover="this.style.background='#146c78'" onmouseout="this.style.background='#0e91a1'"><center><img src="avatar.png" style="position:absolute;top:33%;left:5%;">  Hi, <?php echo $_SESSION['username']; ?> &#187;</div><div class="bbtn" onmouseover="this.style.background='#146c78'" onmouseout="this.style.background='#0e91a1'" onclick="window.location.href='search.php'" style="background:#0e91a1;left:60%;top:-80%"><center>Search</div></div>
<div class="nside">
<br><br><br><br><br>
<center><h3 style="color:#000;">Quick Tip</h3></center>
<table cellpadding="15%" cellspacing ="20%" style="width:100%;">
<tr><td><div class="clbtn" style="background:#d63333;"></div> </td><td style="padding-top:-20%;">Book Not Open</td></tr>
<tr><td><div class="clbtn" style="background:#ff8533;"></div></td><td>Available for Borrowing</td></tr>
<tr><td><div class="clbtn" style="background:#33ad33;"></div></td><td>  Available for Buying</td></tr>
</table>
<div class="abtn" onclick="document.getElementById('dis').style.display='block';document.getElementById('abook').style.display='block';"><center>+ Add Book</div>
</div>
<div class="abook" id="abook" style="color:#fff;">
<form method="post" action="addbook.php" >
<center><h2>Add A Book !</h2></center>
<hr></hr>
<center>
<table style="position:relative;width:100%;" cellpadding="20%">
<tr>
<td>Name Of the Book:</td><td><input type="text" placeholder="Book Name" name="book" style="position:absolute;width:50%;height:15%;left:30%;top:10%"/></td>
</tr>
<tr><td>Author:</td><td><input type="text" placeholder="Author" name="author" style="position:absolute;width:50%;height:15%;left:30%;top:43%"/></td>
</tr>
<tr><td>Tags:</td><td><div class="tag" contenteditable="true" id="tags" onkeyup="atag(event)" onfocus="setCaretToPos(this,0)">

<script>

</script>
</div></td></tr><tr>
<td style="position:absolute;top:110%%;">Pictures:</td><td style="position:absolute;top:110%;left:27%;"><input type="file"  name="file1"><input type="file" name="file2"><input type="file" name="file3"></td>
</tr>

</table>
<input type="hidden" name="btag" id="btag" value=""/>
<center><input type="submit"  value="Add" onclick="var tempt='';document.getElementById('btag').value='';if(tgs.length>0){for(var z=0;z<tgs.length;z++){tempt+=tgs[z]+',';}document.getElementById('btag').value+=tempt;}else{document.getElementById('btag').value='';}alert(document.getElementById('btag').value+tgs.length);" style='position:absolute;top:90%;cursor:pointer;' />
</form>
</div>
<table style="width:100%;top:60%;left:70%"><script>
var j=20;
var l=1;
for(var i=0;i<20;i++)
{
	if(i%4==0 && i==0)
	document.write("<tr>");
	else if(i%4==0 && i!=0){
		document.write("</tr>");
		document.write("<tr>");
		j+=50;
		l=1;
		
	}
	document.write("<td>");
	document.write("<div style='position:absolute;left:"+20*(l)+"%;top:"+j+"%;height:45%;width:13%;background:#000000;'></div>")
	/*div[i].style.height="30%";
	div[i].style.width="10%";
	div[i].style.background="#000000";*/
	document.write("</td>");
	
	l++;
}
</script>
</tr>


</table>

<?php
}
else
echo '<script>window.location.href="home.html";</script>';
?>
</div>
</body>
</html>


