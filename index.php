<!DOCTYPE html>
<?php
const APPID = 924991424199035;
const APPSECRET = ab3ff43dfffaa2491d4be9afb29391d3;
?>
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
</body>
</html>