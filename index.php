<?php 
session_start();
if (!isset($_SESSION['user']))
{
  ?>
  <!DOCTYPE html>
  <html>
  <head>
    <link rel="shortcut icon" href="img/favicon.ico">
    <title>Cerebra K'17</title>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <link rel='stylesheet' href="css/progress_loader.css">
    <!--Let browser know website is optimized for mobile-->
    <link href='//fonts.googleapis.com/css?family=Caesar Dressing' rel='stylesheet'>
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
      <a href="//kurukshetra.org.in" class="brand-logo"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
      <a href="#" class="brand-logo right hide-on-med-and-down" style="padding-top: 20px"><img class="responsive-img" src="img/ceg.png" style="width: 200px"></a>

    </div>
  </nav>
  <div class="container" style="margin-top: 5vh; margin-bottom: 10vh; min-width: 200px">
    <div class="section">
      <div class="row">
      <input type="button" value="Sign in using Facebook" onclick="checkFacebookLogin();"/>
      <!-- <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false" onlogin="window.location.href='/practice.php"></div> -->
      <center><h5> REGISTRATIONS ARE CLOSED</h5></center>
       <div class="col s12 m6 push-m3 l6 push-l3">
         <div class="card grey lighten-4">
          <div class="card-content">
            <center><span class="card-title grey-text text-darken-3"><b>Login</b></span></center>
            <form id="login_form" >
              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">email</i>
                  <input id="icon_prefix email" type="text" class="validate" name="email" onblur="validatemail(this)" required>
                  <label for="icon_prefix">Email</label>
                </div>
                <div class="input-field col s12">
                  <i class="material-icons prefix">vpn_key</i>
                  <input id="icon_telephone password" type="password" class="validate" name="password" onblur="validatepass(this)" required>
                  <label for="icon_telephone">Password</label>
                </div>
              </div>
              <div class="progress_loader" style="display:none;"></div>
              <center>
                <button class="btn waves-effect waves-light login_submit" type="submit" name="action" style="margin-bottom: 10px;">
                  Login
                </button>
              </center>            
            </form>
            <center>
             <a href="http://kurukshetra.org.in/#/register" class="waves-effect waves-light btn" style="margin-bottom: 10px;">Register</a><br/>
             <a href="http://lite.kurukshetra.org.in/#resetpassword" target="_blank" style="margin-bottom: 10px; color:#00796b">Forgot password? Click here to reset</a>
           </center>

         </div>
         <div class="col s12 teal darken-2">
           <div class="col s6 push-s3">
           <img class="responsive-img" src="img/sponsor.png" style="width: 200px;padding-top: 20px;">
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
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
                window.location.href= "practice.php";
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
        window.open('/abacus/practice.php');
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
  switch ($_SESSION['user']['state']) {
    case 0:
      # go to practice page
    header("Location: practice.php");
    break;

    case 5:
      # go to summary page
    header("Location: Summary.php");
    break;
    
    default:
      # go to game play
    header("Location: GamePlay.php");
    break;
  }
}
?>