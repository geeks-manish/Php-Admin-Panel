<?php
include 'DB.php';
// Sessão
session_start();
// Verificação
if(!isset($_SESSION["$sessao"])):
	header('Location: verification.php');
endif;
?>
<html lang="en">
<head>
	<title>Vendedores</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images3/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor3/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts3/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor3/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendo3r/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor3/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css3/util.css">
	<link rel="stylesheet" type="text/css" href="css3/main2.css">
<!--===============================================================================================-->



<style>
    
    h2 {
        color:yellow;
    }
    
     h3 {
        color:red;
        font-size: 20px;
    }

        .sair {
	    text-align: center;
	    padding: 10px;
	}
    
    .search {
		text-align: right;
	    margin-right: 20px;
	    padding: 10px;
	    display: inline-block;
	}
	.number {
		text-align: right;
	    margin-right: 20px;
	    padding: 10px;
	    display: inline-block;
	}
	.reset {
		text-align: right;
	    margin-right: 20px;
	    padding: 10px;
	    display: inline-block;
	}
     input[type=number] {
display:  inline-block;
padding: 1px;
    }
    
      input[type=submit] {
display:  inline-block;
padding: 1px;
    }
    
     input[type=text] {
display:  inline-block;
padding: 1px;
    }
</style>
</head>
<body>

	<div class="limiter">
	   
		<div class="container-table100">
		   
			<div class="wrap-table100">
			    
			 		<br></br>
			 		<h2>Delimitado para <?php if(isset($_GET['number']))
{
$key=$_GET["number"];  //key=pattern to be searched
$nome="Hyupai";
echo $key;
}?></h2>
			 		
			 	<br></br>
				<div class="table100">
				  
					<table>
						<thead>
							<tr class="table100-head">
							    <th class="column1">ID</th>
								<th class="column2">Usuario</th>
								<th class="column3">Senha</th>
								<th class="column4">Creditos</th>
								<th class="column5">Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php
					
$result2=mysqli_query($conn,"select * from `$tabela3`"); 

while($row=mysqli_fetch_assoc($result2))
{
?>
	   <tr>
        <td class="column1"><?php echo $row['id'];?></td>
        <td class="column2"><?php echo $row['login'];?></td>
        <td class="column3"><?php echo $row['senha'];?></td>
        <td class="column4"><?php echo $row['creditos'];?></td>
		<?php
      {
         echo "<td class='column5'> <a href='mrz3.php?no=".$row['id']."'><button type='button' class='btn btn-danger'>Eliminar</button></a> </td>";
      }
}


      ?>
      

								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor3/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor3/bootstrap/js/popper.js"></script>
	<script src="vendor3/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor3/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js3/main.js"></script>

</body>
</html>