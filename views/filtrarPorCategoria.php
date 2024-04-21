<?php
include_once('../DAO/Productos.php');
// Verificar si ambos parámetros 'categoria' y 'columnas' están presentes y no están vacíos
if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    // Aquí puedes usar $categoria y $columnas
} else {
    // Si alguno de los parámetros no está presente o está vacío, redirigir a otra página
    header("Location: productos.php");
    exit; // Asegura que el script se detenga después de la redirección
}
$productos = new Productos($conn);
$productosList = $productos->GetByCategoria($categoria);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/styleProductos.css">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <title>Sistema de Inventario</title>
</head>

<body>
    <header>
        <div class="container">
            <h1>Sistema de Inventario</h1>
            <h3>Productos</h3>
        </div>
    </header>
    <nav>
        <div class="container">
            <!-- Tu menú de navegación aquí -->
        </div>
    </nav>
    <main>
        <div class="container container-main">
            <section id="productos">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-10">
                            <h2>Lista de Productos</h2>
                        </div>
                        <div class="col-sm-2">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Filtrar por categorías
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="productos.php">Mostrar Todo</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=zapatos">Zapatos</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=lociones">Lociones</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=mochilas">Mochilas</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=toallas">Toallas</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=cremas">Cremas</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=juguetes">Juguetes</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=ropa">Ropa</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th id="ID_Producto">ID Producto</th>
                                <th id="Titulo">Título</th>
                                <th id="Tipo">Tipo</th>
                                <th id="Precio">Precio</th>
                                <th id="Talla">Talla</th>
                                <th id="Tamaño">Tamaño</th>
                                <th id="Genero">Género</th>
                                <th id="Marca">Marca</th>
                                <th id="Fragancia">Fragancia</th>
                                <th id="Estilo">Estilo</th>
                                <th id="CantidadDisponible">Cantidad Disponible</th>
                                <th id="CategoriaNombre">Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productosList as $producto) : ?>
                                <tr>
                                    <td id="ID_Producto"><?= $producto['ID_Producto'] ?></td>
                                    <td id="Titulo"><?= $producto['Titulo'] ?></td>
                                    <td id="Tipo"><?= $producto['Tipo'] ?></td>
                                    <td id="Precio"><?= $producto['Precio'] ?></td>
                                    <td id="Talla"><?= $producto['Talla'] ?></td>
                                    <td id="Tamaño"><?= $producto['Tamaño'] ?></td>
                                    <td id="Genero"><?= $producto['Genero'] ?></td>
                                    <td id="Marca"><?= $producto['Marca'] ?></td>
                                    <td id="Fragancia"><?= $producto['Fragancia'] ?></td>
                                    <td id="Estilo"><?= $producto['Estilo'] ?></td>
                                    <td id="CantidadDisponible"><?= $producto['CantidadDisponible'] ?></td>
                                    <td id="CategoriaNombre"><?= $producto['CategoriaNombre'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </main>

    <!-- <footer>
        <div class="container">
            <p>&copy; 2024 Sistema de Inventario</p>
        </div>
    </footer> -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/scriptProductos.js"></script>
    <script src="../js/scriptFiltros.js"></script>
</body>

</html>