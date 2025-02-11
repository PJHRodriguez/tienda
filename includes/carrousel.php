<section class="mb-12 relative niño ">
        <div class="w-full h-[600px] lg:h-[900px] bg-top bg-cover cover-fit  shadow-lg" style="background-image: url('../assets/imgs/section_niño.jpg');">

            <div class="absolute inset-0 bg-black opacity-40 rounded-lg"></div>

            <div class="absolute top-5 right-5 text-white text-6xl font-extrabold drop-shadow-lg">
                Niños
            </div>
            
            <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 w-full mx-5 px-4">
                
                 <div class="mx-8">

                     <div class="slick-carousel mx-8">
                         <?php for($i=0; $i<10; $i++): ?>
                             <div class="bg-white m-5 p-4 rounded-lg shadow-xl h-full">
                                 <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Producto</h2>
                                 <img src="../assets/imgs/pantalon.jpg" alt="Producto" class="w-full h-48 object-cover rounded-lg mb-4">
                                 <p class="text-xl font-bold text-center mb-2">$30.99</p>
                                 <button class="bg-stone-900 text-white rounded-lg hover:bg-stone-300 hover:text-black transition-colors duration-300 py-2 px-4 w-full">Ir al producto</button>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>