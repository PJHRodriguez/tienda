<?php
    include("../config/db.php");
    include("../config/url.php");
    $errores = [];
    $response = [];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["correo"], $_POST["contrasena"])) {
            $email = trim($_POST["correo"]);
            $password = trim($_POST["contrasena"]);
    
            if (empty($email) || empty($password)) {
                $errores["vacio"] = "Un campo está vacío, por favor, complétalo.";
            }
    
            if (strlen($password) < 8) {
                $errores["password"] = "La contraseña debe tener al menos 8 caracteres.";
            }
    
            if (empty($errores)) {
                $sql = "SELECT * FROM usuarios WHERE email = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    error_log('Error en la preparación de la consulta SQL: ' . $conn->error);
                }
    
                $stmt->bind_param("s", $email);
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        $user = $result->fetch_assoc();
                        if (password_verify($password, $user["password"])) {

                            session_start();
                            $_SESSION["id_usuario"] = $user['id_usuario'];
                            $_SESSION["name"] = $user["nombre"];
                            $_SESSION["lastname"] = $user["apellidos"];

                            $response["success"] = true;
                            $response["redirect"] = BASE_URL . "pages/index.php"; 
                        } else {
                            $errores["password"] = "La contraseña es incorrecta.";
                        }
                    } else {
                        $errores["email"] = "No existe un usuario con este correo electrónico.";
                    }
                } else {
                    $errores["sql_error"] = "Error al ejecutar la consulta.";
                }
            }
        }
    }

    $response["errors"] = $errores;
    echo json_encode($response); 
    $stmt->close();
    $conn->close();
?>
