<?php
include_once('../Productos.php');
$productos = new Productos($conn);
$productosList = $productos->GetAll();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado todos los campos requeridos
    if (isset($_POST['titulo']) && isset($_POST['talla']) && isset($_POST['marca']) && isset($_POST['estilo']) && isset($_POST['precio']) && isset($_POST['genero']) && isset($_POST['cantidad'])) {
        $titulo = $_POST['titulo'];
        $talla = $_POST['talla'];
        $marca = $_POST['marca'];
        $estilo = $_POST['estilo'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];
        $cantidad = $_POST['cantidad'];
        $id = 1;
        $productos->Insert($titulo, $talla, $marca, $estilo, $precio, $genero, $cantidad, $id);
        //header("Location: views/productos.php");
    }
}
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
                        <div class="col-sm-8">
                            <h2>Lista de Productos</h2>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar producto</button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ingresar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Zapatos</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Lociones</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Mochilas</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Tuallas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Cremas</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Jueguetes</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Ropa</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <form action="productos.php" method="post">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Titulo</span>
                            <input type="text" class="form-control" name="titulo" placeholder="Descripcion corta" aria-label="" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select form-select-lg mb-3" name="talla" aria-label=".form-select-lg example">
                                <option selected>Tallas</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Marca</span>
                            <input type="text" required class="form-control" name="marca" placeholder="Descripcion corta" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Estilo</span>
                            <input type="text" required class="form-control" name="estilo" placeholder="Descripcion corta" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input type="text" required class="form-control" name="precio" aria-label="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Genero</span>
                            <input type="text" required class="form-control" name="genero" placeholder="Descripcion corta" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Cantidad</span>
                            <input type="text" required class="form-control" name="cantidad" placeholder="Descripcion corta" aria-label="" aria-describedby="basic-addon1">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>

                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
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