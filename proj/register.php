<?php 
include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
include "database.php";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <title>sign up</title>
  
  <link id="data-uikit-theme" rel="stylesheet" href="css/uikit.docs.min.css">
        <link rel="stylesheet" href="css/docs.css">
        <link rel="stylesheet" href="../vendor/highlight/highlight.css">
   
        <script src="vendor/jquery.js"></script>
        <script src="dist/js/uikit.min.js"></script>
        <script src="vendor/highlight/highlight.js"></script>
        <script src="js/docs.js"></script>

  
<script LANGUAGE="JavaScript">
var h=0;
function req(x,y,z){
if(x.value==0||x.value=='select'){
y.innerHTML="*"+z+" required";
h++;
}
else
{
y.innerHTML="";
h--;
}
}
function tex(x,y){
c=x.indexOf('1');
if(c==-1){
c=x.indexOf('2');
}
if(c==-1){
c=x.indexOf('3');
}
if(c==-1){
c=x.indexOf('4');
}
if(c==-1){
c=x.indexOf('5');
}
if(c==-1){
c=x.indexOf('6');
}
if(c==-1){
c=x.indexOf('7');
}
if(c==-1){
c=x.indexOf('8');
}
if(c==-1){
c=x.indexOf('9');
}
if(c==-1){
c=x.indexOf('0');
}
if(c!=-1)
{y.innerHTML="text only";
}
else
y.innerHTML="";
}
function toUpper(x,y)
{
var q=x.length;
x=x.substring(0,1).toUpperCase()+x.substring(1,q);
y.value=x;
}
function emailval(x,y){
var at=x.indexOf("@");
var dot=x.indexOf(".");
if(at<1||dot<at+2||dot+2>=x.length){
y.innerHTML="invalid email format-enter as text@server.com/org etc";
}
else y.innerHTML="";
}

function passwordeval(x,y){
if(x.length==0)
y.innerHTML="password required";
else if(x.length<6)
{
y.innerHTML="password too short";
}
else
y.innerHTML="";
}
function passwordcheck()
{
if(retypepassword.value!=password.value)
retypepassword1.innerHTML="passwords does not match";
else
retypepassword1.innerHTML="";
}
function mobilenumber()
{
if(number.value.length<10)
mob.innerHTML="enter a valid mobile number";
else
mob.innerHTML="";
}
</script>
</head>
<body class="tm-navbar uk-navbar uk-navbar-attached">
<p><span style="color:white">fill the form to sign up</p>
<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table>
  <tr>
  <td><label for="firstname"><span style="color:red">*</span><span style="color:white">Name:</label></td>
  <td><input type="text"  onkeyup="tex(this.value,first)" onblur="toUpper(this.value,this)" id="firstname" name="firstname" /></td>
  </tr>
  <tr><td></td><td id="first" style="color:red" ></td></tr>
  <tr>
  <td><label for="rollnumber"><span style="color:red">*</span><span style="color:white">rollnumber:</label></td>
  <td><input type="text" id="rollnumber" name="rollnumber" onfocus="req(firstname,first,'firstname')"/></td>
  </tr><tr><td></td><td id="roll" style="color:red" ></td></tr><tr>
  <td><label for="email"><span style="color:red">*</span><span style="color:white">email address:</label></td>
  <td><input type="text" onblur="emailval(this.value,email_id)" onfocus="req(rollnumber,roll,'rollnumber')" id="email" name="email" /></td>
  </tr><tr><td></td><td id="email_id" style="color:red" ></td></tr>
  <tr>
  <td><label for="gender"><span style="color:red">*</span><span style="color:white">gender:</label></td>
  <td><input id="gender" onfocus="req(dob,dob1,'date of birth')" name="gender" type="radio" value="male" /><span style="color:white">male
  <input id="gender" name="gender" type="radio" value="female" /><span style="color:white">female 
  <input id="gender" name="gender" type="radio" value="others" /><span style="color:white">others </td>
  </tr><tr><td></td><td id="g" style="color:red" ></td></tr><tr>
  <td><label for="password"><span style="color:red">*</span><span style="color:white">Password:</label></td>
  <td><input type="password" onkeyup="passwordeval(this.value,password1)" onfocus="req(gender,g,'gender') " id="password" name="password" /></td>
  </tr><tr><td></td><td id="password1" style="color:red" ></td></tr><tr>
  <td><label for="retypepassword"><span style="color:red">*</span><span style="color:white">Re enter password:</label></td>
  <td><input type="password" onkeyup="passwordcheck()" id="retypepassword" name="retypepassword" /></td>
  </tr><tr><td></td><td id="retypepassword1" style="color:red" ></td></tr><tr>
  <td><label for="department"><span style="color:red">*</span><span style="color:white">Department:</label></td>
  <td><select id="department" onfocus="req(retypepassword,retypepassword1,'re-enter password')" name="department">
  <option>select</option>
  <option >Civil</option>
  <option >Computer science</option>
  <option >Electrical and Electronics</option>
  <option >metallurgy</option>
  <option >Production</option>
  <option >Mechanical</option>
  <option >Electronics and Communication</option>
  <option >Instrumentation and communication</option>
  <option >Chemical</option>
  <option >Architecture</option>
  </select></td>
  </tr><tr><td></td><td id="depa" style="color:red" ></td></tr>
  <tr><td><label for="number"><span style="color:white">Mobile Number:</label></td>
  <td><input type="number" id="number" name="number" onfocus="req(department,depa,'department')" onblur="mobilenumber()"; /></td>
  </tr>
  <tr><td></td><td id="mob" style="color:red" ></td></tr>
  <tr><td>
  <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Show Another Image ]</a>
 </td>
 <td>
 <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
 </td>
 </tr>
 <tr>
 <td></td>
 <td>
 <input type="text" name="captcha_code" size="20" maxlength="6" />
 </td>
 </tr>
  </table>
  <span style="color:black"><input type="submit" value="submit" name="submit" /> 
  
  <?php  
 
  @$firstname = $_POST['firstname'];
  @$rollnumber=$_POST['rollnumber'];
  @$email = $_POST['email'];
  @$gender = $_POST['gender'];
  @$password1 = $_POST['password'];
  @$password2 = $_POST['retypepassword'];
  @$number=$_POST['number'];
  @$department = $_POST['department'];

  $evaluator=0;
  $at=0;
  $dot=0;
  
if(isset($_POST['submit'])){


if(!$firstname){
echo "<br><span style='color:red'>*firstname required</span>";
$evaluator++;
}
 
if(!$rollnumber){
echo "<br><span style='color:red'>*rollnumber required";
$evaluator++;
}
else{
$dbc = mysqli_connect($host,$user,$pass,$db)
or die('error connecting to mysql server');
$query4="SELECT*FROM signup";
$result4=mysqli_query($dbc,$query4)
or die('error querying 4');
while($row=mysqli_fetch_array($result4)){
if($rollnumber==$row['rollnumber']){
echo 'rollnumber already exists. please choose another rollnumber '.'<br/>';
$evaluator++;
}
}
mysqli_close($dbc);
}

if(!$gender){
echo "<br><span style='color:red'>*gender required";
$evaluator++;
}

if($department=='select'){
echo "<br><span style='color:red'>*department required";
$evaluator++;
}
if(strlen($password1)!=0)
{ if(strlen($password2)!=0)
{ 
if($password1==$password2){
	$password=$password1;
	if(strlen($password)<6)
	{echo "<br><span style='color:red'>*password too short";
	$evaluator++;
	}
}
else 
{
$evaluator++;
echo"<br><span style='color:red'>*passwords does not match";
}
}
else {echo"<br><span style='color:red'>*re-enter password required";$evaluator++;}
}
else {echo"<br><span style='color:red'>*password required";$evaluator++;}

if(strlen($email)!=0)
{
$dbc = mysqli_connect($host,$user,$pass,$db)
or die('error connecting to mysql server');
$query3="SELECT*FROM signup";
$result3=mysqli_query($dbc,$query3)
or die('error querying 3');
while($row=mysqli_fetch_array($result3)){
if($email==$row['email']){
echo 'email id exists. please choose another email';
$evaluator++;
}
else{
$at=strpos($email,'@');
$dot=strpos($email,'.');
if($at<1||$dot<$at+2||$dot+2>=strlen($email))
{
echo "<br><span style='color:red'>*invalid email-id";
$evaluator++;
}
}
}
}
else
{echo "<br><span style='color:red'>*email-id required";
$evaluator++;
}
if(isset($number))
if(strlen($number)<10)
{
echo "<br><span style='color:red'>invalid mobile number";
$evaluator++;
}

$securimage = new Securimage();
if ($securimage->check(@$_POST['captcha_code']) == false) {
  // the code was incorrect
  // you should handle the error so that the form processor doesn't continue

  // or you can use the following code if there is no validation or you do not know how
echo "The security code entered was incorrect.<br /><br />";
echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
exit;
}
else
{
//aftr all validation
if($evaluator==0)
{
$dbc = mysqli_connect($host,$user,$pass,$db)
or die('error connecting to mysql server');
$query1="INSERT INTO signup(name,rollnumber,email,gender,password,department,mobilenumber) values('$firstname','$rollnumber','$email','$gender',SHA('$password'),'$department','$number')";
$result=mysqli_query($dbc,$query1)
or die('error querying 2');
mysqli_close($dbc);
$msg="u have successfully signed up :)";
    }
	
	echo "<br /><a href='delta.php'>Back to Home page</a>";
    } 
	


// the upload function

}
?>  
</body>
</html>  