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
            <form action="" class="editar-linea">
                <div class="news-input">
                    <label for="">ID de Coche</label>
                    <input type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Origen</label>
                    <input type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Destino</label>
                    <input type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Hora Salida</label>
                    <input type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Hora Llegada</label>
                    <input type="text" required>
                </div>
                <div class="news-input">
                    <label for="">Precio</label>
                    <input type="text" required>
                </div>
                <div class="button-box-editar">
                    <input type="submit" value="Agregar">
                </div>
            </form>
            
            <hr>
            <div class="news-create">
                <h1>Modificar Línea</h1>
                
            </div>

            
        </div>
    </main>
</body>
</html>