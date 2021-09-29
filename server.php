<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id16944927_login", "Manishcv121@", "id16944927_loginserver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM `usuarios` WHERE `id`  = 87";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
                $num= $row['senha'] ;
        }
    }
}

if ($num == '1'){
    $maintainence = true;
    echo " maintainence activated";
    
}else {
    $maintainence = false;
    echo " maintainence deactivated";
}


mysqli_close($link);
?>