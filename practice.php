<?php
include 'getQuestions.php';
if(isset($_SESSION['user']))
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

      <link rel='stylesheet' href="css/progress_loader.css">
      <!--Let browser know website is optimized for mobile-->
      <link href='//fonts.googleapis.com/css?family=Patua One' rel='stylesheet'>
      <link href='//fonts.googleapis.com/css?family=Merienda One' rel='stylesheet'>
      <link href='//fonts.googleapis.com/css?family=Roboto Slab' rel='stylesheet'>
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
        .gotomain a:hover{
            color: #000!important;
        }
        .carousel-item{
          padding-left: 7%;
          padding-top: 7%;
          padding-right: 7%;
        }
        .carousel .indicators .indicator-item.active
        {
          background-color: black !important;
        }
        .carousel .indicators .indicator-item
        {
          background-color: grey !important;
        }
        @media screen and (max-width: 700px)
        {
          .heading
          {
            display: none;
          }
          .contents
          {
            font-size:14px;
          }
          .card-content
          {
            padding-bottom: 210px !important;
          }
        }
        @media screen and (min-width: 700px)
        {
          .contents
          {
            font-size:18px;
          }
          .card-content
          {
            padding-bottom: 110px !important;
          }
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
     <nav class="top-nav teal darken-2" style="height: 80px">
      <div class="nav-wrapper row">
        <div class="col m2 s6">
        <a href="//kurukshetra.org.in" class="left"><img class="responsive-img" src="img/abacus mouse_PNG.png" style="width: 85px; padding-top: 10px;"></a>
        </div>
        <div class="col m8 s12 heading">
        <center><a href="#" style="font-size: 40px; font-family: Roboto Slab">THE BEAUTIFUL MIND</a></center>
        </div>
        <div class="col m2 s6">
        <a class="brand-logo right" href="logout.php" >
          <i class="large material-icons">power_settings_new</i>
        </a>    
        </div>
      </div>
    </nav>

    <div class="row" style="padding-top:20px;">
              <ul class="tabs" style="font-family: Roboto Slab">
                <li class="tab col s12 l4"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
                <li class="tab col s12 l4"><a href="#rules" style="font-size:18px">Rules</a></li>
                <li class="tab col s12 l4"><a href="#format" style="font-size:18px">Format</a></li>

              </ul>

    <div id="game">
    <div class="container">

     <br/><br/><br/>
     <div class="carousel carousel-slider center" data-indicators="true">
    <?php
      $colors = array("blue","red","green","purple","orange");
    ?>  


    <?php
    $i=0;
    foreach ($_SESSION['questions'] as $question) {
      if($i<20)
      {
        $i = $i+1;
      ?>
      <div class="carousel-item grey lighten-5 white-text" href="#one!" style="height: 400px;">

        <div class="card hoverable grey lighten-4">
              <div class="card-content" style="padding-bottom: 110px;">

                <div class="col s12 contents" style="margin-left:5px;color: black;"><?php echo $question['question'] ?></div>
     
                <br/><br/>
                <div class="input-field col s12" style="margin-top:0px; margin-left:15px; margin-right: 15px;">

                  <div class="col s12 m8">
                    <i class="material-icons prefix" style="color:black;">mode_edit</i>
                    <input type="text" placeholder="Your answer" id="answer_<?php echo $question['key'] ?>" class="validate" style="color:black;" value="
                    <?php
                      if(isset($_SESSION['user']['questions_answered'][$question['key']]))
                      {
                        echo $_SESSION['user']['questions_answered'][$question['key']];                        
                      }
                     
                    ?>
                    "/>
                  </div>
                  <div class="col s12 m4">
                    <a class="waves-effect waves-light btn" style="margin-bottom: 1%; background-color:#39a558;" id="<?php echo $question['key'] ?>" onclick="submitAnswer(this);">submit</a>
                    <div class="progress_loader" id="pl_<?php echo $question['key'] ?>" style="display:none;">Loading...</div>
                  </div>  
                 </div>
              </div>
        </div>
    </div>
    <?php
    }
  }
    ?>
  </div>
     </div> 
</div>
     <div id="rules" class="col s12" style="padding-top: 40px; padding-left: 15%;">
          <ul style="line-height: 25px; list-style-type: circle; font-family: Merienda One;">
                <li>1.  All participants must have a valid Abacus ID</li>
                <li>2.  Only individual participation is allowed</li>
                <li>3.  Be choosy. The questions carry different weightage.</li>
                <li>4.  Only the beholder decides the beauty of your mind. So please don't expect a score board while the event is going on!</li>
                <li>5.  Any number of attempts could be taken to answer a question.
But the final answer submitted  would be taken for consideration.</li>                
              </ul>
      </div>
      <div id="format" style="padding-top: 40px; padding-left: 15%;">
              <ul style="line-height: 25px; list-style-type: circle; font-family: Merienda One;">
                <li>1.  A single round of 25 questions.</li>
                <li>2.  The event would go on from 9pm to 11 pm on March 19,2017</li>                
              </ul>
    </div>

     </div>     
     <div class="footer">Copyright 2017 @ CSEA. All rights reserved.</div>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/register.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){

      $('.carousel.carousel-slider').carousel({fullWidth: true});
    });
    </script>
  </body>
  </html>
  <?php
 }
 else
 {
  header("Location: index.php");
 }