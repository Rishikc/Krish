<?php
require 'question.php';
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
  <body >
  <?php if (@$_SESSION['FBID']): ?>
      <!--  After user login  -->
         <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    
                </li>
                <li>
                    <a href="#"><?php echo $_SESSION['FULLNAME']; ?></a>            
                </li>
                <hr>
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li>
                    <a href="#">Leaderboard</a>
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

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Pragyan Blog - The Wiki Game</h1>
                        <div class="container">
                        
						
<table class="table table-striped">  
        <thead>  
          <tr>  
            <th>Name</th>  
            <th>Solved</th>  
            <th>Clicks</th>
			<th>Toal Score</th>
          </tr>  
        </thead>  
        <tbody>  
          <?php
				    $sql = "SELECT * FROM users order by points desc,solved desc,clicks desc,time desc";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['solved'].'</td>';
				echo '<td>'.$row['clicks'].'</td>';
				echo '<td>'.$row['points'].'</td>';
				echo '</tr>';
            } 
        } 
		  ?>
		 </tbody>  
      </table>  
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
<div>
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
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>
    </script>

  </body>
    
</html>
