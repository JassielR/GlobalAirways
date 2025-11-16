<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

$u = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Vuelo - GlobalAirways</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body { background: #f2f2f2; font-family: Arial, sans-serif; }
        .top-bar { background: #1a237e; color: white; padding: 20px; }
        .flight-title { font-size: 22px; font-weight: bold; }
        .sub-info { font-size: 14px; opacity: 0.8; }
        .tab-days { background: white; border-bottom: 2px solid #ddd; padding: 15px; display: flex; overflow-x: auto; }
        .day-item { margin-right: 20px; text-align: center; }
        .day-selected { margin-left: 10%; border-bottom: 3px solid #d81b60; font-weight: bold; }
        .flight-box { background: white; border-radius: 8px; padding: 25px; margin-top: 15px; box-shadow: 0px 2px 5px rgba(0,0,0,0.1); }
        .time { font-size: 24px; font-weight: bold; }
        .city { color: #444; }
        .btn-cerrar { margin-top: 40px; }
        #flecha { font-size: 50px; color: #444; }
    </style>
</head>

<body>
    <div class="top-bar">
        <div class="container">
            <div class="flight-title">
                <?php echo $u['ciudadorigen']; ?> a <?php echo $u['ciudaddestino']; ?>
            </div>
            <div class="sub-info">
                Salida: <?php echo $u['fecha_viaje']; ?> • 
                <?php echo $u['hora_viaje']; ?> —
                Retorno: <?php echo !empty($u['retorno']) ? $u['retorno'] : "Sin retorno"; ?>
            </div>
            <div class="sub-info">
                1 adulto • <?php echo $u['nombre']; ?>
            </div>
        </div>
    </div>

    <div class="tab-days">
        <div class="container">
            <div class="day-item day-selected">
                <h2>Bienvenido <?php echo $u['nombre']; ?></h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flight-box">
            <div class="row align-items-center">
                
                <div class="col-md-5 text-center">
                    <div class="time"><?php echo $u['hora_viaje']; ?></div>
                    <div class="city">
                        <?php echo $u['ciudadorigen']; ?> <br>
                        <?php echo $u['fecha_viaje']; ?> &nbsp; <?php echo $u['hora_viaje']; ?>
                    </div>
                </div>

                <div class="col-md-2 text-center">
                    <i id='flecha' class="fa-solid fa-angle-right"></i>
                </div>

                <div class="col-md-5 text-center">
                    <div class="time">
                    <?php 
                    echo date("H:i", strtotime($u['retorno']));
                    ?>
                </div>

                    <div class="city">
                        <?php echo $u['ciudaddestino']; ?> <br>
                        <?php echo !empty($u['retorno']) ? $u['retorno'] : "Sin retorno"; ?>
                    </div>
                </div>

            </div>

            <hr>
            <div class="text-center">
                <span class="fw-bold">Para reprogramar póngase en contacto con nosotros</span>
            </div>
        </div>

        <div class="text-center btn-cerrar">
            <a href="index.html" class="btn btn-danger">Cerrar sesión</a>
        </div>
    </div>

</body>
</html>
