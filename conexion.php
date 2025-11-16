<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "globalairways";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$nombre      = $_POST['nombre'];
$clave       = $_POST['clave'];
$correo      = $_POST['correo'];
$telefono    = $_POST['telefono'];
$tipo_doc    = $_POST['tipo_doc'];
$documento   = $_POST['documento'];
$fecha_viaje = $_POST['fecha_viaje'];
$hora_viaje  = $_POST['hora_viaje'];
$retorno     = $_POST['retorno'];
$origen      = $_POST['origen'];
$destino     = $_POST['destino'];


$sql = "INSERT INTO reservas (nombre, clave, correo, telefono, tipo_doc, documento, fecha_viaje, hora_viaje, retorno, ciudadorigen, ciudaddestino)
        VALUES ('$nombre', '$clave', '$correo', '$telefono', '$tipo_doc', '$documento', '$fecha_viaje', '$hora_viaje', '$retorno', '$origen', '$destino')";

if ($conn->query($sql) === TRUE) {

    echo "
    <style>
        body{
            background: url('imagenes/fondoreserva.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, 60%); 
            background: #ffffffd8;
            padding: 30px 40px;
            border-radius: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,1);
            text-align: center;
            font-family: Arial;
            z-index: 9999;
            opacity: 0;
            animation: slideUp 0.5s ease-out forwards;
        }
        .popup h2 {
            margin-bottom: 15px;
            color: #000000ff;
        }
        .popup button {
            background: #2f5ef8ff;
            color: white;
            border: none;
            padding: 20px 28px;
            border-radius: 18px;
            cursor: pointer;
            margin-top: 30px;
            font-size: 18px;
        }
        .popup button:hover {
            background: #3146ffff;
        }
        @keyframes slideUp {
            0% {
                opacity: 0;
                transform: translate(-50%, -30%);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%);
            }
        }
    </style>

    <div class='popup'>
        <h1>GlobalAirways agradece tu preferencia</h1>
        <h2>Tu reserva se ha registrado correctamente</h2>
        <button onclick=\"window.location.href='reserva.html'\">Aceptar</button>
    </div>
    ";
} else {
    echo " Error al registrar: " . $conn->error;
}

$conn->close();
?>
