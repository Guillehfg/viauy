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
        <div class="panel-eliminar">
            <div class="title-panel">
                <h1>Eliminar Línea</h1>
            </div>


            
            <div class="bus-lineas">
                <div class="lineas">
                    <div class="info-box">
                        <h2>Coche 1</h2>
                        
                    </div>
                    <div class="info-box">
                        <p>#313451235</p>
                    </div>
                    <div class="checkbox-box">
                        <label for="">Eliminar</label>
                        <input type="checkbox" name="" id="">
                    </div>                              
                </div>
                <div class="lineas">
                    <div class="info-box">
                        <h2>Coche 1</h2>
                        
                    </div>
                    <div class="info-box">
                        <p>#313451235</p>
                    </div>
                    <div class="checkbox-box">
                        <label for="">Eliminar</label>
                        <input type="checkbox" name="" id="">
                    </div>                              
                </div>
                <div class="lineas">
                    <div class="info-box">
                        <h2>Coche 1</h2>
                        
                    </div>
                    <div class="info-box">
                        <p>#313451235</p>
                    </div>
                    <div class="checkbox-box">
                        <label for="">Eliminar</label>
                        <input type="checkbox" name="" id="">
                    </div>                                  
                </div>
                <div class="lineas">
                    <div class="info-box">
                        <h2>Coche 1</h2>
                        
                    </div>
                    <div class="info-box">
                        <p>#313451235</p>
                    </div>
                    <div class="checkbox-box">
                        <label for="">Eliminar</label>
                        <input type="checkbox" name="" id="">
                    </div>                                  
                </div>
            </div>



            <div class="button-box">
                <button>Confirmar</button>
            </div>
        </div>
    </main>
</body>
</html>