<section class="slider">
    <!-- Contenedor del carrusel (slider) -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicadores de navegación del carrusel -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button> <!-- Indicador para el primer slide -->
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button> <!-- Indicador para el segundo slide -->
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> <!-- Indicador para el tercer slide -->
        </div>

        <!-- Contenedor de los elementos del carrusel -->
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active"> <!-- La clase 'active' indica que este slide es el primero visible -->
                <img src="img/slider1.jpg" class="img-fluid" alt="Slider Image 1"> <!-- Imagen del primer slide -->
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item"> <!-- Este slide no tiene la clase 'active', por lo que no es visible al cargar -->
                <img src="img/slider2.jpg" class="img-fluid" alt="Slider Image 2"> <!-- Imagen del segundo slide -->
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item"> <!-- Este slide también está oculto inicialmente -->
                <img src="img/slider3.jpg" class="img-fluid" alt="Slider Image 3"> <!-- Imagen del tercer slide -->
            </div>
        </div>

        <!-- Botón para avanzar al slide anterior -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span> <!-- Icono para retroceder -->
            <span class="visually-hidden">Previous</span> <!-- Texto oculto para accesibilidad -->
        </button>

        <!-- Botón para avanzar al siguiente slide -->
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span> <!-- Icono para avanzar -->
            <span class="visually-hidden">Next</span> <!-- Texto oculto para accesibilidad -->
        </button>
    </div>
</section>