<?php 

if(isset($_POST['send_picture']) ){
    include_once './assets/components/database.php';
    $user_id = $_COOKIE["user_id"];         
                   
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./assets/img/" . $filename.".png";
    $folder1 = "./assets/img/" . $user_id.".png";

    rename("$folder","$folder1");
    $sql_insert = "/Projects_Done_On_Lessons/PracowniaRepo/own_project/assets/img/" . $user_id.".png";
   $sql = "UPDATE `user` SET `picture`='$sql_insert' WHERE `user_id`='$user_id';";
    mysqli_query($server_con, $sql);
    move_uploaded_file($tempname,$folder1);

    header('Location: /Projects_Done_On_Lessons/PracowniaRepo/own_project/');

}else{
        echo'';
}



?>