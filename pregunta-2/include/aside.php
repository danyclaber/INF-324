<aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="index.php">HAM-LP</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="perfil.php" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Perfil</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="index.php" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
                data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
                <i class="lni lni-home"></i>
                <span>Modulo Catastro</span>
            </a>
            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">Registrar</a>
                </li>
                <li class="sidebar-item">
                    <a href="listar.php" class="sidebar-link">Listar</a>
                </li>
            </ul>
        </li>


    </ul>
    <div class="sidebar-footer">
        <a href="login.php" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Salir</span>
        </a>
    </div>
</aside>