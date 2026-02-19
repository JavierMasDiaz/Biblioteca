<?php
	if (!isset($_REQUEST['titulo']))
		header("Location:listado_libros.php");

	$bd = @mysqli_connect("db", "root", "rootpass", "biblioteca", 3306);
	mysqli_set_charset($bd, "utf8");
	if (mysqli_connect_errno() != 0)
	{
		header("Location:listado_libros.php?error=" . mysqli_connect_error());
	} else {
		$titulo = $_REQUEST['titulo'];
		$autor = $_REQUEST['autor'];
		$editorial = $_REQUEST['editorial'];
		$genero = $_REQUEST['genero'];
		$paginas = $_REQUEST['paginas'];
		$fechaLanzamiento = $_REQUEST['fechaLanzamiento'];
		$precio = $_REQUEST['precio'];
		if (empty($paginas))
			$paginas = "NULL";
		if (empty($precio))
			$precio = "NULL";
		if (empty($fechaLanzamiento))
			$fechaLanzamiento = "NULL";		
		else
			$fechaLanzamiento = "'$fechaLanzamiento'";
		$resultado = mysqli_query($bd, "INSERT INTO libro(titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) VALUES ('$titulo', '$autor', '$editorial', '$genero', $paginas, $fechaLanzamiento, $precio)");
		if (mysqli_errno($bd) != 0)
		{
			header("Location:listado_libros.php?error=" . mysqli_error($bd));
		}
		else if ($resultado === false)
		{
			header("Location:listado_libros?error=Error+al+insertar");
		} 
		else
		{
			header("Location:listado_libros.php");
		}
		mysqli_close($bd);
	}
?>


