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
        .gotomain a:hover{
            color: #000!important;
        }
        .carousel .indicators .indicator-item.active
        {
          background-color: black !important;
        }
        .carousel .indicators .indicator-item
        {
          background-color: grey !important;
        }
        @media screen and (max-width: 600px)
        {
          .heading
          {
            display: none;
          }
          .contents
          {
            font-size:14px;
      max-height:220px;
          }
          .card-content
          {
            padding-bottom: 210px !important;
      height:290px;
          }
          .carousel .indicators
          {
            display: none !important;
          }
        }
        @media screen and (min-width: 700px)
        {
          .contents
          {
            font-size:16px;
      max-height:250px;
          }
          .card-content
          {
            padding-bottom: 110px !important;
      height:210px;
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
        <a href="//abacus.org.in" class="left"><img class="responsive-img" src="img/abacus mouse_PNG.png" style="width: 85px; padding-top: 10px;"></a>
        </div>
        <div class="col m10 s12 heading">
        <center><a href="#" style="font-size: 40px; font-family: Roboto Slab">THE BEAUTIFUL MIND</a></center>
        </div>        
      </div>
    </nav>

    <div class="container" style="margin-top: 5vh; min-width: 200px">
      <h4 class='center-align'>WINNERS</h4>
      <div id="lb" class="col s12" align="center" style="padding-top: 40px">
        <div class="progress_loader" id="lbloader" style="display:none;">Loading...</div>
        <table class="striped">
        <thead>
          <tr>
              <th data-field="id">Rank</th>
              <th data-field="name">Name</th>
          </tr>
        </thead>

        <tbody style="font-size: 20px;">
          <tr>
            <td>1</td>
            <td>Guru Pirasad</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Pradeep palanisamy</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Arun kumar</td>
          </tr>
        </tbody>
        </table>
        <br/>
        <div style="font-size: 20px;">
        Click<a href="Questions.docx" > here</a> to view the questions and the answers.
        <br/>
        Click<a href="Solutions.docx" > here</a> to view the solutions for the problems.
        </div>
      </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/utils.js"></script>
    <script type="text/javascript" src="js/register.js"></script>


  </body>
  </html>
 