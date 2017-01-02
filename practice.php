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

</head>

<body>

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
<!--Import jQuery before materialize.js-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<!--script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
<script type="text/javascript" src="js/utils.js"></script>

</body>
</html>