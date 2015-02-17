<script>
function refresh(){
parent.location.href="index.php";
}
function killtimer(){
parent.clearInterval(countdownTimer);
}
</script>
<?php
//session_start();

include 'a.php';
include 'question.php';
include 'connect.php';
include 'table.php';
$base_url = "http://www.pragyan.org/blog/20";
$_SESSION['Q']="";
$_SESSION['H']="";
//$table = array();
$user;
$sql2 = "SELECT * FROM table WHERE fid='".$_SESSION['FBID']."'";
$result2 =mysqli_query($conn, $sql2);
$solvedtable="";
$solvedtable1 = array();

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

$sql5 = "SELECT * FROM users WHERE fid='".$_SESSION['FBID']."'";
			$result5 =mysqli_query($conn, $sql5);
			while($row1 = mysqli_fetch_assoc($result5)) {
                $solvedtable = $row1['curr_sol'];
				}	
				$solvedtable1=explode(",",$solvedtable );
				$flag=0;
	/*
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            	$table[] = $row;
			}	
			
        } else {
            echo "0 results";
        }*/
		$table=$_SESSION['tt'];
		$cc;
$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
                if( $row['fid'] == $_SESSION["FBID"] )
                    $user = $row;
					$cc=$row['clicks'];
					$totalt=$row['time'];
            }
        } else {
            //echo "0 results";
        }
$p=0;		
$index = ($_SESSION['ind']%$_SESSION['qstns']);

if($index>$_SESSION['qstns']-1) $index=0;

while(1){
if($table[$index]['qn_no']!=0){$_SESSION['ind']=$index;$_SESSION['ind']++;break;}
$index=($index+1)%$_SESSION['qstns'];
$p++;
if($p>$_SESSION['qstns']){$index=$_SESSION['qstns']+1;break;}
}
			
if(!$_SESSION['complete']){
$data = $table[$index]['data'];
$sol  = $table[$index]['solved'];
if(@$_REQUEST['q'])
{
    $query = $_REQUEST['q'];
    $_SESSION['count']++;
	}
else
{     
    $query = $table[$index]['qn_start'];
    $begin_time = time();
	$_SESSION['count']=0;
    $_SESSION['begin_time'] = $begin_time;
	$att  = $table[$index]['attempted'];
	$att++;
	$sql = "UPDATE questions SET attempted = $att WHERE data='".$data."'";
    $r=mysqli_query($conn, $sql);
		
}

$url = $base_url . $query;

$html = getit($url);

if( strpos($html, $data ) !== false)
{
    $cc=$cc+$_SESSION['count'];
	$sol++;
	$end_time=time();
	$time=($end_time-$_SESSION['begin_time']-3);
	$totalt=$totalt+$time;
	$sql = "UPDATE questions SET solved = $sol WHERE data='".$data."'";
    mysqli_query($conn, $sql);
 // update user solved in db & redirect to same page this doesnt work as of now
	$qn_num=$table[$index]['qn_no'];
    $sql = "UPDATE users SET solved = $qn_num WHERE fid='".$_SESSION['FBID']."'";

	$sql2 = "SELECT * FROM users WHERE fid='".$_SESSION['FBID']."'";
$result2 =mysqli_query($conn, $sql2);

        while($row = mysqli_fetch_assoc($result2)) {
                $solvedtable = $row['curr_sol'];
				$solvedcount=$row['solved'];
            }
			$solvedcount++;
			
		$solvedtable1=explode(",",$solvedtable );
		/*for($i=0;$i<count($solvedtable1);$i++)
		echo $solvedtable1[$i]['qn_no'];
*/
		$i=$_SESSION['g']++;
		$solvedtable1[$i]=$table[$index]['qn_no'];
		
		$sql6 = "UPDATE users SET clicks = $cc WHERE fid='".$_SESSION['FBID']."'";
		mysqli_query($conn, $sql6);
		$sql7 = "UPDATE users SET time = $totalt WHERE fid='".$_SESSION['FBID']."'";
		mysqli_query($conn, $sql7);
		$sql8 = "UPDATE users SET solved = $solvedcount WHERE fid='".$_SESSION['FBID']."'";
		mysqli_query($conn, $sql8);
		
		$solvedtable=implode(",",$solvedtable1);
		$sql3 = "UPDATE users SET curr_sol = '$solvedtable' WHERE fid='".$_SESSION['FBID']."'";
        
	
		mysqli_query($conn, $sql3);
		
		echo "<br><br><br><h1 color='red'><center>Congos!!</center></h1><br><center><h1>you have completed this level</h1><br>";
		echo "<h2>CLICKS:".$_SESSION['count']."         TIME:".$time;
		
		$table[$index]['qn_no']=0;
		$_SESSION['tt']=$table;
		$_SESSION['count']=0;
		$_SESSION['reset']=1;
		//$_SESSION['ind']++;
		echo "<script>killtimer();</script>";	
		echo "<br><br>click below to go to next level";
		echo "<a href='game_master.php' onclick='refresh()'><h1>PROCEED</h1></a>";
}
else 
     echo $html;
}
else
{
echo "<script>killtimer();</script>";
echo "<h1><br><hr><br><center><font color='red'>You have successfully completed the game :)</font><br><hr><br></h1>";
}
?>
