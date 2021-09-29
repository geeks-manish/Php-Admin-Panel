<?PHP
include '/storage/ssd2/914/15336914/public_html/DB.php';
$data = '';

//login.php?username=dGVzdA==&password=dGVzdHBhc3M=
if (!empty($_GET) ) {
    if (!empty($_GET['username'])) {
        // (base64_decode($_GET['username']) == 'test' && base64_decode($_GET['password']) == 'testpass') {
        $Username = base64_decode($_GET['username']);
        //$Dias = base64_decode($_GET['password']);

        $sql = "SELECT * FROM tokens2 WHERE Username = '$Username'";
    $resultado = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($resultado);
   $date2 = $dados['EndDate'];


$mod_date = strtotime($date2."+ 30 days");
$adicionardias = date("Y/m/d h:m",$mod_date);
//echo $adicionardias;
//$conn->query("UPDATE tokens SET EndDate='$adicionardias' WHERE `Username` = '$Username'");   
            $fetch = "UPDATE tokens2 SET EndDate='$adicionardias' WHERE `Username` = '$Username'";
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