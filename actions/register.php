<?php
 include("../config/db.php");
 $errores = [];
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_POST['email'], $_POST['name'],$_POST["apellidos"], $_POST['password'], $_POST['month'], $_POST['year'])) {
        $email = trim($_POST["email"]);
        $nombre = trim($_POST["name"]);
        $apellidos = trim($_POST["apellidos"]);
        $password = trim($_POST["password"]);
        $month = $_POST["month"];
        $year = $_POST["year"];
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores['email'] = "Por favor ingresa un correo electrónico válido.";
        }

        if (empty($nombre)) {
            $errores['name'] = "El nombre no puede estar vacío.";
        }

        if(empty($apellidos)){
            $errores["apellidos"] = "El apellido no puede estar vacio";
        }

        if (empty($nombre)) {
            $errores['name'] = "El nombre no puede estar vacío.";
        }
    

        if (empty($password)) {
            $errores['password'] = "La contraseña no puede estar vacía.";
        }elseif(strlen($password) <8){
            $errores["password"] = "La cotnraseña debe tener al menos 8 caracteres";
        }

        if (empty($month) || empty($year)) {
            $errores['fecha_nacimiento'] = "La fecha de nacimiento debe estar completa.";
        }
        $currentYear = date("Y"); // Año actual
        $currentYear -= 18;
        if ($year < 1900 || $year > $currentYear) {
            $errores['fecha_nacimiento'] = "Debes de tener al menos 18 años";
        }

        if(empty($errores)){


            $fecha_nacimiento = $year. "-" . $month. "-01";
            $sql_check_email = "SELECT * FROM usuarios where email = ?";
            $stmt_check_email = $conn->prepare($sql_check_email);
            if ($stmt_check_email === false) {
                die('Error en la preparación de la consulta SQL: ' . $conn->error);
            }
            $stmt_check_email->bind_param("s",$email);
            $stmt_check_email->execute();
            $result = $stmt_check_email->get_result();

            
            if($result-> num_rows > 0){
                $errores["email"]= "Este correo electronico ya esta registrado";
            }else{
                $hashed_password = password_hash($password,PASSWORD_DEFAULT);

                $sql = "INSERT INTO usuarios (nombre, apellidos,email,fecha_nacimiento, password, rol) 
                        VALUES (?, ?, ?, ?, ?, 2)";
                $stmt = $conn->prepare($sql);

                $stmt->bind_param("sssss",$nombre,$apellidos,$email,$fecha_nacimiento,$hashed_password);
                if($stmt->execute()){
                    echo "<script>
                    document.getElementById('registerModal').classList.add('hidden');
                  </script>";
       
                }else{
                    $errores["registro"] ="Error al registrar el usuario" . $conn->error;
                }
            }
        }

        $stmt_check_email->close();
        $stmt->close();
    }

 }

?>