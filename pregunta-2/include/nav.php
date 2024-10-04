<nav class="navbar navbar-expand px-4 py-3">

    <div class="container">
        <div class="d-flex flex-column">
            <h5 class="mb-0">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombreCompleto']); ?>!</h5>
            <h5 class="mt-2">Rol: <?php echo htmlspecialchars($_SESSION['rol']); ?></h5>
        </div>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="img/account.png" class="avatar img-fluid" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end rounded">

                </div>
            </li>
        </ul>
    </div>
</nav>