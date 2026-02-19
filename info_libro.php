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
	<h1>Información de libro</h1>
	<?php
		$bd = @mysqli_connect("localhost", "root", "", "biblioteca", 3307);
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
				echo '<ul>';
				while ($fila = mysqli_fetch_assoc($resultado))
				{
					echo "<li>Título: " . $fila['titulo'] . "</li>";
					echo "<li>Autor: " . $fila['autor'] . "</li>";
					echo "<li>Editorial: " . $fila['editorial'] . "</li>";
					echo "<li>Género: " . $fila['genero'] . "</li>";
					if (isset($fila['paginas']))
						echo "<li>Num. páginas: " . $fila['paginas'] . "</li>";
					if (isset($fila['fechaLanzamiento']))
						echo "<li>Fecha de lanzamiento: " . date("d/m/Y", strtotime($fila['fechaLanzamiento'])) . "</li>";					
					if (isset($fila['precio']))
						echo "<li>Precio: " . $fila['precio'] . "&euro;</li>";
				}
				echo '</ul>';
			} else {
				echo '<p>No se ha encontrado el registro especificado.</p>';
			}
			@mysqli_free_result($resultado);
			mysqli_close($bd);
		}
	?>
	<p>[<a href="listado_libros.php">Listado de libros</a>]</p>
</body>
</html>