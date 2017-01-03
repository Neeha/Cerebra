<?php 
require 'prerun.php';
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

      <!--Let browser know website is optimized for mobile-->
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
.page-footer {
   position:fixed;
   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
.submit{
  background-color: #26a69a !important;
}
.right{
  background-color: #46904d !important;  
}
.wrong{
  background-color: #cc2b0d !important;  
}
      </style>
    </head>

    <body background="img/bg1.jpg" style="overflow-x: hidden;">
    <!--body bgcolor="#1a0a4b" background-size="100%"-->
    <header>
      <nav class="top-nav" style="height: 80px;">
        
          <img style="height: auto;width:16%; padding-left: 0px;" src="img/k orange white.png"/>
        
      </nav>
      <div class="container"><a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only"><i class="material-icons">menu</i></a></div>

    </header>
    	<div class="row" style="padding-bottom: 40px;">
          <ul class="tabs" style="overflow-x: hidden;">
            <li class="tab col s12 l6"><a class="active" href="#game">Game Play</a></li>
            <li class="tab col s12 l3"><a href="#forum">Forum</a></li>
            <li class="tab col s12 l3"><a href="#lb">Leaderboard</a></li>
          </ul>
        <div id="game" class="col s12" align="center">
          <ul class="collapsible popout" data-collapsible="accordion" style="width: 70%; display: inline-block; text-align: left">
            <li>
              <div class="collapsible-header" style="min-height: 4em; line-height: 4em; font-size: 18px;">SET 1</div>
              <div class="collapsible-body" style="background-color: rgba(0,0,0,0.9)">
                   <div class="container">
                      <?php
                      foreach ($_SESSION['practice'] as $question) { ?>
                      <div class="row">
                        <div class="col s12 m6">
                          <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                              <p><?php echo $question['question']; ?></p>
                              <input placeholder="Answer" id="answer_<?php echo $question['key'] ?>"  type="text" class="validate">
                            </div>
                            <div class="card-action">
                              <a href="#"  id="<?php echo $question['key'] ?>" onclick="submitAnswer(this);">Submit</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php 
                    }
                    ?> 

                  </div>
                <a class="btn" style="margin-left:50%; margin-bottom: 1%;" onclick="Materialize.toast('Please fill all the answers', 4000)">SUBMIT</a>
              </div>
            </li>
            <li>
              <div class="collapsible-header"><span class="badge">(Questions will be unlocked only after completing set 1)</span><i class="material-icons">place</i>SET 2</div>
              <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="material-icons">whatshot</i>SET 3</div>
              <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
            </li>
          </ul>

        </div>
        <div id="forum" class="col s12">Test 2<br/>
        </div>
        <div id="lb" class="col s12" style="color: #fff; background-color: rgba(0,0,0,0.8);">
        <center>
        <h3>LEADERBOARD</h3>
          <table class="table table-hover table-bordered" align="center">
                        <tr>
                           <th>Rank</th>
                           <th>K! ID</th>
                           <th>Name</th>
                           <th>Points</th>
                       </tr>
                       <tr>
                           <td>1</td>
                           <td>123</td>
                           <td>ABC</td>
                           <td>1000</td>
                       </tr>
                       <tr>
                           <td>2</td>
                           <td>123</td>
                           <td>ABC</td>
                           <td>1000</td>
                       </tr>
                       <tr>
                           <td>3</td>
                           <td>123</td>
                           <td>ABC</td>
                           <td>1000</td>
                       </tr>
                   </table>
                  </center>
        </div>        
      </div>
      <div class="footer">
    	<footer class="page-footer" style="background-color: transparent; height: 70px;">          
        <div class="footer-copyright" style="background-color: rgba(255,255,255,1);">
        <div class="row">
          <div class="col s6">
            <div class="container" style="color: black;">

              Copyright 2016 @ CEG Tech Forum. All rights reserved.
            </div>
          </div>
          <div class="col s6" style="padding-left: 20%">           
              <img style="height: auto;width:400px; padding-top: 4px;" src="img/logo1.png"/>            
          </div>
          </div>
        </div>
        </footer>
        </div>
        <!--Import jQuery before materialize.js-->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
      <!--script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/utils.js"></script>
        <script type="text/javascript">
          $('.checkanswer').click(function() {
                $('.submit').addClass('wrong');
                $('.submit').removeClass('submit');
            });  
            //loadpreround();                    
        </script>
      
    </body>
  </html>