<?php
include_once('../Productos.php');
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
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Talla</th>
                                <th>Tamaño</th>
                                <th>Género</th>
                                <th>Marca</th>
                                <th>Fragancia</th>
                                <th>Estilo</th>
                                <th>Cantidad Disponible</th>
                                <th>Categoría</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productosList as $producto) : ?>
                                <tr>
                                    <td><?= $producto['ID_Producto'] ?></td>
                                    <td><?= $producto['Titulo'] ?></td>
                                    <td><?= $producto['Tipo'] ?></td>
                                    <td><?= $producto['Precio'] ?></td>
                                    <td><?= $producto['Talla'] ?></td>
                                    <td><?= $producto['Tamaño'] ?></td>
                                    <td><?= $producto['Genero'] ?></td>
                                    <td><?= $producto['Marca'] ?></td>
                                    <td><?= $producto['Fragancia'] ?></td>
                                    <td><?= $producto['Estilo'] ?></td>
                                    <td><?= $producto['CantidadDisponible'] ?></td>
                                    <td><?= $producto['CategoriaNombre'] ?></td>
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
</body>

</html>