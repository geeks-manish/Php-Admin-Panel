<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "id16944927_login", "Manishcv121@", "id16944927_loginserver");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt update query execution
$sql = "SELECT * FROM `usuarios` ";
if(mysqli_query($link, $sql)){
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
$sql = "UPDATE `usuarios` SET `senha` = '2' WHERE `usuarios`.`id` = 87 ";
if(mysqli_query($link, $sql)){
    echo "Server Maintainence Deactivated";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>