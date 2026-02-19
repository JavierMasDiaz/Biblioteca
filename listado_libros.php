<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<style>
		.error { color: red; }
	</style>
</head>
<body>
	<h1>Listado de libros</h1>
	<?php
		if (!empty($_REQUEST['error']))
			echo '<p class="error">' . $_REQUEST['error'] . '</p>';
		$bd = @mysqli_connect("db", "root", "rootpass", "biblioteca", 3306);
		mysqli_set_charset($bd, "utf8");
		if (mysqli_connect_errno() != 0)
		{
			echo '<p>Error: ' . mysqli_connect_error() . '</p>';
		} else {
			$resultado = mysqli_query($bd, "SELECT codigo, titulo, autor FROM libro");
			if (mysqli_errno($bd) != 0)
			{
				echo 'Error: ' . mysqli_error($bd);
			}
			else if (mysqli_num_rows($resultado) > 0)
			{
				echo '<ul>';
				while ($fila = mysqli_fetch_assoc($resultado))
				{
					$codigo = $fila['codigo'];
					$titulo = $fila['titulo'];
					$autor = $fila['autor'];
					echo "<li>$titulo ($autor) [<a href=\"info_libro.php?id=$codigo\">Ver información</a>] [<a href=\"borrar_libro.php?id=$codigo\">Borrar libro</a>] [<a href=\"edicion_libro.php?id=$codigo\">Modificar_datos</a>]</li>";
				}
				echo '</ul>';
			} else {
				echo '<p>No se han encontrado registros que mostrar.</p>';
			}
			@mysqli_free_result($resultado);
			mysqli_close($bd);
		}
	?>
	<p>[<a href="index.php">Página principal</a>]</p>	
</body>

</html>

