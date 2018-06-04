 <?php require_once dirname(__FILE__).'/../framework/helpers.php';
	  require_once dirname(__FILE__).'/../framework/loggedin.php';

	if(!empty($_POST)) {
		if(!empty($_POST['action'])) {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$user_id = $_POST['user_id'];
			$menu_label = $_POST['menu_label'];
			$id = $_POST['id'];

			switch($_POST['action']) {		
				case 'insert': 
					if( !empty($_POST['title']) && !empty($_POST['menu_label']) && !empty($_POST['content'])) {
						db_query("INSERT INTO pages(title, menu_label, content, User_ID) VALUES ('".$_POST['title']."','".$_POST['menu_label']."','".$_POST['content']."','".$_POST['user_id']."')");
					}
				break;

				case 'update':
					if(!empty($id)) {
						if (!empty($title) && !empty($content) ) {
							db_query
							("UPDATE pages SET title='".$title."', content='".$content."' WHERE ID='".$id."'");
						}
					}
				break;
				case 'delete': if(!empty($id)) {
						db_query("DELETE FROM pages WHERE ID='".$id."'");
				}
				break;
			}
			header('Location: pages.php');
		}
	}
	$pages = db_select('SELECT * FROM pages');
//pripajame subor s funkciami na vytahovanie dat
//vytiahneme data z databazy do $pages => vznikne nam pole ($data)
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
		<div class="container-fluid">

			<div class="row">

				<div class="col-sm-12 col-md-12 main">

					<h1 class="page-header">Pages</h1>
					<a href="page.php">Add new page</a>
					<div class="table-responsive">

						<table class="table table-striped">

							<thead>

								<tr>

									<th>ID</th>
									<th>title</th>
									<th>content</th>
                                    <th>User_ID</th>
                                    <th>menu_label</th>
                                    <th>menu_order</th>
									<th>Author</th>
                                    <th>Actions</th>
								</tr>

							</thead>

							<tbody>

								<!-- add PHP here -->                   
                                <?php foreach($pages as $page) {
                                    //prechadzame cez pole a vytahujeme cez $page objekt atributy v tabulke
                                        echo '<tr>';
                                        echo '<td>'.$page->ID.'</td>';
                                        echo '<td>'.$page->title.'</td>';
										echo '<td>'.$page->content.'</td>';
										echo '<td>'.$page->User_ID.'</td>';
                                        //echo '<td>'.db_single("SELECT * FROM users WHERE ID=".$page->User_ID)->email.'</td>';
                                        echo '<td>'.$page->menu_label.'</td>';
										echo '<td>'.$page->menu_order.'</td>';

										$user = db_single('SELECT * FROM users WHERE ID='.$page->User_ID);
										echo '<td><a href="user.php?id='.$user->ID.'">'.$user->nickname.'</a></td>';
										echo '<td><a href="page.php?id='.$page->ID.'">Update</a></td>';

                                        echo '</tr>';
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