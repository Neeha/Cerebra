<?php 
require 'getQuestions.php';
if (isset($_SESSION['user']))
{

	if ($_SESSION['user']['state'] > 0 && $_SESSION['user']['state'] < 5)
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
				.page-footer {
					position:fixed;
					bottom:0;
					width:100%;
					height:60px;   /* Height of the footer */
					background:#6cf;
				}
				.img-div { height:100%; width:100%;}
				img { max-width:100% }
				::-webkit-input-placeholder { /* WebKit, Blink, Edge */
					color:#424242;
				}
				.btn, .btn-floating
				{
					position: absolute; 
					z-index: auto;
				}
				.disabled
				{
					pointer-events:none; 
					opacity:0.6;         
				}
				.btn-floating.btn-large
				{
					width:36px;
					height:36px;
				}
				.btn-floating.btn-large i
				{
					line-height : 16px;
				}
				.blue
				{
					background-color: #2314ac !important;
				}
				:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
					color:#424242;
					opacity:  1;
				}
				::-moz-placeholder { /* Mozilla Firefox 19+ */
					color:#424242;
					opacity:  1;
				}
				:-ms-input-placeholder { /* Internet Explorer 10-11 */
					color: #424242;
				}
				
			</style>
			
		</head>

		<body style="overflow-x: hidden;">
			<nav class="top-nav teal darken-2" style="height: 80px">
				<div class="nav-wrapper">
					<a href="//kurukshetra.org.in" class="left"><img class="responsive-img" src="img/k_logo.png" style="width: 200px"></a>
					<a class="brand-logo right" href="logout.php" style="padding-top: 10px" >
						<i class="large material-icons">power_settings_new</i>
					</a>    

				</div>
			</nav>

			<main>
				<div class="container" style="padding-top: 20px">
					<div class="row">
						<div class="col s12 hoverable">
							<p class="flow-text center-align">
								<a>Main Level</a>&nbsp;
								<a id="timer"></a>&nbsp;
								<a>Score&nbsp;</a><a id="points"><?php echo $_SESSION['user']['points'] ?></a></p>

							</div>				
						</div>
						<div class="row" style="padding-top:20px;">
							<ul class="tabs" >
								<li class="tab col s12 l4"><a class="active" href="#game" style="font-size:18px" >Game Play</a></li>
								<li class="tab col s12 l4"><a href="#lb" style="font-size:18px" onclick="getLeaderboard();">Leaderboard</a></li>
								<li class="tab col s12 l4"><a href="#htp" style="font-size:18px">Instructions</a></li>

							</ul>

							<div id="game" class="col s12" align="center" style="padding-top: 40px">
								<ul class="collapsible popout" data-collapsible="accordion" style="width:100%; display: inline-block; text-align: left">

									<?php 
									$j = 0; $count =  0;
									for($i=0;$i<$_SESSION['user']['state'] ; $i++) { ?>
									<li>
										<!-- SET begins -->
										<div class="collapsible-header grey lighten-4 z-depth-2" style="padding-bottom:10px;min-height: 4em; line-height: 4em; font-weight:bold; font-size: 20px; text-align:center">
											SET <?php echo $i+1 ?>
										</div>
										<div class="collapsible-body z-depth-2">		 	
											<div class="row">
												<br>
												<?php								
	  // number of questions in each set
												//print_r($_SESSION['questions_answered']);
												for($k=0;$k<(sizeof($_SESSION['questions'])/$_SESSION['user']['state']);$k++)
												{
													if(!in_array($_SESSION['questions'][$j]['key'],$_SESSION['questions_answered']))
													{									 
														$count = 1;
														?>
														<div class="col s8 offset-s2">
															<div class="card hoverable grey lighten-4">
																<div class="card-content" style="padding-bottom: -15px;">

																	<div class="col s12" style="font-size:18px;margin-left:5px"><?php echo $_SESSION['questions'][$j]['question']; ?></div>

																	<div class="input-field col s11" style="margin-top:0px; margin-left:15px; color:black;">

																	<div class="col s12 m11">
																		<input type="text" placeholder="Your answer" id="answer_<?php echo $_SESSION['questions'][$j]['key'] ?>" class="validate"/>
																	</div>
																	<div class="col s6 m1">
																		<a class="btn-floating btn-large waves-effect waves-light" style="margin-left:5%; margin-bottom: 1%; background-color:#39a558;" id="<?php echo $_SESSION['questions'][$j]['key'] ?>" onclick="submitAnswer(this);"><i class="material-icons">done</i></a>
																		<div class="progress_loader" id="pl_<?php echo $_SESSION['questions'][$j]['key'] ?>" style="display:none;">Loading...</div>
																	</div>																	
																		</div>

																		<div class="row">

																		</div>
																	</div>
																</div>  
															</div>

															<?php
														}
														$j++;
													}
													if($count == 0)
													{
														?>
														<p class="flow-text center-align"> You have answered all questions in this set 😎  </p>
														<?php
													}
													?>

												</div>
											</div>
										</li>
										<?php
									}
									?>
								</ul>
							</div>
							<div id="lb" class="col s12" align="center" style="padding-top: 40px">
								<div class="progress_loader" id="lbloader" style="display:none;">Loading...</div>
								<div id="leaderboard"></div>
							</div>
							<div id="htp" style="padding-top: 40px">
							<ul style="line-height: 25px; list-style-type: circle;">
								<li>1.	The event has two rounds: Qualifier and the Final Round</li>
								<li>2.	Qualifier round has 10 questions and no time limit.</li>
								<li>3.	The participant has to solve all the questions in the qualifier round to appear for the Final Round.</li>
								<li>4.	The final round consists of Four Sets with 10 questions per set.</li>
								<li>5.	Each set will appear after every 15 minutes.</li>
								<li>6.	The faster the questions are solved, more the bonus points.</li>
								<li>7.	The participants can switch between sets in the final round.</li>
								<li>8.	Enter the numerical values for answers without space, without unit.</li>
								<li>9.	The winners will be declared post the event and will be intimated by the organisers soon after.</li>
							</ul>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

	<script type="text/javascript" src="js/utils.js"></script>


	<!-- timer -->
	<script type="text/javascript" src="js/countdown.min.js"></script>
	<script type="text/javascript">   
		$(document).ready(function() {
		var startTime = new Date('<?php echo $_SESSION['user']['startTime']; ?>');
		var endTime = new Date(startTime.getFullYear(), startTime.getMonth(), startTime.getDate(), startTime.getHours(), startTime.getMinutes()+59, startTime.getSeconds()+18, startTime.getMilliseconds());
		setInterval(function(){
			var seconds = countdown(null, endTime).seconds;
			$('#timer')[0].innerHTML = countdown(null, endTime).hours + ':' + countdown(null, endTime).minutes + ':' + ((seconds < 10) ? "0" + seconds : + seconds);
		}, 1000);
		setInterval(function(){			
			var diff = Math.round(countdown( null , endTime).value/1000);
			if(diff == 2700 || diff == 1800 || diff == 900)
			{
				getNextLevel();		 
			}
			else if(diff == 120)
			{
				Materialize.toast("Last 2 minutes. Submit your answers! 😮", 1000);
			}
			else if(diff == 0)
			{
				window.location.href = "logout.php";
			}
		}, 1000);
	});
</script>


<script type="text/javascript" src="js/register.js"></script>



</body>

</html>
<?php
}
else
{
	switch ($_SESSION['user']['state']) {
		case 5:
		header("Location: Summary.php");
		break;

		case 0:
		header("Location: practice.php");
		break;
	}
}
}
else
{
	header("Location: index.php");

}
?>
