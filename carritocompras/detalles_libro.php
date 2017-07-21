<?php session_start();?>
<html>
<head>
    <title>Carrito de Compras</title>
	<link href="css/estilos.css" type="text/css" rel="stylesheet"> 
</head>

<body>

<?php

//Agregamos la Cabecera ala Pagina
 include('includes/header.php');
 require_once('class/Catalogo.php');
 
 $isbn=$_GET['isbn'];
 
 $obj= new Catalogo();
 $libro=$obj->get_detalles_libro($isbn);
?>

<h2><?php echo $libro[0]['titulo'];?></h2>

<?php
if (is_array($libro))
{	
?>
<table>

<tr>

<td>
<img src="<?php echo $libro[0]['imagen']; ?>" border="0"/>
</td>

<td>

<ul>

<li><b>Autor:</b> <?php echo $libro[0]['autor'];?> 
<li><b>ISBN:</b> <?php echo $libro[0]['isbn'];?>
<li><b>Nuestro Precio:</b> <?php echo $libro[0]['precio'];?>
<li><b>Descripcion:</b> <?php echo $libro[0]['descripcion'];?>

</ul>

</td>

</tr>

</table>
<?php
}
else
  echo "Los detalles de este libro no pueden ser mostrados en este momento.";
  echo "<hr>"; 
?>


<a href="ver_carrito.php?new=<?php echo $libro[0]['isbn']; ?>">
<img src="images/icono-carrito-de-compras.jpg" border="0">
</a>

</body>

</html>