<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extracción PHP</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Información de los usuarios</h1>
    <?php
    $db_host = "localhost:3307";
    $db_nombre = "form_bd";
    $db_usuario = "root";
    $db_contra = "";

    $nombre = $_POST['nombre'];

    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    $sql = "SELECT * FROM usuarios WHERE nombre = '$nombre'";

    $result = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Email</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["apellido"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron usuarios con el nombre ingresado.";
    }

    mysqli_close($conexion);
    ?>
</body>
</html>
