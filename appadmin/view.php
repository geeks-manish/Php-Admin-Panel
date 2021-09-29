<?PHP
include '/storage/ssd2/914/15336914/public_html/DB.php';
$data = '';
error_reporting(0);

//login.php?username=dGVzdA==&password=dGVzdHBhc3M=
if (!empty($_GET) ) {
    if (!empty($_GET['username'])) {
        if (base64_decode($_GET['username']) == 'yourkey') {?>
        <head>
<meta charset="UTF-8">
<title>Hyupai</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/index.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'>
<style>
    body {
    background: url("wallpaper.jpg");
	display: table;
    width: 100%;
  height: 100vh;
  padding: 100px 0;
  
  

  background-position: 30% 45%;
  background-size: cover;
	}
	
	h2 {
	    color: red;
	}
	p {
	    color: red;
	    font-size: 20px;
	}
	
	td {
	    background-color: ##FFFFE0;
	    color:black;
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
	.count {
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
	
	a {
	    font-size: 40px;
	    color: red;
	}
	h8 {
		color: green;
		font-size: 18px;
	}
    .container {
        width: 100%;
    }
    input[type=number] {
display:  inline-block;
padding: 1px;
    }
    
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
           <table class="table table-hover">
    <thead>
      <tr class="info">
        <th>Usuario</th>
        <th>Senha</th>
        <th>Vendedor</th>
        <th>UID</th>
		<th>Data de Registro</th>
        <th>Validade</th>
		<th>Status</th>
      </tr>
    </thead>
    <tbody>
<?php
$fetchqry = "SELECT * FROM `tokens2`";
$result=mysqli_query($conn,$fetchqry);
$num=mysqli_num_rows($result);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
	   <tr>
        <td><?php echo $row['Username'];?></td>
        <td><?php echo $row['Password'];?></td>
        <td><?php echo $row['Vendedor'];?></td>
		<td><?php if ($row['UID'] == NULL) {
    echo "0/1";
 } else {
    echo "1/1";
} 
				?></td>
        <td><?php echo $date1 = $row['StartDate'];?></td>
		<td><?php echo $date2 = $row['EndDate'];?></td>
		<td><?php if(strtotime(date("Y/m/d")) < strtotime($date2)) echo "Online"; else { echo "Offline";} }?></td></body>
		<?php
            
            $data->code = "1";
			$data->msg = "successfully logged in!";
        }else{
			$data->code = "0";
			$data->msg = "Incorrect username or password!";
        }
    }else{
		$data->code = "0";
		$data->msg = "Fill in username and password!";
    }
}

header('Content-Type: text/plain');
//echo json_encode($data);
?>