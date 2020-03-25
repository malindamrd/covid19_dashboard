
<?php
include('dbConnect.php');


if(isset($_GET['last_update']) && isset($_GET['local_new']) && isset($_GET['local_total']) && isset($_GET['local_recovered']) &&
    isset($_GET['local_new_deaths']) && isset($_GET['local_deaths']) && isset($_GET['global_cases'])){

    $last_update = $_GET['last_update'];
    $local_new = $_GET['local_new'];
    $local_total = $_GET['local_total'];
    $local_recovered = $_GET['local_recovered'];
    $local_new_deaths = $_GET['local_new_deaths'];
    $local_deaths = $_GET['local_deaths'];
    $global_cases = $_GET['global_cases'];

    $ip_addr = getUserIpAddr();

    $res = ipUpdate($ip_addr);

    $up = checkUpdate($last_update);
    $flag = false;

    if(!checkUpdate($last_update)){
        if(!insertData($last_update, $local_new, $local_total, $local_recovered, $local_deaths, $local_new_deaths, $global_cases)){
            $res = array("status" => 400, "error" => "Insertion Error " );
            echo json_encode($res);
            exit;
        }else{
            $flag = true;
        }
    }

    $result = getdata();
    $dataArray = array();

    while($row = $result->fetch_assoc()) {
        array_push($dataArray, $row);
    }
    $res = array("status" => 200, "data" => $dataArray, "flag"=> $flag , "ip" => $ip_addr);
    echo json_encode($res);
    exit;

}
else{
    $res = array("status" => 400, "error" => "Invalid Parameters" );
    echo json_encode($res);
    exit;
}

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

?>