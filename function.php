<?php

// require("dbh.inc.php");

$con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs');

function getUsersData($id)
{
    $array = array();
    $q = mysqli_query("SELECT * FROM user_profile WHERE id=".$id);
    while($r = mysqli_fetch_assoc($q)){
        $array['id'] = $r['id'];
        $array['name'] = $r['name'];
        $array['bio'] = $r['bio'];
        $array['email'] = $r['email'];
        $array['phone'] = $r['phone'];
        $array['suburb'] = $r['suburb'];
        $array['city'] = $r['city'];
        $array['gender'] = $r['gender'];
        $array['userlanguage'] = $r['userlanguage'];
    }
    return $array;
}

function getID($email)
{
    
    $q = mysqli_query("SELECT * FROM user_profile WHERE email=".$email);
    while($r = mysqli_fetch_assoc($q)){
        return $r['id'];
    }
}

?>