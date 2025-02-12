<?php
include("../config/db.php");
$errores = [];
$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'], $_POST['name'], $_POST["apellidos"], $_POST['password'], $_POST['month'], $_POST['year'])) {
        $email = trim($_POST["email"]);
        $nombre = trim($_POST["name"]);
        $apellidos = trim($_POST["apellidos"]);
        $password = trim($_POST["password"]);
        $month = trim($_POST["month"]);
        $year = trim($_POST["year"]);

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Por favor ingresa un correo electrónico válido.";
        }

        if (empty($nombre)) {
            $errores['name'] = "El nombre no puede estar vacío.";
        }

        if (empty($apellidos)) {
            $errores["apellidos"] = "El apellido no puede estar vacío.";
        }

        if (empty($password)) {
            $errores['password'] = "La contraseña no puede estar vacía.";
        } elseif (strlen($password) < 8) {
            $errores["password"] = "La contraseña debe tener al menos 8 caracteres.";
        }

        if (empty($month) || empty($year)) {
            $errores['fecha_nacimiento'] = "La fecha de nacimiento debe estar completa.";
        }

        
        $currentDate = new DateTime(); 
        $currentDate->modify("-18 years"); 

        
        $birthDate = DateTime::createFromFormat("Y-m-d", $year . "-" . $month . "-01");

        
        if ($birthDate === false) {
            $errores['fecha_nacimiento'] = "La fecha de nacimiento no es válida.";
        } else {
            
            if ($birthDate > $currentDate) {
                $errores['fecha_nacimiento'] = "Debes de tener al menos 18 años.";
            }

            $currentDate->modify("-100 years"); 
            if ($birthDate < $currentDate) {
                $errores['fecha_nacimiento'] = "La edad máxima permitida es de 100 años.";
            }
        }


        if (empty($errores)) {
            $fecha_nacimiento = $year . "-" . $month . "-01";
            $sql_check_email = "SELECT * FROM usuarios WHERE email = ?";
            $stmt_check_email = $conn->prepare($sql_check_email);
            if ($stmt_check_email === false) {
                error_log('Error en la preparación de la consulta SQL: ' . $conn->error);
            }
            $stmt_check_email->bind_param("s", $email);
            $stmt_check_email->execute();
            $result = $stmt_check_email->get_result();

            if ($result->num_rows > 0) {
                $errores["email"] = "Este correo electrónico ya está registrado.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios (nombre, apellidos, email, fecha_nacimiento, password, rol) VALUES (?, ?, ?, ?, ?, 2)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sssss", $nombre, $apellidos, $email, $fecha_nacimiento, $hashed_password);

                if ($stmt->execute()) {
                    $response['success'] = true; 
                } else {
                    $errores["registro"] = "Error al registrar el usuario: " . $conn->error;
                }
            }
        }

        $response["errors"] = $errores;
        echo json_encode($response);

    }
}

$stmt->close();
$stmt_check_email->close();
$conn->close();
?>
