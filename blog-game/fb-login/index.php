<?php
require 'question.php';
require 'table.php';
$_SESSION['qstns']=2;
?>
<script>
var count =-1;    
</script>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Pragyan Blog</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap-combined.min.css" rel="stylesheet"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-social.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
 </head>
  <body onload="callit()">
  
      <!--  After user login  -->
         <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    
                </li>
                <li>
                    <a href="#"><?php echo @$_SESSION['FULLNAME']; ?></a>            
                </li>
                <hr>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="leaderboard.php">Leaderboard</a>
                </li>
                <li>
                    <a href="#">How to play</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
  <?php if (@$_SESSION['FBID']): ?>
      <?php
    $result = mysqli_query($conn,"SELECT * FROM users WHERE fid='".$_SESSION['FBID']."'");
    $user = mysqli_fetch_array($result);
	
    $index = $_SESSION['ind']%$_SESSION['qstns'];
$p=0;	
while(1){
if($table[$index]['qn_no']!=0){break;}
$index=($index+1)%$_SESSION['qstns'];
$p++;
if($p>$_SESSION['qstns']){$index=$_SESSION['qstns']+1;break;}
}			
/*for($i=0;$i<count($table);$i++)
echo $table[$i]['qn_no'];
*/
if($index <$_SESSION['qstns']){

    $_SESSION['Q'] = "http://pragyan.org/blog/20" . $table[$index]['qn_end'];
    $_SESSION['H'] = $table[$index]['qn_head'];

      ?>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Pragyan Blog - The Wiki Game</h1>
                        <div class="container">
                        <div class="hero-unit">
                          <h2><span id="head"><?php if(!$_SESSION['complete']){echo "<a href='".$_SESSION['Q']."' target='_blank'>".$_SESSION['H']."</a>"; 
						  ?></span></h2>
                          <p>Go to the above link in minimum clicks.</p>
                           <p>Clicks : <span id="clicks" ><?php /*echo $_SESSION['count']; */?></p>
                            Time Remaining : <span id="countdown" class="timer" style="color:red"></span>
                          <?php } else {echo "Congratz...".@$_SESSION['FULLNAME']; ?>
						  <?php /*echo "Leaderboard Position:"."      "."Leaderboard score:              <br>
						  "."Questions solved:           "."Clicks made:"*/;  ?>                       
						  
						  <?php }?>
						  </div><?php }?>
                            <iframe id="frame" src="./game_master.php" width="900" height="600" onload="n()">
                            </iframe>    
                        <!--div class="span4">
                         <ul class="nav nav-list">
                        <li class="nav-header">Image</li>
                            <li><img src="https://graph.facebook.com/<?php echo $_SESSION['FBID']; ?>/picture"></li>
                        <li class="nav-header">Facebook ID</li>
                        <li><?php echo  $_SESSION['FBID']; ?></li>
                        <li class="nav-header">Facebook fullname</li>
                        <li><?php echo $_SESSION['FULLNAME']; ?></li>
                        <li class="nav-header">Facebook </li>
                        <li><?php echo $_SESSION['EMAIL']; ?></li>
                        <div><a href="logout.php">Logout</a></div>
                        </ul>
                        </div-->
                        </div>
                        <p></p>
                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Hide Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <?php else: ?>     <!-- Before login --> 

<!--h1>Login with Facebook</h1>
           Not Connected
<div><?php $_SESSION['ind']=0;$_SESSION['g']=0;$_SESSION['complete']=0;?>
      <a href="fbconfig.php">Login with Facebook</a></div>
	 <div-->
              <div class="block white" align="center"> 
        <div class="container">
            <div class="row">
                <div >
                    <h1>Pragyan Blog - Navigator</h1>
                    <hr>
                    <h3>Instructions</h3>
                    <ul>
                        Each game has a source and a destination article. <br />
                        Using the links provided in the subsequent pages, navigate through various articles to reach the destination within two minutes.<br />
                        The goal is to arrive at the destination article in the minimum number of clicks in the least time <br />
                    </ul>
                </div>
                <br />
                <br />
                <div >
                    <div class="clear-form">                        
                        <form>               
                            <div class="form-heading">
                                <h4>Login In</h4>                               
                            </div>  
                            <div class="form-body" align="center" style="width:225px">
<a href="fbconfig.php" class="btn btn-block btn-social btn-facebook">
    <i class="fa fa-facebook"></i> Log in with Facebook
  </a> 
                            </div>                                 
                            <div class="form-footer">                          
                                <hr>
                                <p class="center">
               </p>
                            </div>                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    


    <?php endif ?>
    <script src="js/jquery.js"></script>  
    <script src="js/bootstrap.min.js"></script>
<script>
function jok(){	
seconds=20;
}
</script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
var seconds = 120;
var reset=0;
	
function secondPassed() {
	var minutes = Math.round((seconds - 30)/60);
	var remainingSeconds = seconds % 60;
	if (remainingSeconds < 10) {
		remainingSeconds = "0" + remainingSeconds;	
	}
	//count=<?php echo json_encode($_SESSION['count']); ?>;
	
	document.getElementById('clicks').innerHTML = count;
	
	document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
	if (seconds <= 0) {
			alert("time's up buddy");
		window.location = "index.php";
		document.getElementById('countdown').innerHTML = "Buzz Buzz";
		clearInterval(countdownTimer);
	} else {
		seconds--;
	}
}
function n(){count=count+1;}

function callit(){
<?php if(!$_SESSION['complete']) {?>
var countdownTimer = setInterval('secondPassed()', 1000);

<?php } else {?>
document.getElementById('countdown').innerHTML = " " ;
getElementById('clicks').innerHTML="";  
<?php }?>
}

</script>
    </script>

  </body>
    
</html>
