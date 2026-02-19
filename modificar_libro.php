<?php
	if (!isset($_REQUEST['titulo']))
		header("Location:listado_libros.php");

	$bd = @mysqli_connect("localhost", "root", "", "biblioteca", 3307);
	mysqli_set_charset($bd, "utf8");
	if (mysqli_connect_errno() != 0)
	{
		header("Location:listado_libros?error=" . mysqli_connect_error());
	} else {
		$codigo = $_REQUEST['codigo'];
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
		$resultado = mysqli_query($bd, "UPDATE libro SET titulo='$titulo', autor='$autor', editorial='$editorial', genero='$genero', paginas=$paginas, fechaLanzamiento=$fechaLanzamiento, precio=$precio WHERE codigo=$codigo");
		if (mysqli_errno($bd) != 0)
		{
			header("Location:listado_libros?error=" . mysqli_error($bd));
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
