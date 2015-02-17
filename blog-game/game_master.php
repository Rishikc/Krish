<?php
//session_start();

include 'a.php';
include 'question.php';
include 'connect.php';

$base_url = "http://www.pragyan.org/blog/20";
$_SESSION['Q']="";
$_SESSION['H']="";
$index;

$sql = "SELECT * FROM questions";
$result = mysqli_query($conn, $sql);
$table = array();
$user;
if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
                $table[] = $row;
            }
        } else {
            echo "0 results";
        }

$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {
                if( $row['fid'] == $_SESSION["FBID"] )
                    $user = $row;
            }
        } else {
            //echo "0 results";
        }
$index = intval($user['solved']);

$data = $table[$index]['data'];


if($_REQUEST['q'])
{
    $query = $_REQUEST['q'];
    $_SESSION['count']++;
}
else
{     
    $query = $table[$index]['qn_start'];
    $begin_time = time();
    $_SESSION['begin_time'] = $begin_time;

}

$url = $base_url . $query;

$html = getit($url);

if( strpos($html, $data ) !== false)
{
    echo "Congos!!";
    // update user solved in db & redirect to same page this doesnt work as of now
   /* $index++;
    $sql = "UPDATE users SET solved = $index WHERE fid='".$_SESSION['FBID']."'";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }*/
}
else
     echo $html;

?>
