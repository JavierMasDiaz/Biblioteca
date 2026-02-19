<?php
	if (!isset($_REQUEST['id']))
		header("Location:listado_libros.php");

	$bd = @mysqli_connect("localhost", "root", "", "biblioteca", 3307);
	mysqli_set_charset($bd, "utf8");
	if (mysqli_connect_errno() != 0)
	{
		header("Location:listado_libros?error=" . mysqli_connect_error());
	} else {
		$resultado = mysqli_query($bd, "DELETE FROM libro WHERE codigo = " . $_REQUEST['id']);
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
