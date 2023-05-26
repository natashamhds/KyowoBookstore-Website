<?php
			include_once 'database.php';
			session_start();
			if (isset($_SESSION['staffid'])) {
				if ($pos==="Admin") {
					header("location:index.php");
				}
				else if($pos==="Staff") {
					header("location:indexx.php");
				}
				else {
					header("location:indexxx.php");
				}
			}

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				if (isset($_POST["login"])) {
					if (empty($_POST["staffid"]) || empty($_POST["password"])) {
						$message = '<label>All fields are required</label>'; 
					}
					else {
						$query = "SELECT * FROM tbl_staffs_a180900_mypt2 WHERE FLD_STAFF_ID = :staffid AND FLD_STAFF_PASS = :password";

						$stmt = $conn->prepare($query);  
						$stmt->execute(  
							array(  
								'staffid'=>$_POST["staffid"], 
								'password'=>$_POST["password"] 
							)  
						);  
						$count = $stmt->rowCount();  
						if($count > 0) {  
							$_SESSION["staffid"] = $_POST["staffid"]; 
							header("location:login_success.php");  
						}  
						else {  
							$message = '<label>Wrong Password</label>';  
						}
					}
				}
			}
			catch(PDOException $error) {
				$message = $error->getMessage();
			}
			?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kiyowo BookStore: Login</title>

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
	<style>
		/* Importing fonts from Google */
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

		body {
			margin: 0;
			padding: 0;
			font-family: 'Poppins', sans-serif;
			box-sizing: border-box;
			background: #ecf0f3;
		}

		.wrapper {
			max-width: 350px;
			min-height: 500px;
			margin: 80px auto;
			padding: 40px 30px 30px 30px;
			background-color: #ecf0f3;
			border-radius: 15px;
			box-shadow: 1px 1px 20px #cbced1, -1px -1px 20px #fff;
		}

		.logo {
			width: 80px;
			margin: auto;
		}

		.logo img {
			width: 100%;
			height: 80px;
			object-fit: cover;
			border-radius: 50%;
			box-shadow: 0px 0px 3px #5f5f5f,
			0px 0px 0px 5px #ecf0f3,
			8px 8px 15px #a7aaa7,
			-8px -8px 15px #fff;
		}

		.wrapper .name {
			font-weight: 600;
			font-size: 1.4rem;
			letter-spacing: 1.3px;
			padding-left: 10px;
			color: #555;
		}

		.wrapper .form-field input {
			width: 100%;
			display: block;
			border: none;
			outline: none;
			background: none;
			font-size: 1.2rem;
			color: #666;
			padding: 10px 15px 10px 10px;
			/* border: 1px solid red; */
		}

		.wrapper .form-field {
			padding-left: 10px;
			margin-bottom: 20px;
			border-radius: 20px;
			box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
		}

		.wrapper .form-field .fas {
			color: #555;
		}

		.wrapper .btn {
			box-shadow: none;
			width: 100%;
			height: 40px;
			background-color: #CA96BA;
			color: #fff;
			border-radius: 25px;
			box-shadow: 3px 3px 3px #b1b1b1,
			-3px -3px 3px #fff;
			letter-spacing: 1.3px;
		}

		.wrapper .btn:hover {
			background-color: #B590B9;
		}

		.wrapper a {
			text-decoration: none;
			font-size: 0.8rem;
			color: #9091B9;
		}

		.wrapper a:hover {
			color: #9091B9;
		}

		@media(max-width: 380px) {
			.wrapper {
				margin: 30px 20px;
				padding: 40px 15px 15px 15px;
			}
		}
	</style>
	<script src="https://kit.fontawesome.com/9fa6b7b6ab.js" crossorigin="anonymous"></script>

</head>
<body style="background-image: url(background2.png);">

	<div class="wrapper" >
		<div class="logo">
			<img src="logo.png" alt="">
		</div>
		<div class="text-center mt-4 name">
			Kiyowo BookStore
		</div>
		<form method="post" class="p-3 mt-3">
			<div class="form-field d-flex align-items-center">
				<span class="far fa-user" style="color: #B590B9" ></span>
				<input type="text" name="staffid" id="staffid" placeholder="Username" class="form-control">
			</div>
			<div class="form-field d-flex align-items-center">
				<span class="fas fa-key" style="color: #B590B9"></span>
				<input type="password" name="password" id="password" placeholder="Password" class="form-control">
			</div>
			<input type="submit" name="login" class="btn mt-3" value="Login">
		</form>
		<div class="text-center fs-6">
			<a href="https://lrgs.ftsm.ukm.my/users/a180900/">A180900</a>
		</div>
		<div class="text-center fs-6">
              <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?> 
                </div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
</body>
</html>