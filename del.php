<?php
include 'DB.php';
include 'Global.php';

if($maintenance == false){
     $conn->query("DELETE FROM `tokens` ");   
}

?>

<script type="text/javascript">
	alert("All Key removed successfully");
	window.location.href='painel2.php';
</script>