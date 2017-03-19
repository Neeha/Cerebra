<?php
session_start();
if(!isset($_SESSION['user']))
{
	$fbToken = sanitizeParams($_POST['fbToken']);	
	$emailId = sanitizeParams($_POST['emailId']);	
	$url = 'cms16.kurukshetra.org.in/api/login';
	$params =  json_encode(array(
		"fbToken" => $fbToken,
		"emailId" => $emailId
		));
	$ch = curl_init( $url );
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
	$response = curl_exec( $ch );
	//console.log(response);
	if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200)
	{
	//	print_r("true");
		$response = json_decode($response, true);
		$_SESSION['user'] = $response;
		echo 1;
		// if ($response['state'] == 0)
		// 	echo 1;
		// else if ($response['state'] < 5)
		// 	echo 2;
		// else 
		// 	echo 3;

	}
	else
	{
		echo 0;
		print_r("true");
	}
	
	//header("Location: index.php");
	
	
	
}
else
{
	echo 4;
}

function sanitizeParams($param)
{

//	$param = strip_tags(trim($param));
	if (isset($param) && empty($param) != 1)
	{
		return $param;	
	}
	else
	{
		$_SESSION['login'] = "failure";
			//header("Location: index.php");
	}
}

?>
