<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Nuevo libro</h1>
	<form action="insertar_libro.php" method="post">
		<label for="titulo">Título:</label>
		<input type="text" name="titulo" size="50" required aria-required="true" /><br />
		<label for="autor">Autor:</label>
		<input type="text" name="autor" size="50" required aria-required="true" /><br />
		<label for="editorial">Editorial:</label>
		<input type="text" name="editorial" size="50" required aria-required="true" /><br />
		<label for="genero">Género:</label>
		<select name="genero">
			<option value="drama">Drama</option>
			<option value="ciencia ficción">Ciencia ficción</option>
			<option value="intriga">Intriga</option>
			<option value="otros">Otros</option>
		</select><br />
		<label for="paginas">Num. páginas:</label>
		<input type="number" name="paginas" size="10" /><br />
		<label for="fechaLanzamiento">Fecha de lanzamiento:</label>
		<input type="date" name="fechaLanzamiento" size="10" /><br />
		<label for="precio">Precio:</label>
		<input type="number" name="precio" size="10" /><br />
		<input type="submit" />
	</form>
</body>
</html>