<?php
include ('connect.php');
$solvedtable="";
$solvedtable1 = array();

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

$sql5 = "SELECT * FROM users WHERE fid='".@$_SESSION['FBID']."'";
			$result5 =mysqli_query($conn, $sql5);
			while($row1 = mysqli_fetch_assoc($result5)) {
                $solvedtable = $row1['curr_sol'];
				}
				$solvedtable1=explode(",",$solvedtable );
				if(count($solvedtable1)==@$_SESSION['qstns']) $_SESSION['complete']=1;
     $sql = "SELECT * FROM questions";
    $result = mysqli_query($conn, $sql);
    $table = array();
    if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $table[] = $row;
            } 
        } else {
            echo "0 results";
        }
		//echo $solvedtable1[0];
		for($i=0;$i<count($solvedtable1);$i++)
		{$table[$solvedtable1[$i++]-1]['qn_no']=0;};
	
		
		$_SESSION['tt']=$table;
   ?>