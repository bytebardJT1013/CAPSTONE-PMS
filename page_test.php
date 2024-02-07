 <!DOCTYPE html> 
 <html> 

<head>
	<title>LOGIN</title>
	<style>
		body {
			background: #EBEBD3;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			flex-direction: column;
		}


		* {
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
			box-sizing: border-box;
		}

		form {

			width: 500px;
			border: 2px solid #ccc;
			padding: 30px;
			background: #fff;
			border-radius: 15px;

		}

		h2 {
			text-align: center;
			margin-bottom: 40px;
		}

		input {
			display: block;
			border: 2px solid #ccc;
			width: 95%;
			padding: 10px;
			margin: 10px auto;
			border-radius: 5px;
		}

		label {
			color: #888;
			font-size: 18px;
			padding: 10px;
			font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		}

		button {
			float: right;
			background: #555;
			padding: 10px 15px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
		}

		button:hover {
			opacity: .7;
		}

		.error {
			background: #F2DEDE;
			color: #A94442;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
			margin: 20px auto;
		}

		h1 {
			text-align: center;
			color: #A94442;
			align-items: top;
		}

		h3 {
			text-align: center;
			color: black;
		}

		a {
			float: right;
			background: #555;
			padding: 10px 15px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
			text-decoration: none;
		}

		a:hover {
			opacity: .7;
		}

		.d-flex {
		
			justify-content: center;
			align-items: center;
		}

	</style>
</head>


<link href="assets/img/csta19x19.png" rel="icon">
<link href="assets/img/csta19x19.png" rel="apple-touch-icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

<div class="d-flex justify-content-center py-4">
	<h1> CSTA-PMS </h1>
	<h3> (Colegio de Sta. Teresa de Avila's Property Management Sytem) </h3>
</div>

<form action="login_test.php" method="post">
	<h2>LOGIN</h2>

	<body>
		<div class="login_preset">
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<input type="text" name="uname" placeholder="User ID"><br>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit"><i class="fa-solid fa-right-to-bracket"> Login </i></button>
		</div>
</form>


<div class="credits">
	<br>
	A Capstone Project by Achondo,Bunag and Quimora
</div>

</body>

</html>






