<?php 
include('../func/connection.php');

if(!empty($_GET['mobile'] && !empty($_GET['token']))){
     //retrieve user from the database
    $token=$_GET['token'];
    $mobile=$_GET['mobile']; 
    $user_id;
    $query="SELECT * FROM users WHERE mobile='$mobile' AND access_token='$token'";
    $resultsUser = mysqli_query($link, $query);
   
    if(mysqli_num_rows($resultsUser)>0){
        while($row = mysqli_fetch_array($resultsUser, MYSQLI_ASSOC)){
        $user_id = $row['user_id'];
        }
         
    }
    
    $arr = array();
    $sql ="SELECT * FROM trips WHERE user_id ='$user_id' AND is_delete='0' AND status_pay='paid' ORDER BY trip_id DESC";
    //shows trips or alert message
    $result = mysqli_query($link, $sql);
         while ($row[] = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
           $item = $row;
           $json = json_encode($item);
        }
    }else{
         echo json_encode('You have not a trip paid yet.!');
    }
     echo $json;
     $link->close();

?>





