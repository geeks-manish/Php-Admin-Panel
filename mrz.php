<?php
include 'DB.php';
include 'Global.php';

if($maintenance == false){
     $conn->query("DELETE FROM `tokens` WHERE `Username` = '".$_GET['no']."'");   
}

?>

<script type="text/javascript">
	alert("key removed successfully");
	window.location.href='painel2.php';
</script>