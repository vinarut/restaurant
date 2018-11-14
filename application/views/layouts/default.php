<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"
	      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	      crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
    </script>
	<title><?php echo $title; ?></title>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-light justify-content-center">
		<ul class="navbar-nav d-flex bd-highlight">
			<li class="nav-item p-2 flex-fill bd-highlight">
				<a class="nav-link" href="/index">Главная</a>
			</li>
			<li class="nav-item p-2 flex-fill bd-highlight">
				<a class="nav-link" href="/category">Категории</a>
			</li>
			<li class="nav-item p-2 flex-fill bd-highlight">
				<a class="nav-link" href="/dish">Блюда</a>
			</li>
			<li class="nav-item p-2 flex-fill bd-highlight">
				<a class="nav-link" href="/dishIngredients">Состав</a>
			</li>
			<li class="nav-item p-2 flex-fill bd-highlight">
				<a class="nav-link" href="/ingredient">Ингредиенты</a>
			</li>
		</ul>
	</nav>
	<?php echo $content; ?>
</body>
</html>