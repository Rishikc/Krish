<?php
include 'connect.php';
$index=0;
$s='1 2 3';
$sql = "UPDATE users SET solved = $index WHERE name='Rishi Kc'";
$result2 = mysqli_query($conn, $sql);
$sql = "UPDATE users SET curr_sol = NULL WHERE name='Rishi Kc'";
$result2 = mysqli_query($conn, $sql);
$sql = "UPDATE users SET time = 0 WHERE name='Rishi Kc'";
$result2 = mysqli_query($conn, $sql);
 $sql = "UPDATE users SET clicks = 0 WHERE name='Rishi Kc'";
$result2 = mysqli_query($conn, $sql);
 
/*$sql2 = "SELECT * FROM users WHERE fid='Rishi Kc'";
$result2 =mysqli_query($conn, $sql2);
  
$solvedtable="";
$solvedtable1 = array();

$table = array();
$user;
$flag=0;
$sql5 = "SELECT * FROM users WHERE fid='Rishi Kc'";
			$result5 =mysqli_query($conn, $sql5);

$user;
$sql2 = "SELECT * FROM table WHERE fid='Rishi Kc'";
$result2 =mysqli_query($conn, $sql2);

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);

			while($row1 = mysqli_fetch_assoc($result5)) {
                $solvedtable = $row1['curr_sol'];
				}	
				$solvedtable1=explode(",",$solvedtable );
				$flag=0;
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
				echo 'r'.$row['qn_no'].'d'.$solvedtable1[0];
                for($i=0;$i<count($solvedtable1);$i++){
				echo 'sen'.$solvedtable1.'r'.$row['qn_no'];
				if($solvedtable1[$i]==$row['qn_no'])
				{$flag++; echo $solvedtable1[$i].$row['qn_no'].$flag;}
				}
				if($flag==0)
				$table[] = $row;
				$flag=0;
				            }
        } else {
            echo "0 results";
        }

for($i=0;$i<count($table);$i++)
echo $table[$i]['qn_no']*/
  ?>