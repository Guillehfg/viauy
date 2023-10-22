<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/backoffice-panel.css">
</head>

<body class="backoffice-panel">
    <header>
        <img src="img/logos-png/Viauy-backoffice.png" width="20%" height="10%" alt="">

        <?php require 'src/vista/menu_backoffice.php'; ?>

    </header>
    <main>
        <div class="panel">
            <div class="title-panel">
                <h1>Agregar Línea</h1>
            </div>
            <form id="form_backoffice_editar" action="" class="editar-linea">
                <div class="news-input">
                    <label for="">ID de Coche</label>
                    <input id="id_coche" type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Origen</label>
                    <input id="origen" type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Destino</label>
                    <input id="destino" type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Hora Salida</label>
                    <input id="hora_salida" type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Hora Llegada</label>
                    <input id="hora_llegada" type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Precio</label>
                    <input id="precio" type="text" required>
                </div>
                <div class="texto-error">
                </div>
                <div class="button-box-editar">
                    <button id="editar_linea" type="button">Agregar</button>
                </div>
            </form>

            <hr>
            <div class="news-create">
                <h1>Modificar Línea</h1>

            </div>


        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="public/js/backoffice.js"></script>
</body>

</html>