<?PHP
include '/storage/ssd2/914/15336914/public_html/DB.php';
$data = '';

//login.php?username=dGVzdA==&password=dGVzdHBhc3M=
if (!empty($_GET) ) {
    if (!empty($_GET['username']) && !empty($_GET['vendedor']) && !empty($_GET['enddate']) && !empty($_GET['alvo']) && !empty($_GET['startdate']) && !empty($_GET['password'])) {
        // (base64_decode($_GET['username']) == 'test' && base64_decode($_GET['password']) == 'testpass') {
        $Username = base64_decode($_GET['username']);
        $Password = base64_decode($_GET['password']);
        $alvo = base64_decode($_GET['alvo']);
        $Vendedor = base64_decode($_GET['vendedor']);
        $StartDate = base64_decode($_GET['startdate']);
        $Expiration = base64_decode($_GET['enddate']);
        $true = 2;
            $fetch = "UPDATE `tokens2` SET `Username` = '$Username', `Password` = '$Password', `Vendedor` = '$Vendedor', `StartDate` = '$StartDate', `EndDate` = '$Expiration', `Expiry` = '$true', `UID`= NULL WHERE `Username` = '$alvo'";
            $fire = mysqli_query($conn,$fetch);
            echo $fetch;
            $data->code = "1";
            $data->msg = "successfully logged in!";
        
        
    }else{
        $data->code = "0";
        $data->msg = "Failed";
    }
}

header('Content-Type: text/plain');
echo json_encode($data);