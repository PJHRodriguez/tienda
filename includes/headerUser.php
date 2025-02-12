<?php

session_start();
?>

<div class="bg-white p-2">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">

            <?php
                if (isset($_SESSION["id_usuario"])) {
                    $nombre = $_SESSION["name"];
                    $apellido = $_SESSION["lastname"];
                    echo "
                        <a href='".BASE_URL."pages/perfil.php' class='block px-2 py-2 flex rounded-lg items-center'>
                            <p class='font-bold mr-3'>Bienvenido, $nombre $apellido</p>
                            <i class='fas fa-user-edit'></i>
                        </a>";
                }
            ?>


        </div>

        <div class="flex justify-end items-center">

            <a href="#" class="block px-4 py-2 hover:bg-stone-300 flex rounded-lg items-center">
                <i class="fas fa-cart-shopping"></i>
            </a>
            
            
            <a href="#" id="userIcon" class="block px-4 py-2 hover:bg-stone-300 flex rounded-lg items-center">
                <i class="fas fa-user"></i>
            </a>
            
            
            <a href="<?php echo BASE_URL;?>actions/logout.php" class="block px-4 py-2 hover:bg-stone-300 flex rounded-lg items-center">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</div>



    
    <!--
        LOGIN
    -->



    <div id="loginModal" class="fixed inset-0 bg-stone-800 bg-opacity-30 flex justify-center items-center hidden z-50">
        <div class="bg-white p-12 rounded-lg w-96 shadow-lg relative">
            <h2 class="text-2xl mb-4 font-bold text-center">Iniciar Sesión </h2>
            

            <form id ="loginForm">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off" >

                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off" >

                <div class="flex flex-col justify-center items-center">
                    <button type="submit" class="bg-stone-800 text-white px-4 py-2 rounded-lg hover:bg-stone-500 transition duration-200">Iniciar Sesión</button>
                    <button type="button" id="registerLink" class="text-sm text-stone-700 hover:text-blue-700">¿No tienes cuenta? Regístrate</button>
                </div>
            </form>

            <div id="loginErrors" class="text-red-500 text-sm mb-4"></div>


            <button id="closeModal" class="absolute top-2 right-2 text-gray-600 text-xl hover:text-gray-800">&times;</button>
        </div>
    </div>



     <!--
        REGISTRARSE
    -->



    <div id="registerModal" class="fixed inset-0 bg-stone-800 bg-opacity-30 flex justify-center items-center hidden z-50">
        <div class="bg-white p-12 rounded-lg w-96 shadow-lg relative">
            <h2 class="text-2xl mb-4 font-bold text-center">Registrarse </h2>
            
           
            <form id ="registerForm">

                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off"  >

                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off" >

                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off" >

                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 mb-4 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800"autocomplete="off" >


                <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>

                <div class="flex space-x-4 mb-4">

                    <select id="month" name="month" class="mt-1 mb-4 p-2 w-1/2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800"  autocomplete="off">
                        <option value="" disabled selected>Mes</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>

                    <input type="number" id="year" name="year" class="mt-1 mb-4 p-2 w-1/2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-stone-800" autocomplete="off"  placeholder="Año">

                </div>
          

                <div class="flex flex-col justify-center items-center">
                    <button type="submit" class="bg-stone-800 text-white px-4 py-2 rounded-lg hover:bg-stone-500 transition duration-200">Registrarse</button>
                    <button type="button" id="loginLink" class="text-sm text-stone-700 hover:text-blue-700">¿Ya tienes cuenta? Inicia sesion</button>
                </div>

                <div id="errorContainer" class="text-red-500 text-sm mb-4"></div>
            </form>

            <button id="closeModal2" class="absolute top-2 right-2 text-gray-600 text-xl hover:text-gray-800">&times;</button>
        </div>
    </div>