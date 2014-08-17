<?php
session_start();

include('database.php');
$owner=$_SESSION['username'];
$book=$_POST['book'];
$author=$_POST['author'];
$tag=$_POST['btag'];
$db=mysqli_connect($host,$user,$pass,$db) or die('Error connecting to database');
$query="INSERT INTO bookdetails(username,bookname,author,hashtags) VALUES('$owner','$book','$author','$tag')";
$result=mysqli_query($db,$query);
$query1="SELECT book_id FROM bookdetails WHERE username='".$owner."' and bookname='".$book."'";
$result2=mysqli_query($db,$query1);
while($row=mysqli_fetch_array($result2))
$bookid=$row['book_id'];

$tag=explode(',',$tag);
for($i=0;$i<count($tag)-1;$i++){
$query3="INSERT INTO hash(md5,book_id) VALUES('".md5($tag[$i])."','$bookid')";
$result3=mysqli_query($db,$query3);
}
mysqli_close($db);
header("Location:/securimage/home.php");
		
?>