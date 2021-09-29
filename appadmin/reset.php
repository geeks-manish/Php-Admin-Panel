<?PHP
include '/storage/ssd2/914/15336914/public_html/DB.php';
$data = '';

//login.php?username=dGVzdA==&password=dGVzdHBhc3M=
if (!empty($_GET) ) {
    if (!empty($_GET['username'])) {
        // (base64_decode($_GET['username']) == 'test' && base64_decode($_GET['password']) == 'testpass') {
        $Username = base64_decode($_GET['username']);
            $fetch = "UPDATE tokens2 SET UID=NULL WHERE `Username` = '$Username'";
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