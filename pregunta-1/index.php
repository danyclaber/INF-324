<!DOCTYPE html>
<html lang="en">

<?php include 'php/head.php'; ?>

<body>

    <!-- header -->
    <?php include 'php/header.php'; ?>


    <!-- slider -->
    <?php include 'php/slider.php'; ?>

    <main>
        <!-- quienes somos -->
        <section id="quienes-somos" class="quienes-somos container">
            <!-- Título de la sección -->
            <h1 class="text-center py-5">QUIENES - SOMOS</h1>
            <div class="row">
                <div class="col-md-6">
                    <!-- Imagen de la sección "Quienes Somos" -->
                    <img src="img/quienes-somos.jpeg" class="img-fluid" alt="Descripción de la imagen">
                </div>
                <div class="col-md-6">
                    <!-- Tabs para Misión y Visión -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="mision-tab" data-bs-toggle="tab" href="#mision" role="tab" aria-controls="mision" aria-selected="true">Misión</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="vision-tab" data-bs-toggle="tab" href="#vision" role="tab" aria-controls="vision" aria-selected="false">Visión</a>
                        </li>
                    </ul>
                    <!-- Contenedor de contenido de las tabs -->
                    <div class="tab-content" id="myTabContent">
                        <!-- Contenido de la pestaña de Misión -->
                        <div class="tab-pane fade show active" id="mision" role="tabpanel" aria-labelledby="mision-tab">
                            <h2 class="text-center py-4">Mision Institucional</h2>
                            <p class="p-quienesSomos">Somos una institución pública municipal renovada, dinámica, transparente e incluyente, que brinda servicios públicos modernos, eficientes, ágiles y planificados, con concertación y participación ciudadana, impulsando una convivencia pacífica en búsqueda de una mejor calidad de vida de la población paceña por el Bien Común.</p>
                        </div>
                        <!-- Contenido de la pestaña de Visión -->
                        <div class="tab-pane fade" id="vision" role="tabpanel" aria-labelledby="vision-tab">
                            <h2 class="text-center py-4">Visión Institucional</h2>
                            <p class="p-quienesSomos">Ser una institución pública modelo de gestión municipal democrática, participativa, transparente, eficiente, innovadora y tecnológica, que dinamiza la economía, el desarrollo social y territorial; consolidando una La Paz saludable, productiva, competitiva, biodiversa y resiliente, cultural, ordenada e interconectada, con diálogo y reconciliación por el Bien Común.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- tramites -->
        <section id="tramites" class="tramites container pb-3">
            <!-- Título de la sección de Trámites -->
            <h1 class="text-center py-5">TRAMITES</h1>
            <div class="row d-flex justify-content-center">
                <!-- Tarjeta para Impuestos Municipales -->
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block text-center">
                            <h3 class="m-b-20">Impuestos Municipales</h3>
                            <h2><i class="fa fa-calculator mt-2"></i></h2>
                            <a href="tramite-1.php"><button class="btn btn-secondary mt-3">Ver Tramite</button></a>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta para Catastro y Territorio -->
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block text-center">
                            <h3 class="m-b-20">Catastro y Territorio</h3>
                            <h2><i class="fa fa-building mt-2"></i></h2>
                            <a href="tramite-2.php"><button class="btn btn-secondary mt-3">Ver Tramite</button></a>
                        </div>
                    </div>
                </div>
                <!-- Tarjeta para Negocio y Comercio -->
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block text-center">
                            <h3 class="m-b-20">Negocio y Comercio</h3>
                            <h2><i class="fa fa-shopping-cart mt-2"></i></h2>
                            <a href="tramite-3.php"><button class="btn btn-secondary mt-3">Ver Tramite</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- contactanos -->
        <?php include 'php/contactanos.php'; ?>


    </main>

    <!-- footer -->
    <?php include 'php/footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>