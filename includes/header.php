<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/index.css">
</head>
<body>
    <?php include('../includes/headerUser.php')?>
    
    <nav class="bg-stone-800 shadow-lg text-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">

            <a href="../pages/index.php"class="text-xl font-bold">Tienda</a>

                <div class="hidden md:flex space-x-6 ">
                    <a href="../pages/caballero.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Caballero
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/dama.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Dama
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/ninos.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Niño
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/nosotros.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Sobre nosotros
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    
                </div>

                <!-- Botón menú móvil -->
                <button id="mtoggle" class="md:hidden text-stone-300 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
    
            </div>

              <!-- Menú Móvil -->
              <div id="menu-mobile" class="hidden md:hidden flex flex-col space-y-2 pb-4 text-center">
              <a href="../pages/caballero.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Caballero
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/dama.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Dama
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/ninos.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Niño
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>
                    <a href="../pages/nosotros.php" class="text-1xl rounded-lg p-3 font-bold relative group">
                        Sobre nosotros
                        <span class="absolute left-0 bottom-0 w-0 h-0.5 bg-stone-300 group-hover:w-full transition-all duration-300"></span>
                    </a>

              </div>
          </div>
    </div>
</nav>
