<?php
	if (!isset($_REQUEST['id']))
		header("Location:listado_libros.php");
?>
<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Editar libro</h1>

	<?php
		$titulo = "";
		$autor = "";
		$editorial = "";
		$genero = "";
		$paginas = "";
		$fechaLanzamiento = "";
		$precio = "";
		
		$bd = @mysqli_connect("localhost", "root", "", "biblioteca", 3306);
		mysqli_set_charset($bd, "utf8");
		if (mysqli_connect_errno() != 0)
		{
			echo '<p>Error: ' . mysqli_connect_error() . '</p>';
		} else {
			$resultado = mysqli_query($bd, "SELECT * FROM libro WHERE codigo = " . $_REQUEST['id']);
			if (mysqli_errno($bd) != 0)
			{
				echo 'Error: ' . mysqli_error($bd);
			}
			else if (mysqli_num_rows($resultado) > 0)
			{
				while ($fila = mysqli_fetch_assoc($resultado))
				{
					$titulo = $fila['titulo'];
					$autor = $fila['autor'];
					$editorial = $fila['editorial'];
					$genero = $fila['genero'];
					if (isset($fila['paginas']))
						$paginas = $fila['paginas'];
					if (isset($fila['fechaLanzamiento']))
						$fechaLanzamiento = $fila['fechaLanzamiento'];
					if (isset($fila['precio']))
						$precio = $fila['precio'];
				}
			}
			@mysqli_free_result($resultado);
			mysqli_close($bd);
		}
	?>
	<form action="modificar_libro.php" method="post">
		<input type="hidden" name="codigo" value="<?= $_REQUEST['id']; ?>" />
		<label for="titulo">Título:</label>
		<input type="text" name="titulo" size="50" required aria-required="true" value="<?= $titulo; ?>" /><br />
		<label for="autor">Autor:</label>
		<input type="text" name="autor" size="50" required aria-required="true" value="<?= $autor; ?>" /><br />
		<label for="editorial">Editorial:</label>
		<input type="text" name="editorial" size="50" required aria-required="true" value="<?= $editorial; ?>" /><br />
		<label for="genero">Género:</label>
		<select name="genero">
			<?php
				if($genero == 'drama')
					echo '<option value="drama" selected="selected">Drama</option>';
				else
					echo '<option value="drama">Drama</option>';
				if($genero == 'ciencia ficción')
					echo '<option value="ciencia ficción" selected="selected">Ciencia ficción</option>';
				else
					echo '<option value="ciencia ficción">Ciencia ficción</option>';
				if($genero == 'intriga')
					echo '<option value="intriga" selected="selected">Intriga</option>';
				else
					echo '<option value="intriga">Intriga</option>';
				if($genero == 'otros')
					echo '<option value="otros" selected="selected">Otros</option>';
				else
					echo '<option value="otros">Otros</option>';
			?>
		</select><br />
		<label for="paginas">Num. páginas:</label>
		<input type="number" name="paginas" size="10" value="<?= $paginas; ?>" /><br />
		<label for="fechaLanzamiento">Fecha de lanzamiento:</label>
		<input type="date" name="fechaLanzamiento" size="10" value="<?= $fechaLanzamiento; ?>" /><br />
		<label for="precio">Precio:</label>
		<input type="number" name="precio" size="10" value="<?= $precio; ?>" /><br />
		<input type="submit" />
	</form>
</body>

</html>
