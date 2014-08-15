<?php
session_start();
//error_reporting(E_ALL ^E_NOTICE);
?>
<?php
//ini_set('max_execution_time', 300);
    include("database.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	$db=mysqli_connect($host,$user,$pass,$db);
	// Check connection
	$check="SELECT * FROM login WHERE username='".$username."' and password=SHA('".$password."')";
	$result=mysqli_query($db,$check);
	$fetchdata=mysqli_fetch_array($result);
	
	if($fetchdata)
	{
	if($fetchdata['verified']=='yes')
	{$_SESSION["username"]=$fetchdata['username'];
	setcookie('username', $fetchdata['username'], time() + (60 * 60 * 24 * 3)); //three days
	echo 'Logged in';
	//////////////////////////////////////////////////////////////////logout thing
	/*if($_SESSION['username']){
	echo'<form method="post" action="logout.php">
		<input type="submit" value="logout" name="submit" />
		</form>';	
 	}*/
  
	header('Location:/securimage/home.php');
	}
	else echo 'please verify your account.Login failed :(';	
	}
	else
	{ 
    echo 'username and password invalid :(';
	}
	
	
    mysqli_free_result($result);
	mysqli_close($db);
	
?>
