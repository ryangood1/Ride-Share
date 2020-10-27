
<!-- Callback -->
<?php
// $app_id = "2766679033615065";
// $app_secret = "43194151a578c4a0dc4db4818c1cbf8e";

$app_id = "745081179685897";
$app_secret = "c43e5e80f96eeb2f117ccd089fbf25c3";

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
// Get user infomation
$ch = curl_init(); 
// Graph API
// curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v8.0/me?fields=id%2Cname%2Cemail%2Cpicture.type(large)&access_token=EAAnUR6kBktkBACMKi8VKOyU04cq4cXZC6ZCh44TxcVw5kD6IS4c8h4xunAi2wgkLSZBZAFy6dy9z14I8ZCUrJTm1bSmigVrwmGQF8ae33gLdJKbn0ZBujN47LPQcIcv9u5r6ktyWuegXyPXXAvWt32ZAsXLHl1vsfIJ0RBc86WpFQZDZD");

curl_setopt($ch, CURLOPT_URL,"https://graph.facebook.com/v8.0/me?fields=id%2Cname%2Cemail%2Cpicture.type(large)&access_token=EAAKlpbsLRAkBAC2EDHdAgt3QVJunc1NQ5e9wY8AGyRE4C66D4EcrLvJHiSk7ia5b4t12EW0SntVXnj80JsQBdPoLcoZCZAXMDOIAD7rw5AJaNlZB2H9Uqlmgff7BBspA2bZAjR8nZBvumlNAoH0I582X6etwg5bEUJWONwu5AoAZDZD");

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

session_start();
$user_name = $user->name;

$user_email = $user->email;
$_SESSION['ue'] = $user_email ;
$_SESSION['user_email'] = $user_email;

$user_photo = $img;

$con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "INSERT INTO user_profile (name, photo, email)
    VALUES ('$user_name', '$user_photo','$user_email');";

mysqli_query($con,$sql);

header('Location: /profile.php');

?>

 