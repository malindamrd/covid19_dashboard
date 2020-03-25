<?php
#author Malinda Deshapriya 2020
function connectDB(){
    $servername = "localhost";
    $username = "id13016492_previous_data";
    $password = "Malinda20408";

//    $servername = "localhost";
//    $username = "root";
//    $password = "";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, "id13016492_previous_data");
    //$conn = mysqli_connect($servername, $username, $password, "previous_data");

// Check connection
    if ($conn->connect_error) {
        return $conn;
    }

    return $conn;
}

function ipUpdate($ipAddr){
    $conn = connectDB();

    $ip = $_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    $city = $details->city; // -> "Mountain View"
    $region = $details->region;
    $country = $details->country;

    $location = $city." ".$region." ".$country;


    try{
        $sql = "INSERT INTO ip_info (ip_address, ip_location) VALUES ('".$ipAddr."' , '".$location."')";
        $conn->query($sql);
        return $sql;
    }catch (Exception $e){
        return $e->getMessage();
    }


}


function checkUpdate($update_time){
    $conn = connectDB();

    $sql = "SELECT * FROM previous_data WHERE update_time='".$update_time."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }

}

function getdata(){
    $conn = connectDB();

    $sql = "SELECT * FROM previous_data ORDER BY update_time ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result;
    } else {
        return false;
    }
}

function insertData($update_time, $local_new, $local_total, $local_recoverd, $local_deaths, $local_new_deaths, $global_cases){

    $conn = connectDB();
    $sql = "INSERT INTO previous_data VALUES ('".$update_time."','".$local_new."',  '".$local_total."', '".$local_recoverd."', '".$local_new_deaths."', '".$local_deaths."' , '".$global_cases."' )";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }

}



