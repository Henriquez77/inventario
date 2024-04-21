<?php
include_once('../DAO/Productos.php');
$productos = new Productos($conn);
$productosList = $productos->GetAll();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han enviado todos los campos requeridos
    if (isset($_POST['titulo']) && isset($_POST['talla']) && isset($_POST['marca']) && isset($_POST['estilo']) && isset($_POST['precio']) && isset($_POST['genero']) && isset($_POST['cantidad']) && isset($_POST['categoria'])) {
        $titulo = $_POST['titulo'];
        $talla = $_POST['talla'];
        $marca = $_POST['marca'];
        $estilo = $_POST['estilo'];
        $precio = $_POST['precio'];
        $genero = $_POST['genero'];
        $cantidad = $_POST['cantidad'];
        $categoria = $_POST['categoria'];
        $productos->InsertZapatos($titulo, $talla, $marca, $estilo, $precio, $genero, $cantidad, $categoria);
        header("Location: productos.php");
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
                                    <li><a class="dropdown-item" href="productos.php">Mostrar Todo</a></li>
                                    <li><a class="dropdown-item" href="filtrarPorCategoria.php?categoria=zapatos&campo=Tipo&campo=Fragancia&campo=Tamaño    ">Zapatos</a></li>
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
                                <input class="form-check-input" type="checkbox" id="zapatos" checked onclick="uncheckOthers('zapatos')">
                                <label class="form-check-label" for="zapatos">Zapatos</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="lociones"  onclick="uncheckOthers('lociones')">
                                <label class="form-check-label" for="lociones">Lociones</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="mochilas"  onclick="uncheckOthers('mochilas')">
                                <label class="form-check-label" for="mochilas">Mochilas</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="tuallas"  onclick="uncheckOthers('tuallas')">
                                <label class="form-check-label" for="tuallas">Tuallas</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="cremas"  onclick="uncheckOthers('cremas')">
                                <label class="form-check-label" for="cremas">Cremas</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="jueguetes"  onclick="uncheckOthers('jueguetes')">
                                <label class="form-check-label" for="jueguetes">Jueguetes</label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="ropa"  onclick="uncheckOthers('ropa')">
                                <label class="form-check-label" for="ropa">Ropa</label>
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
                        <div class="input-group mb-3">
                            <select class="form-select form-select-lg mb-3" name="categoria" aria-label=".form-select-lg example">
                                <option selected>Categoria</option>
                                <option value="1">Zapatos</option>
                            </select>
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
    <script src="../js/ocultarCamposProductos.js"></script>
</body>

</html>