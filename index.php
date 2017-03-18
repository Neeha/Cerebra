<?php 
session_start();
if (!isset($_SESSION['user']))
{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>The Beautiful Mind</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <link rel='stylesheet' href="css/progress_loader.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Let browser know website is optimized for mobile-->

    <link href='//fonts.googleapis.com/css?family=Patua One' rel='stylesheet'>
    <link href='//fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
      ::-webkit-input-placeholder { /* WebKit browsers */
        color:    white;
        opacity: 0.2 !important;
      }
      ::-webkit-label { /* WebKit browsers */
        color:    red;
        opacity: 0.2 !important;
      }
      .footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  background-color: #00796b;
  text-align: center;
}

    </style>
  </head>

  <body>
  <div id="fb-root"></div>
<!-- <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=1157728337598478";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> -->
   <nav class="top-nav teal darken-2" style="height: 80px">
    <div class="nav-wrapper">
      <a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/abacus mouse_PNG.png" style="width: 85px; padding-top: 10px;"></a>
      <a href="#" class="brand-logo right hide-on-med-and-down" style="padding-top: 20px"><img class="responsive-img" src="img/ceg.png" style="width: 200px"></a>

    </div>
  </nav>
  <div class="container center" style="margin-top: 5vh; margin-bottom: 10vh; min-width: 200px">
  <br/><br/><br/>
  <h2 style="font-family: Patua One">THE BEAUTIFUL MIND</h2>
  <hr>
  <h4>Code your mind out!!</h4>
    <div class="section">
      <div class="row">
      <button class="btn waves-effect waves-light" type="submit" name="action" style="background-color: #365899" onclick="checkFacebookLogin();">Sign in using facebook
    <i class="fa fa-facebook" aria-hidden="true"></i>
  </button>
      <!-- <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" onlogin="window.location.href='/practice.php"></div> -->
       
   </div>
 </div>
</div>
<div class="footer">Copyright 2017 @ CSEA. All rights reserved.</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>
<script type="text/javascript" src="js/register.js"></script>
<script>

      window.fbAsyncInit = function() {
          FB.init({appId: '1157728337598478', status: true, cookie: true, xfbml: true});

      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());

    function userLogin(e) {     
    fbToken = e;
    $.ajax
    ({ 
        url: 'login.php',
        data: 'fbToken=' + e,
        type: 'post',
        dataType: "json",
        success: function(result)
        {
            if(result == 1)
            {
                Materialize.toast('Login Successful 😎', 1000);
            }
            else
            {
                Materialize.toast('Login Failed', 1000);   
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) { 
            Materialize.toast('Some error occured. Please try after sometime 🙏', 1000);
        }
    });
}  
    function fetchUserDetail()
    {
        window.open('./GamePlay.php','_self');
        FB.api('/me', {"fields":"id,name,email,first_name,last_name"}, function(response) {
                //alert("Name: "+ response.name + "ID: "+response.id + "\nEmail: "+ response.email);
                //console.log(response.id);
                userLogin(response.id);
            });
    }

    function checkFacebookLogin() 
    {
        FB.getLoginStatus(function(response) {
          if (response.status === 'connected') {
            fetchUserDetail();
          } 
          else 
          {
            initiateFBLogin();
          }
         });
    }

    function initiateFBLogin()
    {
        FB.login(function(response) {
           fetchUserDetail();
         });
    }
    </script>

</body>
</html>
<?php
}
else
{
    header("Location: GamePlay.php");  
}
?>