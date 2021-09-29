<?PHP
include '/storage/ssd2/914/15336914/public_html/DB.php';
$data = '';

//login.php?username=dGVzdA==&password=dGVzdHBhc3M=
if (!empty($_GET) ) {
    if (!empty($_GET['username']) && !empty($_GET['vendedor']) && !empty($_GET['enddate']) && !empty($_GET['password'])) {
        // (base64_decode($_GET['username']) == 'test' && base64_decode($_GET['password']) == 'testpass') {
        $Username = base64_decode($_GET['username']);
        $Password = base64_decode($_GET['password']);
        $Vendedor = base64_decode($_GET['vendedor']);
        $date_1_hora = date('Y-m-d H:i', strtotime('-4 Hours'));
        $date = $date_1_hora;
        $Expiration = base64_decode($_GET['enddate']);
        $true = 2;
            $fetch = "INSERT INTO `tokens2`(`Username`, `Password`, `Vendedor`, `StartDate`, `EndDate`, `UID`, `Expiry`) VALUES ('$Username','$Password','$Vendedor','$date','$Expiration', NULL, '$true')";
            $fire = mysqli_query($conn,$fetch);
            //echo $fetch;
            $data->code = "1";
            $data->msg = "successfully logged in!";
        
        
    }else{
        $data->code = "0";
        $data->msg = "Failed";
    }
}

header('Content-Type: text/plain');
echo json_encode($data);