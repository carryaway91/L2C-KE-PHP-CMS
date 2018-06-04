
<?php
 require_once dirname(__FILE__).'/../framework/helpers.php'; 
 require_once dirname(__FILE__).'/../framework/loggedin.php';
	
 if(!empty($_POST)) {
	if(!empty($_POST['action'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$nickname = $_POST['nickname'];
		$id = $_POST['id'];


		switch($_POST['action']) {		
			case 'insert': 
				if(!empty($email) && !empty($password) && !empty($nickname)) {
					db_query("INSERT INTO users (email, password, nickname) VALUES ('".$email."','".$password."','".$nickname."')");
				}
			break;
			case 'update':
				if(!empty($_POST['id'])) {
					if (!empty($email) && !empty($nickname) ) {
					db_query("UPDATE users SET email='".$email."', nickname='".$nickname."' WHERE ID=".$id);
					}
				}
			break;
			case 'delete': if(!empty($id)) {
					db_query("DELETE FROM users WHERE ID='".$id."'");
			}
			break;
		}
		header('Location: users.php');
	}
}
$users = db_select('SELECT * FROM users');

?>
<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1">



		<title>Dashboard Template for Bootstrap</title>



		<!-- Bootstrap core CSS -->

		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	</head>



	<body>


        <?php
		require_once dirname(__FILE__).'/parts/header.php';?>
		<div class="container-fluid">

			<div class="row">

				<div class="col-sm-12 col-md-12 main">

					<h1 class="page-header">Users</h1>
					<a href="user.php">Add new user</a>

					<div class="table-responsive">

						<table class="table table-striped">

							<thead>

								<tr>

									<th>id</th>

									<th>email</th>

									<th>nickname</th>

									<th>Actions</th>

								</tr>

							</thead>

							<tbody>

								<!-- add PHP here -->
                            <?php 
                            foreach($users as $user) {
                                echo "<tr>";
                                echo "<td>".$user->ID."</td>";
                                
                                echo "<td>".$user->email."</td>";
								echo "<td>".$user->nickname."</td>";
								echo "<td><a href='user.php?id=".$user->ID."'>Update</a></td>";
                                echo "</tr>";
                            }  
                            
                          
                                ?>
								<!-- add PHP here -->

							</tbody>

						</table>

					</div>

				</div>

			</div>

		</div>



		<!-- Bootstrap core JavaScript

		================================================== -->

		<!-- Placed at the end of the document so the pages load faster -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	</body>

</html>