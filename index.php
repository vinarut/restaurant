<?php



?>

<html>
	<head>
		<meta charset="UTF-8">
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
			crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="index.css">
	</head>

	<body>
		<div class="container">
			<div class="row">
				<form action="index.php" method="post" class="col-lg-12">
					<div class="form-group">
						<label class="label" for="inputCategory">Category</label>
						<input type="text" class="form-control" id="inputCategory" placeholder="Enter category"
							name="category">
					</div>
					<div class="buttons btn-group">
						<input type="submit" class="btn btn-success btn-md col-lg-12" value="Добавить" />
						<input type="submit" class="btn btn-warning btn-md col-lg-12" value="Обновить" />
						<input type="submit" class="btn btn-danger btn-md col-lg-12" value="Удалить" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
