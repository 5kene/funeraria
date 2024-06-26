<?php
$url_base = "http://localhost/funeraria/";
?>
<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>
<body>
    <header>
      <!-- place navbar here -->
    </header>
    <nav class="navbar navbar-expand navbar-light bg-secondary">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#" aria-current="page">Cementerio <span class="visually-hidden">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/provincias/">Provincias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url_base;?>secciones/reportes/">Reportes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Configuración
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/configuracion/">Usuarios</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/roles/">Roles</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/respaldo/">Respaldo</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/creacion/">Crud</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/disparador/">Generación de disparadores de auditoria</a></li>
                    <li><a class="dropdown-item" href="<?php echo $url_base;?>secciones/logs/">Visualizador de eventos y auditoria (Logs) </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Cerrar sesión</a>
            </li>
        </ul>
    </nav>
<main class="container">
    <!-- Your content here -->
</main>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybG4qXHcp3yE7BvQbg64lZG0LHmQG9S1scrPtkwpGLf9gffvM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-qgHwzdDBgqCCPG6o/Ow7eZNBwXQhoYc3vHmjLWBHd6zxOi7UwSQQpFS63YVwTu6m" crossorigin="anonymous"></script>
</body>
</html>
