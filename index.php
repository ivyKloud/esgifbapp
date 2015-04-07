<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();

require("facebook-php-sdk-v4-4.0-dev/autoload.php");

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

const APPID = "924991424199035";
const APPSECRET = "ab3ff43dfffaa2491d4be9afb29391d3";

FacebookSession::setDefaultApplication(APPID, APPSECRET);

$helper = new FacebookRedirectLoginHelper('https://esgifbapp.herokuapp.com/');


if(isset($_SESSION) && isset($_SESSION['fb_token'])){
    $session = new FacebookSession($_SESSION['fb_token']);
}else{
    $session = $helper->getSessionFromRedirect();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Titre de ma page</title>
    <meta CHARSET="UTF-8">
    <meta type="description" content="Contenu">
</head>
<body>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '924991424199035',
            xfbml      : true,
            version    : 'v2.3'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<h1>Mon app Facebook</h1>

<div
    class="fb-like"
    data-share="true"
    data-width="450"
    data-show-faces="true">
</div>

<br/>

<pre>
    <?php
        if($session){
            $_SESSION['fb_token'] = (string) $session->getAccessToken();

            $request_user = new FacebookRequest($session,"GET","/me");
            $request_user_executed = $request_user->execute();
            $user = $request_user_executed->getGraphObject(GraphUser::className());
            var_dump($session);
        }else{

            $loginUrl = $helper->getLoginUrl();
            echo "<a href='".$loginUrl."'>Connect with Facebook</a>";

        }
    ?>
</pre>
</body>
</html>