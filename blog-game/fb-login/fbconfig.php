<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';
include 'connect.php';
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;
// init app with app id and secret
FacebookSession::setDefaultApplication( '1409859125976285','e3b7c5d3ba8c89dd0cc1518b21d6fd13' );
// login helper with redirect_uri
    $helper = new FacebookRedirectLoginHelper('http://localhost/blog-game/fb-login/fbconfig.php' );
try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}
// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();
     	$fbid = $graphObject->getProperty('id');              // To Get Facebook ID
 	    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	    $femail = $graphObject->getProperty('link');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	    $_SESSION['FBID'] = $fbid;           
        $_SESSION['FULLNAME'] = $fbfullname;
	    $_SESSION['EMAIL'] =  $femail;
        $_SESSION['index'] = 0;
        $_SESSION['count'] = 0;

        $check="SELECT * FROM users WHERE fid = '".$fbid."'";
        $rs = mysqli_query($conn,$check);
        if(mysqli_fetch_array($rs, MYSQLI_NUM)) {
                
        }
        else
        {
            $sql = "INSERT INTO users (name, fid)
            VALUES ('$fbfullname', '$fbid')";

            if (mysqli_query($conn, $sql)) {
                $result = mysql_query("SELECT * FROM users WHERE fid='".$fbid."'");
                $user = mysql_fetch_array($conn,$result);

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    /* ---- header location after session ----*/
  header("Location: index.php");
} else {
  $loginUrl = $helper->getLoginUrl();
 header("Location: ".$loginUrl);
}
?>