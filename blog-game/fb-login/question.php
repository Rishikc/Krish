<?php
session_start();    
include 'connect.php';

/*$start = array("15/02/the-imitation-game/",
               "15/01/printing-yourself-sounds-far-fetched/");

$target_header = array("Don&#8217;t hold your breath in a space station!"
                      );

$end = array("2014/12/dont-hold-your-breath-in-a-space-station/");

*/
/*
function getQ(){
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
$result = mysql_query("SELECT * FROM users WHERE fid='$fbid'");
$user = mysql_fetch_array($conn,$result);

$index = $user['solved'];

$Q = "http://pragyan.org/blog/20" . $table[0]['qn_end'];
$H = $table[0]['qn_head'];

//print_r( $user_solved); 
}
*/
$Q= "";
$H="";

$begin_time;
?>