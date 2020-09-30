<!-- Callback -->
<?php
$app_id = "2766679033615065";
$app_secret = "43194151a578c4a0dc4db4818c1cbf8e";
$redirect_uri = urlencode("http://localhost/callback.php");    
// Get code value
$code = $_GET['code'];
// Get access token info
$facebook_access_token_uri = "https://graph.facebook.com/v2.8/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";    
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
$response = curl_exec($ch); 
curl_close($ch);
// Get access token
$aResponse = json_decode($response);
$access_token = $aResponse->access_token;
// Get user infomation
$ch = curl_init(); 
// Graph API
//curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v8.0/me?fields=id%2Cname%2Cemail%2Cpicture&access_token=EAAnUR6kBktkBAH4WOLHZC8maxRWK4MfWVN3l72ZBNqIa5pnTF8Xx7ZCSYSzFOYwqZCZBoCwuqUE3Anotlc4lelaCbjrScu9UPWgUvXZB2FM6KK65VETwpxdYx1OViL7uFIJ7aPEdMW811vo9FpsXikYZBefz80ZCYMNQn7v2ZA8RqNuhgX4b2UaFCZA7NN8MMMiVJ2OUZA1A2K1FjNexaEm3CNzAWfKo2y9zpPMLb3fVLCbzwZDZD");
curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v8.0/me?fields=id%2Cname%2Cemail%2Cpicture&access_token=EAAnUR6kBktkBAGrNag9Cs0IxqFcjvClKveqnm0zJlOAPN51ZAnp9GTtTg80RoDIPNCKyez5nI4mmjjOuA8Y1XEIn1P43tZBO4ZAVxsUekDvJZCYBZCoZCBVNmGPcv3dUBJPruvumtoLFpZArUgYnA7hdrwcFPV64LZC1GlOgqNDPKZBaa7pbqPhzxyXVEnTWh8kiOqm3N5RECrUuDPZAbqbHlLzf6ZAJmFJPKczQERiEM5sUgZDZD");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
curl_setopt($ch, CURLOPT_HEADER, 0);
$response = curl_exec($ch); 
curl_close($ch);
$user = json_decode($response);
// Log user in
$_SESSION['user_login'] = true;
//print_r($user);
$img= $user->picture->data->url;
print_r('<img src='.$img.'>');
echo '<br/>';
print_r($user->name);
echo '<br/>';
print_r($user->email);
?>

 
<!DOCTYPE html>
<html>
<head>
    <title>My profile</title>
    <script type="text/javascript" src="verify.js"></script> 
    <!-- Link to css file -->
    <link rel= "stylesheet" type="text/css" href="index.css">
</head>
<body>
<!-- Modal HTML -->
<div id="healthModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<img src="img/alertIcon.png" width="200px" height="200px">		
				<h4 class="modal-title">Are you healthy?</h4>	
			</div>
			<div class="modal-body">
				<p>You must be healthy enough to share ride with other people.</br> Please do not share ride while you are having an infectious disease.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-no" onclick="nHealthy()">No, go back</button>
				<button type="button" class="btn btn-yes" onclick="yHealthy()">Yes, continue</button>
			</div>
		</div>
	</div>
</div>     
</body>
</html>
