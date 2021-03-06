<?php 
session_start();
if (empty($_SESSION["usuario"])) {
	header("refresh:0; ../index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agergar Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/svg+xml" href="../favicon/moon-solid.svg" sizes="any">
    <meta http-equiv="x-ua-compatible" content="ie-edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/maina.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/forms.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<style>
		form {margin-bottom: 50px}
	</style>
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light sticky-top">
     	<div class="container">
		  <a class="navbar-brand" href="#"><i class="fas fa-moon logo" id="moon"><b class="logo">Moon System</b></i></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="../maina.view.php"><i class="fas fa-home menus"></i> Inicio<span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-shopping-cart menus"></i> Ventas
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Registros</a>
		          <a class="dropdown-item" href="ventaa.php">Nueva Venta</a>
		          <a class="dropdown-item" href="#">Consultas</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-address-card"></i> Clientes
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Ver Clientes</a>
		          <a class="dropdown-item" href="#">Agregar Cliente</a>
		          <a class="dropdown-item" href="#">Consultas</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-box-open"></i> Productos
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="productos.php">Ver Productos</a>
		          <a class="dropdown-item" href="nuevoProducto.php">Agregar Poductos</a>
		          <a class="dropdown-item" href="categorias.php">Categorias</a>
		          <a class="dropdown-item" href="productosxcategoria.php">Productos por Categoria</a>
		          <a class="dropdown-item" href="#">Consultas</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          <i class="fas fa-user-tie"></i> Usuarios
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="verUsuarios.php">Ver Usuarios</a>
		          <a class="dropdown-item" href="nuevoVendedeor.php">Agregar Usuarior</a>
		          <a class="dropdown-item" href="#">Consultas</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		        	<i class="fas fa-envelope-open"></i>
		          <?php 
		          echo $_SESSION["usuario"];
		          ?>
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="../scripts/close.php">Cerrar Sesion</a></a>
		        </div>
		      </li>
		    </ul>
		  </div>
		  </div>
	</nav>

<!-- ***************Inicio del sitio******************* -->
	<?php 
	include '../scripts/database.php';
	$vendedor = $_SESSION["vendedor"];
	$user=new Database();
	$user->conectarBD();
	$cadena = "SELECT*FROM usuarios WHERE id = '$vendedor'";
	$registro = $user->seleccionar2($cadena);
	$nombre = $registro['nombre'] ." ". $registro['apellidos'];
	$id = $registro['id'];
	$user->desconectarBD();
	 ?>
	 <?php 
	 $clientes=new Database();
	 $clientes->conectarBD();
	 $cadena = "SELECT * FROM clientes";
	 $cliente = $clientes->seleccionar($cadena);
	 $clientes->desconectarBD();
	  ?>
	 <?php 
	 $productos=new Database();
	 $productos->conectarBD();
	 $cadena = "SELECT * FROM productos";
	 $producto = $productos->seleccionar($cadena);
	 $productos->desconectarBD();
	  ?>
	<div class="container">
		<form action="../scripts/venta.php" method="post" class="form col-md-6 col-11">
			<h2>Realizar Venta</h2>
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text"># de Vendedor </span>
			    </div>
			    <input type="text" class="form-control" id="" name="id" aria-describedby="emailHelp" value="<?php echo $id; ?>" disabled>
		  	</div>
			<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Nombre </span>
			    </div>
			    <input type="text" class="form-control" id="" name="vendedor" aria-describedby="emailHelp" value="<?php echo $nombre; ?>" disabled>
		  	</div>
		  	<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Cliente </span>
			    </div>
		    	<select class="form-control" id="sel1" name="cliente">
				     <?php foreach ($cliente as $value): ?>
				     	<option value="<?php echo $value->id; ?>"> <?php echo $value->nombre ." ". $value->apellidos; ?> </option>
				     <?php endforeach; ?>
				</select>
		  	</div>
		  	<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Producto </span>
			    </div>
		    	<select class="form-control" id="sel1" name="producto">
				     <?php foreach ($producto as $value): ?>
				     	<option value="<?php echo $value->reg; ?>"> <?php echo $value->folio ."  -$". $value->precio_venta; ?> </option>
				     <?php endforeach; ?>
				</select>
		  	</div>
		  	<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Cantidad </span>
			    </div>
			    <input type="number" class="form-control" id="" name="cantidad" aria-describedby="emailHelp" value="1" min="1" required>
		  	</div>
		  	<div class="input-group mb-3">
			    <div class="input-group-prepend">
			      <span class="input-group-text">Forma de pago </span>
			    </div>
		    	<select class="form-control" id="sel1" name="pago">
		    		<option value="EFECTIVO">Efectivo</option>
		    		<option value="CREDITO">Credito</option>
				</select>
		  	</div>
		  	<button type="submit" class="btn btn-lg btn-success" style="width: 100%">Registrar</button>
		</form>
	</div>
<!-- ***************Termino contenido del sitio******************** -->
   <!-- Enlazes a Jquery -->
    <script src="../js/popper.min.js"></script>
    <script src="../js/jquery-3.5.1.slim.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>