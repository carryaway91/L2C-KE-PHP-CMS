<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Signin Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->

		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	</head>



	<body>

		<div class="container">

			

			<form method="post" action="login_check.php" class="form-signin"> <!--dolezite pridaj METHOD ACTION -->

				<h2 class="form-signin-heading">Please sign in</h2>

				

				<label for="inputEmail" class="sr-only">Email address</label>

				<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <!--ZAPIS ATRIBUT NAME A V DURHOM INPUTE PASSWORD pretoze podla tycho attributov checkujeme z udajmi z databazy -->
				

				<label for="inputPassword" class="sr-only">Password</label>

				<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

				

				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                   
			</form>
           


		</div>

	</body>

</html>